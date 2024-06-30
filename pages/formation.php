
<?php

function format_date($value) {
    if($value == null)
        return "Data não definida";

    $time = strtotime($value);

    return date('d-m-Y', $time);
}

include '../includes/config.inc.php';
include '../includes/db.inc.php';

$slug = $_GET['name'];

$formation = my_query("SELECT * FROM formations WHERE `slug`='$slug'");

if(count($formation) <= 0) {
    header('location: formations.php');
}

$formation = $formation[0];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>ASYDIM - Formação</title>

		<meta name="description" content="Formações de qualidade">
		<meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim, Asdim, Asydm">
		<meta name="author" content="Hugo Sousa">

		<script src="https://cdn.tailwindcss.com"></script>
        <script src="<?php echo $arrConfig['url_site'] . '/tailwind.config.js' ?>"></script>

        <script src="https://unpkg.com/@phosphor-icons/web"></script>
    </head>
	<body class="p-0 m-0">
		<?php include '../components/header.php' ?>

        <section class="w-screen flex flex-col items-center justify-center">
            <h1 class="mt-20 text-5xl"><span class="text-secondary font-bold "><?php echo $formation['name']; ?></span></h1>

            <div class="px-5 md:px-20 w-full">
                <img class="mt-10 w-full h-48 border border-white rounded" style="background-image: url('<?php echo $arrConfig['url_site'] ?>/assets/markting.jpg')" />

                <h3 class="mt-10 text-2xl font-bold text-secondary">Descrição</h3>
                <p class="mt-5"><?php echo $formation['description']; ?></p>

                <div class="flex space-x-5 my-10">
                    <p><span class="text-secondary font-bold">Inicio da formação:</span> <?php echo format_date($formation['beginning_date']); ?></p>
                    <p><span class="text-secondary font-bold">Fim da formação:</span> <?php echo format_date($formation['ending_date']); ?></p>
                </div>
            </div>
        </section>
    </body>
</html>