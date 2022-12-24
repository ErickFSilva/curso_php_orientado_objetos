<?php

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

    <div class="mb-3" style="background-color: teal;">
        <div class="container">
            <h1 class="py-3 h3 text-light">Boletim Escolar</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Cód.</th>
                        <th scope="col">Aluno</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">

                    <?php

                    $controle = new Controle();
                    $lista_alunos = $controle->listar();

                    foreach ($lista_alunos as $aluno) {

                        extract($aluno);

                        if ($situacao) {
                            $situacao = '<span style="color: green;">Aprovado</span>';
                        } else {
                            $situacao = '<span style="color: tomato;">Reprovado</span>';
                        }

                    ?>

                        <tr>
                            <td style="width: 10%;"><?= $cod ?></td>
                            <td style="width: 50%;"><?= $aluno ?></td>
                            <td style="width: 15%;"><?= $situacao ?></td>
                            <td style="width: 25%;">
                                <a class="nav-link d-inline-block me-2 text-success" href="visualizar.php?id=<?= $id ?>">
                                    Visualizar
                                </a>
                                <a class="nav-link d-inline-block me-2" style="color: steelblue" href="#">
                                    Editar
                                </a>
                                <a class="nav-link d-inline-block me-2 text-danger" href="#">
                                    Excluir
                                </a>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>

        </div>
    </div>

</body>

</html>