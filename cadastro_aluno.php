<?php
require 'conexao.php';

$sql = $pdo->query("SELECT * FROM membros");
$lista = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJETO ALUNO</title>
    <style>
        /* Estilo do corpo da página */
        body {
            background-color: DarkSeaGreen;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column; /* Adicionado para centralizar verticalmente */
        }

        /* Estilo da tabela */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        /* Estilo das células da tabela */
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        /* Estilo das células de cabeçalho da tabela */
        th {
            background-color: #000000;
            color: white;
        }

        /* Estilo dos links */
        a {
            color: #000000;
            text-decoration: none;
            margin: 0 10px;
        }

        /* Estilo dos links ao passar o mouse */
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>PROJETO ALUNO</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($lista as $membro): ?>
        <tr>
            <td><?php echo $membro['id']; ?></td>
            <td><?php echo $membro['nome']; ?></td>
            <td><?php echo $membro['email']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $membro['id']; ?>">[Editar]</a>
                <a href="excluir.php?id=<?php echo $membro['id']; ?>">[Excluir]</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="cadastrar.php">Cadastrar Novo Membro</a>
</body>
</html>