<?php
include "../../includes/config.inc.php";
include "../../includes/db.inc.php";

@session_start();

if (!isset($_SESSION["user"])) {
    header("location: ../login.php");
}

$statement = "SELECT * FROM formations";
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

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
	</head>
	<body class="p-0 m-0 min-h-screen min-w-screen">
        <?php include "../components/header.php"; ?>

	    <div
			class="flex flex-col w-full mt-32 px-32 items-center justify-center"
		>
            <div class="flex w-full items-center justify-end">
                <a href="create.php" class="bg-primary py-2 px-5 rounded text-white transition ease-in-out hover:bg-secondary">
                    Criar
                </a>
            </div>

            <table class="w-full table-auto text-center mt-5 space-y-5">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>Nome</th>
                        <th>Abreviatura</th>
                        <th>Data início</th>
                        <th>Data fim</th>
                        <th>Horas</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($formations as $formation) { ?>
                                <tr>
                                    <td><a class="underline" href="show.php?id=<?php echo $formation[
                                        "id"
                                    ]; ?>"><?php echo $formation[
    "name"
]; ?></a></td>
                                    <td><?php echo $formation["slug"]; ?></td>
                                    <td><?php echo format_date(
                                        $formation["beginning_date"]
                                    ); ?></td>
                                    <td><?php echo format_date(
                                        $formation["ending_date"]
                                    ); ?></td>
                                    <td><?php echo $formation[
                                        "duration"
                                    ]; ?></td>
                                    <td><a class="text-primary" href="edit.php?id=<?php echo $formation[
                                        "id"
                                    ]; ?>">Editar</a></td>
                                </tr>
                            <?php } ?>
                </tbody>
            </table>
        </div>
       	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<?php
  $error = $_GET["error"];

  if (!is_null($error) && $error == 0) {
      echo '<script>window.onload = function() {
				Swal.fire({
                                                 title: "Operação completa com sucesso",
                                                 icon: "success",
                                                 toast: true,
                                                 showConfirmButton: false,
                                                 timer: 2000,
                                                 timerProgressBar: true,
                                                 position: "top",
                                                 color: "#FFFFFF",
                                                 background: "#4C9F70"
                                             });
                                         };</script>';
  }

  if (!is_null($error) && $error == 1) {
      echo '<script>window.onload = function() {
				Swal.fire({
                                                   title: "Data inválida",
                                                   icon: "error",
                                                   toast: true,
                                                   showConfirmButton: false,
                                                   timer: 2000,
                                                   timerProgressBar: true,
                                                   position: "top",
                                                   color: "#FFFFFF",
                                                   background: "#FCA5A5"
                                               });
                                           };</script>';
  }
  ?>
	</body>
</html>
