<?php

function null_or_value($value)
{
    if ($value == null) {
        return "Dado não inserido";
    }

    return $value;
}

include "../../includes/config.inc.php";
include "../../includes/db.inc.php";

@session_start();

if (!isset($_SESSION["user"])) {
    header("location: ../login.php");
}

$users = my_query("SELECT * FROM users");

/**
 * In this function we're going to return the
 * name of the role that is passed by the
 * parameter $id
 *
 * @param int $id
 * @return string
 */
function get_role_name($id)
{
    $role = my_query("SELECT * FROM roles WHERE id = '$id'")[0];

    return $role["name"];
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
                        <th>Email</th>
                        <th>Telemóvel</th>
                        <th>Cargo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td><?php echo $user["name"]; ?></td>
                                    <td><?php echo $user["email"]; ?></td>
                                    <td><?php echo null_or_value(
                                        $user["phone"]
                                    ); ?></td>
                                    <td><?php echo get_role_name(
                                        $user["role_id"]
                                    ); ?></td>
                                    <td><a class="text-primary" href="edit.php?id=<?php echo $user[
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
                                                   title: "Cargo inválido",
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

  if (!is_null($error) && $error == 2) {
      echo '<script>window.onload = function() {
				Swal.fire({
                                                     title: "Nome / E-mail inválido",
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
