<?php
function null_or_value($v) { return $v === null ? '—' : $v; }

include "../../includes/config.inc.php";
include "../../includes/db.inc.php";

include $arrConfig['dir_site'] . '/admins/adminverification.php';

$users = my_query("SELECT u.*, r.name as role_name FROM users u LEFT JOIN roles r ON u.role_id = r.id ORDER BY u.name ASC");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM Admin — Utilizadores</title>
</head>
<body>
<?php include "../components/header.php"; ?>
<script>document.getElementById('adm-page-title').textContent = 'Utilizadores';</script>

<div class="adm-page-header">
    <div>
        <h1>Utilizadores</h1>
        <p style="color:var(--text-muted);margin:4px 0 0;font-size:0.9rem;"><?php echo count($users); ?> utilizador(es)</p>
    </div>
    <a href="create.php" class="btn-primary">
        <i class="ph ph-user-plus"></i> Novo Utilizador
    </a>
</div>

<div class="adm-table-card">
    <?php if (empty($users)): ?>
        <div class="empty-state">
            <i class="ph ph-users-three"></i>
            <p>Ainda não existem utilizadores.</p>
        </div>
    <?php else: ?>
    <div class="table-header">
        <h2>Lista de Utilizadores</h2>
    </div>
    <table class="adm-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telemóvel</th>
                <th>Cargo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u): ?>
            <tr>
                <td style="font-weight:600;"><?php echo htmlspecialchars($u['name']); ?></td>
                <td style="color:var(--text-muted);"><?php echo htmlspecialchars($u['email']); ?></td>
                <td><?php echo htmlspecialchars(null_or_value($u['phone'])); ?></td>
                <td><span class="badge badge-green"><?php echo htmlspecialchars($u['role_name'] ?? '—'); ?></span></td>
                <td>
                    <div style="display:flex;gap:8px;">
                        <a href="edit.php?id=<?php echo $u['id']; ?>" class="btn-edit"><i class="ph ph-pencil"></i></a>
                        <button onclick="confirmDelete('delete.php?id=<?php echo $u['id']; ?>')" class="btn-danger"><i class="ph ph-trash"></i></button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>

    </div>
</div>

<script>
function confirmDelete(url) {
    Swal.fire({
        title: 'Eliminar utilizador?',
        text: 'Esta ação não pode ser revertida.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#e05252',
        cancelButtonColor: '#5a7d6a',
    }).then(r => { if (r.isConfirmed) window.location.href = url; });
}
<?php
$error = isset($_GET['error']) ? (int)$_GET['error'] : -1;
$toasts = [
    0 => ['Operação realizada com sucesso!', 'success', '#00c96d'],
    1 => ['Cargo inválido.', 'error', '#e05252'],
    2 => ['Nome ou e-mail inválido.', 'error', '#e05252'],
    3 => ['E-mail já existe.', 'error', '#e05252'],
    5 => ['Não pode eliminar a própria conta.', 'warning', '#f59e0b'],
];
if (isset($toasts[$error])) {
    [$msg, $icon, $bg] = $toasts[$error];
    echo "window.onload=()=>Swal.fire({title:'$msg',icon:'$icon',toast:true,showConfirmButton:false,timer:3000,timerProgressBar:true,position:'top-end',color:'#fff',background:'$bg'});";
}
?>
</script>
</body>
</html>