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

require "./ICurso.php";
require "./CursoGraduacao.php";
require "./CursoPosGraduacao.php";

$cursoPosGraduacao = new CursoPosGraduacao();

echo $cursoPosGraduacao->disciplina("Desenvolvimento Web");
echo $cursoPosGraduacao->professor("Cesar");

$cursoGraduacao = new CursoGraduacao();

echo $cursoGraduacao->disciplina("Rede");
echo $cursoGraduacao->professor("Cesar");

?>
    
</body>
</html>