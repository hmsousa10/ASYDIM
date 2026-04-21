<?php

// ============================================================
// ASYDIM — Admin Middleware
// Verifica se o utilizador está autenticado e tem permissões
// de administrador (permission_level >= 25).
// Include este ficheiro no TOPO de cada página de admin.
// ============================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('location: ' . $arrConfig['url_site'] . '/login.php');
    exit();
}

// Re-fetch the role from DB to prevent privilege escalation via stale session data
$role_id   = (int)$_SESSION['user']['role_id'];
$userrole  = my_query("SELECT * FROM roles WHERE id = ?", [$role_id]);

if (empty($userrole) || (int)$userrole[0]['permission_level'] > 20) {
    session_destroy();
    header('location: ' . $arrConfig['url_site'] . '/login.php');
    exit();
}