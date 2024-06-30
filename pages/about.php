<?php

include '../includes/config.inc.php';
include '../includes/db.inc.php';

$formationsNumber = my_query("SELECT COUNT(*) as count FROM formations")[0];
$usersNumber = my_query("SELECT COUNT(*) as count FROM users")[0];
$testimoniesNumber = my_query("SELECT COUNT(*) as count FROM testimonies")[0];

$testimony = my_query("SELECT * FROM testimonies ORDER BY RAND() LIMIT 1")[0];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>ASYDIM - Sobre</title>

		<meta name="description" content="Formações de qualidade">
		<meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim, Asdim, Asydm">
		<meta name="author" content="Hugo Sousa">

		<script src="https://cdn.tailwindcss.com"></script>
        <script src="<?php echo $arrConfig['url_site'] . '/tailwind.config.js' ?>"></script>

        <script src="https://unpkg.com/@phosphor-icons/web"></script>
    </head>
	<body class="p-0 m-0">
		<?php include '../components/header.php' ?>


        <section class="mt-16 h-96 w-screen">
            <div class="w-full h-full grid md:grid-cols-2 justify-items-center align-middle space-between align-center  px-10">
                <div class="flex flex-col justify-center">
                    <h1 class="text-5xl tracking-wide">As <strong class="text-secondary">formações que</strong> já conhece e tanto <strong class="text-secondary">adora</strong></h1>
                    <p class="mt-5">Quando sentia na casa a voz de rezas, fugia, ia para o fundo da quinta, sob as trepadeiras do mirante, ler o seu Voltaire: ou então partia a desabafar com o seu velho amigo, o coronel Sequeira, que vivia numa quinta a Queluz.</p>

                    <a href="#" class="mt-10 w-64 text-lg text-center border border-secondary px-10 py-3 rounded-md font-semibold bg-secondary text-white transition-all ease-in-out hover:shadow-lg hover:shadow-primary">
                        Comece já
                    </a>
                </div>

                <img alt="About image" src="<?php echo $arrConfig['url_site'] . '/assets/about.png' ?>" class="w-full md:w-auto md:h-96" />
            </div>
        </section>

        <section class="mt-80 md:mt-20 h-96 w-screen">
            <div class="w-full h-full flex flex-col justify-center align-center px-10 text-center">
                <div class="flex flex-col justify-center align-center border rounded p-20">
                    <h1 class="text-5xl tracking-wide">Avaliação de <strong class="text-secondary"><?php echo $testimony['name'] ?></strong></h1>
                    <p class="mt-10"><?php echo $testimony['testimony']; ?></p>

                    <p class="mt-5 font-semibold text-secondary text-lg"><?php echo $testimony['evaluation']; ?> / 5 ⭐️</p>
                </div>
            </div>
        </section>

        <section class="mt-64 md:mt-20 h-96 w-screen text-center px-5">
            <h2 class="text-5xl tracking-wide"><strong class="text-secondary">Qualidade</strong> em números</h2>
            <p class="mt-5">E, se nos der oportunidade, pode ajudar-nos a melhorar ainda mais o nosso serviço</p>

            <div class="w-full flex items-center justify-center mt-16">
                <div class="w-full gap-y-10 md:gap-y-0 md:w-3/4 md:h-32 py-10 md:py-0 grid md:grid-cols-3 space-between items-center align-middle rounded-md text-white bg-secondary shadow-lg px-10">
                    <div class="flex space-x-5 align-middle text-center justify-center">
                        <div class="bg-white bg-opacity-30 flex items-center justify-center p-5 h-16 w-16 rounded-full">
                            <i class="ph-fill ph-graduation-cap text-3xl"></i>
                        </div>

                        <div class="flex flex-col items-center justify-center space-y-1">
                            <p class="text-xl font-black"><?php echo $formationsNumber['count']; ?></p>
                            <p>Formações dadas</p>
                        </div>
                    </div>

                    <div class="flex space-x-5 align-middle text-center justify-center">
                        <div class="bg-white bg-opacity-30 flex items-center justify-center p-5 h-16 w-16 rounded-full">
                            <i class="ph-fill ph-users-three text-3xl"></i>
                        </div>

                        <div class="flex flex-col items-center justify-center space-y-1">
                            <p class="text-xl font-black"><?php echo $usersNumber['count']; ?></p>
                            <p>Alunos satisfeitos</p>
                        </div>
                    </div>

                    <div class="flex space-x-5 align-middle text-center justify-center">
                        <div class="bg-white bg-opacity-30 flex items-center justify-center p-5 h-16 w-16 rounded-full">
                            <i class="ph-fill ph-pen-nib-straight text-3xl"></i>
                        </div>

                        <div class="flex flex-col items-center justify-center space-y-1">
                            <p class="text-xl font-black"><?php echo $testimoniesNumber['count']; ?></p>
                            <p>Testemunhos dados</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
