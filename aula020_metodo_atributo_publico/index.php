<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OO</title>
</head>
<body>

<?php

require "Funcionario.php";

$funcionario = new Funcionario();

$funcionario->nome = "Erick";
$funcionario->salario = 4598.56;

echo $funcionario->verSalario();
?>
    
</body>
</html>