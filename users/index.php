<?php
include '../includes/config.inc.php';
include $arrConfig['dir_site'] . '/includes/db.inc.php';

@session_start();

include $arrConfig['dir_site'] . "/users/userverification.php";

$formationsNumber = my_query("SELECT COUNT(*) as count FROM formations")[0];
$usersNumber = my_query("SELECT COUNT(*) as count FROM users")[0];
$testimoniesNumber = my_query("SELECT COUNT(*) as count FROM testimonies")[0];

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
    <script src="../tailwind.config.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <style>
    .animate-grow {
        transition: transform 0.2s;
    }

    .animate-grow:hover {
        transform: scale(1.05);
    }

    .hidden {
        display: none;
    }

    .object-cover {
        object-fit: cover;
    }
    </style>


</head>

<body class="p-0 m-0 min-h-screen min-w-screen">
    <?php include './components/header.php' ?>
    <main class="flex-grow p-6">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-semibold">Olá, <?php echo $_SESSION['user']['name']; ?></h2>
            <p class="text-gray-600">Painel inicial</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div onclick="redirectToProfile()"
                class="bg-primary p-8 rounded-lg shadow-md text-center animate-grow flex flex-col justify-center items-center">
                <h3 class="text-2xl font-semibold text-white">O meu perfil</h3>
            </div>
            <div onclick="redirectToProfile2()"
                class="bg-primary p-8 rounded-lg shadow-md text-center animate-grow flex flex-col justify-center items-center">
                <h3 class="text-2xl font-semibold text-white">As minhas formações</h3>
            </div>
            <div onclick="redirectToProfile3()"
                class="bg-primary p-8 rounded-lg shadow-md text-center animate-grow flex flex-col justify-center items-center">
                <h3 class="text-2xl font-semibold text-white">Os meus testemunhos</h3>
            </div>
        </div>
    </main>
    </div>

    <script>
    function toggleDropdown() {
        var dropdownContent = document.getElementById('dropdown-content');
        if (dropdownContent.classList.contains('hidden')) {
            dropdownContent.classList.remove('hidden');
        } else {
            dropdownContent.classList.add('hidden');
        }
    }

    function redirectToProfile() {
        window.location.href = "<?php echo $url . '/account/index.php'; ?>";
    }

    function redirectToProfile2() {
        window.location.href = "<?php echo $url . '/formations/index.php'; ?>";
    }

    function redirectToProfile3() {
        window.location.href = "<?php echo $url . '/testimonies/create.php'; ?>";
    }
    </script>






    <script>
    function toggleDropdown() {
        var dropdownContent = document.getElementById('dropdown-content');
        if (dropdownContent.classList.contains('hidden')) {
            dropdownContent.classList.remove('hidden');
        } else {
            dropdownContent.classList.add('hidden');
        }
    }
    </script>

    <style>
    .hidden {
        display: none;
    }
    </style>
</body>

</html>