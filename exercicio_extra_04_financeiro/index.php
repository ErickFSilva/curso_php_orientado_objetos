<?php

require "controle/Conexao.php";
require "controle/Receita.php";
require "controle/Despesa.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financeiro - Home</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    $nome_pagina = 'home';
    require "navegacao.php";
    ?>

    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-xl-10 offset-xl-1">

                <!-- <header class="my-4">
                    <h1 class="h4 my-5 h3 py-2 px-3 rounded border-bottom border-secondary text-bg-success">
                        Home
                    </h1>
                </header> -->

                <div class="mt-4 d-flex flex-wrap justify-content-evenly">

                    <div class="card mb-4" style="width: 280px;">
                        <div class="card-header text-bg-primary">
                            <h1 class="h4 text-center">Receita</h1>
                        </div>
                        <div class="card-body">

                            <span class="fs-3 fw-bold">R$
                                <?php
                                $receita = new Receita();
                                echo $receita->calculaTotReceita();
                                ?>
                            </span>

                        </div>
                    </div>

                    <div class="card mb-4" style="width: 280px;">
                        <div class="card-header text-bg-warning">
                            <h1 class="h4 text-center">Despesa</h1>
                        </div>
                        <div class="card-body">

                            <span class="fs-3 fw-bold">R$
                                <?php
                                $receita = new Despesa();
                                echo $receita->calculaTotDespesa();
                                ?>
                            </span>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</body>

</html>