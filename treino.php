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

// Carregar os alunos do banco de dados
$stmtAlunos = $pdo->query("SELECT id, nome FROM membros");
$alunos = $stmtAlunos->fetchAll(PDO::FETCH_ASSOC);

// Carregar os exercícios do banco de dados
$stmtExercicios = $pdo->query("SELECT id, nome_exercicio FROM exercicios");
$exercicios = $stmtExercicios->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Montar Treino</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');
        * {
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1; /* Faz o conteúdo ocupar o espaço restante da tela */
        }

        .navbar {
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
        }

        .form-container {
            margin-top: 30px;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .treino-lista {
            margin-top: 30px;
            border-top: 1px solid #ccc;
            padding-top: 15px;
        }

        .treino-item {
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="homepage.php"><img src="logo.png" alt="Logo" width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="cadastro_aluno.php">Cadastro de Alunos</a></li>
                    <li class="nav-item"><a class="nav-link" href="cad_prof.php">Cadastro de Instrutores</a></li>
                    <li class="nav-item"><a class="nav-link" href="financeiro.php">Financeiro</a></li>
                    <li class="nav-item"><a class="nav-link" href="planos.php">Planos</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-danger">
                <a href="index.php" class="text-white text-decoration-none">Sair</a>
            </button>
        </div>
    </nav>
</header>

<main>
    <div class="container form-container">
        <h2 class="text-center">Montar Treino</h2>
        <form id="form-treino" action="salvar_treino.php" method="POST">
            <div class="mb-3">
                <label for="aluno" class="form-label">Selecione o Aluno</label>
                <select class="form-select" id="aluno" name="aluno" required>
                    <option value="">Escolha o aluno</option>
                    <?php foreach ($alunos as $aluno): ?>
                        <option value="<?= $aluno['id']; ?>"><?= $aluno['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="treino-descricao" class="form-label">Descrição do Treino (Ex: Exercício, Séries, Repetições)</label>
                <textarea class="form-control" id="treino-descricao" name="treino_descricao" rows="5" placeholder="Exemplo: Agachamento - 4 séries de 12 repetições." required></textarea>
            </div>


            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom">Salvar Treino</button>
            </div>
        </form>
    </div>
</main>

<script>
    // Exemplo de como pode ser mostrado o resumo do treino ao preencher o campo
    document.getElementById('treino-descricao').addEventListener('input', function() {
        const descricao = this.value;
        const resumoTreino = document.getElementById('treino-lista');
        
        // Limpar a lista anterior
        resumoTreino.innerHTML = '';
        
        // Adicionar o item à lista de resumo
        if (descricao.trim() !== "") {
            const itemTreino = document.createElement('li');
            itemTreino.classList.add("treino-item");
            itemTreino.innerHTML = `<strong>Treino:</strong> ${descricao}`;
            resumoTreino.appendChild(itemTreino);
        }
    });
</script>

</body>
<footer>
    <p>&copy; 2024 Sistema de Treinos - Todos os direitos reservados.</p>
</footer>
</html>
