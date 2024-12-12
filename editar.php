<?php
require 'conexao.php';

$id = $_GET['id'];
$sql = $pdo->prepare("SELECT * FROM membros WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();
$membro = $sql->fetch(PDO::FETCH_ASSOC);

if (!$membro) {
    header("Location: cadastro_aluno.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Membro</title>
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
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
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
    </style>
</head>
<body>
    <h1>Editar Membro</h1>
    <form action="atualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $membro['id']; ?>">
        <input type="text" name="nome" value="<?php echo $membro['nome']; ?>" required><br>
        <input type="email" name="email" value="<?php echo $membro['email']; ?>" required><br>
        <input type="text" name="telefone" value="<?php echo $membro['telefone']; ?>"><br>
        <input type="text" name="plano" value="<?php echo $membro['plano']; ?>"><br>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html
