<?php
function format_date($value)
{
    if ($value == null)
        return "Data não definida";

    $time = strtotime($value);
    return date('d-m-Y', $time);
}

include '../includes/config.inc.php';
include '../includes/db.inc.php';

$slug = $_GET['name'];

$formation_category = my_query("SELECT * FROM formations WHERE slug='$slug'");

if (count($formation_category) <= 0) {
    header('location: formations.php');
}

$formation_category = $formation_category[0];
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM — <?php echo $formation_category['name']; ?></title>
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
        <div class="container-md">
            <div class="text-center reveal" style="margin-bottom: 40px;">
                <span class="section-label">Formação</span>
                <h1 class="section-title" style="color: var(--color-emerald);"><?php echo $formation_category['name']; ?></h1>
            </div>

            <div class="reveal" style="background: white; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-card); border: 1px solid var(--color-border);">
                <!-- Image -->
                <div style="height: 320px; overflow: hidden;">
                    <img src="<?php echo $formation_category['image']; ?>" alt="<?php echo $formation_category['name']; ?>"
                         style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;"
                         onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
                </div>

                <!-- Content -->
                <div style="padding: 48px;">
                    <h3 style="font-family: var(--font-display); font-size: 1.5rem; color: var(--color-deep); margin-bottom: 16px;">Descrição</h3>
                    <p style="color: var(--color-text-muted); line-height: 1.8; font-size: 1.05rem; margin-bottom: 32px;">
                        <?php echo $formation_category['description']; ?>
                    </p>

                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 20px 0; border-top: 1px solid var(--color-border); border-bottom: 1px solid var(--color-border); margin-bottom: 32px;">
                        <div>
                            <span style="display: block; font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 4px;">Início da formação</span>
                            <span style="font-family: var(--font-display); font-weight: 600; color: var(--color-deep);"><?php echo format_date($formation_category['beginning_date']); ?></span>
                        </div>
                        <div style="text-align: right;">
                            <span style="display: block; font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 4px;">Fim da formação</span>
                            <span style="font-family: var(--font-display); font-weight: 600; color: var(--color-deep);"><?php echo format_date($formation_category['ending_date']); ?></span>
                        </div>
                    </div>

                    <a href="<?php echo $arrConfig['url_site'] . '/login.php?action=register-formation'; ?>" class="btn-primary" style="display: inline-flex;">
                        <span>Inscrever-se nesta formação</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include "../components/footer.php"; ?>
</body>

</html>