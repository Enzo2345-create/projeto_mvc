<h1 class="titulo-bloco"><?= e($title) ?></h1>
<p class="subtitulo-bloco">Preencha os dados abaixo para cadastrar.</p>
<form method="post" action="<?= url('user/store') ?>" data-validate class="form-prisma card card-body p-4">
    <input type="hidden" name="csrf" value="<?= e($csrf) ?>">
    <label class="form-label">Nome
        <input name="name" maxlength="100" class="form-control<?= isset($errors['name']) ? ' is-invalid' : '' ?>" value="<?= e($old['name'] ?? '') ?>">
    </label>
    <?php if (isset($errors['name'])): ?>
        <p class="erro small"><?= e($errors['name']) ?></p>
    <?php endif; ?>
    <label class="form-label">E-mail
        <input name="email" maxlength="150" class="form-control<?= isset($errors['email']) ? ' is-invalid' : '' ?>" value="<?= e($old['email'] ?? '') ?>">
    </label>
    <?php if (isset($errors['email'])): ?>
        <p class="erro small"><?= e($errors['email']) ?></p>
    <?php endif; ?>
    <div>
        <button type="submit" class="btn btn-prisma">Salvar</button>
        <a href="<?= url('user/index') ?>" class="btn btn-outline-prisma ms-2 mt-3">Cancelar</a>
    </div>
</form>
