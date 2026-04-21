<?php

// ============================================================
// ASYDIM — Create Meeting (Admin)
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

$name               = trim($_POST['name']               ?? '');
$theme              = trim($_POST['theme']              ?? '');
$link               = trim($_POST['link']               ?? '');
$estimated_duration = (int)($_POST['estimated_duration'] ?? 0);
$date               = trim($_POST['date']               ?? '');
$id_formation       = (int)($_POST['id_formation']      ?? 0);

if (empty($name) || empty($theme) || empty($link) || $estimated_duration <= 0 || empty($date) || $id_formation <= 0) {
    header("location: " . $arrConfig["url_admin"] . "/formations/show.php?id=$id_formation&error=1");
    exit();
}

$date_timestamp = strtotime($date);
if ($date_timestamp === false || $date_timestamp < strtotime('today')) {
    header("location: " . $arrConfig["url_admin"] . "/formations/show.php?id=$id_formation&error=1");
    exit();
}

$result = my_query(
    "INSERT INTO meetings (name, theme, link, estimated_duration, date, id_formation) VALUES (?, ?, ?, ?, ?, ?)",
    [$name, $theme, $link, $estimated_duration, $date, $id_formation]
);

if (!$result) {
    header("location: " . $arrConfig["url_admin"] . "/formations/show.php?id=$id_formation&error=4");
    exit();
}

header("location: " . $arrConfig["url_admin"] . "/formations/show.php?id=$id_formation&error=0");
exit();