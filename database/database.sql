CREATE DATABASE IF NOT EXISTS nexos;
USE nexos;

CREATE TABLE Pessoa (
    id_pessoa INT PRIMARY KEY AUTO_INCREMENT,
    nome_pessoa VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    dt_nasc DATE NOT NULL
);

CREATE TABLE Usuario (
    id_pessoa INT PRIMARY KEY,
    foto_de_perfil VARCHAR(255),
    CONSTRAINT fk_usuario_pessoa 
        FOREIGN KEY (id_pessoa) REFERENCES Pessoa(id_pessoa)
        ON DELETE CASCADE
);

CREATE TABLE Administrador (
    id_pessoa INT PRIMARY KEY,
    cargo VARCHAR(100) NOT NULL,
    salario DECIMAL(10, 2) NOT NULL,
    CONSTRAINT fk_admin_pessoa 
        FOREIGN KEY (id_pessoa) REFERENCES Pessoa(id_pessoa)
        ON DELETE CASCADE
);

CREATE TABLE Resenha (
    id_resenha INT PRIMARY KEY AUTO_INCREMENT,
    autor VARCHAR(150) NOT NULL,
    data_post DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    avaliacao INT NOT NULL,
    id_usuario INT NOT NULL,
    CONSTRAINT fk_resenha_usuario 
        FOREIGN KEY (id_usuario) REFERENCES Usuario(id_pessoa)
        ON DELETE CASCADE
);

CREATE TABLE Discussao (
    id_discussao INT PRIMARY KEY AUTO_INCREMENT,
    assunto VARCHAR(100) NOT NULL,
    titulo VARCHAR(200) NOT NULL,
    integrantes INT DEFAULT 0,
    descricao TEXT,
    data_criacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_admin_criador INT NOT NULL,
    id_admin_moderador INT NOT NULL,
    CONSTRAINT fk_discussao_criador 
        FOREIGN KEY (id_admin_criador) REFERENCES Administrador(id_pessoa),
    CONSTRAINT fk_discussao_moderador 
        FOREIGN KEY (id_admin_moderador) REFERENCES Administrador(id_pessoa)
);

CREATE TABLE Participa (
    id_usuario INT NOT NULL,
    id_discussao INT NOT NULL,
    PRIMARY KEY (id_usuario, id_discussao),
    CONSTRAINT fk_participa_usuario 
        FOREIGN KEY (id_usuario) REFERENCES Usuario(id_pessoa)
        ON DELETE CASCADE,
    CONSTRAINT fk_participa_discussao 
        FOREIGN KEY (id_discussao) REFERENCES Discussao(id_discussao)
        ON DELETE CASCADE
);