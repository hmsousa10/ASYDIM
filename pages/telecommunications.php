<?php
include '../includes/config.inc.php';
include '../includes/db.inc.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM — Telecomunicações</title>
    <meta name="description" content="ASYDIM - Telecomunicações, consultoria e formação">
    <meta name="keywords" content="Porto, Telecomunicações, ITED, Fibra Ótica, Asydim">
    <meta name="author" content="Hugo Sousa">

    <link rel="stylesheet" href="<?php echo $arrConfig['url_site'] ?>/assets/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?php echo $arrConfig['url_site'] . '/tailwind.config.js' ?>"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <!-- Hero -->
    <div class="hero" style="min-height: 70vh;">
        <div class="hero-bg-image" style="background-image: url('../assets/telecommunications.jpg');"></div>
        <?php include "../components/header.php"; ?>
        <div class="hero-content" style="margin-top: 60px;">
            <span class="section-label" style="color: var(--color-emerald);">Tecnologia</span>
            <h1 class="hero-title"><span class="highlight">Telecomunicações</span></h1>
            <p class="hero-subtitle">Consultoria especializada e formação em redes de telecomunicação</p>
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
                <h2 class="section-title">ASYDIM — <span class="text-emerald">Telecomunicações</span></h2>
                <p class="section-subtitle" style="margin: 16px auto 0;">Promovendo a transformação digital.</p>
            </div>

            <div class="grid-2">
                <div class="detail-card reveal reveal-delay-1">
                    <div class="card-image">
                        <img src="../assets/consultoria.jpg" alt="Consultoria">
                        <div class="image-overlay">
                            <h3>Consultoria</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Consultoria em Operadores de Rede Fixa e Móvel de Telecomunicações, Angola</li>
                            <li>Elaboração e subscrição de projetos, e de propostas de arquitetura de serviços de Telecomunicações</li>
                            <li>Desenvolvimento de soluções / ofertas específicas e definição de roadmaps estratégicos</li>
                            <li>Elaboração de Projetos de Especialidade em Telecomunicações: ITED/ITUR, ORAC/ORAP</li>
                        </ul>
                    </div>
                </div>

                <a href="formation-categories.php" class="detail-card reveal reveal-delay-2" style="display: block;">
                    <div class="card-image">
                        <img src="../assets/formtelem.jpg" alt="Formações">
                        <div class="image-overlay">
                            <h3>Formações</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Formação em Redes e Infraestruturas de Nova Geração (30 horas)</li>
                            <li>UFCD 6095 – Instalações ITED – atualização para instalador (50 horas)</li>
                            <li>Instalações ITED (75 horas)</li>
                            <li>Redes de fibra ótica – projeto e execução (25 horas)</li>
                            <li>Formação em Redes de Nova Geração e Redes Óticas (50 horas)</li>
                            <li>Formação para engenheiros ITED/ITUR habilitante e atualização</li>
                            <li>Formação ORAC / ORAP (14 horas)</li>
                        </ul>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <?php include "../components/footer.php"; ?>
</body>

</html>