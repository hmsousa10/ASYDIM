<?php
include "../../includes/config.inc.php";
include "../../includes/db.inc.php";

@session_start();

if (!isset($_SESSION["user"])) {
    header("location: ../login.php");
}

$formation_id = $_GET["id"];

if ($formation_id == null) {
    header("location: index.php");
}

$statement = "SELECT * FROM formations WHERE id=$formation_id";
$formation = my_query($statement)[0];

$statement =
    "SELECT formation_users.*, users.name, users.email
              FROM formation_users
              JOIN users ON formation_users.user_id = users.id
              WHERE formation_users.formation_id=" . $formation["id"];
$formation_users = my_query($statement);

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
		    <h1 class="text-2xl font-semibold"><?php echo $formation["name"]; ?></h1>

		    <table class="w-full table-auto text-center mt-10 space-y-5">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>Nome</th>
                        <th>Aprovado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($formation_users as $user) { ?>
                                <tr>
                                    <td><?php echo $user[
                                        "name"
                                    ]; ?> (<?php echo $user["email"]; ?>)</td>
                                    <td>
                                        <?php if ($user["approved"] == 0) {
                                            echo "Não";
                                        } else {
                                            echo "Sim";
                                        } ?>
                                    </td>
                                    <td><a class="<?php if (
                                        $user["approved"] == 0
                                    ) {
                                        echo "text-primary";
                                    } else {
                                        echo "text-red-600";
                                    } ?>" href="../includes/formations/changeState.php?id=<?php echo $user[
    "id"
]; ?>"><?php if ($user["approved"] == 0) {
    echo "Aprovar";
} else {
    echo "Desaprovar";
} ?></a></td>
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
                                          title: "Alterado com sucesso",
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
  ?>
	</body>
</html>
