<?php

session_start();
ob_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Artigo</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand navbar-dark bg-primary">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Voltar</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <?php

            // Recebe o 'id' do usuário passado por 'GET' na chamada da página
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            // $id = "";

            if (!empty($id)) {

                // Incorpora as classes no arquivo
                require "controle/Conexao.php";
                require "controle/ListarArtigos.php";

                // Instancia a classe e cria o objeto
                $listar_artigos = new ListarArtigos();
                // Envia o 'id' recuperado para o atributo 'id' da classe 'User'
                $listar_artigos->id = $id;

                // Instanciando o método 'exibirArtigo()'
                $artigos = $listar_artigos->exibirArtigo();

                extract($artigos);

            ?>

                <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-2">

                    <h1 class="my-3 pb-3 h4 border-bottom border-secondary">
                        <?= $titulo ?>
                    </h1>

                    <p>
                        <?= $texto ?>
                    </p>

                </div>

            <?php } else {

                $_SESSION['msg'] = "<p style='margin-top: 20px; color: #f00;'>Erro: Artigo não encontrado!</p>";

                header("Location: index.php");
            }

            ?>

        </div>
    </div>

</body>

</html>