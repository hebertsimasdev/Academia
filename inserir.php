<?php
require 'conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$plano = $_POST['plano'];

$sql = $pdo->prepare("INSERT INTO membros (nome, email, telefone, plano) VALUES (:nome, :email, :telefone, :plano)");
$sql->bindValue(':nome', $nome);
$sql->bindValue(':email', $email);
$sql->bindValue(':telefone', $telefone);
$sql->bindValue(':plano', $plano);
$sql->execute();

header(header: "Location: cadastro_aluno.php"); // Redireciona para a página principal
?>
