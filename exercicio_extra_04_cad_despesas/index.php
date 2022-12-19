<?php

session_start();
ob_start();

require_once "Conexao.php";
require_once "Despesas.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OO - Home</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link" href="cad_despesas.php">Cadastrar</a>
                    </li>
                </ul>
            </nav>

            <div class="col-xl-10 offset-xl-1">
                <h1 class="h3 pb-2 mb-4 border-bottom border-secondary">
                    Despesas Cadastradas
                </h1>
            </div>

            <?php

            if (isset($_SESSION["msg"])) {
                // Imprime a variável global
                echo $_SESSION["msg"];

                // Destroi o conteúdo da variável global após a sua impressão
                unset($_SESSION["msg"]);
            }

            ?>

            <div class="col-xl-10 offset-xl-1">

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        <?php

                        $despesas = new Despesas();
                        $listaDespesas = $despesas->listarDespesas();

                        foreach ($listaDespesas as $despesa) {
                            extract($despesa);
                        ?>

                            <tr>
                                <td><?= $id ?></td>
                                <td><?= $tipo ?></td>
                                <td><?= $descricao ?></td>
                                <td><?= $valor ?></td>
                                <td><?= $_data ?></td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div>

</body>

</html>