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
    <title>Biblioteca - Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>

    <?php require "navegacao.php"; ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10 offset-md-1 mt-4">

                <?php

                // Recebe o ID do usuário via 'GET'
                $cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_NUMBER_INT);

                // Verifica se o 'id' possui valor
                if (!empty($cod)) {

                    // Incorpora as classes no arquivo
                    require "controles/Conexao.php";
                    require "controles/ControleVisualizar.php";

                    // Instancia a classe e instancia o objeto
                    $visualizar_livro = new ControleVisualizar();

                    // Envia o 'cod' recuperado para o atributo 'cod_livro_Atual' da classe 'ControleVisualizar'
                    $visualizar_livro->cod_livro_Atual = $cod;

                    // Instancia o método 'visualizarLivro'
                    $livro = $visualizar_livro->visualizarLivro();

                    // echo '<pre>';
                    // var_dump($livro);
                    // echo '</pre>';

                    extract($livro);

                ?>

                    <div class="card mb-3">
                        <div class="row g-0">

                            <div class="col-md-4">
                                <a class="nav-link" href="pdf/livro_o-livro-dos-espiritos.pdf" target="_blank" title="<?= $titulo ?>">
                                    <img src="<?= $capa ?>" class="img-fluid rounded" alt="<?= $titulo ?>">
                                </a>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h1 class="card-title h5"><?= $titulo ?></h1>
                                    <p class="card-text"><?= $resumo ?></p>
                                    <p class="card-text">
                                        <small class="text-muted">Editora <?= $editora ?> / <?= $autor ?></small>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php } ?>

            </div>

        </div>
    </div>

</body>

</html>