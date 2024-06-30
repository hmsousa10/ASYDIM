<?php

include '../includes/config.inc.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>ASYDIM - Contactos</title>

		<meta name="description" content="Formações de qualidade">
		<meta name="keywords" content="Porto, Formações, Centro de formações, Vila Nova de Gaia, Asydim, Asdim, Asydm">
		<meta name="author" content="Hugo Sousa">

		<script src="https://cdn.tailwindcss.com"></script>
        <script src="<?php echo $arrConfig['url_site'] . '/tailwind.config.js' ?>"></script>

        <script src="https://unpkg.com/@phosphor-icons/web"></script>
    </head>
	<body class="p-0 m-0">
		<?php include '../components/header.php' ?>


        <section class="mt-16 h-96 w-screen">
            <div class="grid md:grid-cols-2 md:gap-x-10 md:justify-center md:align-items-center">
                <div class="text-center">
                    <h1 class="text-2xl font-bold">Saiba como nos <span class="text-secondary">contactar</span>!</h1>

                    <div class="w-full flex items-center justify-center">
                        <div class="flex flex-col align-center justify-center text-center my-10 w-1/2 space-y-10">
                            <div class="grid grid-cols-2 items-center justify-around w-full">
                                <div class="bg-primary bg-opacity-70 flex items-center justify-center h-16 w-16 rounded-full">
                                    <i class="ph-fill ph-phone text-3xl text-white"></i>
                                </div>

                                <p class="font-semibold">+351 931 615 221</p>
                            </div>

                            <div class="grid grid-cols-2 items-center justify-around w-full">
                                <div class="bg-primary bg-opacity-70 flex items-center justify-center h-16 w-16 rounded-full">
                                    <i class="ph-fill ph-envelope text-3xl text-white"></i>
                                </div>

                                <p class="font-semibold">hi@asydim.pt</p>
                            </div>

                            <div class="grid grid-cols-2 items-center justify-around w-full">
                                <div class="bg-primary bg-opacity-70 flex items-center justify-center h-16 w-16 rounded-full">
                                    <i class="ph-fill ph-map-pin text-3xl text-white"></i>
                                </div>

                                <p class="font-semibold">R. da Paz 485, Canidelo</p>
                            </div>
                        </div>
                    </div>
                </div>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3005.105960876792!2d-8.644887723980663!3d41.13221277133329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246541499fa7ad%3A0x5a13f372cbd19592!2sR.%20da%20Paz%20485%2C%20Canidelo!5e0!3m2!1sen!2spt!4v1714296585119!5m2!1sen!2spt" width="600" height="450" style="border:0;" allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </body>
</html>
