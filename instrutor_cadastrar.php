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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: DarkSeaGreen;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Para centralizar verticalmente */
            margin: 0; /* Remove a margem padrão do body */
        }

        .container {
            max-width: 800px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            color: white;
        }

        .table {
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .table th {
            background-color: #778899;
            color: white;
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

        .form-container {
            display: flex;
            flex-direction: column;
            gap: 10px; /* Espaçamento entre os campos */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Cadastro de Instrutor</h1>
        <form action="inserir_instrutor.php" method="POST">
            <div class="form-container">
                <input type="text" name="nome_instrutor" id="nome_instrutor" class="form-control" placeholder="Nome" required>
                <input type="email" name="email_instrutor" id="email_instrutor" class="form-control" placeholder="Email" required>
                <input type="text" name="telefone_instrutor" id="telefone_instrutor" class="form-control" placeholder="Telefone">
                <div class="col-md-3">

            </div>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>