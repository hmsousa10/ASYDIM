<?php

// ============================================================
// ASYDIM — Delete Formation (Admin)
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

// Verify formation exists
$formation = my_query("SELECT * FROM formations WHERE id = ?", [$id]);
if (empty($formation)) {
    http_response_code(404);
    echo json_encode(['message' => 'Formação não encontrada']);
    exit();
}

// Delete related records first (preserve referential integrity)
my_query("DELETE FROM formation_users WHERE formation_id = ?", [$id]);
my_query("DELETE FROM meetings WHERE id_formation = ?", [$id]);

// Delete the formation
$result = my_query("DELETE FROM formations WHERE id = ?", [$id]);

if ($result) {
    header("location: index.php?error=0");
    exit();
}

http_response_code(500);
echo json_encode(['message' => 'Erro ao eliminar formação']);
exit();
