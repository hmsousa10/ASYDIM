<?php
include '../../includes/config.inc.php';
include '../../includes/db.inc.php';

include $arrConfig['dir_site'] . '/admins/adminverification.php';

$categories = my_query("SELECT * FROM formation_categories");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM Admin — Nova Formação</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" crossorigin="anonymous">
</head>
<body>
<?php include '../components/header.php'; ?>
<script>document.getElementById('adm-page-title').textContent = 'Nova Formação';</script>

<div class="adm-page-header">
    <div>
        <h1>Nova Formação</h1>
        <p style="color:var(--text-muted);margin:4px 0 0;font-size:0.9rem;">Preencha os campos abaixo para criar a formação.</p>
    </div>
    <a href="index.php" class="btn-outline"><i class="ph ph-arrow-left"></i> Voltar</a>
</div>

<form id="formationForm" action="../includes/formations/create.php" method="POST" enctype="multipart/form-data">
<div class="adm-form-card">
    <div class="form-grid form-grid-3">
        <div class="form-group form-full">
            <label class="form-label" for="name">Nome da Formação</label>
            <input class="form-input" type="text" name="name" id="name" placeholder="Ex: Instalação de Painéis Solares" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="slug">Abreviatura</label>
            <input class="form-input" type="text" name="slug" id="slug" placeholder="Ex: IPS-2024" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="duration">Duração (horas)</label>
            <input class="form-input" type="number" min="1" name="duration" id="duration" placeholder="Ex: 40" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="unit_price">Preço (€)</label>
            <input class="form-input" type="number" min="0" step="0.01" name="unit_price" id="unit_price" placeholder="0.00" required>
        </div>
        <div class="form-group form-full">
            <label class="form-label" for="description">Descrição</label>
            <textarea class="form-textarea" name="description" id="description" rows="5" placeholder="Descreva o conteúdo e os objetivos da formação..." required></textarea>
        </div>
        <div class="form-group">
            <label class="form-label" for="beginning_date">Data de Início</label>
            <input class="form-input" type="date" name="beginning_date" id="beginning_date" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="ending_date">Data de Fim <span style="color:var(--text-muted);font-weight:400;">(opcional)</span></label>
            <input class="form-input" type="date" name="ending_date" id="ending_date">
        </div>
        <div class="form-group">
            <label class="form-label" for="category">Categoria</label>
            <select class="form-select" name="category" id="category">
                <?php foreach ($categories as $cat): ?>
                    <option value="<?php echo htmlspecialchars($cat['slug']); ?>"><?php echo htmlspecialchars($cat['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group form-full">
            <label class="form-label" for="image">Imagem da Formação</label>
            <input class="form-input" type="file" name="image" id="image" accept="image/jpeg,image/png,image/webp" required style="cursor:pointer;">
            <p style="font-size:0.8rem;color:var(--text-muted);margin:4px 0 0;">PNG, JPG ou WebP · Máx. 5 MB</p>
        </div>
    </div>

    <input type="hidden" name="croppedImage" id="croppedImage">
    <input type="submit" value="Criar Formação" class="form-submit" style="margin-top:24px;">
</div>
</form>

<!-- Cropper Modal -->
<div id="cropperModal" class="adm-modal-backdrop">
    <div class="adm-modal" style="max-width:540px;">
        <h3><i class="ph ph-crop" style="vertical-align:middle;margin-right:8px;"></i> Recortar Imagem</h3>
        <div style="width:100%;height:340px;background:var(--bg);border-radius:var(--radius);overflow:hidden;">
            <img id="imagePreview" style="max-width:100%;display:block;">
        </div>
        <div class="modal-footer">
            <button id="cancelCropButton" class="btn-outline">Cancelar</button>
            <button id="cropButton" class="btn-primary"><i class="ph ph-check"></i> Confirmar</button>
        </div>
    </div>
</div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js" crossorigin="anonymous"></script>
<script>
const imageInput     = document.getElementById('image');
const imagePreview   = document.getElementById('imagePreview');
const cropperModal   = document.getElementById('cropperModal');
const cropButton     = document.getElementById('cropButton');
const cancelCrop     = document.getElementById('cancelCropButton');
const croppedInput   = document.getElementById('croppedImage');
let cropper;

imageInput.addEventListener('change', e => {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = ev => {
        imagePreview.src = ev.target.result;
        cropperModal.classList.add('open');
        cropper = new Cropper(imagePreview, { aspectRatio: 16/9, viewMode: 1, autoCropArea: 0.9 });
    };
    reader.readAsDataURL(file);
});

cropButton.addEventListener('click', () => {
    cropper.getCroppedCanvas().toBlob(blob => {
        const reader = new FileReader();
        reader.onload = ev => {
            croppedInput.value = ev.target.result;
            cropperModal.classList.remove('open');
            cropper.destroy();
        };
        reader.readAsDataURL(blob);
    });
});

cancelCrop.addEventListener('click', () => {
    cropperModal.classList.remove('open');
    imageInput.value = '';
    cropper.destroy();
});
</script>
</body>
</html>