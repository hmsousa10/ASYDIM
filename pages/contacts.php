<?php
include '../includes/config.inc.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM — Contactos</title>
    <meta name="description" content="Entre em contacto com a ASYDIM">
    <meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim, Contactos">
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
            <div class="text-center reveal" style="margin-bottom: 60px;">
                <span class="section-label">Fale Connosco</span>
                <h1 class="section-title">Saiba como nos <span class="text-emerald">contactar</span></h1>
                <p class="section-subtitle" style="margin: 16px auto 0;">Estamos disponíveis para esclarecer qualquer questão.</p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 48px; align-items: start;">
                <!-- Contact Info -->
                <div class="reveal">
                    <div style="background: white; border-radius: var(--radius-lg); padding: 40px; box-shadow: var(--shadow-card); border: 1px solid var(--color-border);">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="ph-fill ph-phone"></i>
                            </div>
                            <div class="contact-info">
                                <span>Telefone</span>
                                <p>+351 935 593 673</p>
                            </div>
                        </div>

                        <div class="contact-item" style="border-top: 1px solid var(--color-border);">
                            <div class="contact-icon">
                                <i class="ph-fill ph-envelope"></i>
                            </div>
                            <div class="contact-info">
                                <span>Email</span>
                                <p>info@asydim.com</p>
                            </div>
                        </div>

                        <div class="contact-item" style="border-top: 1px solid var(--color-border);">
                            <div class="contact-icon">
                                <i class="ph-fill ph-map-pin"></i>
                            </div>
                            <div class="contact-info">
                                <span>Localização</span>
                                <p>R. da Paz 485, Canidelo</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="reveal reveal-delay-2">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3005.105960876792!2d-8.644887723980663!3d41.13221277133329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246541499fa7ad%3A0x5a13f372cbd19592!2sR.%20da%20Paz%20485%2C%20Canidelo!5e0!3m2!1sen!2spt!4v1714296585119!5m2!1sen!2spt" allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../components/footer.php' ?>
</body>

</html>