<?php
include "../../includes/config.inc.php";
include "../../includes/db.inc.php";

include $arrConfig['dir_site'] . '/admins/adminverification.php';

$formations = my_query("SELECT * FROM formations ORDER BY beginning_date DESC");

function format_date($value) {
    if ($value == null) return '<span class="badge badge-gray">Sem data</span>';
    return date("d/m/Y", strtotime($value));
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM Admin — Formações</title>
    <meta name="description" content="Gestão de Formações">
</head>
<body>
<?php include "../components/header.php"; ?>
<script>document.getElementById('adm-page-title').textContent = 'Formações';</script>

<div class="adm-page-header">
    <div>
        <h1>Formações</h1>
        <p style="color:var(--text-muted);margin:4px 0 0;font-size:0.9rem;"><?php echo count($formations); ?> formação(ões) encontrada(s)</p>
    </div>
    <a href="create.php" class="btn-primary">
        <i class="ph ph-plus-circle"></i> Nova Formação
    </a>
</div>

<div class="adm-table-card">
    <?php if (empty($formations)): ?>
        <div class="empty-state">
            <i class="ph ph-graduation-cap"></i>
            <p>Ainda não existem formações criadas.</p>
            <a href="create.php" class="btn-primary" style="margin-top:20px;display:inline-flex;">Criar primeira formação</a>
        </div>
    <?php else: ?>
    <div class="table-header">
        <h2>Lista de Formações</h2>
    </div>
    <table class="adm-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Abreviatura</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Duração</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formations as $f): ?>
            <tr>
                <td>
                    <a href="show.php?id=<?php echo $f['id']; ?>" style="font-weight:600;color:var(--text);">
                        <?php echo htmlspecialchars($f['name']); ?>
                    </a>
                </td>
                <td><span class="badge badge-gray"><?php echo htmlspecialchars($f['slug']); ?></span></td>
                <td><?php echo format_date($f['beginning_date']); ?></td>
                <td><?php echo format_date($f['ending_date']); ?></td>
                <td><span style="font-weight:600;"><?php echo $f['duration']; ?></span> h</td>
                <td>
                    <div style="display:flex;gap:8px;align-items:center;">
                        <a href="show.php?id=<?php echo $f['id']; ?>" class="btn-view"><i class="ph ph-eye"></i></a>
                        <a href="edit.php?id=<?php echo $f['id']; ?>" class="btn-edit"><i class="ph ph-pencil"></i></a>
                        <button onclick="confirmDelete('delete.php?id=<?php echo $f['id']; ?>')" class="btn-danger"><i class="ph ph-trash"></i></button>
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
        title: 'Eliminar formação?',
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
    1 => ['Data inválida. O fim deve ser após o início.', 'error', '#e05252'],
    2 => ['Erro no upload da imagem.', 'error', '#e05252'],
];
if (isset($toasts[$error])) {
    [$msg, $icon, $bg] = $toasts[$error];
    echo "window.onload=()=>Swal.fire({title:'$msg',icon:'$icon',toast:true,showConfirmButton:false,timer:3000,timerProgressBar:true,position:'top-end',color:'#fff',background:'$bg'});";
}
?>
</script>
</body>
</html>