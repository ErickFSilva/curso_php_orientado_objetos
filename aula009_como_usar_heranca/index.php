<!-- Incorpora as classes na página -->
<?php
require "Cliente.php";
require "ClientePessoaFisica.php";
require "ClientePessoaJuridica.php";
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

        // 
        $cliente = new Cliente();

        $cliente->logradouro = "Rua Manoel Tavares Rocha, 64";
        $cliente->bairro = "Severiano Moraes Filho";

        $msg = $cliente->verEndereco();
        echo $msg . "<hr>";

        // 
        $clientePf = new ClientePessoaFisica();

        $clientePf->logradouro = "Rua Manoel Tavares Rocha, 64";
        $clientePf->bairro = "Severiano Moraes Filho";
        $clientePf->nome = "Erick Ferreira";
        $clientePf->cpf = "12345678901";

        $msgPf = $clientePf->verInformacaoUsuario();
        echo $msgPf . "<hr>";

        // 
        $clientePj = new ClientePessoaJuridica();

        $clientePj->logradouro = "Rua Sebastião Paes de Melo, 64";
        $clientePj->bairro = "Severiano Moraes Filho";
        $clientePj->nomeFantasia = "Ferreira Sistemas";
        $clientePj->cnpj = "26.006.341/0001-68";

        $msgPj = $clientePj->verInformacaoEmpresa();
        echo $msgPj . "<hr>";

        ?>
    </div>

</body>

</html>