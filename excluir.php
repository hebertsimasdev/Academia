<?php
require 'conexao.php'; // Conexão com o banco de dados

// Verifica se o ID do membro foi passado na URL e se é um número válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a consulta para buscar os dados do membro com base no ID
    $sql = $pdo->prepare("SELECT * FROM membros WHERE id = :id");
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    // Se o membro não for encontrado, redireciona para a página principal
    if ($sql->rowCount() == 0) {
        header("Location: cadastro_aluno.php");
        exit;
    }

    // Armazena os dados do membro
    $membro = $sql->fetch(PDO::FETCH_ASSOC);
} else {
    // Se o ID não for passado ou não for um número válido, redireciona para a página principal
    header("Location: cadastro_aluno.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Membro</title>
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
        button {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c0392b;
        }
        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Excluir Membro</h1>
    <p>Tem certeza que deseja excluir o membro abaixo?</p>
    <div class="form-container">
        <form action="confirmar_exclusao.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($membro['id']); ?>">
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($membro['nome']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($membro['email']); ?></p>
            <button type="submit">Excluir</button>
        </form>
        <br>
        <a href="cadastro_aluno.php">Cancelar</a>
    </div>
</body>
</html>
