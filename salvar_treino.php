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
    // Receber os dados do formulário
    $aluno_id = $_POST['aluno'];
    $exercicios = $_POST['exercicios'];
    $repeticoes = $_POST['repeticoes'];
    $serie = $_POST['serie'];

    // Verificar se o aluno foi selecionado
    if (empty($aluno_id)) {
        echo "Erro: Nenhum aluno selecionado.";
        exit;
    }

    // Verificar se os exercícios foram selecionados
    if (empty($exercicios)) {
        echo "Erro: Nenhum exercício selecionado.";
        exit;
    }

    // Preparar e executar a inserção dos treinos na tabela 'treino'
    try {
        $pdo->beginTransaction(); // Iniciar transação

        // Inserir as séries e repetições para cada exercício selecionado
        foreach ($exercicios as $exercicio_id) {
            // Inserir treino para o exercício
            $stmt = $pdo->prepare("INSERT INTO treino (id_aluno, id_exercicio, serie, repeticao) VALUES (:aluno_id, :exercicio_id, :serie, :repeticoes)");
            $stmt->bindParam(':aluno_id', $aluno_id);
            $stmt->bindParam(':exercicio_id', $exercicio_id);
            $stmt->bindParam(':serie', $serie);
            $stmt->bindParam(':repeticoes', $repeticoes);
            $stmt->execute();
        }

        // Se tudo ocorrer bem, confirmar a transação
        $pdo->commit();

        echo "Treino salvo com sucesso!";
    } catch (PDOException $e) {
        // Em caso de erro, reverter a transação
        $pdo->rollBack();
        echo "Erro ao salvar o treino: " . $e->getMessage();
    }
} else {
    // Caso o método não seja POST
    echo "Erro: Método inválido.";
}
?>
