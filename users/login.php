<?php
include "../includes/config.inc.php"; ?>
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
<body class="p-0 m-0 min-h-screen min-w-screen bg-blue-50">
    <div class="flex min-h-screen">
        <!-- Left Image Section -->
        <img class="w-1/2 bg-cover bg-center flex items-center justify-center" style="background-image: url('../assets/login.jpg');" />

        <!-- Right Login Section -->
        <div class="w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-md bg-white shadow-md rounded-md p-8">
                <h2 class="text-2xl font-bold text-primary mb-2">Junta-te a nós já!</h2>
                <h2 class="text-lg mb-4">Aprende com cursos 100% portugueses.</h2>
                <form method="POST" action="../scripts/auth/login.php" class="space-y-3">
                    <div>
                        <input type="email" placeholder="E-mail" name="email" id="email" class="border border-gray-300 rounded px-4 py-2 w-full focus:border-primary focus:outline-none" />
                    </div>
                    <div>
                        <input type="password" placeholder="Password" name="password" id="password" class="border border-gray-300 rounded px-4 py-2 w-full focus:border-primary focus:outline-none" />
                    </div>
                    <div class="text-right">
                        <a href="#" class="text-xs text-primary underline">Esqueceu-se da password?</a>
                    </div>
                    <div>
                        <input type="submit" value="Entrar" name="btnLogin" id="btnLogin" class="w-full bg-primary text-white font-semibold py-2 rounded cursor-pointer transition ease-in-out hover:scale-105" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
