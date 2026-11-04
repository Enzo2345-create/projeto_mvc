<h1><?= e($title) ?></h1>
<?php if (!$users): ?>
    <p>Nenhum usuário cadastrado.</p>
<?php else: ?>
<ul class="lista">
<?php foreach ($users as $u): ?>
    <li>
        <a href="<?= url('user/show/' . (int) $u['id']) ?>"><?= e($u['name']) ?></a>
        (<?= e($u['name']) ?>)
        (<?= e($u['last_name']) ?>)
        (<?= e($u['email']) ?>)
        (<?= e($u['birth_date']) ?>)
        (<?= e($u['cpf']) ?>)
    </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
