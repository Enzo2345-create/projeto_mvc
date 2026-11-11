
<h1 class="titulo-bloco"><?= e($title) ?></h1>

<div class="user-details card card-body p-4 mb-3">
    <div class="avatar-prisma mb-3" aria-hidden="true"><?= e(mb_strtoupper(mb_substr((string) $user['name'], 0, 1))) ?></div>
    <p><strong>ID:</strong> <?= e($user['id']) ?></p>

    <p><strong>Nome:</strong> <?= e($user['name']) ?></p>

    <p><strong>E-mail:</strong> <?= e($user['email']) ?></p>
</div>

<p>
    <a href="<?= e(url('user/index')) ?>" class="btn btn-outline-prisma">Voltar para a lista de usuários</a>
</p>
