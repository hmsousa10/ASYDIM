<?php
include "../includes/config.inc.php";

// If already logged in as admin, redirect to dashboard
if (isset($_SESSION['user'])) {
    header('location: ' . $arrConfig['url_admin'] . '/index.php');
    exit();
}

$error = $_SESSION['auth_error'] ?? null;
unset($_SESSION['auth_error']);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM — Acesso Administrativo</title>
    <meta name="description" content="Login da área de administração ASYDIM">
    <meta name="robots" content="noindex">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            background: #071a12;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Background pattern */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 70% 30%, rgba(0,201,109,0.06) 0%, transparent 70%),
                radial-gradient(ellipse 60% 70% at 20% 80%, rgba(0,191,166,0.05) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Floating dots */
        .dot {
            position: fixed;
            border-radius: 50%;
            background: rgba(0,201,109,0.15);
            animation: float 8s ease-in-out infinite;
        }
        .dot:nth-child(1) { width:300px;height:300px;top:-80px;left:-80px;animation-delay:0s; }
        .dot:nth-child(2) { width:200px;height:200px;bottom:50px;right:-60px;animation-delay:-3s; }
        .dot:nth-child(3) { width:120px;height:120px;bottom:200px;left:15%;animation-delay:-5s;background:rgba(0,191,166,0.1); }
        @keyframes float {
            0%,100% { transform:translateY(0) scale(1); }
            50%      { transform:translateY(-20px) scale(1.03); }
        }

        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            padding: 20px;
        }

        .login-box {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(0,201,109,0.12);
            border-radius: 24px;
            padding: 44px;
            backdrop-filter: blur(20px);
        }

        .login-logo { margin-bottom: 32px; }
        .login-logo img { width: 80px; filter: brightness(0) invert(1); }

        .login-box h1 {
            font-family: 'Syne', sans-serif;
            font-size: 1.6rem;
            font-weight: 800;
            color: #f0fdf6;
            margin: 0 0 6px;
        }
        .login-box .subtitle {
            color: rgba(240,253,246,0.4);
            font-size: 0.9rem;
            margin: 0 0 36px;
        }

        label {
            display: block;
            font-size: 0.83rem;
            font-weight: 600;
            color: rgba(240,253,246,0.6);
            margin-bottom: 6px;
            letter-spacing: 0.03em;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 13px 16px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(0,201,109,0.15);
            border-radius: 12px;
            color: #f0fdf6;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            outline: none;
            transition: all 0.25s ease;
            margin-bottom: 20px;
        }
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #00c96d;
            background: rgba(0,201,109,0.05);
            box-shadow: 0 0 0 4px rgba(0,201,109,0.08);
        }
        input::placeholder { color: rgba(240,253,246,0.25); }

        .error-msg {
            background: rgba(224,82,82,0.1);
            border: 1px solid rgba(224,82,82,0.2);
            border-radius: 10px;
            padding: 12px 16px;
            color: #ff8080;
            font-size: 0.88rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #00c96d, #00bfa6);
            border: none;
            border-radius: 12px;
            color: #071a12;
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0,201,109,0.25);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0,201,109,0.35);
        }

        .login-footer {
            margin-top: 28px;
            padding-top: 24px;
            border-top: 1px solid rgba(255,255,255,0.06);
            text-align: center;
        }
        .login-footer a {
            color: rgba(240,253,246,0.35);
            font-size: 0.85rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
        }
        .login-footer a:hover { color: #00c96d; }
    </style>
</head>
<body>
<div class="dot"></div>
<div class="dot"></div>
<div class="dot"></div>

<div class="login-wrapper">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?php echo $arrConfig['url_site']; ?>/assets/logo.png" alt="ASYDIM">
        </div>

        <h1>Área Administrativa</h1>
        <p class="subtitle">Plataforma de gestão ASYDIM</p>

        <?php if ($error): ?>
        <div class="error-msg">
            <i class="ph ph-warning-circle"></i>
            <?php echo htmlspecialchars($error); ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="../scripts/auth/login.php">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="admin@asydim.pt" required autocomplete="email">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" required autocomplete="current-password">

            <button type="submit" class="btn-login">Entrar <i class="ph ph-arrow-right"></i></button>
        </form>

        <div class="login-footer">
            <a href="<?php echo $arrConfig['url_site']; ?>">
                <i class="ph ph-arrow-left"></i> Voltar ao site
            </a>
        </div>
    </div>
</div>
</body>
</html>