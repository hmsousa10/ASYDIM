<?php
// Helper to mark the active nav link
function admCheckPage(string $name): string
{
    $self = basename($_SERVER['PHP_SELF']);
    $dir  = basename(dirname($_SERVER['PHP_SELF']));

    if ($name === 'index' && $self === 'index.php' && $dir === 'admins') return 'active';
    if ($name === 'formations' && $dir === 'formations') return 'active';
    if ($name === 'users' && $dir === 'users') return 'active';
    if ($name === 'account' && $dir === 'account') return 'active';
    return '';
}

$adminUrl = $arrConfig['url_admin'];

// Get user initial for avatar
$userName = $_SESSION['user']['name'] ?? 'Admin';
$initial  = strtoupper(mb_substr($userName, 0, 1));
?>
<!– Admin Layout: sidebar + main –>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $arrConfig['url_admin']; ?>/assets/admin.css">
<script src="https://unpkg.com/@phosphor-icons/web"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<aside class="adm-sidebar" id="adm-sidebar">
    <div class="sidebar-logo">
        <a href="<?php echo $arrConfig['url_site']; ?>">
            <img src="<?php echo $arrConfig['url_site']; ?>/assets/logo.png" alt="ASYDIM">
        </a>
    </div>

    <div class="sidebar-tag">Administração</div>

    <nav class="adm-nav">
        <a href="<?php echo $adminUrl; ?>/index.php" class="<?php echo admCheckPage('index'); ?>">
            <i class="ph-fill ph-squares-four"></i> Dashboard
        </a>
        <a href="<?php echo $adminUrl; ?>/formations/index.php" class="<?php echo admCheckPage('formations'); ?>">
            <i class="ph-fill ph-graduation-cap"></i> Formações
        </a>
        <a href="<?php echo $adminUrl; ?>/users/index.php" class="<?php echo admCheckPage('users'); ?>">
            <i class="ph-fill ph-users-three"></i> Utilizadores
        </a>
        <a href="<?php echo $adminUrl; ?>/account/index.php" class="<?php echo admCheckPage('account'); ?>">
            <i class="ph-fill ph-user-circle"></i> A Minha Conta
        </a>
    </nav>

    <div class="sidebar-footer">
        <a href="<?php echo $adminUrl; ?>/logout.php">
            <i class="ph-fill ph-sign-out"></i> Terminar Sessão
        </a>
    </div>
</aside>

<div class="adm-main">
    <header class="adm-topbar">
        <h1 class="page-title" id="adm-page-title">ASYDIM</h1>
        <div style="display:flex;align-items:center;gap:12px;">
            <a href="<?php echo $arrConfig['url_site']; ?>" target="_blank" class="btn-outline" style="font-size:0.8rem;padding:7px 16px;">
                <i class="ph ph-arrow-square-out"></i> Ver site
            </a>
            <div class="adm-user-chip">
                <div class="avatar"><?php echo $initial; ?></div>
                <span class="user-name"><?php echo htmlspecialchars($userName); ?></span>
            </div>
        </div>
    </header>

    <div class="adm-content">
        <?php /* Page content starts here — each page closes </div></div> at the end */ ?>