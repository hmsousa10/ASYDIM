

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

$id = $_GET["id"];

if ($id <= 0 && $id == null) {
    header("location: index.php");
}

$user = my_query("SELECT * FROM users WHERE id = '$id'");

if (count($user) == 0) {
    header("location: index.php");
}

$user = $user[0];

if($user['role_id'] == 1) {
    $roles = my_query("SELECT * FROM `roles`");
} else {
    $roles = my_query("SELECT * FROM `roles` WHERE slug <> 'root'");
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
                <a href="index.php" class="bg-primary py-2 px-5 rounded text-white transition ease-in-out hover:bg-secondary">
                    Voltar
                </a>
            </div>

            <form action="../includes/users/edit.php?id=<?php echo $id; ?>" class="w-full" method="POST">
                <div class="w-full grid md:grid-cols-3 gap-10">
                    <input type="text" placeholder="Nome" name="name" id="name" value="<?php echo $user[
                        "name"
                    ]; ?>" class="border border-gray-200 rounded px-3 p-2 w-full" />
                    <select name="role" id="role" class="bg-white rounded border border-gray-200 px-3 p-2 w-full">
                        <?php
                            foreach($roles as $role) {
                                ?>
                                    <option value="<?php echo $role['id']; ?>" <?php if($role['id'] == $user['role_id']) { echo "selected"; } ?>><?php echo $role['name']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <div></div>

                    <input type="email" placeholder="E-mail" name="email" id="email" value="<?php echo $user[
                        "email"
                    ]; ?>"class="border border-gray-200 rounded px-3 p-2 w-full" />
                    <input type="tel" placeholder="Telemóvel" name="phone" id="phone" value="<?php echo $user[
                        "phone"
                    ]; ?>" pattern="[2|9][0-9]{8}" class="border border-gray-200 rounded px-3 p-2 w-full" />
                </div>

                <input type="submit" value="Editar" name="btnEdit" id="btnEdit" class="mt-10 bg-primary text-white font-semibold cursor-pointer px-5 py-3 rounded transition ease-in-out hover:bg-secondary" />
            </form>
        </div>
	</body>
</html>
