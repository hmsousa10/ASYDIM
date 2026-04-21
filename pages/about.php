<?php

include '../includes/config.inc.php';
include '../includes/db.inc.php';

$formationsNumber = my_query("SELECT COUNT(*) as count FROM formations")[0];
$usersNumber = my_query("SELECT COUNT(*) as count FROM users")[0];
$testimoniesNumber = my_query("SELECT COUNT(*) as count FROM testimonies")[0];

$testimony = my_query("SELECT * FROM testimonies ORDER BY RAND() LIMIT 1");
$hasTestimony = count($testimony) > 0;
if ($hasTestimony) $testimony = $testimony[0];

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM — Sobre Nós</title>
    <meta name="description" content="Conheça a ASYDIM - Consultoria e Formação Sustentável">
    <meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim">
    <meta name="author" content="Hugo Sousa">

    <link rel="stylesheet" href="<?php echo $arrConfig['url_site'] ?>/assets/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?php echo $arrConfig['url_site'] . '/tailwind.config.js' ?>"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <!-- Hero -->
    <div class="hero" style="min-height: 70vh;">
        <div class="hero-bg-image" style="background-image: url('../assets/sobre1.jpg');"></div>
        <?php include "../components/header.php"; ?>
        <div class="hero-content" style="margin-top: 60px;">
            <span class="section-label" style="color: var(--color-emerald);">Quem Somos</span>
            <h1 class="hero-title">ASYDIM</h1>
            <p class="hero-subtitle">Consultoria e Formação Sustentável</p>
            <a href="#cursos" class="btn-primary"><span>Saber Mais</span></a>
        </div>
        <div class="particles">
            <div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div>
            <div class="dot"></div><div class="dot"></div>
        </div>
    </div>

    <!-- Who We Are -->
    <section id="cursos" class="section-padding" style="background: var(--color-surface);">
        <div class="container-lg">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
                <div class="reveal">
                    <span class="section-label">A Nossa Missão</span>
                    <h2 class="section-title">Quem Somos?</h2>
                    <p style="color: var(--color-text-muted); line-height: 1.8; margin-bottom: 32px;">
                        Somos uma empresa dedicada a fornecer <strong style="color: var(--color-emerald);">soluções sustentáveis</strong> para organizações. A nossa missão é promover a <strong style="color: var(--color-emerald);">transformação energética</strong> através da consultoria e formação sustentável, assegurando que a energia seja limpa, eficiente e acessível para todos.
                    </p>

                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        <div style="display: flex; align-items: center; gap: 16px;">
                            <div class="icon-circle" style="width:48px;height:48px;border-radius:50%;background:linear-gradient(135deg,rgba(0,201,109,0.1),rgba(0,191,166,0.08));display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="ph-thin ph-battery-high" style="font-size:1.3rem;color:var(--color-emerald);"></i>
                            </div>
                            <div>
                                <h4 style="font-family:var(--font-display);font-size:1rem;margin:0 0 2px;color:var(--color-deep);">Energia Renovável</h4>
                                <p style="font-size:0.9rem;color:var(--color-text-muted);margin:0;">Consultoria (Engenharia e Projeto) e Formação.</p>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 16px;">
                            <div style="width:48px;height:48px;border-radius:50%;background:linear-gradient(135deg,rgba(0,201,109,0.1),rgba(0,191,166,0.08));display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="ph-thin ph-lightning" style="font-size:1.3rem;color:var(--color-emerald);"></i>
                            </div>
                            <div>
                                <h4 style="font-family:var(--font-display);font-size:1rem;margin:0 0 2px;color:var(--color-deep);">Gestão de Energia – EaaS</h4>
                                <p style="font-size:0.9rem;color:var(--color-text-muted);margin:0;">Serviços Energéticos integrados.</p>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 16px;">
                            <div style="width:48px;height:48px;border-radius:50%;background:linear-gradient(135deg,rgba(0,201,109,0.1),rgba(0,191,166,0.08));display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="ph-thin ph-recycle" style="font-size:1.3rem;color:var(--color-emerald);"></i>
                            </div>
                            <div>
                                <h4 style="font-family:var(--font-display);font-size:1rem;margin:0 0 2px;color:var(--color-deep);">Formação & Consultoria Sustentável</h4>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 16px;">
                            <div style="width:48px;height:48px;border-radius:50%;background:linear-gradient(135deg,rgba(0,201,109,0.1),rgba(0,191,166,0.08));display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="ph-thin ph-wifi-high" style="font-size:1.3rem;color:var(--color-emerald);"></i>
                            </div>
                            <div>
                                <h4 style="font-family:var(--font-display);font-size:1rem;margin:0 0 2px;color:var(--color-deep);">Telecomunicações</h4>
                                <p style="font-size:0.9rem;color:var(--color-text-muted);margin:0;">Consultoria (Engenharia e Projeto) e Formação.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="reveal reveal-delay-2" style="border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-card); height: 500px;">
                    <img alt="ASYDIM equipa" src="<?php echo $arrConfig['url_site'] . '/assets/sobre.jpg' ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Detail -->
    <section class="section-padding" style="background: white;">
        <div class="container-lg">
            <div class="text-center reveal" style="margin-bottom: 60px;">
                <span class="section-label">Áreas de Atuação</span>
                <h2 class="section-title">Os Nossos Serviços</h2>
                <p class="section-subtitle" style="margin: 16px auto 0;">Promovendo a transformação energética sustentável.</p>
            </div>

            <div class="grid-3">
                <a href="formation-categories.php" class="info-card reveal reveal-delay-1" style="display:block;">
                    <div class="icon-circle"><i class="ph-thin ph-leaf"></i></div>
                    <h3>Formação e Consultoria Sustentável</h3>
                    <p>Cursos técnicos e profissionalizantes em áreas como assistência veterinária, gestão de propriedades rurais, nutrição e muito mais.</p>
                </a>

                <a href="telecommunications.php" class="info-card reveal reveal-delay-2" style="display:block;">
                    <div class="icon-circle"><i class="ph-thin ph-wifi-high"></i></div>
                    <h3>Telecomunicações</h3>
                    <p>Consultoria em Redes de Telecomunicação, elaboração de projetos e propostas de arquitetura de serviços.</p>
                </a>

                <a href="energy.php" class="info-card reveal reveal-delay-3" style="display:block;">
                    <div class="icon-circle"><i class="ph-thin ph-lightning"></i></div>
                    <h3>Energia Renovável</h3>
                    <p>Elaboração de projetos de engenharia, dimensionamento de sistemas fotovoltaicos e análise de viabilidade económica.</p>
                </a>
            </div>
        </div>
    </section>

    <?php include "../components/footer.php"; ?>
</body>

</html>