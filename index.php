<?php
require 'conexao.php';
$sql = $pdo->query("SELECT * FROM aluno");
// Criando um vetor para receber o resultado da consulta
$lista = [];
$lista = $sql->fetchAll(PDO::FETCH_ASSOC);

//if($sql->rowCount()>0){
//   $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

//}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1> Academia</h1>
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>PROFESSOR</th>
            <th>AULAS</th>
            <th>HORARIO</th>


        </tr>
        <?php foreach ($lista as $a) : ?>
            <tr>
                <td> <?php echo $a['id_funcionario']; ?> </td>
                <td> <?= $a['nome_funcionario']; ?> </td>
                <td> <?php echo $a['nome_aula']; ?> </td>
                <td> <?php echo $a['horario_aula']; ?> </td>

                <td>
                    <a href="editar.php?id=<?= $a['cpf']; ?>">[Editar]</a>
                    <a href="excluir.php?id=<?= $a['cpf']; ?>">[Excluir]</a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

    <br>
    <a href="cadastrar.php">Cadastrar Aluno</a>

</body>

</html>