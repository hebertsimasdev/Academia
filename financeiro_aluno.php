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
                <a class="navbar-brand" href="homepage_aluno.php"><img id="imagens" src="logo.png" width="60"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="homepage_aluno.php">HOME</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                INSTRUTORES
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="instrutores.php">QUADRO DE COLABORADORES</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="financeiro_aluno.php">FINANCEIRO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="planos_aluno.php">PLANOS</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sair">
                <button type="button" class="btn btn-danger"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><a href="index.php" style="color: white; text-decoration: none;">Sair</a>
                </button>
            </div>
        </nav>
    </header>
    <main>
        <br>
       

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