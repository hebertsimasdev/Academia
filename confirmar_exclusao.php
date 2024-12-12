<?php
require 'conexao.php'; // Conexão com o banco de dados

// Verifica se o ID foi passado pelo formulário
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];

    // Prepara o SQL para excluir o membro do banco de dados
    $sql = $pdo->prepare("DELETE FROM membros WHERE id = :id");
    $sql->bindValue(':id', $id, PDO::PARAM_INT);

    // Executa a exclusão
    if ($sql->execute()) {
        // Se a exclusão for bem-sucedida, redireciona para a página principal
        header("Location: cadastro_aluno.php");
        exit;
    } else {
        // Se ocorrer algum erro ao excluir
        echo "Erro ao excluir o membro. Tente novamente.";
    }
} else {
    // Se o ID não for passado ou não for válido, redireciona para a página principal
    header("Location: cadastro_aluno.php");
    exit;
}
?>
