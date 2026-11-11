<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title ?? 'Projeto MVC') ?></title>
    <link rel="icon" href="<?= asset('img/logo.png') ?>">
    <!-- Bootstrap 5 e fontes do Prisma (acrescentados) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap">
    <link rel="stylesheet" href="<?= asset('css/estilo.css') ?>">
</head>
<body class="prisma">
<?php
// Marca o item ativo do menu conforme a rota atual
$rotaAtual = trim((string) ($_GET['url'] ?? ''), '/');
$rotaAtual = $rotaAtual === '' ? 'user/index' : $rotaAtual;
$emRota = static function (array $rotas) use ($rotaAtual): bool {
    foreach ($rotas as $r) {
        if ($rotaAtual === $r || strpos($rotaAtual, $r . '/') === 0) {
            return true;
        }
    }
    return false;
};
$ativoLista = $emRota(['user', 'user/index', 'user/show']);
$ativoNovo = $emRota(['user/create', 'user/store']);
?>
<!-- Barra superior (somente em telas pequenas) -->
<nav class="navbar navbar-dark sticky-top d-lg-none topbar-mobile">
    <div class="container-fluid">
        <span class="marca-mobile">PROJETO MVC</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#menuLateral" aria-controls="menuLateral" aria-label="Abrir menu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<header class="topo sidebar offcanvas-lg offcanvas-start" id="menuLateral" tabindex="-1" aria-label="Menu principal">
    <div class="offcanvas-header d-lg-none">
        <span class="marca-mobile">MENU</span>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                data-bs-target="#menuLateral" aria-label="Fechar"></button>
    </div>
    <img src="<?= asset('img/logo.png') ?>" alt="Logo do projeto" width="40" height="40">
    <span class="marca"><small>Interface Bootstrap</small><strong>PROJETO MVC</strong></span>
    <nav class="nav flex-column gap-1">
        <a class="nav-link<?= $ativoLista ? ' active' : '' ?>"<?= $ativoLista ? ' aria-current="page"' : '' ?> href="<?= url('user/index') ?>">Usuários</a>
        <a class="nav-link<?= $ativoNovo ? ' active' : '' ?>"<?= $ativoNovo ? ' aria-current="page"' : '' ?> href="<?= url('user/create') ?>">Novo usuário</a>
    </nav>
</header>
<main class="conteudo"><?= $content ?></main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
<script src="<?= asset('js/app.js') ?>" defer></script>
</body>
</html>
