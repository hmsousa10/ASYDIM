<?php

// ============================================================
// ASYDIM — Add User to Formation (Admin)
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

$user_id      = (int)($_POST['user_id']      ?? 0);
$formation_id = (int)($_POST['formation_id'] ?? 0);

if ($user_id <= 0 || $formation_id <= 0) {
    header("location: " . $arrConfig["url_admin"] . "/formations/show.php?id=$formation_id&error=1");
    exit();
}

// Check if user is already enrolled
$existing = my_query(
    "SELECT id FROM formation_users WHERE user_id = ? AND formation_id = ?",
    [$user_id, $formation_id]
);

if (!empty($existing)) {
    header("location: " . $arrConfig["url_admin"] . "/formations/show.php?id=$formation_id&error=2");
    exit();
}

my_query(
    "INSERT INTO formation_users (user_id, formation_id, approved) VALUES (?, ?, 1)",
    [$user_id, $formation_id]
);

header("location: " . $arrConfig["url_admin"] . "/formations/show.php?id=$formation_id&error=0");
exit();