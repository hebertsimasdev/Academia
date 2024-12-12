<?php
// Conexão com o banco de dados (ajuste os dados conforme seu ambiente)
$host = 'localhost';
$db = 'academia';
$user = 'root'; // Coloque o usuário do seu banco de dados
$pass = 'cimatec'; // Coloque a senha do seu banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
    exit;
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados do formulário
    $alunoId = $_POST['aluno'];
    $descricaoTreino = $_POST['treino_descricao'];

    // Validar se todos os campos necessários estão preenchidos
    if (empty($alunoId) || empty($descricaoTreino)) {
        echo "Todos os campos devem ser preenchidos.";
        exit;
    }

    try {
        // Iniciar transação para garantir que tudo seja salvo corretamente
        $pdo->beginTransaction();

        // Inserir o treino na tabela 'treinos'
        $stmtTreino = $pdo->prepare("INSERT INTO treinos (aluno_id, descricao) VALUES (?, ?)");
        $stmtTreino->execute([$alunoId, $descricaoTreino]);
        $treinoId = $pdo->lastInsertId(); // Obter o ID do treino inserido

        // Aqui seria a parte onde associamos os exercícios, caso o formulário permita
        // a seleção de exercícios, mas para simplificação, estamos apenas salvando a
        // descrição do treino.

        // Se você estiver implementando uma funcionalidade de associar exercícios,
        // seria necessário adicionar campos no formulário para os exercícios e processá-los
        // nesta parte. Exemplo de inserção de dados em treino_exercicio:

        // $exercicioId = ... (obtido via POST ou seleção);
        // $serie = ...; 
        // $repeticao = ...;
        // $stmtExercicio = $pdo->prepare("INSERT INTO treino_exercicio (treino_id, exercicio_id, serie, repeticao) VALUES (?, ?, ?, ?)");
        // $stmtExercicio->execute([$treinoId, $exercicioId, $serie, $repeticao]);

        // Confirmar transação
        $pdo->commit();

        // Redirecionar ou exibir uma mensagem de sucesso
        echo "Treino salvo com sucesso!";
        sleep(3);
        header(header: "Location: homepage.php"); 
    } catch (Exception $e) {
        // Em caso de erro, desfaz a transação
        $pdo->rollBack();
        echo "Erro ao salvar o treino: " . $e->getMessage();
    }
} else {
    echo "Método de solicitação inválido.";
}
?>
