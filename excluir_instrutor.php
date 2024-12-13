<?php
require 'conexao.php'; // Conexão com o banco de dados

// Verifica se o ID do membro foi passado na URL e se é um número válido
if (isset($_GET['id_instrutor']) && is_numeric($_GET['id_instrutor'])) {
    $id_instrutor = $_GET['id_instrutor'];

    // Prepara a consulta para buscar os dados do membro com base no ID
    $sql = $pdo->prepare("SELECT * FROM instrutor WHERE id_instrutor = :id_instrutor");
    $sql->bindValue(':id_instrutor', $id_instrutor, PDO::PARAM_INT);
    $sql->execute();

    // Se o membro não for encontrado, redireciona para a página principal
    if ($sql->rowCount() == 0) {
        header("Location: cadastro_instrutor.php");
        exit;
    }

    // Armazena os dados do membro
    $instrutor = $sql->fetch(PDO::FETCH_ASSOC);
} else {
    // Se o ID não for passado ou não for um número válido, redireciona para a página principal
    header("Location: cadastro_instrutor.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Light</title>
    <link rel="icon" href="logo.png" href="homepage.php">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }

        body {
            margin: 0;
            background-color: DarkSeaGreen;
        }

        .navbar {
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
            background-color: whitesmoke;
            border-radius: 2px;
        }

        .sair {
            margin: 10px;
        }

        footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 15px;
            color: white;
            margin-top: 20px;
        }

        h1 {
            color: white;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25)">
            <div class="container-fluid">
                <a class="navbar-brand" href="homepage.php"><img id="imagens" src="logo.png" width="60"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="homepage.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cadastro_aluno.php">CADASTRO DE ALUNOS</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                INSTRUTORES
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="instrutor_cadastrar.php">CADASTRO DE INSTRUTORES</a></li>
                            <li><a class="dropdown-item" href="instrutor_cadastro.php">QUADRO DE COLABORADORES</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="financeiro.php">FINANCEIRO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="planos.php">PLANOS</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sair">
                <button type="button" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    <a href="index.php" style="color: white; text-decoration: none;">Sair</a>
                </button>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1 class="text-center mb-4">Excluir Instrutor</h1>
            <p class="text-center">Tem certeza que deseja excluir o instrutor abaixo?</p>
            <div class="form-container">
                <form action="confirmar_exclusao_instrutor.php" method="POST">
                    <input type="hidden" name="id_instrutor" value="<?php echo htmlspecialchars($instrutor['id_instrutor']); ?>">
                    <p><strong>Nome:</strong> <?php echo htmlspecialchars($instrutor['nome_instrutor']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($instrutor['email_instrutor']); ?></p>
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
                <br>
                <div class="text-center">
                    <a href="cadastro_instrutor.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
