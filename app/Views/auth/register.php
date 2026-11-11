<main class="container py-5" style="min-height: 75vh">
    <div class="forum-card p-4 p-md-5 mx-auto" style="max-width: 560px">
        <span class="kicker">Comunidade Raízes</span>
        <h1 class="section-title mb-4">Criar conta</h1>
        <?php if (isset($errors['duplicate'])): ?><div class="alert alert-danger" role="alert"><?= e($errors['duplicate']) ?></div><?php endif; ?>
        <form method="post" action="<?= url('auth/register') ?>">
            <input type="hidden" name="csrf" value="<?= e($csrf) ?>">
            <div class="mb-3">
                <label class="form-label fw-semibold" for="name">Nome completo</label>
                <input class="form-control" type="text" id="name" name="name" maxlength="150" autocomplete="name" value="<?= e($old['name']) ?>" required>
                <?php if (isset($errors['name'])): ?><div class="text-danger small mt-1"><?= e($errors['name']) ?></div><?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold" for="email">E-mail</label>
                <input class="form-control" type="email" id="email" name="email" maxlength="150" autocomplete="email" value="<?= e($old['email']) ?>" required>
                <?php if (isset($errors['email'])): ?><div class="text-danger small mt-1"><?= e($errors['email']) ?></div><?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold" for="cpf">CPF</label>
                <input class="form-control" type="text" id="cpf" name="cpf" inputmode="numeric" maxlength="14" placeholder="000.000.000-00" value="<?= e($old['cpf']) ?>" required>
                <?php if (isset($errors['cpf'])): ?><div class="text-danger small mt-1"><?= e($errors['cpf']) ?></div><?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold" for="birth_date">Data de nascimento</label>
                <input class="form-control" type="date" id="birth_date" name="birth_date" autocomplete="bday" value="<?= e($old['birth_date']) ?>" required>
                <?php if (isset($errors['birth_date'])): ?><div class="text-danger small mt-1"><?= e($errors['birth_date']) ?></div><?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold" for="password">Senha</label>
                <input class="form-control" type="password" id="password" name="password" minlength="8" autocomplete="new-password" required>
                <?php if (isset($errors['password'])): ?><div class="text-danger small mt-1"><?= e($errors['password']) ?></div><?php endif; ?>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold" for="password_confirmation">Confirme a senha</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" minlength="8" autocomplete="new-password" required>
                <?php if (isset($errors['password_confirmation'])): ?><div class="text-danger small mt-1"><?= e($errors['password_confirmation']) ?></div><?php endif; ?>
            </div>
            <button class="btn btn-raizes w-100" type="submit">Cadastrar e entrar</button>
        </form>
        <p class="mt-3 mb-0">Já tem conta? <a href="<?= url('auth/login') ?>">Entre aqui</a>.</p>
    </div>
</main>
