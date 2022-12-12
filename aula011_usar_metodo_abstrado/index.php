<!-- Incorpora as classes na página -->
<?php
    require "Cheque.php";
    require "ChequeComum.php";
    require "ChequeEspecial.php";
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
        <?php

        // A classe abstrata não pode ser estanciada

        $chequeComum = new ChequeComum(100.00, "Comum");
        echo $chequeComum->calcularJuro();

        $chequeEspecial = new ChequeEspecial(200.20, "Especial");
        echo $chequeEspecial->calcularJuro();

        ?>
    </div>

</body>

</html>