<?php

session_start();
ob_start();

require "controles/Conexao.php";
require "controles/ControleVisualizar.php";
require "controles/ControleCadastro.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Cadastro</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <?php
    $nome_pagina = 'cadastro';
    require "navegacao.php";

    $controle_visualizar = new ControleVisualizar();
    ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10 offset-md-1 mt-4">

                <!-- Cadastrar novo livro -->
                <div class="btn-add-livro">
                    <a href="" data-bs-toggle="modal" data-bs-target="#ModalAddLivro">+</a>
                </div>

                <!-- Tabela para exibiçaõ dos dados -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Cód. Livro</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Editora</th>
                            <th>Grupo</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">

                        <!-- Código para recepção de dados -->
                        <?php

                        $livros = $controle_visualizar->listar();

                        foreach ($livros as $livro) {

                            extract($livro);

                        ?>

                            <!-- Linha de tebela para estruturar os dados vindo do db -->
                            <tr>
                                <td><?= $cod_livro ?></td>
                                <td><?= $titulo ?></td>
                                <td><?= $autor ?></td>
                                <td><?= $editora ?></td>
                                <td><?= $grupo ?></td>
                                <td class="text-bg-secondary text-center">
                                    <a class="nav-link" href="visualizar_livro.php?cod=<?= $livro['cod_livro'] ?>" title="<?= $livro['titulo'] ?>">Visualizar</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalAddLivro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Livro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <?php

                    $livros = $controle_visualizar->listar();
                    $novo_codigo = $controle_visualizar->listaNovoCodigo();

                    // echo '<pre>';
                    // echo "<hr>{$novo_codigo}<hr>";
                    // echo var_dump($novo_codigo);
                    // echo '</pre>';

                    ?>

                    <form name="form_cadastro" method="$_POST" action="">

                        <div class="row">

                            <!-- Código do livro -->
                            <div class="col-lg-10 offset-lg-1 mb-2">
                                <label class="w-100">
                                    <div class="fs-5 py-2">Código</div>
                                    <input type="number" name="cod_livro" value="<?= $novo_codigo ?>" class="form-control form-control-sm w-25" disabled>
                                </label>
                            </div>

                            <!-- Título do livro -->
                            <div class="col-lg-10 offset-lg-1 mb-2">
                                <label class="w-100">
                                    <div class="fs-5 py-2">Título</div>
                                    <input type="text" name="titulo" class="form-control form-control-sm">
                                </label>
                            </div>

                            <!-- Gênero do livro -->
                            <div class="col-lg-10 offset-lg-1 mb-2">
                                <label class="w-100">
                                    <div class="fs-5 py-2">Gênero</div>
                                    <select name="genero" class="form-select">

                                        <?php

                                        $lista_genero = $controle_visualizar->listaGenero();

                                        foreach ($lista_genero as $genero) {

                                        ?>

                                            <option><?= $genero['genero'] ?></option>

                                        <?php } ?>

                                    </select>
                                </label>
                            </div>

                            <!-- Grupo do livro -->
                            <div class="col-lg-10 offset-lg-1 mb-2">
                                <label class="w-100">
                                    <div class="fs-5 py-2">Grupo</div>
                                    <select name="grupo" class="form-select">

                                        <?php

                                        $lista_grupo = $controle_visualizar->listaGrupo();

                                        foreach ($lista_grupo as $grupo) {

                                        ?>

                                            <option><?= $grupo['grupo'] ?></option>

                                        <?php } ?>

                                    </select>
                                </label>
                            </div>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>