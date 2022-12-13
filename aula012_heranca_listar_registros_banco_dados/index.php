<!-- Incorpora as classes na página -->
<?php
require "Conn.php";
require "ListUsers.php";
?>

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
</head>

<body class="p-3">

    <div class="container">

        <div class="border rounded p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">

                    <?php

                    $listUsers = new ListUsers();
                    $result_users = $listUsers->listar();

                    foreach ($result_users as $user) {
                        // Extrai o conteúdo de um array
                        extract($user);
                    ?>

                        <tr>
                            <th scope="row"><?= $id ?></th>
                            <td><?= $name ?></td>
                            <td><?= $email ?></td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>

</body>

</html>