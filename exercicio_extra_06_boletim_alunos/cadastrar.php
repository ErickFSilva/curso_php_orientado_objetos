<?php

require "controle/Conexao.php";
require "controle/Controle.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Aluno - Cadastrar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

    <?php
    
    $pagina = 'cadastrar';
    require "navegacao.php";

    ?>

    <div class="container mt-4">
        <div class="row">

            <h1 class="mb-4 h3 text-secondary">Cadastrar Aluno</h1>

            <?php require "controle/cadastrar_controle.php"; ?>

            <form name="cadastrar_aluno" method="POST" action="">

                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 mb-3">
                    <fieldset class="mb-3">
                        <legend class="text-secondary">#Aluno</legend>

                        <div class="mb-3">
                            <label for="codigo">Código:</label>
                            <input type="number" min="101" class="form-control w-25" name="codigo" id="codigo" required>
                        </div>

                        <div class="mb-3">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" required>
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <legend class="text-secondary">#Notas</legend>

                        <div class="mb-3">
                            <label for="materia">Matéria:</label>
                            <select class="form-select" name="materia" id="materia" required>
                                <option value="">--- Selecione ---</option>
                                <option value="php">PHP</option>
                                <option value="java">Java</option>
                                <option value="python">Python</option>
                                <option value="javascript">Javascrit</option>
                                <option value="c">C</option>
                                <option value="c++">C++</option>
                                <option value="C#">C#</option>
                                <option value="design">Design</option>
                                <option value="banco_dados">Banco de dados</option>
                                <option value="bi">BI</option>
                                <option value="html5">HTML5</option>
                                <option value="css3">CSS3</option>
                                <option value="informatica">Informática</option>
                                <option value="redes">Redes</option>
                                <option value="seguranca">Segurança</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nota1">Nota 1</span>
                            <input type="number" name="nota1" value="0" min="0" max="10" class="form-control me-5" aria-describedat="nota1">

                            <span class="input-group-text" id="nota2">Nota 2</span>
                            <input type="number" name="nota2" value="0" min="0" max="10" class="form-control me-5" aria-describedat="nota2">

                            <span class="input-group-text" id="nota1">Média</span>
                            <input type="text" name="media" value="0" class="form-control" aria-describedat="nota1" disabled>
                        </div>
                    </fieldset>

                    <fieldset>
                        <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
                    </fieldset>
                </div>

            </form>

        </div>
    </div>

</body>

</html>