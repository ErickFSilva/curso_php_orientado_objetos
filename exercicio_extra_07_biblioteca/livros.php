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
    <title>Biblioteca - Livros</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <?php
    $nome_pagina = 'livros';
    require "navegacao.php";

    $controle_visualizar = new ControleVisualizar();
    ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10 offset-md-1 mt-4">

                <!-- Botão Modal -->
                <div class="btn-add-livro">
                    <a href="" title="Adicionar Livro" data-bs-toggle="modal" data-bs-target="#ModalAddLivro">+</a>
                </div>

                <!-- Tabela para exibiçaõ dos dados -->
                <div class="table-responsive-md">
                    <table class="table table-striped">
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

                            if (isset($_SESSION['msg'])) {

                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }

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
                                    <td class="text-bg-warning text-center">
                                        <a class="nav-link" href="visualizar_livro.php?cod=<?= $livro['cod_livro'] ?>" title="<?= $livro['titulo'] ?>">Visualizar</a>
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="ModalAddLivro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg modal-fullscreen-lg-down">
            <div class="modal-content">

                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Livro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <?php

                    $data_atual = date("d/m/Y");
                    $data_atual_form = date("Y-m-d h:i:s");

                    $novo_codigo = $controle_visualizar->listaNovoCodigoLivro();

                    $form_data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                    if (!empty($form_data['btn_cad_livro'])) {

                        $controle_cadastro = new ControleCadastro();
                        $controle_cadastro->formData = $form_data;

                        $retorno = $controle_cadastro->cadastraLivro();

                        if ($retorno) {

                            $_SESSION['msg'] = "<p class='text-success'>Livro cadastrado com sucesso!</p>";
                            header('Location: livros.php');
                        } else {

                            $_SESSION['msg'] = "<p class='text-danger'>Erro no cadastro do livro!</p>";
                            header('Location: livros.php');
                        }
                    }

                    ?>

                    <form name="form_cadastro" method="POST" action="">

                        <div class="row">

                            <!-- Código e Data de inclusão do livro -->
                            <div class="col-lg-10 offset-lg-1 mb-2">
                                <div class="row">

                                    <!-- Código -->
                                    <div class="col-6">
                                        <label class="w-100">
                                            <div class="fs-5 py-2">Código</div>
                                            <input type="hidden" name="cod_livro" value="<?= $novo_codigo ?>">
                                            <input type="number" value="<?= $novo_codigo ?>" class="form-control" disabled>
                                        </label>
                                    </div>

                                    <!-- Data de inclusão -->
                                    <div class="col-6">
                                        <label class="w-100">
                                            <div class="fs-5 py-2">Data de inclusão</div>
                                            <input type="hidden" name="data_inclusao" value="<?= $data_atual_form ?>" class="form-control">

                                            <input type="text" value="<?= $data_atual ?>" class="form-control" disabled>
                                        </label>
                                    </div>

                                </div>

                            </div>

                            <!-- Gênero e Grupo do livro -->
                            <div class="col-lg-10 offset-lg-1 mb-2 pb-3 border rounded">
                                <div class="row">

                                    <!-- Título do livro -->
                                    <div class="col-12 mb-2">
                                        <label class="w-100">
                                            <div class="fs-5 py-2">Título <span class="text-primary">*</span></div>
                                            <input type="text" name="titulo" class="form-control" required>
                                        </label>
                                    </div>

                                    <!-- Gênero -->
                                    <div class="col-sm-6">
                                        <label class="w-100">
                                            <div class="fs-5 py-2">Gênero <span class="text-primary">*</span></div>
                                            <select name="genero" class="form-select" required>
                                                <option value="Espiritismo">Espiritismo</option>
                                                <option value="Bíblia">Bíblia</option>
                                                <option value="Espiritualista">Espiritualista</option>
                                                <option value="Outros">Outros</option>
                                            </select>
                                        </label>
                                    </div>

                                    <!-- Grupo -->
                                    <div class="col-sm-6">
                                        <label class="w-100">
                                            <div class="fs-5 py-2">Grupo <span class="text-primary">*</span></div>
                                            <select name="grupo" class="form-select" required>
                                                <option value="Codificação Espírita">Codificação Espírita</option>
                                                <option value="Série André Luiz">Livros André Luiz</option>
                                                <option value="Série André Luiz">Livros Emanuel</option>
                                                <option value="Outros">Outros</option>
                                            </select>
                                        </label>
                                    </div>

                                </div>

                            </div>

                            <!-- Resumo do livro -->
                            <div class="col-lg-10 offset-lg-1 mb-2">
                                <label class="w-100">
                                    <div class="fs-5 py-2">Resumo</div>
                                    <textarea name="resumo" rows="3" class="form-control"></textarea>
                                </label>
                            </div>

                            <!-- Autor e Espírito do livro -->
                            <div class="col-lg-10 offset-lg-1 mb-2 pb-3 border rounded">
                                <div class="row">

                                    <!-- Autor -->
                                    <div class="col-sm-6">
                                        <label class="w-100">
                                            <div class="fs-5 py-2">Autor <span class="text-primary">*</span></div>
                                            <select name="autor" class="form-select" required>
                                                <option value="Allan Kardec">Allan Kardec</option>
                                                <option value="Chico Xavier">Chico Xavier</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </label>
                                    </div>

                                    <!-- Espírito -->
                                    <div class="col-sm-6">
                                        <label class="w-100">
                                            <div class="fs-5 py-2">Espírito <span class="text-primary">*</span></div>
                                            <select name="espirito" class="form-select" required>
                                                <option value="Obra pessoal">Obra pessoal</option>
                                                <option value="André Luiz">André Luiz</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <!-- Editora, Páginas e Quantidade do livro -->
                            <div class="col-lg-10 offset-lg-1 mb-2 pb-3 border rounded">
                                <div class="row">

                                    <!-- Editora -->
                                    <div class="col-sm-6">
                                        <label class="w-100">
                                            <div class="fs-5 py-2">Editora <span class="text-primary">*</span></div>
                                            <select name="editora" class="form-select" required>
                                                <option value="FEB">FEB</option>
                                                <option value="EME">EME</option>
                                                <option value="Outro">Outro</option>
                                            </select>
                                        </label>
                                    </div>

                                    <!-- Páginas do livro -->
                                    <div class="col-3">
                                        <label class="w-100">
                                            <div class="fs-5 py-2">Páginas</div>
                                            <input type="number" name="paginas" min="1" max="9999" class="form-control">
                                        </label>
                                    </div>

                                    <!-- Quantidade do livro -->
                                    <div class="col-4 col-sm-3">
                                        <label class="w-100">
                                            <div class="fs-5 py-2">Qtd. Livro(s) <span class="text-primary">*</span></div>
                                            <input type="number" name="quantidade" min="1" max="999" class="form-control" required>
                                        </label>
                                    </div>

                                    <!-- Capa do livro -->
                                    <div class="col-12 mb-2">
                                        <label class="w-100">
                                            <div class="fs-5 py-2">Capa</div>
                                            <input type="file" name="capa" class="form-control">
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <!-- Cadastrar livro -->
                            <div class="col-lg-10 offset-lg-1 my-2 text-end">
                                <input type="submit" name="btn_cad_livro" value="Cadastrar" class="btn btn-success">
                            </div>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn text-bg-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>

            </div>
        </div>

    </div>

</body>

</html>