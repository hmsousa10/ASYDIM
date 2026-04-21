<?php
include '../includes/config.inc.php';
include '../includes/db.inc.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM — Energia Renovável</title>
    <meta name="description" content="ASYDIM - Soluções em Energia Renovável e Sustentabilidade">
    <meta name="keywords" content="Porto, Formações, Energia Renovável, Fotovoltaico, Asydim">
    <meta name="author" content="Hugo Sousa">

    <link rel="stylesheet" href="<?php echo $arrConfig['url_site'] ?>/assets/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?php echo $arrConfig['url_site'] . '/tailwind.config.js' ?>"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <!-- Hero -->
    <div class="hero" style="min-height: 70vh;">
        <div class="hero-bg-image" style="background-image: url('../assets/fotovoltaico.webp');"></div>
        <?php include "../components/header.php"; ?>
        <div class="hero-content" style="margin-top: 60px;">
            <span class="section-label" style="color: var(--color-emerald);">Energia</span>
            <h1 class="hero-title">Energias <span class="highlight">Renováveis</span></h1>
            <p class="hero-subtitle">Soluções fotovoltaicas e gestão energética sustentável</p>
            <a href="#servicos" class="btn-primary"><span>Explorar</span></a>
        </div>
        <div class="particles">
            <div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div>
            <div class="dot"></div><div class="dot"></div>
        </div>
    </div>

    <!-- Services -->
    <section id="servicos" class="section-padding" style="background: var(--color-surface);">
        <div class="container-lg">
            <div class="text-center reveal" style="margin-bottom: 60px;">
                <span class="section-label">Serviços</span>
                <h2 class="section-title">ASYDIM — <span class="text-emerald">Energia Renovável</span></h2>
                <p class="section-subtitle" style="margin: 16px auto 0;">Promovendo a transformação energética sustentável.</p>
            </div>

            <div class="grid-3">
                <div class="detail-card reveal reveal-delay-1">
                    <div class="card-image">
                        <img src="../assets/renovaveis.jpg" alt="Consultoria">
                        <div class="image-overlay">
                            <h3>Consultoria</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Elaboração de projetos de engenharia e dimensionamento de sistemas fotovoltaicos, análise de viabilidade económica e estudos financeiros para implementação de sistemas de energias renováveis.</p>
                    </div>
                </div>

                <div class="detail-card reveal reveal-delay-2">
                    <div class="card-image">
                        <img src="../assets/telecomunicacoes.jpg" alt="Gestão de Energia">
                        <div class="image-overlay">
                            <h3>Gestão de Energia</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Serviços de operação e manutenção de rede, consumos, centrais fotovoltaicas, e mais.</p>
                    </div>
                </div>

                <div class="detail-card reveal reveal-delay-3">
                    <div class="card-image">
                        <img src="../assets/sobre.jpg" alt="Mobilidade Elétrica">
                        <div class="image-overlay">
                            <h3>Mobilidade Elétrica</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Desenvolvimento de soluções de mobilidade elétrica sustentável.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "../components/footer.php"; ?>
</body>

</html>