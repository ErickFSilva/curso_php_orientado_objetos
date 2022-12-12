<?php require "Usuarios.php" ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes e Objetos</title>
</head>

<body>

    <?php

        $usuario = new Usuario();
        $msg = $usuario->cadastrar();
        echo $msg;

    ?>



</body>

</html>