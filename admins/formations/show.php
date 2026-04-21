<?php
include "../../includes/config.inc.php";
include "../../includes/db.inc.php";

include $arrConfig['dir_site'] . '/admins/adminverification.php';

$formation_id = (int)($_GET['id'] ?? 0);
if ($formation_id <= 0) { header("location: index.php"); exit(); }

$formation_rows = my_query("SELECT * FROM formations WHERE id = ?", [$formation_id]);
if (empty($formation_rows)) { header("location: index.php"); exit(); }
$formation = $formation_rows[0];

$formation_users = my_query(
    "SELECT fu.*, u.name, u.email
     FROM formation_users fu
     JOIN users u ON fu.user_id = u.id
     WHERE fu.formation_id = ?",
    [$formation_id]
);

$meetings = my_query(
    "SELECT * FROM meetings WHERE id_formation = ? AND date >= CURDATE() ORDER BY date ASC",
    [$formation_id]
);

$all_users = my_query(
    "SELECT id, name, email FROM users WHERE id NOT IN (
        SELECT user_id FROM formation_users WHERE formation_id = ?
    ) ORDER BY name ASC",
    [$formation_id]
);

function format_date($v) {
    return $v ? date("d/m/Y", strtotime($v)) : '—';
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM Admin — <?php echo htmlspecialchars($formation['name']); ?></title>
</head>
<body>
<?php include "../components/header.php"; ?>
<script>document.getElementById('adm-page-title').textContent = <?php echo json_encode($formation['name']); ?>;</script>

<div class="adm-page-header">
    <div>
        <h1><?php echo htmlspecialchars($formation['name']); ?></h1>
        <p style="color:var(--text-muted);margin:4px 0 0;font-size:0.9rem;">
            <span class="badge badge-gray"><?php echo htmlspecialchars($formation['slug']); ?></span>
            &nbsp;·&nbsp; Início <?php echo format_date($formation['beginning_date']); ?>
            &nbsp;·&nbsp; <?php echo $formation['duration']; ?>h
        </p>
    </div>
    <div style="display:flex;gap:12px;">
        <a href="edit.php?id=<?php echo $formation_id; ?>" class="btn-outline"><i class="ph ph-pencil"></i> Editar</a>
        <a href="index.php" class="btn-outline"><i class="ph ph-arrow-left"></i> Voltar</a>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:24px;">

    <!-- Participants -->
    <div class="adm-table-card">
        <div class="table-header">
            <h2><i class="ph ph-users" style="color:var(--emerald);margin-right:8px;"></i> Participantes</h2>
            <button onclick="openModal('userModal')" class="btn-primary" style="font-size:0.82rem;padding:8px 16px;">
                <i class="ph ph-user-plus"></i> Adicionar
            </button>
        </div>
        <?php if (empty($formation_users)): ?>
            <div class="empty-state"><i class="ph ph-users"></i><p>Nenhum participante inscrito.</p></div>
        <?php else: ?>
        <table class="adm-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($formation_users as $u): ?>
                <tr>
                    <td>
                        <div style="font-weight:600;"><?php echo htmlspecialchars($u['name']); ?></div>
                        <div style="font-size:0.8rem;color:var(--text-muted);"><?php echo htmlspecialchars($u['email']); ?></div>
                    </td>
                    <td>
                        <?php if ($u['approved']): ?>
                            <span class="badge badge-green"><i class="ph-fill ph-check-circle"></i> Aprovado</span>
                        <?php else: ?>
                            <span class="badge badge-gray"><i class="ph-fill ph-clock"></i> Pendente</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="../includes/formations/changeState.php?id=<?php echo $u['id']; ?>"
                           class="<?php echo $u['approved'] ? 'btn-danger' : 'btn-edit'; ?>"
                           style="font-size:0.8rem;padding:5px 10px;">
                            <?php echo $u['approved'] ? 'Desaprovar' : 'Aprovar'; ?>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

    <!-- Meetings -->
    <div class="adm-table-card">
        <div class="table-header">
            <h2><i class="ph ph-video-camera" style="color:var(--emerald);margin-right:8px;"></i> Próximas Reuniões</h2>
            <button onclick="openModal('meetingModal')" class="btn-primary" style="font-size:0.82rem;padding:8px 16px;">
                <i class="ph ph-plus"></i> Criar
            </button>
        </div>
        <?php if (empty($meetings)): ?>
            <div class="empty-state"><i class="ph ph-calendar-blank"></i><p>Sem reuniões agendadas.</p></div>
        <?php else: ?>
        <table class="adm-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meetings as $m): ?>
                <tr>
                    <td>
                        <div style="font-weight:600;"><?php echo htmlspecialchars($m['name']); ?></div>
                        <div style="font-size:0.8rem;color:var(--text-muted);"><?php echo htmlspecialchars($m['theme']); ?></div>
                    </td>
                    <td>
                        <span class="badge badge-green"><?php echo format_date($m['date']); ?></span>
                    </td>
                    <td>
                        <button onclick="confirmDeleteMeeting('../includes/meetings/delete.php?id=<?php echo $m['id']; ?>')" class="btn-danger" style="font-size:0.8rem;padding:5px 10px;">
                            <i class="ph ph-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

</div>

<!-- Modal: Add Participant -->
<div id="userModal" class="adm-modal-backdrop">
    <div class="adm-modal">
        <h3><i class="ph ph-user-plus" style="color:var(--emerald);margin-right:8px;"></i> Adicionar Participante</h3>
        <form action="../includes/formations/addUser.php" method="POST">
            <input type="hidden" name="formation_id" value="<?php echo $formation_id; ?>">
            <div class="form-group">
                <label class="form-label" for="user_id">Selecionar Utilizador</label>
                <select class="form-select" name="user_id" id="user_id" required>
                    <?php foreach ($all_users as $u): ?>
                        <option value="<?php echo $u['id']; ?>">
                            <?php echo htmlspecialchars($u['name']); ?> — <?php echo htmlspecialchars($u['email']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="closeModal('userModal')" class="btn-outline">Cancelar</button>
                <button type="submit" class="btn-primary">Adicionar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal: Create Meeting -->
<div id="meetingModal" class="adm-modal-backdrop">
    <div class="adm-modal">
        <h3><i class="ph ph-video-camera" style="color:var(--emerald);margin-right:8px;"></i> Criar Reunião</h3>
        <form action="../includes/meetings/create.php" method="POST">
            <input type="hidden" name="id_formation" value="<?php echo $formation_id; ?>">
            <div class="form-grid" style="grid-template-columns:1fr 1fr;">
                <div class="form-group form-full">
                    <label class="form-label" for="meeting_name">Nome</label>
                    <input class="form-input" type="text" name="name" id="meeting_name" placeholder="Ex: Sessão 1" required>
                </div>
                <div class="form-group form-full">
                    <label class="form-label" for="meeting_theme">Tema</label>
                    <input class="form-input" type="text" name="theme" id="meeting_theme" placeholder="Ex: Introdução ao Solar" required>
                </div>
                <div class="form-group form-full">
                    <label class="form-label" for="meeting_link">Link (Zoom/Teams)</label>
                    <input class="form-input" type="text" name="link" id="meeting_link" placeholder="https://..." required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="estimated_duration">Duração (horas)</label>
                    <input class="form-input" type="number" name="estimated_duration" id="estimated_duration" min="1" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="meeting_date">Data e Hora</label>
                    <input class="form-input" type="datetime-local" name="date" id="meeting_date" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="closeModal('meetingModal')" class="btn-outline">Cancelar</button>
                <button type="submit" class="btn-primary">Criar Reunião</button>
            </div>
        </form>
    </div>
</div>

    </div>
</div>

<script>
function openModal(id)  { document.getElementById(id).classList.add('open'); }
function closeModal(id) { document.getElementById(id).classList.remove('open'); }

function confirmDeleteMeeting(url) {
    Swal.fire({
        title: 'Eliminar reunião?',
        text: 'Esta ação não pode ser revertida.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#e05252',
        cancelButtonColor: '#5a7d6a',
    }).then(r => { if (r.isConfirmed) window.location.href = url; });
}

// Close modals on backdrop click
document.querySelectorAll('.adm-modal-backdrop').forEach(bd => {
    bd.addEventListener('click', e => { if (e.target === bd) bd.classList.remove('open'); });
});

<?php
$error = isset($_GET['error']) ? (int)$_GET['error'] : -1;
$toasts = [
    0 => ['Operação realizada com sucesso!', 'success', '#00c96d'],
    1 => ['Data ou campos inválidos.', 'error', '#e05252'],
    2 => ['Este utilizador já está inscrito.', 'warning', '#f59e0b'],
];
if (isset($toasts[$error])) {
    [$msg, $icon, $bg] = $toasts[$error];
    echo "window.onload=()=>Swal.fire({title:'$msg',icon:'$icon',toast:true,showConfirmButton:false,timer:3000,timerProgressBar:true,position:'top-end',color:'#fff',background:'$bg'});";
}
?>
</script>
</body>
</html>