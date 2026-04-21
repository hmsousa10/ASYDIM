<?php

// ============================================================
// ASYDIM — Delete Meeting (Admin)
// ============================================================

include "../../../includes/config.inc.php";
include "../../../includes/db.inc.php";
include "../../../includes/functions.inc.php";

if (session_status() === PHP_SESSION_NONE) session_start();
include $arrConfig['dir_site'] . "/admins/adminverification.php";

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    header("location: " . $arrConfig["url_admin"] . "/formations/index.php?error=1");
    exit();
}

$meeting = my_query("SELECT id_formation FROM meetings WHERE id = ?", [$id]);

if (empty($meeting)) {
    header("location: " . $arrConfig["url_admin"] . "/formations/index.php?error=1");
    exit();
}

$id_formation = (int)$meeting[0]['id_formation'];

my_query("DELETE FROM meetings WHERE id = ?", [$id]);

header("location: " . $arrConfig["url_admin"] . "/formations/show.php?id=$id_formation&error=0");
exit();