<?php
include "../../includes/config.inc.php";
include "../../includes/db.inc.php";

@session_start();

if (!isset($_SESSION["user"])) {
	header("location: ../login.php");
}

$user = $_SESSION["user"];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gray-100 p-0 m-0 min-h-screen min-w-screen">
    <?php include "../components/header.php"; ?>
    <div class="flex flex-col w-full mt-32 px-8 md:px-32 items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 md:p-12 w-full max-w-4xl">
            <h2 class="text-2xl font-semibold text-center text-primary mb-6">Editar Perfil</h2>
            <form action="../includes/account/update.php" method="POST" class="w-full grid md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                    <input type="text" placeholder="Nome" name="name" id="name"
                        class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        value="<?php echo $user["name"]; ?>" required />
                </div>
                <div class="md:col-span-2">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <input type="email" placeholder="E-mail" name="email" id="email"
                        class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        value="<?php echo $user["email"]; ?>" required />
                </div>
                <div class="md:col-span-2">
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Telemóvel</label>
                    <input type="tel" placeholder="Telemóvel" name="phone" id="phone" pattern="[2|9][0-9]{8}"
                        class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        value="<?php echo $user["phone"]; ?>" />
                </div>

                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Foto de Perfil</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" />
                    <div class="mt-4">
                        <img id="image-preview" class="w-full max-h-96 object-cover" style="display: none;">
                    </div>
                    <input type="hidden" name="cropped_image" id="cropped_image">
                </div>
                <div class="md:col-span-2 flex justify-center">
                    <button type="button" id="crop-button"
                        class="mt-6 bg-secondary text-white font-semibold cursor-pointer px-6 py-3 rounded-lg transition ease-in-out hover:bg-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50"
                        style="display: none;">Recortar Imagem</button>
                    <input type="submit" value="Editar" name="btnCreate" id="btnCreate"
                        class="mt-6 bg-primary text-white font-semibold cursor-pointer px-6 py-3 rounded-lg transition ease-in-out hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-opacity-50" />
                </div>
            </form>
        </div>
    </div>
</body>
<script>
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            const imgElement = document.getElementById('image-preview');
            imgElement.src = event.target.result;
            imgElement.style.display = 'block';

            // Initialize cropper
            const cropper = new Cropper(imgElement, {
                aspectRatio: 1,
                viewMode: 1,
                minContainerWidth: 300,
                minContainerHeight: 300,
            });

            document.getElementById('crop-button').style.display = 'inline-block';
            document.getElementById('crop-button').addEventListener('click', function() {
                const canvas = cropper.getCroppedCanvas();
                canvas.toBlob(function(blob) {
                    const url = URL.createObjectURL(blob);
                    const reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        const base64data = reader.result;
                        document.getElementById('cropped_image').value = base64data;
                        cropper.destroy();
                        imgElement.src = base64data;
                        document.getElementById('crop-button').style.display =
                            'none';
                    };
                });
            });
        };
        reader.readAsDataURL(file);
    }
});
</script>

</html>