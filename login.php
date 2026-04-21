<?php
include "includes/config.inc.php";

$action = "scripts/auth/login.php";

if (isset($_GET['action']) && $_GET['action'] == "register-formation") {
    $action = $action . "?action=register-formation";
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM — Entrar</title>
    <meta name="description" content="Entrar na plataforma ASYDIM - Formações de qualidade">
    <meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim">
    <meta name="author" content="Hugo Sousa">

    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body style="background: var(--color-surface); margin: 0; padding: 0;">
    <div class="login-container">
        <!-- Visual Side -->
        <div class="login-visual">
            <img src="assets/login.jpg" alt="ASYDIM Formações">
            <div class="visual-overlay">
                <a href="<?php echo $arrConfig['url_site']; ?>" style="margin-bottom: 32px;">
                    <img src="assets/logo.png" alt="ASYDIM" style="width: 100px; filter: brightness(0) invert(1);">
                </a>
                <h2 style="font-family: var(--font-display); font-size: 2.2rem; color: var(--color-text-light); margin: 0 0 12px;">Bem-vindo de volta</h2>
                <p style="color: rgba(240,253,246,0.6); font-size: 1.05rem; max-width: 360px;">Aceda à sua conta e continue a sua jornada de aprendizagem sustentável.</p>
            </div>
        </div>

        <!-- Form Side -->
        <div class="login-form-side">
            <div class="login-form-card">
                <h2>Junta-te a nós!</h2>
                <p class="subtitle">Aprende com formações 100% portuguesas.</p>

                <form method="POST" action='<?php echo $action; ?>'>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" placeholder="o-seu@email.com" name="email" id="email" class="form-input" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" placeholder="••••••••" name="password" id="password" class="form-input" required />
                    </div>
                    <div style="text-align: right; margin-bottom: 24px;">
                        <a href="#" style="font-size: 0.85rem; color: var(--color-emerald); font-weight: 500;">Esqueceu-se da password?</a>
                    </div>
                    <input type="submit" value="Entrar" name="btnLogin" id="btnLogin" class="btn-form-submit" />
                    <div style="text-align: center; margin-top: 24px;">
                        <span style="color: var(--color-text-muted);">Ainda não tem conta? </span>
                        <a href="register.php" style="color: var(--color-emerald); font-weight: 600;">Registe-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>