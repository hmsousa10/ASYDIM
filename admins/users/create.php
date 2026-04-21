<?php
include '../../includes/config.inc.php';
include '../../includes/db.inc.php';

include $arrConfig['dir_site'] . '/admins/adminverification.php';

$roles = my_query("SELECT * FROM roles WHERE slug <> 'root'");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASYDIM Admin — Novo Utilizador</title>
</head>
<body>
<?php include '../components/header.php'; ?>
<script>document.getElementById('adm-page-title').textContent = 'Novo Utilizador';</script>

<div class="adm-page-header">
    <div>
        <h1>Novo Utilizador</h1>
        <p style="color:var(--text-muted);margin:4px 0 0;font-size:0.9rem;">A password temporária será enviada por e-mail.</p>
    </div>
    <a href="index.php" class="btn-outline"><i class="ph ph-arrow-left"></i> Voltar</a>
</div>

<div class="adm-form-card">
    <form action="../includes/users/create.php" method="POST">
        <div class="form-grid form-grid-2">
            <div class="form-group">
                <label class="form-label" for="name">Nome Completo</label>
                <input class="form-input" type="text" name="name" id="name" placeholder="Ex: João Silva" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="role">Cargo</label>
                <select class="form-select" name="role" id="role" required>
                    <?php foreach ($roles as $r): ?>
                        <option value="<?php echo $r['id']; ?>"><?php echo htmlspecialchars($r['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">E-mail</label>
                <input class="form-input" type="email" name="email" id="email" placeholder="email@exemplo.com" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="phone">Telemóvel</label>
                <input class="form-input" type="tel" name="phone" id="phone" placeholder="9XXXXXXXX" pattern="[2|9][0-9]{8}">
            </div>
        </div>
        <input type="submit" value="Criar Utilizador" class="form-submit" style="margin-top:24px;">
    </form>
</div>

    </div>
</div>
</body>
</html>