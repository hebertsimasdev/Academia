<?php
// Incluir a conexão com o banco de dados
require 'conexao.php';

// Recuperar o ID do aluno via URL
$aluno_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Consultar o banco de dados para obter os dados do aluno e seus treinos
$sql = $pdo->prepare("
    SELECT membros.id, membros.nome, membros.email, membros.plano, exercicios.nome_exercicio, treinos.data_criacao
    FROM membros
    LEFT JOIN treinos ON membros.id = treinos.aluno_id
    LEFT JOIN exercicios ON treinos.nome_exercicio = exercicios.id
    WHERE membros.id = :aluno_id
");
$sql->bindParam(':aluno_id', $aluno_id, PDO::PARAM_INT);
$sql->execute();
$aluno = $sql->fetch(PDO::FETCH_ASSOC);

// Se o aluno não for encontrado
if (!$aluno) {
    echo "Aluno não encontrado.";
    exit;
}

// Consultar os treinos do aluno
$treinos_sql = $pdo->prepare("
    SELECT exercicios.nome_exercicio, treinos.data_criacao
    FROM treinos
    LEFT JOIN exercicios ON treinos.nome_exercicio = exercicios.id
    WHERE treinos.aluno_id = :aluno_id
");
$treinos_sql->bindParam(':aluno_id', $aluno_id, PDO::PARAM_INT);
$treinos_sql->execute();
$treinos = $treinos_sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treino do Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: DarkSeaGreen;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            color: white;
        }
        .table {
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        .table th {
            background-color: #778899;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Treino do Aluno: <?php echo $aluno['nome']; ?></h1>
        <p>Email: <?php echo $aluno['email']; ?></p>
        <p>Plano: <?php echo $aluno['plano']; ?></p>

        <h3>Exercícios:</h3>
        <?php if (count($treinos) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Exercício</th>
                        <th>Data de Criação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($treinos as $treino): ?>
                        <tr>
                            <td><?php echo $treino['nome_exercicio']; ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($treino['data_criacao'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Este aluno ainda não possui treinos registrados.</p>
        <?php endif; ?>
    </div>
</body>
</html>
