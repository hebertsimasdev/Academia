<?php
require 'conexao.php';

$id = $_GET['id'];
$sql = $pdo->prepare("SELECT * FROM instrutor WHERE id_instrutor = :id_instrutor");
$sql->bindValue(":id_instrutor", $id_instrutor);
$sql->execute();
$membro = $sql->fetch(PDO::FETCH_ASSOC);

if (!$instrutor) {
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: DarkSeaGreen;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
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

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            color: white;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .btn-primary {
            margin-top: 10px;
        }

        .table {
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .table th {
            background-color: #778899;
            color: white;
        }

        .links a {
            color: white;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary " style="box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25)">
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
            <h1>Editar Instrutor</h1>
            <form action="atualizar.php" method="POST">
                <input type="hidden" name="id_instrutor" value="<?php echo $instrutor['id_instrutor']; ?>">
                <div class="mb-3">
                    <input type="text" name="nome_instrutor" class="form-control" value="<?php echo $instrutor['nome_instrutor']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email_instrutor" class="form-control" value="<?php echo $instrutor['email_instrutor']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="telefone_instrutor" class="form-control" value="<?php echo $instrutor['telefone_instrutor']; ?>">
                </div>

  

                </select>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
        </div>
        </select>
        </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 - Todos os direitos reservados.</p>
    </footer>
</body>

</html>