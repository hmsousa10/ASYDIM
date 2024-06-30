<?php

include '../../includes/config.inc.php';
include '../../includes/db.inc.php';

@session_start();

if (!isset($_SESSION['user'])) {
    header('location: ../login.php');
}
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

	    <div
			class="flex flex-col w-full mt-32 px-32 items-center justify-center"
		>
            <div class="flex w-full items-center justify-end">
                <a href="index.php" class="bg-primary py-2 px-5 rounded text-white transition ease-in-out hover:bg-secondary">
                    Voltar
                </a>
            </div>

            <form action="../includes/formations/create.php" class="w-full mt-5" method="POST">
                <div class="w-full grid md:grid-cols-3 gap-10">
                    <input type="text" placeholder="Nome" name="name" id="name" class="border border-gray-200 rounded px-3 p-2 w-full" required/>
                    <input type="text" placeholder="Abreviatura" name="slug" id="slug" class="border border-gray-200 rounded px-3 p-2 w-full" required/>
                    <input type="number" min="1" placeholder="Duração" name="duration" id="duration" class="border border-gray-200 rounded px-3 p-2 w-full" required/>

                    <textarea placeholder="Descrição" name="description" id="description" class="border border-gray-200 rounded px-3 p-2 col-span-3 w-full" style="resize: none;" rows="6" required></textarea>
                    <div class="flex items-center space-x-3">
                        <p>Início</p>
                        <input type="date" name="beginning_date" id="beginning_date" class="border border-gray-200 rounded px-3 p-2 w-full" required/>
                    </div>
                    <div class="flex items-center space-x-3">
                        <p>Fim</p>
                        <input type="date" name="ending_date" id="ending_date" class="border border-gray-200 rounded px-3 p-2 w-full" />
                    </div>
                </div>

                <input type="submit" value="Criar" name="btnCreate" id="btnCreate" class="mt-10 bg-primary text-white font-semibold cursor-pointer px-5 py-3 rounded transition ease-in-out hover:bg-secondary" />
            </form>
        </div>
	</body>
</html>