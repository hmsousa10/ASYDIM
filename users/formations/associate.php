<?php

include '../../includes/config.inc.php';
include '../../includes/db.inc.php';

@session_start();

if (!isset($_SESSION['user'])) {
    header('location: ../login.php');
}

$statement = "SELECT * FROM formations";
$formations = my_query($statement);

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

            <form action="../includes/formations/associate.php" class="w-full mt-5" method="POST">
                <div class="w-full grid md:grid-cols-3 gap-10">
                    <select name="formation" id="formation" class="bg-white rounded border border-gray-200 px-3 p-2 w-full">
                        <?php
                            foreach($formations as $formation) {
                                ?>
                                    <option value="<?php echo $formation['id']; ?>" selected><?php echo $formation['name']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <input type="submit" value="Associar" name="btnCreate" id="btnCreate" class="mt-10 bg-primary text-white font-semibold cursor-pointer px-5 py-3 rounded transition ease-in-out hover:bg-secondary" />
            </form>
        </div>
	</body>
</html>