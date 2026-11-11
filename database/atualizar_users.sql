USE meu_mvc;

-- Execute este arquivo apenas se a tabela users já existe com os dados da Parte 1.
-- Primeiro, adiciona as colunas aceitando NULL para preservar os registros existentes.
ALTER TABLE users
    ADD COLUMN last_name VARCHAR(100) NULL AFTER name,
    ADD COLUMN cpf CHAR(11) NULL AFTER email,
    ADD COLUMN birth_date DATE NULL AFTER cpf;

-- Preenche os dois usuários de exemplo que já existiam na Parte 1.
UPDATE users
SET last_name = 'Silva', cpf = '52998224725', birth_date = '2008-03-15'
WHERE email = 'ana@exemplo.com';

UPDATE users
SET last_name = 'Souza', cpf = '11144477735', birth_date = '2007-01-10'
WHERE email = 'bruno@exemplo.com';

-- Torna os campos obrigatórios e impede CPFs duplicados.
ALTER TABLE users
    MODIFY last_name VARCHAR(100) NOT NULL,
    MODIFY cpf CHAR(11) NOT NULL,
    MODIFY birth_date DATE NOT NULL,
    ADD UNIQUE KEY uq_users_cpf (cpf);

DESCRIBE users;
