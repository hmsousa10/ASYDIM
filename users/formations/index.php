<?php
include "../..includes/config.inc.php";
include "../../includes/db.inc.php";

@session_start();

if (!isset($_SESSION["user"])) {
    header("location: ../login.php");
}

$userID = $_SESSION["user"]["id"];

$statement = "SELECT formations.*, formation_users.approved
              FROM formations
              JOIN formation_users ON formations.id = formation_users.formation_id
              WHERE formation_users.user_id = $userID";
$formations = my_query($statement);

function format_date($value)
{
    if ($value == null) {
        return "Dado não inserido";
    }

    $time = strtotime($value);

    return date("d-m-Y", $time);
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
        <?php include "../components/header.php"; ?>

	    <div
			class="flex flex-col w-full mt-32 px-32 items-center justify-center"
		>
            <div class="flex w-full items-center justify-end">
                <a href="associate.php" class="bg-primary py-2 px-5 rounded text-white transition ease-in-out hover:bg-secondary">
                    Associar
                </a>
            </div>

            <table class="w-full table-auto text-center mt-5 space-y-5">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>Nome</th>
                        <th>Abreviatura</th>
                        <th>Aprovado</th>
                        <th>Data início</th>
                        <th>Data fim</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($formations as $formation) { ?>
                                <tr>
                                    <td><?php echo $formation["name"]; ?></td>
                                    <td><?php echo $formation["slug"]; ?></td>
                                    <td>
                                        <?php if ($formation["approved"] == 0) {
                                            echo "Não";
                                        } else {
                                            echo "Sim";
                                        } ?>
                                    </td>
                                    <td><?php echo format_date(
                                        $formation["beginning_date"]
                                    ); ?></td>
                                    <td><?php echo format_date(
                                        $formation["ending_date"]
                                    ); ?></td>
                                </tr>
                            <?php } ?>
                </tbody>
            </table>
        </div>
	</body>
</html>
