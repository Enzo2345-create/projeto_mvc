<main class="container py-5" style="min-height: 75vh">
    <div class="forum-card p-4 p-md-5 mx-auto" style="max-width: 480px">
        <span class="kicker">Comunidade Raízes</span>
        <h1 class="section-title mb-4">Entrar</h1>
        <?php if ($error): ?><div class="alert alert-danger" role="alert"><?= e($error) ?></div><?php endif; ?>
        <form method="post" action="<?= url('auth/login') ?>">
            <input type="hidden" name="csrf" value="<?= e($csrf) ?>">
            <div class="mb-3">
                <label class="form-label fw-semibold" for="email">E-mail</label>
                <input class="form-control" type="email" id="email" name="email" maxlength="150" autocomplete="email" value="<?= e($email) ?>" required autofocus>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold" for="password">Senha</label>
                <input class="form-control" type="password" id="password" name="password" autocomplete="current-password" required>
            </div>
            <button class="btn btn-raizes w-100" type="submit">Entrar</button>
        </form>
        <p class="mt-3 mb-0">Ainda não tem conta? <a href="<?= url('auth/register') ?>">Cadastre-se</a>.</p>
        <a class="d-inline-block mt-3" href="<?= url('home/index') ?>">Voltar ao início</a>
    </div>
</main>
