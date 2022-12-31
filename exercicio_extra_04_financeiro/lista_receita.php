<?php

session_start();
ob_start();

require "controle/Conexao.php";
require "controle/Receita.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financeiro - Receita</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <?php
    $nome_pagina = 'receita';
    require "navegacao.php";
    ?>

    <!-- Container de estruturação -->
    <div class="container-fluid">
        <div class="row">

            <!-- DIV de estruturação -->
            <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">

                <!-- Cabeçalho -->
                <header>
                    <h1 class="h4 my-4 h3 py-2 px-3 rounded text-bg-primary">
                        Receita
                    </h1>

                    <?php

                    if (isset($_SESSION['msg'])) {

                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }

                    ?>

                </header>

                <!-- Cadastrar nova receita -->
                <div class="btn-add-rece">
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">+</a>
                </div>

                <!-- Tabela para exibiçaõ dos dados -->
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Tipo</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        <!-- Código para recepção de dados -->
                        <?php

                        $receita = new Receita();

                        $dados_receita = $receita->listaReceitas();

                        foreach ($dados_receita as $dados) {

                            extract($dados)

                        ?>

                            <!-- Linha de tebela para estruturar os dados vindo do db -->
                            <tr>
                                <!-- <td><?= $id ?></td> -->
                                <td><?= $tipo ?></td>
                                <td><?= $descricao ?></td>
                                <td><?= $valor ?></td>
                                <td><?= $_data ?></td>
                            </tr>

                        <?php  } ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nova Receita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <?php

                    $form_data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                    if (!empty($form_data['cad_receita'])) {

                        // echo '<pre>';
                        // var_dump($form_data);
                        // echo '</pre>';

                        $receita = new Receita();
                        $receita->formData = $form_data;

                        $retorno = $receita->addReceita();

                        if ($retorno) {

                            $_SESSION['msg'] = "<p class='text-success'>Dados cadastrados com sucesso!</p>";
                            header('Location: lista_receita.php');
                        } else {

                            $_SESSION['msg'] = "<p class='text-danger'>Erro no cadastro dos dados!</p>";
                            header('Location: lista_receita.php');
                        }
                    }

                    ?>

                    <form name="form_receita" method="POST" action="">

                        <div class="row">

                            <div class="col-lg-10 offset-lg-1 mb-3">
                                <label class="w-100">
                                    <div class="fs-4 py-2">
                                        <span class="text-bg-danger px-2 py-0 rounded">D</span>ata:
                                    </div>
                                    <input type="date" class="form-control" name="_data" required>
                                </label>
                            </div>

                            <div class="col-lg-10 offset-lg-1 mb-3">
                                <label class="w-100">
                                    <div class="fs-4 py-2">
                                        <span class="text-bg-primary px-2 py-0 rounded">T</span>ipo
                                    </div>
                                    <select class="form-select" name="tipo" required>
                                        <option value="salario_beneficios">Salário e Benefícios</option>
                                        <option value="ferias">Férias</option>
                                        <option value="mes_anterior">Mês Anterior</option>
                                        <option value="internet_inquilinos">Internet de Inquilinos</option>
                                        <option value="outros" selected>Outros</option>
                                    </select>
                                </label>
                            </div>

                            <div class="col-lg-10 offset-lg-1 mb-3">
                                <label class="w-100">
                                    <div class="fs-4 py-2">
                                        <span class="text-bg-info px-2 py-0 rounded">D</span>escrição:
                                    </div>
                                    <input type="text" class="form-control" name="descricao" required>
                                </label>
                            </div>

                            <div class="col-lg-10 offset-lg-1 mb-3">
                                <label class="w-100">
                                    <div class="fs-4 py-2">
                                        <span class="text-bg-warning px-2 py-0 rounded">V</span>alor:
                                    </div>
                                    <input type="text" class="form-control" name="valor" placeholder="Separar com PONTO" required>
                                </label>
                            </div>

                            <div class="col-lg-10 offset-lg-1 mt-2">
                                <input type="submit" class="btn btn-success" name="cad_receita" value="Adicionar">
                            </div>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

</body>

</html>