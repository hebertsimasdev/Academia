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
    nome_exercicio VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela para armazenar os treinos (relacionamento entre alunos e exercícios)
CREATE TABLE treino (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_aluno INT NOT NULL,
    id_exercicio INT NOT NULL,
    serie INT NOT NULL,
    repeticao INT NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_aluno) REFERENCES membros(id),
    FOREIGN KEY (id_exercicio) REFERENCES exercicios(id)
);

-- Inserir os exercícios no banco de dados
INSERT INTO exercicios (nome_exercicio) VALUES
('Barra Fixa/Paralelas'),
('Peck Deck (Voador)'),
('Puxador (Pulley)'),
('Desenvolvimento de Ombro'),
('Cross Over'),
('Remada Sentada'),
('Polia'),
('Power Racks'),
('Prancha Abdominal'),
('Aparelho de Glúteo'),
('Cadeira Abdutora'),
('Cadeira Adutora'),
('Cadeira Extensora'),
('Cadeira Flexora'),
('Leg Press'),
('Hack para Agachamento'),
('Barra Guiada (Smith)'),
('Elevação Pélvica'),
('Panturrilha Sentada'),
('Bicicleta Ergométrica'),
('Esteira'),
('Elíptico'),
('Remo Indoor'),
('Simulador de Escada'),
('Kettlebell'),
('Mini Jump Profissional'),
('Step');
