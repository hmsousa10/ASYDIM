<?php
include '../includes/config.inc.php';
include '../includes/db.inc.php';

include $arrConfig['dir_site'] . '/admins/adminverification.php';

$formationsNumber  = my_query("SELECT COUNT(*) as count FROM formations")[0];
$usersNumber       = my_query("SELECT COUNT(*) as count FROM users")[0];
$testimoniesNumber = my_query("SELECT COUNT(*) as count FROM testimonies")[0];
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM Admin — Dashboard</title>
    <meta name="description" content="Painel de administração ASYDIM">
    <meta name="author" content="Hugo Sousa">
</head>
<body>
<?php include './components/header.php'; ?>

<script>document.getElementById('adm-page-title').textContent = 'Dashboard';</script>

<!-- Welcome Banner -->
<div style="background:linear-gradient(135deg,var(--sidebar),#0d2818);border-radius:var(--radius-lg);padding:32px 36px;margin-bottom:28px;display:flex;align-items:center;justify-content:space-between;position:relative;overflow:hidden;">
    <div style="position:absolute;inset:0;background:radial-gradient(ellipse 60% 80% at 80% 50%,rgba(0,201,109,0.08) 0%,transparent 70%);pointer-events:none;"></div>
    <div style="position:relative;z-index:1;">
        <p style="color:rgba(240,253,246,0.5);font-size:0.88rem;margin:0 0 6px;letter-spacing:0.05em;">BEM-VINDO DE VOLTA</p>
        <h2 style="font-family:var(--font-display);font-size:1.7rem;font-weight:800;color:var(--text-light);margin:0;"><?php echo htmlspecialchars($_SESSION['user']['name']); ?></h2>
        <p style="color:rgba(240,253,246,0.45);font-size:0.9rem;margin:8px 0 0;">Área de Administração · ASYDIM</p>
    </div>
    <div style="position:relative;z-index:1;opacity:0.12;">
        <i class="ph-fill ph-shield-check" style="font-size:5rem;color:var(--emerald);"></i>
    </div>
</div>

<!-- Stats -->
<div class="adm-stats">
    <a href="formations/index.php" class="adm-stat-card" style="color:inherit;">
        <div class="stat-icon"><i class="ph-fill ph-graduation-cap"></i></div>
        <div>
            <div class="stat-value"><?php echo $formationsNumber['count']; ?></div>
            <div class="stat-label">Formações Criadas</div>
        </div>
    </a>
    <a href="users/index.php" class="adm-stat-card" style="color:inherit;">
        <div class="stat-icon"><i class="ph-fill ph-users-three"></i></div>
        <div>
            <div class="stat-value"><?php echo $usersNumber['count']; ?></div>
            <div class="stat-label">Utilizadores Registados</div>
        </div>
    </a>
    <div class="adm-stat-card">
        <div class="stat-icon"><i class="ph-fill ph-chat-centered-text"></i></div>
        <div>
            <div class="stat-value"><?php echo $testimoniesNumber['count']; ?></div>
            <div class="stat-label">Testemunhos Recebidos</div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="adm-table-card">
    <div class="table-header">
        <h2>Acções Rápidas</h2>
    </div>
    <div style="padding:24px;display:grid;grid-template-columns:repeat(3,1fr);gap:16px;">
        <a href="formations/create.php" class="btn-primary" style="justify-content:center;padding:14px;">
            <i class="ph ph-plus-circle"></i> Nova Formação
        </a>
        <a href="users/create.php" class="btn-primary" style="justify-content:center;padding:14px;">
            <i class="ph ph-user-plus"></i> Novo Utilizador
        </a>
        <a href="formations/index.php" class="btn-outline" style="justify-content:center;padding:14px;">
            <i class="ph ph-list-bullets"></i> Ver Formações
        </a>
    </div>
</div>

    </div><!-- /.adm-content -->
</div><!-- /.adm-main -->
</body>
</html>