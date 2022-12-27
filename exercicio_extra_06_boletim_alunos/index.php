<?php

session_start();

require "controle/Conexao.php";
require "controle/Controle.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Aluno</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

    <?php
    $pagina = 'home';
    require "navegacao.php";
    ?>

    <div class="container mt-4">
        <div class="row">

            <h1 class="mb-4 h3 text-secondary">Home</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Aluno</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Controles</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">

                    <?php

                    if (isset($_SESSION['msg'])) {

                        echo $_SESSION['msg'];

                        // Destroi o conteúdo da variável global após a sua impressão
                        unset($_SESSION['msg']);
                    }

                    $controle = new Controle();
                    $lista_alunos = $controle->listar();

                    foreach ($lista_alunos as $aluno) {

                        extract($aluno);

                        // Armazena a situação do aluno
                        $situacao_aluno;

                        if ($situacao == 1) {
                            $situacao_aluno = '<span style="color: green;">Aprovado</span>';
                        } else if ($situacao == 0) {
                            $situacao_aluno = '<span style="color: tomato;">Reprovado</span>';
                        } else if ($situacao == 2) {
                            $situacao_aluno = '<span class="text-info">Indefinido</span>';
                        }

                        if ($codigo == 100) { ?>
                            <tr class="d-none">
                                <td style="width: 10%;"><?= $codigo ?></td>
                                <td style="width: 50%;"><?= $aluno ?></td>
                                <td style="width: 15%;"><?= $situacao_aluno ?></td>
                                <td style="width: 25%;">
                                    <a class="nav-link d-inline-block me-2 text-success" href="visualizar.php?id=<?= $id ?>">
                                        Visualizar
                                    </a>
                                    <a class="nav-link d-inline-block me-2 text-danger" href="#">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php 
                        } else {
                        ?>

                            <tr>
                                <td style="width: 10%;"><?= $codigo ?></td>
                                <td style="width: 50%;"><?= $aluno ?></td>
                                <td style="width: 15%;"><?= $situacao_aluno ?></td>
                                <td style="width: 25%;">
                                    <a class="nav-link d-inline-block me-2 text-success" href="visualizar.php?id=<?= $id ?>">
                                        Visualizar
                                    </a>
                                    <!-- <a class="nav-link d-inline-block me-2 text-primary" href="editar.php?id=<?= $id ?>">
                                        Editar
                                    </a> -->
                                    <a class="nav-link d-inline-block me-2 text-danger" href="#">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

                    <?php } ?>

                </tbody>
            </table>

        </div>
    </div>

</body>

</html>