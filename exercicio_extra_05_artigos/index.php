<?php

session_start();
ob_start();

require "controle/Conexao.php";
require "controle/ListarArtigos.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artigos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand navbar-dark bg-primary">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="criarArtigo.php">
                    Novo Artigo
                </a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="row">

            <div class="col-lg-8 offset-lg-2">

                <?php

                if (isset($_SESSION['msg'])) {

                    echo $_SESSION['msg'];
                    // Destroi o conteúdo da variável global após a sua impressão
                    unset($_SESSION['msg']);
                    
                }

                $listarArtigos = new ListarArtigos();
                $artigos = $listarArtigos->listar();

                foreach ($artigos as $artigo) {

                    extract($artigo);

                ?>

                    <div class="card my-4">
                        <div class="card-header">
                            <h1 class="h5"><?= $titulo ?></h1>
                        </div>
                        <div class="card-body">
                            <p><?= substr($texto, 0, 140) . "..." ?></p>
                            <span>
                                <a class="nav-link" style="font-size: 14px; color:teal" href="exibirArtigo.php?id=<?= $id ?>">Abrir artigo</a>
                            </span>
                        </div>
                    </div>

                <?php } ?>

            </div>

        </div>
    </div>

</body>

</html>