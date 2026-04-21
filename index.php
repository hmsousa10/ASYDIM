<?php include "includes/config.inc.php"; ?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM — Consultoria e Formação Sustentável</title>
    <meta name="description" content="ASYDIM - Consultoria e Formação Sustentável. Soluções em energia renovável, telecomunicações e formação profissional.">
    <meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim, Energia Renovável, Telecomunicações, Sustentabilidade">
    <meta name="author" content="Hugo Sousa">

    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="tailwind.config.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-bg-image" style="background-image: url('assets/hero.jpg');"></div>
        <?php include "./components/header.php"; ?>
        <?php include "./components/banner.php"; ?>
    </div>

    <!-- Services Section -->
    <section id="cursos" class="section-padding" style="background: var(--color-surface);">
        <div class="container-lg">
            <div class="text-center reveal" style="margin-bottom: 60px;">
                <span class="section-label">Os Nossos Serviços</span>
                <h2 class="section-title">Soluções para um <span class="text-emerald">Futuro Sustentável</span></h2>
                <p class="section-subtitle" style="margin: 16px auto 0;">Promovendo a transformação energética através de consultoria, formação e inovação tecnológica.</p>
            </div>

            <div class="grid-4">
                <a href="pages/about.php#cursos" class="service-card reveal reveal-delay-1">
                    <div class="card-bg" style="background-image: url('assets/sobre.jpg');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="card-line"></div>
                        <h3>Sobre ASYDIM</h3>
                        <p class="card-desc">Conheça a nossa missão e valores</p>
                    </div>
                </a>

                <a href="pages/telecommunications.php" class="service-card reveal reveal-delay-2">
                    <div class="card-bg" style="background-image: url('assets/telecomunicacoes.jpg');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="card-line"></div>
                        <h3>Telecomunicações</h3>
                        <p class="card-desc">Consultoria e formação em redes</p>
                    </div>
                </a>

                <a href="pages/energy.php" class="service-card reveal reveal-delay-3">
                    <div class="card-bg" style="background-image: url('assets/renovaveis.jpg');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="card-line"></div>
                        <h3>Energia Renovável</h3>
                        <p class="card-desc">Soluções fotovoltaicas e sustentáveis</p>
                    </div>
                </a>

                <a href="pages/formation-categories.php#cursos" class="service-card reveal reveal-delay-4">
                    <div class="card-bg" style="background-image: url('assets/formacoes.jpg');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="card-line"></div>
                        <h3>Formações</h3>
                        <p class="card-desc">Consultoria e formação profissional</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <?php include "./components/footer.php"; ?>
</body>

</html>