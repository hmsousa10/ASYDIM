<?php

// ============================================================
// ASYDIM — Delete User (Admin)
// ============================================================

include "../../includes/config.inc.php";
include "../../includes/db.inc.php";

if (session_status() === PHP_SESSION_NONE) session_start();
include $arrConfig['dir_site'] . "/admins/adminverification.php";

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['message' => 'ID inválido']);
    exit();
}

// Prevent admin from deleting their own account
if (isset($_SESSION['user']['id']) && (int)$_SESSION['user']['id'] === $id) {
    header("location: index.php?error=5");
    exit();
}

$user = my_query("SELECT * FROM users WHERE id = ?", [$id]);
if (empty($user)) {
    http_response_code(404);
    echo json_encode(['message' => 'Utilizador não encontrado']);
    exit();
}

$result = my_query("DELETE FROM users WHERE id = ?", [$id]);

if ($result) {
    header("location: index.php?error=0");
    exit();
}

http_response_code(500);
echo json_encode(['message' => 'Erro ao eliminar utilizador']);
exit();