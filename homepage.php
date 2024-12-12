<?php
session_start();

require 'conexao.php';

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
            text-align: center;
            display: flex;
            gap: 10px;
            justify-content: center;
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
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary " style="box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25)">
            <div class="container-fluid">
                <a class="navbar-brand" href="home_admin.php"><img id="imagens" src="logo.png" width="60"></a>
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
                                <li><a class="dropdown-item" href="cad_prof.php">CADASTRO DE INSTRUTORES</a></li>
                                <li><a class="dropdown-item" href="instrutores.php">QUADRO DE COLABORADORES</a></li>
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
                <button type="button" class="btn btn-primary"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><a href="index.php" style="color: white; text-decoration: none;">Sair</a>
                </button>
            </div>
        </nav>
    </header>
    <main>
        <br>
        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="suplemento.png" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Suplementação dos Montros</h5>
                            <br>
                            <br>

                            <p class="card-text">CUPOM LACADEMY.</p>
                            <br>
                            <br>


                            <a href="https://www.gsuplementos.com.br/" target="_blank" class="btn btn-primary">ACESSE O SITE</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="treino.png" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Treino</h5>
                            <p class="card-text">Monte seu treino.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="experimental.png" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Aula Experimental</h5>


                                <p class="card-text">Faça sua primeira aula experimental.</p>
                                <a href="cadastro_aluno.php" class="btn btn-primary">CADASTRAR</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <footer>
        <small>Light Academy ©</small>
    </footer>
</body>

</html>