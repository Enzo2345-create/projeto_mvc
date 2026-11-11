<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Raízes: fórum educativo sobre diversidade étnico-racial.">
    <title><?= e($title ?? 'Raízes') ?></title>
    <link rel="icon" type="image/svg+xml" href="<?= asset('assets/favicon.svg') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/bootstrap-icons.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/estilo.css') ?>">
</head>
<body<?= !empty($homePage) ? ' data-bs-spy="scroll" data-bs-target="#menuPrincipal" data-bs-offset="100" tabindex="0"' : '' ?>>
<?= $content ?>
<script src="<?= asset('js/bootstrap.bundle.min.js') ?>" defer></script>
<script src="<?= asset('js/app.js') ?>" defer></script>
<?php if (!empty($pageScript)): ?>
<script src="<?= asset($pageScript) ?>" defer></script>
<?php endif; ?>
</body>
</html>
