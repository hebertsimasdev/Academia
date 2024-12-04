<?php 
    require 'conexao.php'; // chama arquivo que cria a 
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];

    $sql = $pdo->prepare("DELETE from aluno WHERE cpf = :cpf");
    $sql->bindValue(':cpf',$cpf);
   
    $sql->execute();
    
header("Location:index.php");

?>