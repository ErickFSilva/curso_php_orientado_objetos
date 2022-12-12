<!-- Incorpora a classe Usuarios.php -->
<?php require "Usuarios.php" ?>

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

    <?php

        // Instanciando a classe e criando o objeto $listarUsuarios
        $listarUsuarios = new Usuarios();

        // Instancia o método listar
        $result_usuarios = $listarUsuarios->listar();

        // Imprimindo os usuários
        foreach($result_usuarios as $row_usuario) {

            // echo "<pre>";
            // var_dump($row_usuario);
            // echo "</pre>";

            extract($row_usuario);
            echo "<hr>";
            echo "ID do usuário $id <br>";
            echo "ID do usuário $nome <br>";
            echo "ID do usuário $email <br>";

        }

    ?>

</body>

</html>