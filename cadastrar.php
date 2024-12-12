<?php
// Incluir a conexão com o banco de dados
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Membro - Academia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            padding: 30px;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Membro</h1>
    <form action="inserir.php" method="POST">
        <div class="form-container">
            <input type="text" name="nome" id="nome" placeholder="Nome" required><br>
            <input type="email" name="email" id="email" placeholder="Email" required><br>
            <input type="text" name="telefone" id="telefone" placeholder="Telefone"><br>
            <input type="text" name="plano" id="plano" placeholder="Plano (ex: mensal, semestral)"><br>
            <button type="submit">Salvar</button>
        </div>
    </form>
</body>
</html>
