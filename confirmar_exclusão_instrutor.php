<?php
require 'conexao.php'; // Conexão com o banco de dados

// Verifica se o ID foi passado pelo formulário
if (isset($_POST['id_instrutor']) && is_numeric($_POST['id'])) {
    $id_instrutor = $_POST['id_instrutor'];

    // Prepara o SQL para excluir o membro do banco de dados
    $sql = $pdo->prepare("DELETE FROM instrutor WHERE id_instrutor = :id_instrutor");
    $sql->bindValue(':id_instrutor', $id_instrutor, PDO::PARAM_INT);

    // Executa a exclusão
    if ($sql->execute()) {
        // Se a exclusão for bem-sucedida, redireciona para a página principal
        header("Location: cadastro_instrutor.php");
        exit;
    } else {
        // Se ocorrer algum erro ao excluir
        echo "Erro ao excluir o instrutor. Tente novamente.";
    }
} else {
    // Se o ID não for passado ou não for válido, redireciona para a página principal
    header("Location: cadastro_instrutor.php");
    exit;
}
?>
