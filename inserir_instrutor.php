<?php
require 'conexao.php';

$nome_instrutor = $_POST['nome_instrutor'];
$email_instrutor = $_POST['email_instrutor'];
$telefone_instrutor = $_POST['telefone_instrutor'];

$sql = $pdo->prepare("INSERT INTO instrutor (nome_instrutor, email_instrutor, telefone_instrutor) VALUES (:nome_instrutor, :email_instrutor, :telefone_instrutor)");
$sql->bindValue(':nome_instrutor', $nome_instrutor);
$sql->bindValue(':email_instrutor', $email_instrutor);
$sql->bindValue(':telefone_instrutor', $telefone_instrutor);
$sql->execute();

header(header: "Location: instrutor_cadastro.php"); // Redireciona para a página principal
?>
