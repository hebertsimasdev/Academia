CREATE DATABASE academia;

USE academia;

-- Tabela para armazenar membros (alunos)
CREATE TABLE membros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(15),
    plano VARCHAR(50),
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
create table instrutor(
    id_instrutor INT AUTO_INCREMENT PRIMARY KEY,
    nome_instrutor VARCHAR(100) NOT NULL,
    email_instrutor VARCHAR(100) NOT NULL,
    telefone_instrutor VARCHAR(15),
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- Tabela para usuários (administradores, instrutores, alunos)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    perfil ENUM('Administrador', 'Instrutor', 'Aluno') DEFAULT 'Aluno',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir um usuário administrador inicial
INSERT INTO usuarios (nome_usuario, senha, perfil)
VALUES ('admTeste', 'teste123', 'Administrador');

INSERT INTO usuarios (nome_usuario, senha, perfil)
VALUES ('aluno', 'aluno123', 'Aluno');

-- Tabela para armazenar os exercícios
CREATE TABLE exercicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_exercicio VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE treinos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aluno_id INT NOT NULL,
    descricao TEXT NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (aluno_id) REFERENCES membros(id) ON DELETE CASCADE
);