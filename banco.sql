CREATE DATABASE academia;

USE academia;

CREATE TABLE membros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(15),
    plano VARCHAR(50),
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
    
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    perfil ENUM('Administrador', 'Instrutor', 'Aluno') DEFAULT 'Aluno',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
    
insert into usuarios(nome_usuario, senha, perfil)
values('admTeste', 'teste123', 'Administrador');