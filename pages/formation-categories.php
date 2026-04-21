<?php

include '../includes/config.inc.php';
include '../includes/db.inc.php';

$formationsNumber = my_query("SELECT COUNT(*) as count FROM formations")[0];
$usersNumber = my_query("SELECT COUNT(*) as count FROM users")[0];
$testimoniesNumber = my_query("SELECT COUNT(*) as count FROM testimonies")[0];

$testimony = my_query("SELECT * FROM testimonies ORDER BY RAND() LIMIT 1");
$hasTestimony = count($testimony) > 0;
if ($hasTestimony) $testimony = $testimony[0];

$formation = my_query("SELECT * FROM formation_categories");

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM — Formações</title>
    <meta name="description" content="Formações de qualidade na ASYDIM">
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
        <div class="hero-bg-image" style="background-image: url('../assets/formacoes.jpg');"></div>
        <?php include "../components/header.php"; ?>
        <div class="hero-content" style="margin-top: 60px;">
            <span class="section-label" style="color: var(--color-emerald);">Educação</span>
            <h1 class="hero-title"><span class="highlight">Sustentabilidade</span></h1>
            <p class="hero-subtitle">Formações profissionais de excelência</p>
            <a href="#cursos" class="btn-primary"><span>Ver Formações</span></a>
        </div>
        <div class="particles">
            <div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div>
            <div class="dot"></div><div class="dot"></div>
        </div>
    </div>

    <!-- Quote + Formations -->
    <section id="cursos" class="section-padding" style="background: var(--color-surface);">
        <div class="container-md">
            <div class="text-center reveal" style="margin-bottom: 48px;">
                <span class="section-label">Formações</span>
                <h2 class="section-title"><span class="text-emerald">Formações</span> de qualidade</h2>
            </div>

            <div class="quote-block reveal" style="margin-bottom: 60px;">
                <p class="quote-text">"Investir em conhecimento rende sempre os melhores juros."</p>
                <p class="quote-author">— Benjamin Franklin</p>
            </div>

            <div class="grid-2">
                <?php
                if (is_array($formation)) {
                    $delay = 1;
                    foreach ($formation as $formation_category) {
                ?>
                    <a href="formations.php?slug=<?php echo $formation_category['slug'] ?>" class="category-card reveal reveal-delay-<?php echo min($delay, 4); ?>">
                        <div class="cat-icon">
                            <i class="ph-fill ph-graduation-cap"></i>
                        </div>
                        <h3><?php echo $formation_category['name'] ?></h3>
                        <p><?php echo $formation_category['description'] ?></p>
                    </a>
                <?php
                        $delay++;
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Testimony -->
    <?php if ($hasTestimony): ?>
    <section class="section-padding-sm" style="background: white;">
        <div class="container-md">
            <div class="testimonial-card reveal">
                <h3 style="font-family: var(--font-display); font-size: 1.5rem; color: var(--color-deep); margin-bottom: 16px;">
                    Avaliação de <span class="text-emerald"><?php echo $testimony['name'] ?></span>
                </h3>
                <p style="color: var(--color-text-muted); line-height: 1.8; font-size: 1.05rem; font-style: italic; margin-bottom: 16px;">
                    "<?php echo $testimony['testimony']; ?>"
                </p>
                <p style="font-family: var(--font-display); font-weight: 700; color: var(--color-emerald); font-size: 1.1rem;">
                    <?php echo $testimony['evaluation']; ?> / 5 ⭐️
                </p>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Stats -->
    <section class="section-padding" style="background: var(--color-surface);">
        <div class="container-md">
            <div class="text-center reveal" style="margin-bottom: 48px;">
                <span class="section-label">Impacto</span>
                <h2 class="section-title"><span class="text-emerald">Qualidade</span> em números</h2>
                <p class="section-subtitle" style="margin: 16px auto 0;">E, se nos der oportunidade, pode ajudar-nos a melhorar ainda mais o nosso serviço.</p>
            </div>

            <div class="stats-bar reveal">
                <div class="stat-item">
                    <span class="stat-number" data-count="<?php echo $formationsNumber['count']; ?>"><?php echo $formationsNumber['count']; ?></span>
                    <span class="stat-label">Formações dadas</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-count="<?php echo $usersNumber['count']; ?>"><?php echo $usersNumber['count']; ?></span>
                    <span class="stat-label">Alunos satisfeitos</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-count="<?php echo $testimoniesNumber['count']; ?>"><?php echo $testimoniesNumber['count']; ?></span>
                    <span class="stat-label">Testemunhos dados</span>
                </div>
            </div>
        </div>
    </section>

    <?php include "../components/footer.php"; ?>
</body>

</html>