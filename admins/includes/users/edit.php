<?php

// ============================================================
// ASYDIM — Edit User (Admin)
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

$id    = (int)($_GET['id'] ?? 0);
$name  = trim($_POST['name']  ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$role  = (int)($_POST['role'] ?? 0);

if ($id <= 0) {
    header("location: " . $arrConfig["url_admin"] . "/users/index.php");
    exit();
}

if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location: " . $arrConfig["url_admin"] . "/users/index.php?error=2");
    exit();
}

$role_query = my_query("SELECT * FROM roles WHERE id = ?", [$role]);
if (empty($role_query)) {
    header("location: " . $arrConfig["url_admin"] . "/users/index.php?error=1");
    exit();
}

$result = my_query(
    "UPDATE users SET name = ?, email = ?, phone = ?, role_id = ? WHERE id = ?",
    [$name, $email, $phone, $role, $id]
);

if (!$result) {
    header("location: " . $arrConfig["url_admin"] . "/users/index.php?error=4");
    exit();
}

header("location: " . $arrConfig["url_admin"] . "/users/index.php?error=0");
exit();
