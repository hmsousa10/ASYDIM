<?php

include '../../includes/config.inc.php';
include '../../includes/db.inc.php';

@session_start();

include $arrConfig['dir_site'] . "/users/userverification.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM</title>

    <meta name="description" content="Formações de qualidade">
    <meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim, Asdim, Asydm">
    <meta name="author" content="Hugo Sousa">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../../tailwind.config.js"></script>
</head>

<body class="p-0 m-0 min-h-screen min-w-screen">
    <?php include '../components/header.php' ?>

    <div class="flex flex-col w-full mt-32 px-32 items-center justify-center">
        <div class="flex w-full items-center justify-end">
            <a href="../index.php" class="bg-primary py-2 px-5 rounded text-white transition ease-in-out hover:bg-secondary">
                Voltar
            </a>
        </div>

        <form action="../includes/testimonies/create.php" class="w-full mt-5" method="POST">
            <div class="w-full grid md:grid-cols-3 gap-10">
                <input type="number" min="1" max="5" placeholder="Avaliação (1 - 5)" name="evaluation" id="evaluation" class="border border-gray-200 rounded px-3 p-2 w-full" required />
                <div></div>
                <div></div>

                <textarea placeholder="Conte-nos a sua experiência" name="testimony" id="testimony" class="border border-gray-200 rounded px-3 p-2 col-span-3 w-full" style="resize: none;" rows="6" required></textarea>
            </div>

            <input type="submit" value="Enviar" name="btnCreate" id="btnCreate" class="mt-10 bg-primary text-white font-semibold cursor-pointer px-5 py-3 rounded transition ease-in-out hover:bg-secondary" />
        </form>
    </div>
</body>

</html>