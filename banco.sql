CREATE DATABASE academia;

USE academia;

-- Tabela para armazenar membros (alunos)
CREATE TABLE membros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL, -- Garantir email único
    telefone VARCHAR(15),
    plano VARCHAR(50),
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

-- Tabela para armazenar os exercícios
CREATE TABLE exercicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_exercicio VARCHAR(100) NOT NULL, -- Ajustado para 100, mais adequado
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela para armazenar os treinos, com relação ao aluno
CREATE TABLE treinos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aluno_id INT NOT NULL,
    descricao TEXT NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (aluno_id) REFERENCES membros(id) ON DELETE CASCADE
);

-- Tabela para armazenar os treinos e seus exercícios (muitos-para-muitos)
CREATE TABLE treino_exercicio (
    treino_id INT NOT NULL,
    exercicio_id INT NOT NULL,
    serie INT NOT NULL,
    repeticao INT NOT NULL,
    PRIMARY KEY (treino_id, exercicio_id),
    FOREIGN KEY (treino_id) REFERENCES treinos(id) ON DELETE CASCADE,
    FOREIGN KEY (exercicio_id) REFERENCES exercicios(id) ON DELETE CASCADE
);
