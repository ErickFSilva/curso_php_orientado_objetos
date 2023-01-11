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
    $nome_pagina = 'visualizar_livros';
    require "navegacao.php";
    ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-10 offset-sm-1 mt-4">

                <!-- Editar -->
                <?php

                // Incorpora as classes no arquivo
                // require "controles/Conexao.php";
                // require "controles/Editar.php";

                $form_edit = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                // $editar = new Editar();
                // $editar->__set('form_edit', $form_edit);

                ?>

                <!-- Visualizar -->
                <?php

                // Recebe o ID do usuário via 'GET'
                $cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_NUMBER_INT);

                // Verifica se o 'id' possui valor
                if (!empty($cod)) {

                    // Incorpora as classes no arquivo
                    require "controles/Conexao.php";
                    require "controles/Visualizar.php";

                    // Instancia a classe e instancia o objeto
                    $visualizar_livro = new Visualizar();

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

                            <div class="col-md-4 d-flex justify-content-center align-items-start">
                                <img src="<?= $capa ?>" class="img-fluid rounded" alt="<?= $titulo ?>">
                            </div>

                            <div class="col-md-8">

                                <form name="form_editar" method="POST" action="">

                                    <div class="card-body">

                                        <input type="hidden" name="cod_livro" value="<?= $cod_livro ?>">
                                        <p class="card-text">
                                            <span class="fw-bold">Código: </span>
                                            <?= $cod_livro ?>
                                        </p>

                                        <p class="card-text">
                                            <span class="fw-bold">Título: </span>
                                            <input type="text" name="titulo" value="<?= $titulo ?>" class="form-control">
                                        </p>

                                        <p class="card-text">
                                            <span class="fw-bold">Gênero: </span>
                                            <select name="genero" class="form-select">
                                                <option value=""></option>
                                                <option value="Espiritismo">Espiritismo</option>
                                                <option value="Bíblia">Bíblia</option>
                                                <option value="Espiritualista">Espiritualista</option>
                                                <option value="Outros">Outros</option>
                                            </select>
                                        </p>

                                        <p class="card-text">
                                            <span class="fw-bold">Grupo: </span>
                                            <select name="grupo" class="form-select">
                                                <option value=""></option>
                                                <option value="Codificação Espírita">Codificação Espírita</option>
                                                <option value="Série André Luiz">Livros André Luiz</option>
                                                <option value="Série André Luiz">Livros Emanuel</option>
                                                <option value="Outros">Outros</option>
                                            </select>
                                        </p>

                                        <p class="card-text">
                                            <span class="fw-bold">Páginas: </span>
                                            <input type="number" name="paginas" min="1" max="9999" value="<?= $paginas ?>" class="form-control">
                                        </p>

                                        <p class="card-text">
                                            <span class="fw-bold">Resumo: </span>
                                            <textarea name="resumo" rows="3" class="form-control"><?= $resumo ?></textarea>
                                        </p>

                                        <p class="card-text">
                                            <span class="fw-bold">Autor: </span>
                                            <select name="autor" class="form-select">
                                                <option value=""></option>
                                                <option value="Allan Kardec">Allan Kardec</option>
                                                <option value="Chico Xavier">Chico Xavier</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </p>
                                        <p class="card-text">
                                            <span class="fw-bold">Espírito: </span>
                                            <select name="espirito" class="form-select" required>
                                                <option value=""></option>
                                                <option value="Obra pessoal">Obra pessoal</option>
                                                <option value="André Luiz">André Luiz</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </p>

                                        <p class="card-text">
                                            <span class="fw-bold">Editora: </span>
                                            <select name="editora" class="form-select">
                                                <option value=""></option>
                                                <option value="FEB">FEB</option>
                                                <option value="EME">EME</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </p>

                                        <p class="card-text">
                                            <span class="fw-bold">Quantidade: </span>
                                            <input type="number" name="quantidade" min="1" max="999" value="<?= $quantidade ?>" class="form-control">
                                        </p>

                                        <p class="card-text">
                                            <span class="fw-bold">Capa: </span>
                                            <input type="file" name="capa" class="form-control">
                                        </p>

                                        <!-- Editar livro -->
                                        <div class="my-2 text-start">
                                            <input type="submit" name="btn_edit_livro" value="Editar" class="btn btn-warning">
                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>

                <?php } ?>

            </div>

        </div>
    </div>

</body>

</html>