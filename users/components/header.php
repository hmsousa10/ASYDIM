<?php

$url = "http://localhost/PAP-main/users";

function checkPage($name): void
{
    $pageName = $_SERVER["PHP_SELF"];

    // if ends with the name
    if (str_ends_with($pageName, $name)) {
        if ($name == "index.php") {
            if ($pageName == "/PAP-main/users/index.php") {
                echo "!bg-coolblue text-white";
            }
        } else {
            echo "!bg-coolblue text-white";
        }
    }
    echo "";
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="../../tailwind.config.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://unpkg.com/@phosphor-icons/web"></script>

<aside class="w-64 bg-white h-full shadow-md fixed">
    <div class="p-6">
        <a class="text-2xl uppercase font-bold" href="<?php echo $arrConfig['url_site'] ?>">
            <img src="<?php echo $arrConfig['url_site'] ?>/assets/logo.png" alt="logo" class="w-24">
        </a>
    </div>
    <nav class="mt-6">
        <ul>
            <li class="px-4 py-2 text-gray-700 hover:bg-primary hover:text-white <?php checkPage("index.php"); ?>">
                <a href="<?php echo $url; ?>" class="flex items-center">
                    <i class="ph-fill ph-house mr-3"></i>
                    Inicio
                </a>
            </li>
            <li
                class="px-4 py-2 text-gray-700 hover:bg-primary hover:text-white <?php checkPage("formations/index.php"); ?>">
                <a href="<?php echo $url . "/formations/index.php"; ?>" class="flex items-center">
                    <i class="ph-fill ph-book-open mr-3"></i>
                    Formações
                </a>
            </li>
            <li
                class="px-4 py-2 text-gray-700 hover:bg-primary hover:text-white <?php checkPage("testimonies/create.php"); ?>">
                <a href="<?php echo $url . "/testimonies/create.php"; ?>" class="flex items-center">
                    <i class="ph-fill ph-chat-circle mr-3"></i>
                    Testemunhos
                </a>
            </li>
            <li
                class="px-4 py-2 text-gray-700 hover:bg-primary hover:text-white <?php checkPage("account/index.php"); ?>">
                <a href="<?php echo $url . "/account/index.php"; ?>" class="flex items-center">
                    <i class="ph-fill ph-user mr-3"></i>
                    Conta
                </a>
            </li>
        </ul>
    </nav>
    <div class="absolute bottom-0 w-full mb-6 px-6">
        <a href="<?php echo $url . "/logout.php"; ?>" class="text-gray-700 hover:text-primary flex items-center">
            <i class="ph-fill ph-sign-out text-xl mr-3"></i>
            Sair
        </a>
    </div>
</aside>
<div class="flex flex-col flex-grow ml-64">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">ASYDIM-CONSULTORIA E FORMAÇÃO SUSTENTÁVEL, LDA</h1>
        <div class="relative dropdown">
            <button class="flex items-center" onclick="toggleDropdown()">
                <span class="ml-2"><?php echo $_SESSION['user']['name']; ?></span>
                <img src="<?php echo $_SESSION['user']['image']; ?>" alt="Profile Picture"
                    class="w-10 h-10 rounded-full object-cover ml-2">
            </button>
        </div>
    </header>

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