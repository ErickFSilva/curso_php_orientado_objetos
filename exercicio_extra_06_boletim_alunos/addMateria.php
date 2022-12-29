<?php

session_start();
ob_start();

require "controle/Conexao.php";
require "controle/Controle.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Aluno - Add. Materia</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

    <?php

    $pagina = 'add_materia';
    require "navegacao.php";

    ?>

    <div class="container mt-4">
        <div class="row">

            <h1 class="mb-4 h3 text-secondary">Adicionar Matéria</h1>

            <?php
            $controle = new Controle();

            // Recebe o ID do usuário via 'GET'
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

            // Recupera os dados do aluno visualizado
            $dados_aluno = $controle->visualizar3($id);

            // echo $dados_aluno['aluno'];

            // Exibe a mensagem da variável global '$_SESSION'
            // if (isset($_SESSION['msg'])) {

            //     echo $_SESSION['msg'];

            //     // Destroi o conteúdo da variável global após a sua impressão
            //     unset($_SESSION['msg']);
            // }

            // Recebe os dados pelo método 'POST' e no formato de string
            $form_data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            // Só executa a ação se o botão 'cadastrar' for clicado
            if (!empty($form_data['add_materia'])) {

                $controle->formData = $form_data;

                $valor_msg = $controle->addMateria();

                if ($valor_msg) {

                    $_SESSION['msg'] = '<p class="text-success">Matéria adicionada com sucesso!</p>';
                    header('Location: index.php');
                } else {

                    $_SESSION['msg'] = '<p class="text-danger">Erro ao adicionar matéria!</p>';
                    header('Location: index.php');
                }
            }
            ?>

            <form name="form_materia" method="POST" action="">

                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 mb-3">
                    <fieldset class="mb-3">
                        <legend class="text-secondary"># Aluno</legend>

                        <!-- Passa o 'id' do aluno para o 'formData'  -->
                        <input type="hidden" value="<?= $dados_aluno['id'] ?>" class="form-control w-25" name="id" id="id">

                        <div class="mb-3">
                            <label for="codigo">Código:</label>
                            <input type="hidden" value="<?= $dados_aluno['codigo'] ?>" class="form-control w-25" name="codigo" id="codigo">
                            <input type="number" value="<?= $dados_aluno['codigo'] ?>" class="form-control w-25" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="aluno">Aluno:</label>
                            <input type="hidden" value="<?= $dados_aluno['aluno'] ?>" class="form-control" name="aluno" id="aluno">
                            <input type="text" value="<?= $dados_aluno['aluno'] ?>" class="form-control" disabled>
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <legend class="text-secondary"># Matéria</legend>

                        <div class="mb-3 w-50">
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
                    </fieldset>

                    <fieldset>
                        <input type="submit" name="add_materia" value="Adicionar" class="btn btn-primary">
                    </fieldset>
                </div>

            </form>

        </div>
    </div>

</body>

</html>