<?php

/**
 * Checks if the current page matches the given name
 * and returns the 'active' class if so
 */
function checkPage($name): string
{
    $pageName = basename($_SERVER['PHP_SELF']);
    if ($pageName === $name) return 'active';
    return '';
}

?>

<header class="nav-container" id="main-nav">
    <nav class="nav-inner">
        <a class="nav-brand" href="<?php echo $arrConfig['url_site'] ?>">
            <img src="<?php echo $arrConfig['url_site'] ?>/assets/logo.png" alt="ASYDIM logo">
        </a>

        <ul class="nav-links" id="nav-menu">
            <li><a href="<?php echo $arrConfig['url_site'] ?>" class="nav-link <?php echo checkPage('index.php') ?>">Início</a></li>
            <li><a href="<?php echo $arrConfig['url_site'] . '/pages/about.php' ?>" class="nav-link <?php echo checkPage('about.php') ?>">Sobre</a></li>
            <li><a href="<?php echo $arrConfig['url_site'] . '/pages/formation-categories.php' ?>" class="nav-link <?php echo checkPage('formation-categories.php') ?>">Formações</a></li>
            <li><a href="<?php echo $arrConfig['url_site'] . '/pages/contacts.php' ?>" class="nav-link <?php echo checkPage('contacts.php') ?>">Contactos</a></li>
            <li><a href="<?php echo $arrConfig['url_site'] . '/pages/faqs.php' ?>" class="nav-link <?php echo checkPage('faqs.php') ?>">Ajuda</a></li>
            <li><a href="<?php echo $arrConfig['url_site'] . '/login.php' ?>" class="nav-cta">Entrar</a></li>
        </ul>

        <button class="menu-toggle" id="menu-toggle" aria-label="Abrir menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>
</header>

<script>
    // Mobile menu toggle
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('nav-menu').classList.toggle('open');
    });

    // Navbar scroll effect
    const nav = document.getElementById('main-nav');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 60) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });

    // Scroll reveal
    const revealElements = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
    });
</script>