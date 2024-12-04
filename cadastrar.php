<?php 
//require 'conexao.php'
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Aluno</title>
 
</head>
<body>
    <h1>Cadastro </h1>
    <form action="inserir.php" method="post">
            <div>
            <input type="text" name="nome" id="nome" placeholder="Nome" required><br><br>
            <input type="email" name="email" id="email" placeholder="Email" required><br><br>
            <input type="text" name="telefone" id="telefone" placeholder="Telefone" required><br><br>
            <input type="text" name="endereco" id="endereco" placeholder="Endereco" required><br><br>
            <input type="text" name="cpf" id="cpf" placeholder="CPF" required><br><br>


            <button type="submit">Salvar</button>
            </div>   
    </form>

</body>
</html>