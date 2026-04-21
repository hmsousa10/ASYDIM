<?php
include '../../includes/config.inc.php';
include '../../includes/db.inc.php';

@session_start();

include $arrConfig['dir_site'] . "/users/userverification.php";

$userID = $_SESSION['user']['id'];

// Obter todas as formações que o usuário já está associado
$userFormations = my_query("SELECT formation_id FROM formation_users WHERE user_id = $userID");
$userFormationIds = array_column($userFormations, 'formation_id');

// Obter todas as formações disponíveis que o usuário ainda não está associado
if (count($userFormations) > 0) {
    $formations = my_query("SELECT * FROM formations WHERE id NOT IN (" . implode(',', $userFormationIds) . ")");
} else {
    $formations = my_query("SELECT * FROM formations");
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM</title>

    <meta name="description" content="Formações de qualidade">
    <meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim, Asdim, Asydm">
    <meta name="author" content="Hugo Sousa">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-0 m-0 min-h-screen min-w-screen">
    <?php include '../components/header.php' ?>

    <div class="flex flex-col w-full mt-20 px-8 md:px-32 items-center justify-center">
        <div class="flex w-full items-center justify-end mb-6">
            <a href="index.php" class="bg-primary py-2 px-5 rounded-lg text-white font-semibold shadow-md transition ease-in-out hover:bg-secondary">
                Voltar
            </a>
        </div>

        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($formations as $formation) { ?>
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <?php if ($formation["image"]) { ?>
                            <img src="<?php echo $formation["image"]; ?>" alt="<?php echo $formation["name"]; ?>" class="h-32 w-full object-cover rounded-lg mb-4">
                        <?php } ?>
                        <h2 class="text-xl font-semibold mb-2"><?php echo $formation["name"]; ?></h2>
                        <p class="text-gray-600 mb-2"><?php echo $formation["description"]; ?></p>
                        <p><strong>Preço:</strong>
                            €<?php echo number_format($formation["unit_price"] / 100, 2, ',', '.'); ?></p>
                        <p><strong>Início:</strong> <?php echo date($formation["beginning_date"]); ?></p>
                        <p><strong>Fim:</strong> <?php echo date($formation["ending_date"]); ?></p>
                    </div>
                    <form action="../includes/formations/process_payment.php" method="POST" class="mt-4">
                        <input type="hidden" name="formation_id" value="<?php echo $formation["id"]; ?>">
                        <button type="submit" class="bg-primary text-white py-2 px-4 rounded-lg w-full font-semibold shadow-md transition ease-in-out hover:bg-secondary">
                            Associar
                        </button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>