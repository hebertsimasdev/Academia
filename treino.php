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
        }

        .navbar {
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
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
            <a class="navbar-brand" href="home_admin.php"><img src="logo.png" alt="Logo" width="60"></a>
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
            <button type="button" class="btn btn-primary">
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

            <div id="exercicios-container">
                <div class="mb-3">
                    <label for="exercicio_0" class="form-label">Escolha o Exercício</label>
                    <select class="form-select" name="exercicios[0][exercicio]" id="exercicio_0" required>
                        <option value="">Escolha o exercício</option>
                        <?php foreach ($exercicios as $exercicio): ?>
                            <option value="<?= $exercicio['id']; ?>"><?= $exercicio['nome_exercicio']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="serie_0" class="form-label">Número de Séries</label>
                    <input type="number" class="form-control" name="exercicios[0][serie]" id="serie_0" min="1" max="10" required>
                </div>

                <div class="mb-3">
                    <label for="repeticao_0" class="form-label">Repetições</label>
                    <input type="number" class="form-control" name="exercicios[0][repeticao]" id="repeticao_0" min="1" max="100" required>
                </div>
            </div>

            <div class="mb-3">
                <button type="button" class="btn btn-info" id="add-exercicio">Adicionar outro exercício</button>
            </div>

            <div class="treino-lista">
                <h5>Resumo do Treino</h5>
                <ul id="treino-lista">
                    <!-- Exercícios adicionados dinamicamente aparecerão aqui -->
                </ul>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom">Salvar Treino</button>
            </div>
        </form>
    </div>
</main>

<footer>
    <p>&copy; 2024 Sistema de Treinos - Todos os direitos reservados.</p>
</footer>

<script>
    let contador = 1;

    // Função para adicionar exercício e atualizar lista
    document.getElementById('add-exercicio').addEventListener('click', function() {
        const container = document.getElementById('exercicios-container');
        const listaTreino = document.getElementById('treino-lista');
        
        // Criar um novo campo para exercício, série e repetição
        const novoExercicio = document.createElement('div');
        novoExercicio.classList.add('mb-3');
        novoExercicio.innerHTML = `
            <label for="exercicio_${contador}" class="form-label">Escolha o Exercício</label>
            <select class="form-select" name="exercicios[${contador}][exercicio]" id="exercicio_${contador}" required>
                <option value="">Escolha o exercício</option>
                <?php foreach ($exercicios as $exercicio): ?>
                    <option value="<?= $exercicio['id']; ?>"><?= $exercicio['nome_exercicio']; ?></option>
                <?php endforeach; ?>
            </select>
        `;
        container.appendChild(novoExercicio);

        // Série
        const serieInput = document.createElement('div');
        serieInput.classList.add('mb-3');
        serieInput.innerHTML = `
            <label for="serie_${contador}" class="form-label">Número de Séries</label>
            <input type="number" class="form-control" name="exercicios[${contador}][serie]" id="serie_${contador}" min="1" max="10" required>
        `;
        container.appendChild(serieInput);

        // Repetições
        const repeticaoInput = document.createElement('div');
        repeticaoInput.classList.add('mb-3');
        repeticaoInput.innerHTML = `
            <label for="repeticao_${contador}" class="form-label">Repetições</label>
            <input type="number" class="form-control" name="exercicios[${contador}][repeticao]" id="repeticao_${contador}" min="1" max="100" required>
        `;
        container.appendChild(repeticaoInput);

        // Adicionar na lista de treino
        const itemTreino = document.createElement('li');
        itemTreino.setAttribute("id", `treino-item-${contador}`);
        itemTreino.classList.add("treino-item");
        itemTreino.innerHTML = `
            <strong>Exercício ${contador + 1}:</strong>
            <span id="nome_exercicio_${contador}">Escolha o exercício</span>, 
            Séries: <span id="serie_${contador}">-</span>, 
            Repetições: <span id="repeticao_${contador}">-</span>
        `;
        listaTreino.appendChild(itemTreino);

        // Atualizar valores no resumo de treino ao selecionar exercício, série e repetição
        const exercicioSelect = document.getElementById(`exercicio_${contador}`);
        const serieInputElement = document.getElementById(`serie_${contador}`);
        const repeticaoInputElement = document.getElementById(`repeticao_${contador}`);

        exercicioSelect.addEventListener('change', function() {
            const nomeExercicio = exercicioSelect.options[exercicioSelect.selectedIndex].text;
            document.getElementById(`nome_exercicio_${contador}`).textContent = nomeExercicio;
        });

        serieInputElement.addEventListener('input', function() {
            const serie = serieInputElement.value;
            document.getElementById(`serie_${contador}`).textContent = serie;
        });

        repeticaoInputElement.addEventListener('input', function() {
            const repeticao = repeticaoInputElement.value;
            document.getElementById(`repeticao_${contador}`).textContent = repeticao;
        });

        contador++;
    });
</script>

</body>
</html>
