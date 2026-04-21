<?php

// ============================================================
// ASYDIM — Change Formation-User State (Admin)
// ============================================================

include "../../../includes/config.inc.php";
include "../../../includes/db.inc.php";
include "../../../includes/functions.inc.php";

if (session_status() === PHP_SESSION_NONE) session_start();
include $arrConfig['dir_site'] . "/admins/adminverification.php";

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    header("location: " . $arrConfig["url_admin"] . "/formations/index.php");
    exit();
}

$row = my_query("SELECT * FROM formation_users WHERE id = ?", [$id]);

if (empty($row)) {
    header("location: " . $arrConfig["url_admin"] . "/formations/index.php");
    exit();
}

$row = $row[0];
$nextState = $row['approved'] == 0 ? 1 : 0;

my_query("UPDATE formation_users SET approved = ? WHERE id = ?", [$nextState, $id]);

header("location: " . $arrConfig["url_admin"] . "/formations/show.php?id=" . (int)$row['formation_id'] . "&error=0");
exit();
