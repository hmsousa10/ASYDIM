<?php
include "../includes/config.inc.php";

$action = "../scripts/auth/login.php";

if (isset($_GET['action']) && $_GET['action'] == "register-formation") {
    $action = $action . "?action=register-formation";
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

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../tailwind.config.js"></script>
</head>

<body class="p-0 m-0 min-h-screen min-w-screen bg-blue-50 flex items-center justify-center">
    <div class="w-full max-w-lg bg-white shadow-md rounded-md p-8">
        <h2 class="text-2xl font-bold text-primary mb-4">Registo de Conta</h2>
        <p class="text-lg mb-4 text-justify">Para criar uma conta, entre em contacto com o administrador.</p>
        <p class="text-md mb-8 text-justify">
            Envie um e-mail para <a href="mailto:info@asydim.com" class="text-primary underline">info@asydim.com</a>
            solicitando a criação da sua conta. No e-mail, inclua o seu nome completo e número de telemóvel. Após a
            solicitação, a conta será criada pelo administrador, caso este ache ideal.
        </p>
        <div class="flex justify-center">
            <a href="login.php" class="bg-primary text-white font-semibold py-2 px-4 rounded cursor-pointer transition ease-in-out hover:scale-105">Voltar
                para Login</a>
        </div>
    </div>
</body>

</html>