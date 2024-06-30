<?php

include '../includes/config.inc.php';
include '../includes/db.inc.php';

$formations = my_query("SELECT * FROM formations");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>ASYDIM - Formações</title>

		<meta name="description" content="Formações de qualidade">
		<meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim, Asdim, Asydm">
		<meta name="author" content="Hugo Sousa">

		<script src="https://cdn.tailwindcss.com"></script>
        <script src="<?php echo $arrConfig['url_site'] . '/tailwind.config.js' ?>"></script>

        <script src="https://unpkg.com/@phosphor-icons/web"></script>
    </head>
	<body class="p-0 m-0">
		<?php include '../components/header.php' ?>

        <section class="w-screen flex flex-col items-center justify-center">
            <h1 class="mt-20 text-5xl"><span class="text-secondary font-bold">Formações</span> de qualidade</h1>

            <p class="mt-10 px-32 text-center text-2xl italic font-light text-gray-700"><span class="font-bold text-secondary">"Investir em conhecimento</span> rende sempre os melhores juros."<span class="font-bold text-secondary">- Benjamin Franklin</span></p>

            <div class="my-10 grid md:grid-cols-3 justify-items-center align-center gap-x-0 gap-y-10 md:gap-x-10 px-20">
                <?php
                    foreach($formations as $formation) {
                        ?>
                            <a href="formation.php?name=<?php echo $formation['slug'] ?>" class="col-span-1 w-full p-20 flex flex-col items-center text-center justify-center rounded text-white transition ease-in-out hover:-translate-y-1.5 hover:scale-105" style="background-image: url('<?php echo $arrConfig['url_site'] ?>/assets/markting.jpg')">
                                <div class="flex flex-col items-center align-middle text-center justify-center">
                                    <div class="bg-white bg-opacity-30 flex flex-col items-center justify-center p-5 h-16 w-16 rounded-full">
                                        <i class="ph-fill ph-graduation-cap text-3xl"></i>
                                    </div>

                                    <div class="flex flex-col items-center justify-center mt-5 space-y-3">
                                        <p class="text-xl font-bold"><?php echo $formation['name'] ?></p>
                                        <p><?php echo $formation['duration'] ?> horas</p>
                                    </div>
                                </div>
                            </a>
                        <?php
                    }
                ?>
            </div>
        </section>
    </body>
</html>