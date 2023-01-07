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
    <title>Biblioteca - Visualizar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <?php
    $nome_pagina = 'visualizar';
    require "navegacao.php";
    ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-10 offset-sm-1 mt-4">

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
                    $visualizar_livro->__set('cod_livro_Atual', $cod);

                    // Instancia o método 'visualizarLivro'
                    $livro = $visualizar_livro->visualizarLivro();

                    // echo '<pre>';
                    // var_dump($livro);
                    // echo '</pre>';

                    extract($livro);

                ?>

                    <div class="card border-0">
                        <div class="row g-0">

                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <a class="nav-link" href="pdf/livro_o-livro-dos-espiritos.pdf" target="_blank" title="<?= $titulo ?>">
                                    <img src="<?= $capa ?>" class="img-fluid rounded" alt="<?= $titulo ?>">
                                    <!-- <small class="text-muted text-center d-block">Click na imagem para baixar</small> -->
                                </a>

                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text"><span class="fw-bold">Código: </span><?= $cod_livro ?></p>
                                    <p class="card-text"><span class="fw-bold">Livro: </span><?= $titulo ?></p>
                                    <p class="card-text"><span class="fw-bold">Gênero: </span><?= $genero ?></p>
                                    <p class="card-text"><span class="fw-bold">Grupo: </span><?= $grupo ?></p>
                                    <p class="card-text"><span class="fw-bold">Páginas: </span><?= $paginas ?></p>
                                    <p class="card-text"><span class="fw-bold">Resumo: </span><?= $resumo ?></p>
                                    <p class="card-text"><span class="fw-bold">Autor: </span><?= $autor ?></p>
                                    <p class="card-text"><span class="fw-bold">Editora: </span><?= $editora ?></p>
                                    <p class="card-text"><span class="fw-bold">Inclusão: </span><?= $data_inclusao ?></p>
                                    <p class="card-text"><span class="fw-bold">Quantidade: </span><?= $quantidade ?></p>
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