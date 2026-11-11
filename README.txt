Projeto MVC em PHP conforme a apostila.

1. Copie a pasta para htdocs/projeto_mvc (XAMPP).
2. Importe database.sql no MySQL/phpMyAdmin.
3. Confira config/database.php e ajuste usuário/senha do MySQL.
4. Ative mod_rewrite e permita o uso de .htaccess no Apache.
5. Acesse http://localhost/projeto_mvc/

Rotas:
- /user/index: lista usuários
- /user/show/3: mostra usuário pelo ID
- /user/create: formulário
- /user/store: recebe POST

Para usar o servidor embutido:
php -S localhost:8000 -t public public/router.php
e acesse http://localhost:8000/user/index

Observação: config/database.php está incluído para facilitar o teste local; não o versione.
