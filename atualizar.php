<?php
require 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$plano = $_POST['plano'];

$sql = $pdo->prepare("UPDATE membros SET nome = :nome, email = :email, telefone = :telefone, plano = :plano WHERE id = :id");
$sql->bindValue(':id', $id);
$sql->bindValue(':nome', $nome);
$sql->bindValue(':email', $email);
$sql->bindValue(':telefone', $telefone);
$sql->bindValue(':plano', $plano);
$sql->execute();

header("Location: cadastro_aluno.php");
?>
