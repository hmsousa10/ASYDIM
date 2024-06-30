<?php
include "../../includes/config.inc.php";
include "../../includes/db.inc.php";

@session_start();

if (!isset($_SESSION["user"])) {
    header("location: ../login.php");
}

$user = $_SESSION["user"];
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

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

		<script src="https://unpkg.com/@phosphor-icons/web"></script>
	</head>
	<body class="p-0 m-0 min-h-screen min-w-screen">
        <?php include "../components/header.php"; ?>

	    <div
			class="flex flex-col w-full mt-32 px-32 items-center justify-center"
		>
		    <form action="../includes/account/update.php" method="POST" class="w-full grid md:grid-cols-2 gap-10">
                <input type="text" placeholder="Nome" name="name" id="name" class="border border-gray-200 rounded px-3 p-2 w-full" value="<?php echo $user[
                    "name"
                ]; ?>" required/>
                <input type="email" placeholder="E-mail" name="email" id="email" class="border border-gray-200 rounded px-3 p-2 w-full" value="<?php echo $user[
                    "email"
                ]; ?>" required/>

                <input type="tel" placeholder="Telemóvel" name="phone" id="phone" pattern="[2|9][0-9]{8}" class="border border-gray-200 rounded px-3 p-2 w-full" value="<?php echo $user[
                    "phone"
                ]; ?>"/>
                <div></div>

                <input type="submit" value="Editar" name="btnCreate" id="btnCreate" class="mt-10 bg-primary text-white font-semibold cursor-pointer px-5 py-3 rounded transition ease-in-out hover:bg-secondary" />
			</form>
       </div>

	</body>
</html>
