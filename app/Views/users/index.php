<div class="cabecalho-pagina">
    <h1><?= e($title) ?></h1>
    <div class="acoes">
        <a class="btn btn-sec" href="<?= e(url('user')) ?>">Voltar</a>
        <a class="btn" href="<?= e(url('user/create')) ?>">+ Novo usuário</a>
    </div>
</div>

<?php if (!$users): ?>
    <p>Nenhum usuário cadastrado.</p>
<?php else: ?>
    <div class="tabela-container">
    <table class="tabela">
        <thead>
            <tr>
                <th>Nome completo</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= e($u['name'] . ' ' . $u['last_name']) ?></td>
                    <td><?= e($u['email']) ?></td>
                    <td><?= e(format_cpf($u['cpf'])) ?></td>
                    <td><?= e(format_date($u['birth_date'])) ?></td>
                    <td class="acoes">
                        <a class="btn btn-sec" href="<?= e(url('user/show/' . (int) $u['id'])) ?>">Ver</a>
                        <a class="btn" href="<?= e(url('user/edit/' . (int) $u['id'])) ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
<?php endif; ?>
