<?php
include "../../includes/config.inc.php";
include "../../includes/db.inc.php";

@session_start();

if (!isset($_SESSION["user"])) {
    header("location: login.php");
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

    return date("d-m-Y H:i", $time);
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
    <?php include "../components/header.php"; ?>

    <div class="flex flex-col w-full mt-20 px-8 md:px-32 items-center justify-center">
        <div class="flex w-full items-center justify-end mb-6">
            <a href="associate.php" class="bg-primary py-2 px-5 rounded-lg text-white font-semibold shadow-md transition ease-in-out hover:bg-secondary">
                Associar
            </a>
        </div>

        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($formations as $formation) {
                $formation_id = $formation["id"];
                $meetings = my_query(
                    "SELECT * FROM meetings
                     WHERE id_formation=$formation_id AND date >= CURDATE()
                     ORDER BY date ASC LIMIT 1"
                );
                $next_meeting = count($meetings) > 0 ? $meetings[0] : null;
            ?>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center mb-4">
                        <?php if ($formation["image"]) { ?>
                            <img src="<?php echo $formation["image"]; ?>" alt="<?php echo $formation["name"]; ?>" class="h-16 w-16 rounded-lg mr-4">
                        <?php } ?>
                        <div>
                            <h2 class="text-xl font-semibold"><?php echo $formation["name"]; ?></h2>
                            <p class="text-gray-600"><?php echo $formation["slug"]; ?></p>
                        </div>
                    </div>
                    <p><strong>Aprovado:</strong> <?php echo $formation["approved"] == 0 ? "Não" : "Sim"; ?></p>
                    <p><strong>Início:</strong> <?php echo format_date($formation["beginning_date"]); ?></p>
                    <p><strong>Fim:</strong> <?php echo format_date($formation["ending_date"]); ?></p>
                    <?php if ($next_meeting) { ?>
                        <div class="mt-4">
                            <h3 class="text-lg font-semibold">Próxima Reunião</h3>
                            <p><strong>Nome:</strong> <?php echo $next_meeting["name"]; ?></p>
                            <p><strong>Tema:</strong> <?php echo $next_meeting["theme"]; ?></p>
                            <p><strong>Duração Estimada:</strong> <?php echo $next_meeting["estimated_duration"]; ?></p>
                            <p><strong>Data:</strong> <?php echo format_date($next_meeting["date"]); ?></p>
                            <a href="<?php echo $next_meeting["link"]; ?>" class="text-primary hover:underline">Acessar
                                Reunião</a>
                        </div>
                    <?php } else { ?>
                        <p class="mt-4 text-gray-500">Nenhuma reunião agendada.</p>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (count($formations) == 0) { ?>
                <p class="text-center text-gray-500">Ainda não estás inscrito em nenhuma formação?</p>
                <p class="text-center text-gray-500">Queres-te <a href="associate.php">associar</a>?</p>
            <?php } ?>
        </div>
    </div>
</body>

</html>