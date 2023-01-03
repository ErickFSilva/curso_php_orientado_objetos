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

require "Disciplina.php";

// Acessar o atributo sem criar o objeto
echo "Média: " . Disciplina::$media . "<hr>";

// Precisa instanciar a clase para criar o objeto e acessar o atributo
$disciplina = new Disciplina("Cesar", 9, 5);
echo $disciplina->situacao();

// 
echo "Média: " . Disciplina::situacaoAluno(5);

?>
    
</body>
</html>