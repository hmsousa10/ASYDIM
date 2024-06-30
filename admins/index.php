<?php
include '../includes/config.inc.php';
include $arrConfig['dir_site'] . '../includes/db.inc.php';

@session_start();

if (!isset($_SESSION['user'])) {
    header('location: login.php');
}

$formationsNumber = my_query("SELECT COUNT(*) as count FROM formations")[0];
$usersNumber = my_query("SELECT COUNT(*) as count FROM users")[0];
$testimoniesNumber = my_query("SELECT COUNT(*) as count FROM testimonies")[0];

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
		<script src="../tailwind.config.js"></script>
		<script src="https://unpkg.com/@phosphor-icons/web"></script>
	</head>
	<body class="p-0 m-0 min-h-screen min-w-screen">
        <?php include './components/header.php' ?>

	    <div
			class="h-96 flex flex-col py-20 px-40"
		>
            <h1 class="text-2xl font-semibold">Boas vindas, <span class="text-primary font-bold"><?php echo $_SESSION['user']['name']; ?></span></h1>

			<p class="mt-10">Dados da plataforma</p>
			<div class="grid md:grid-cols-3 gap-x-10 mt-5">
				<div class="flex flex-col text-center items-center rounded w-full bg-primary text-white p-5 space-y-3">
					<div class="bg-white bg-opacity-30 flex items-center justify-center p-5 h-16 w-16 rounded-full">
                        <i class="ph-fill ph-graduation-cap text-3xl"></i>
                    </div>
					<p class="text-lg"><?php echo $formationsNumber['count']; ?> formações criadas</p>
				</div>
				<div class="flex flex-col text-center items-center rounded w-full bg-primary text-white p-5 space-y-3">
					<div class="bg-white bg-opacity-30 flex items-center justify-center p-5 h-16 w-16 rounded-full">
                        <i class="ph-fill ph-users-three text-3xl"></i>
                    </div>
					<p class="text-lg"><?php echo $usersNumber['count']; ?> utilizadores criados</p>
				</div>
				<div class="flex flex-col text-center items-center rounded w-full bg-primary text-white p-5 space-y-3">
					<div class="bg-white bg-opacity-30 flex items-center justify-center p-5 h-16 w-16 rounded-full">
                        <i class="ph-fill ph-pen-nib-straight text-3xl"></i>
                    </div>
					<p class="text-lg"><?php echo $testimoniesNumber['count']; ?> testemunhos deixados</p>
				</div>
			</div>
		</div>
	</body>
</html>
