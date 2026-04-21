<?php

include '../includes/config.inc.php';
include '../includes/db.inc.php';

$slug = $_GET['slug'];

$category = my_query("SELECT * FROM formation_categories WHERE slug = '$slug'");
if (count($category) <= 0) {
    header('location: formation-categories.php');
    exit;
}
$category = $category[0];

$formation = my_query("SELECT * FROM formations WHERE category = '" . $category['slug'] . "'");

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM — <?php echo $category['name']; ?></title>
    <meta name="description" content="Formações de qualidade na ASYDIM">
    <meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim">
    <meta name="author" content="Hugo Sousa">

    <link rel="stylesheet" href="<?php echo $arrConfig['url_site'] ?>/assets/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?php echo $arrConfig['url_site'] . '/tailwind.config.js' ?>"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <?php include '../components/header.php' ?>

    <section class="section-padding" style="padding-top: 140px; background: var(--color-surface);">
        <div class="container-lg">
            <div class="text-center reveal" style="margin-bottom: 16px;">
                <span class="section-label">Formações</span>
                <h1 class="section-title"><span class="text-emerald"><?php echo $category['name']; ?></span></h1>
            </div>

            <p class="reveal" style="text-align: center; color: var(--color-text-muted); font-size: 1.1rem; font-style: italic; max-width: 700px; margin: 0 auto 48px; line-height: 1.7;">
                <?php echo $category['description']; ?>
            </p>

            <div class="grid-3">
                <?php
                $delay = 1;
                foreach ($formation as $f) {
                ?>
                    <a href="formation.php?name=<?php echo $f['slug'] ?>" class="formation-card reveal reveal-delay-<?php echo min($delay, 4); ?>">
                        <div class="card-bg-img" style="background-image: url('<?php echo $f['image'] ?>');"></div>
                        <div class="card-bg-overlay"></div>
                        <div class="card-inner">
                            <div style="width:56px;height:56px;border-radius:50%;background:rgba(255,255,255,0.15);display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
                                <i class="ph-fill ph-graduation-cap" style="font-size:1.5rem;color:white;"></i>
                            </div>
                            <h3 style="font-family:var(--font-display);font-size:1.15rem;margin:0 0 6px;"><?php echo $f['name'] ?></h3>
                            <p style="font-size:0.9rem;color:rgba(240,253,246,0.7);margin:0;"><?php echo $f['duration'] ?> horas</p>
                        </div>
                    </a>
                <?php
                    $delay++;
                }
                ?>
            </div>
        </div>
    </section>

    <?php include "../components/footer.php"; ?>
</body>

</html>