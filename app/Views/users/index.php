<div class="secao-header">
    <h1 class="titulo-bloco"><?= e($title) ?></h1>
    <a href="<?= url('user/create') ?>" class="btn btn-prisma">Novo usuário</a>
</div>
<p class="subtitulo-bloco"><?= count($users) ?> cadastrado(s) no sistema</p>
<?php if (!$users): ?>
    <p class="alert alert-prisma">Nenhum usuário cadastrado.</p>
<?php else: ?>
<ul class="lista list-group">
<?php foreach ($users as $u): ?>
    <li class="list-group-item d-flex flex-wrap align-items-center gap-2">
        <a class="usuario-nome" href="<?= url('user/show/' . (int) $u['id']) ?>"><?= e($u['name']) ?></a>
        (<?= e($u['email']) ?>)
        <a href="<?= url('user/show/' . (int) $u['id']) ?>" class="btn btn-sm btn-outline-prisma ms-auto">Detalhes</a>
    </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
