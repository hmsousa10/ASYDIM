<?php

/**
 * This function takes care of returning an underline
 * class tag if the current page is equals to the
 * provided elements name
 *
 * @param string $name
 * @return string
 */
function checkPage($name) : void {
    $pageName = basename($_SERVER['PHP_SELF']);

    if($pageName === $name)
        echo 'underline underline-offset-8';

    echo '';
}

?>

<header
    class="w-full z-30 transition-all"
>
    <nav class="max-w-screen-xl px-6 sm:px-8 lg:px-16 mx-auto grid grid-flow-col py-5 sm:py-4 mt-5">
        <div class="col-start-1 col-end-2 flex items-center">
            <a class="text-2xl uppercase font-bold" href="index.php">
                <img src="assets/logo.png" alt="logo" class="w-16">
            </p>
        </div>
        <ul class="hidden lg:flex col-start-4 col-end-8 text-black-500 space-x-10 items-center">
            <a href="<?php echo $arrConfig['url_site'] ?>" class="<?php checkPage('index.php') ?> text-black-600 hover:text-primary ease-in-out transition-all">Inicio</a>
            <a href="<?php echo $arrConfig['url_site'] . '/pages/about.php' ?>" class="<?php checkPage('about.php') ?> text-black-600 hover:text-primary ease-in-out transition-all">Sobre</a>
            <a href="<?php echo $arrConfig['url_site'] . '/pages/formations.php' ?>" class="<?php checkPage('formations.php') ?> ref="#" class="text-black-600 hover:text-primary ease-in-out transition-all">Formações</a>
            <a href="<?php echo $arrConfig['url_site'] . '/pages/contacts.php' ?>" class="<?php checkPage('contacts.php') ?> text-black-600 hover:text-primary ease-in-out transition-all">Contactos</a>
        </ul>
        <div class="col-start-10 col-end-12 font-medium flex space-x-6 justify-end items-center">
            <a href="<?php echo $arrConfig['url_site'] . '/users/login.php' ?>" class="text-black-600 mx-2 sm:mx-4 capitalize tracking-wide font-semibold hover:text-primary ease-in-out transition-all">
                Entrar
            </a>
            <a href="#" class="border border-secondary px-10 py-3 rounded-full font-semibold  transition ease-in-out hover:bg-secondary hover:text-white hover:shadow-lg hover:shadow-primary">
                Participe
            </a>
        </div>
    </nav>
</header>

<nav class="fixed lg:hidden bottom-0 left-0 right-0 z-20 px-4 sm:px-8 shadow-t ">
    <div class="bg-white-500 sm:px-3">
        <ul class="flex w-full justify-between items-center text-black-500">
            <p>Hello,</p>
			<p>Hello 2</p>
		</ul>
	</div>
</nav>
