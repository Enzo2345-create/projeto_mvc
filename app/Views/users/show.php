
<h1><?= e($title) ?></h1>

<div class="user-details">
    <p><strong>ID:</strong> <?= e($user['id']) ?></p>

    <p><strong>Nome:</strong> <?= e($user['name']) ?></p>

    <p><strong>E-mail:</strong> <?= e($user['email']) ?></p>
</div>

<p>
    <a href="<?= e(url('user/index')) ?>">Voltar para a lista de usuários</a>
</p>
