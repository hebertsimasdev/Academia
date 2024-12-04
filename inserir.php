<?php 
    require 'conexao.php'; // chama arquivo que cria a conexão
    $nome = $_POST['nome'];
    //$nome = filter_input(INPUT_POST, 'nome');
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];
    $sql = $pdo->prepare("INSERT INTO aluno (nome, email, telefone, endereco, cpf) VALUES (:nome, :email, :telefone, :endereco, :cpf)");
    $sql->bindValue(':nome',$nome);
    $sql->bindValue(':email',$email);
    $sql->bindValue(':telefone',$telefone);
    $sql->bindValue(':endereco',$endereco);
    $sql->bindValue(':cpf',$cpf);
    // escrevendo na tabela
    $sql->execute();    
header("Location:index.php");
?>