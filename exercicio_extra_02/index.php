<?php require_once "ClientesPf.php" ?>
<?php require_once "ClientesPj.php" ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OO</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>

    </script>
</head>

<body>

    <div class="container">
        <div class="row">

            <div class="col-xxl-6 p-3">

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>E-MAIL</th>
                            <th>CPF</th>
                            <th>ENDEREÇO</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        <?php

                        $clientesPf = new ClientesPf();
                        $lista_clientesPf = $clientesPf->listar();

                        foreach ($lista_clientesPf as $clientePf) {

                            extract($clientePf);
                            
                        ?>

                            <tr>
                                <td><?= $id ?></td>
                                <td><?= $nome ?></td>
                                <td><?= $email ?></td>
                                <td><?= $cpf ?></td>
                                <td><?= $endereco ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>

                </table>

            </div>

            <div class="col-xxl-6 p-3">

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME FANTASIA</th>
                            <th>E-MAIL</th>
                            <th>CNPJ</th>
                            <th>ENDEREÇO</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        <?php

                        $clientesPj = new ClientesPj();
                        $lista_clientesPj = $clientesPj->listar();

                        foreach ($lista_clientesPj as $clientePj) {

                            extract($clientePj);

                        ?>

                            <tr>
                                <td><?= $id ?></td>
                                <td><?= $nome_fantasia ?></td>
                                <td><?= $email ?></td>
                                <td><?= $cnpf ?></td>
                                <td><?= $endereco ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>

                </table>

            </div>

        </div>
    </div>

</body>

</html>