<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        .hero-bg {
            background-image: url('assets/hero.jpg');
            background-size: cover;
            background-position: center;
            height: 80vh;
            display: flex;
			flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body class="p-0 m-0">
    <div class="hero-bg">
        <?php include "./components/header.php"; ?>
        <?php include "./components/banner.php"; ?>
    </div>

    <section class="w-screen h-auto flex flex-col items-center justify-center mt-32 mb-10">
        <h2 class="font-bold text-3xl w-1/3 text-center text-secondary">Aprende o que quiseres, quando quiseres, da forma que quiseres</h2>
        <p class="text-sm text-gray-500 mt-5">Aqui uma descrição do que se está a passar em baixo.</p>

        <div class="w-screen px-44 grid grid-cols-1 md:grid-cols-3 gap-5 mt-10">
            <?php for ($i = 0; $i < 6; $i++) { ?>
                <div class="bg-white border border-gray-100 shadow-lg items-center justify-start rounded w-full col-span-1 min-h-32 p-5 transition ease-in-out hover:-translate-y-1.5 hover:scale-105">
                    <i class="ph-thin ph-graduation-cap font-bold text-3xl"></i>
                    <div class="mt-5 space-y-2">
                        <p class="text-xl font-semibold">Aula de qualidade e cenas</p>
                        <div class="h-1 w-10 bg-primary rounded"></div>
                        <p class="">Hello world</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <section class="w-screen bg-gray-100 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold">Reshaping Energy</h2>
                <p class="text-gray-600 mt-4">Unlock the potential of efficiency and sustainability.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-4">What We Do</h3>
                    <p class="text-gray-700 mb-4">We have found a way to optimize the sustainability of organizations.</p>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <i class="ph-thin ph-monitor text-2xl text-primary"></i>
                            <div>
                                <h4 class="text-lg font-semibold">Monitoring</h4>
                                <p class="text-gray-600">Efficiently integrate data and equipment through SCADA, visualize the networks of all the subsystems combined and access historical and predictive data for informed decision-making.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="ph-thin ph-cogs text-2xl text-primary"></i>
                            <div>
                                <h4 class="text-lg font-semibold">Operation</h4>
                                <p class="text-gray-600">Obtain data from systems and equipment, efficiently manage incidents, carry out optimized energy production and troubleshoot distribution problems under various environmental conditions.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="ph-thin ph-rocket-launch text-2xl text-primary"></i>
                            <div>
                                <h4 class="text-lg font-semibold">Optimization</h4>
                                <p class="text-gray-600">Harness the power of AI for data correlation, pattern identification, network assessment and scenario proposal in production, distribution and consumption.</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="ph-thin ph-chart-bar text-2xl text-primary"></i>
                            <div>
                                <h4 class="text-lg font-semibold">Management</h4>
                                <p class="text-gray-600">Explore data, generate metrics and reports, and unleash the power of big data, AI, and machine learning to obtain valuable information and make assertive decisions.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-4">Benefits</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <i class="ph-thin ph-star text-2xl text-primary"></i>
                            <div>
                                <h4 class="text-lg font-semibold">Enhances organizational sustainability and promotes a greener future</h4>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="ph-thin ph-leaf text-2xl text-primary"></i>
                            <div>
                                <h4 class="text-lg font-semibold">Efficient and environmentally conscious solution to manage energy</h4>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="ph-thin ph-graph text-2xl text-primary"></i>
                            <div>
                                <h4 class="text-lg font-semibold">Cost reduction on organizations and minimization of carbon emissions</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer class="w-screen bg-gray-900 text-white py-10">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-4">ARMIS Group</h3>
                <ul>
                    <li>Information Technology</li>
                    <li>Intelligent Transport Systems</li>
                    <li>Digital Sport</li>
                    <li>Financial Technology</li>
                    <li>O2ONO</li>
                    <li>Energy</li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4">Company</h3>
                <ul>
                    <li>About ARMIS</li>
                    <li>Careers</li>
                    <li>Blog & News</li>
                    <li>Contact Us</li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4">Contact</h3>
                <ul>
                    <li>Porto: +351 220 123 456</li>
                    <li>Lisbon: +351 210 123 456</li>
                    <li>Sao Paulo: +55 11 1234 5678</li>
                    <li>Miami: +1 305 123 4567</li>
                    <li>Dubai: +971 4 123 4567</li>
                    <li>New York: +1 212 123 4567</li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>
