<?php

// ============================================================
// ASYDIM — Edit Formation (Admin)
// ============================================================

include "../../../includes/config.inc.php";
include "../../../includes/db.inc.php";
include "../../../includes/functions.inc.php";

if (session_status() === PHP_SESSION_NONE) session_start();
include $arrConfig['dir_site'] . "/admins/adminverification.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit();
}

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
    header("location: " . $arrConfig["url_admin"] . "/formations/index.php");
    exit();
}

// Confirm formation exists
$existing = my_query("SELECT * FROM formations WHERE id = ?", [$id]);
if (empty($existing)) {
    header("location: " . $arrConfig["url_admin"] . "/formations/index.php?error=4");
    exit();
}

$name           = trim($_POST['name']           ?? '');
$slug           = trim($_POST['slug']           ?? '');
$duration       = (int)($_POST['duration']      ?? 0);
$description    = trim($_POST['description']    ?? '');
$beginning_date = trim($_POST['beginning_date'] ?? '');
$end_date       = trim($_POST['ending_date']    ?? '');
$category       = trim($_POST['category']       ?? '');
$unit_price     = (int)(floatval($_POST['unit_price'] ?? 0) * 100); // centavos

// --- Validation ---
if (empty($name) || $duration <= 0 || empty($description) || empty($beginning_date) || empty($category)) {
    header("location: " . $arrConfig["url_admin"] . "/formations/edit.php?id=$id&error=3");
    exit();
}

$beginning_ts = strtotime($beginning_date);
if ($beginning_ts === false) {
    header("location: " . $arrConfig["url_admin"] . "/formations/edit.php?id=$id&error=1");
    exit();
}

$end_ts = null;
if ($end_date !== '') {
    $end_ts = strtotime($end_date);
    if ($end_ts === false || $end_ts <= $beginning_ts) {
        header("location: " . $arrConfig["url_admin"] . "/formations/edit.php?id=$id&error=1");
        exit();
    }
}

// --- Slug sanitisation ---
$slug = strtolower(trim($slug));
$slug = preg_replace('/[^a-z0-9\-]/', '-', str_replace(' ', '-', $slug));
$slug = preg_replace('/-+/', '-', trim($slug, '-'));

// --- Optional image upload ---
$image_url = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK && $_FILES['image']['size'] > 0) {
    $allowed_types = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $detected_type = $finfo->file($_FILES['image']['tmp_name']);

    if (!in_array($detected_type, $allowed_types, true)) {
        header("location: " . $arrConfig["url_admin"] . "/formations/edit.php?id=$id&error=2");
        exit();
    }

    if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
        header("location: " . $arrConfig["url_admin"] . "/formations/edit.php?id=$id&error=2");
        exit();
    }

    $ext_map    = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'];
    $image_name = uniqid('img_', true) . '.' . $ext_map[$detected_type];
    $upload_dir = $arrConfig['dir_site'] . '/assets/uploads/';
    $image_path = $upload_dir . $image_name;
    $image_url  = $arrConfig['url_site'] . '/assets/uploads/' . $image_name;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
        header("location: " . $arrConfig["url_admin"] . "/formations/edit.php?id=$id&error=2");
        exit();
    }
}

// --- Build parameterised UPDATE ---
if ($image_url !== '') {
    $result = my_query(
        "UPDATE formations SET name=?, description=?, beginning_date=?, ending_date=?, slug=?, duration=?, category=?, unit_price=?, image=? WHERE id=?",
        [$name, $description, $beginning_date, $end_ts ? $end_date : null, $slug, $duration, $category, $unit_price, $image_url, $id]
    );
} else {
    $result = my_query(
        "UPDATE formations SET name=?, description=?, beginning_date=?, ending_date=?, slug=?, duration=?, category=?, unit_price=? WHERE id=?",
        [$name, $description, $beginning_date, $end_ts ? $end_date : null, $slug, $duration, $category, $unit_price, $id]
    );
}

if (!$result) {
    header("location: " . $arrConfig["url_admin"] . "/formations/edit.php?id=$id&error=4");
    exit();
}

header("location: " . $arrConfig["url_admin"] . "/formations/index.php?error=0");
exit();