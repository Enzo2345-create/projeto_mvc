CREATE DATABASE meu_mvc CHARACTER SET utf8mb4;
USE meu_mvc;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    cpf CHAR(11) NOT NULL UNIQUE,
    birth_date DATE NOT NULL
);

-- Dados iniciais de exemplo com CPFs válidos.
INSERT INTO users (name, last_name, email, cpf, birth_date) VALUES
('Ana', 'Silva', 'ana@exemplo.com', '52998224725', '2008-03-15'),
('Bruno', 'Souza', 'bruno@exemplo.com', '11144477735', '2007-01-10');
