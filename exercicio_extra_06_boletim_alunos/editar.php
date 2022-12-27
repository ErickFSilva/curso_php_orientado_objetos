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
    <title>Notas Aluno - Cadastrar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

    <?php

    $pagina = 'editar';
    require "navegacao.php";

    ?>

    <div class="container mt-4">
        <div class="row">

            <h1 class="mb-4 h3 text-secondary">Cadastrar Aluno</h1>

            <?php

            // Instancia a classe e cria o objeto
            $controle = new Controle();

            // Exibe a mensagem da variável global '$_SESSION'
            if (isset($_SESSION['msg'])) {

                echo $_SESSION['msg'];

                // Destroi o conteúdo da variável global após a sua impressão
                unset($_SESSION['msg']);
            }

            // Recebe os dados pelo método 'POST' e no formato de string
            $form_data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            // Só executa a ação se o botão 'cadastrar' for clicado
            if (!empty($form_data['editar'])) {

                $controle->formData = $form_data;

                $valor_msg = $controle->editar2();

                if ($valor_msg) {

                    $_SESSION['msg'] = '<p class="text-success">Aluno editado com sucesso!</p>';
                    header('Location: index.php');
                } else {

                    $_SESSION['msg'] = '<p class="text-danger">Erro na edição do aluno!</p>';
                    header('Location: index.php');
                }
            }

            // Recebe o 'id' do usuário via 'GET'
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $materia = filter_input(INPUT_GET, 'materia', FILTER_DEFAULT);
            
            // Verifica se 'id' possiu valor
            if (!empty($id)) {

                // Envia o 'id' e a 'materia', recuperado pelo GET, para o atributo 'id' e 'materia' da classe 'Controle'
                $controle->id = $id;
                $controle->materia = $materia;

                // Instanciando o método visualizar
                $boletim_alunos = $controle->visualizar2();

                // echo '<pre>';
                // var_dump($boletim_alunos);
                // echo '</pre>';

                extract($boletim_alunos);

            ?>

                <form name="cadastrar_aluno" method="POST" action="">

                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3 mb-3">
                        <fieldset class="mb-3">
                            <legend class="text-secondary"># Aluno</legend>

                            <div class="mb-3">
                                <input type="hidden" class="form-control w-25" name="id" value="<?= $id ?>">
                            </div>

                            <div class="mb-3">
                                <label for="codigo">Código:</label>
                                <input type="number" value="<?= $codigo ?>" class="form-control w-25" name="codigo" id="codigo" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="aluno">Aluno:</label>

                                <!-- Campo que enviará os dados -->
                                <input type="hidden" value="<?= $aluno ?>" class="form-control" name="aluno" id="aluno">

                                <!-- Apenas para exibição -->
                                <input type="text" value="<?= $aluno ?>" class="form-control" disabled>
                            </div>
                        </fieldset>

                        <fieldset class="mb-3">
                            <legend class="text-secondary"># Matéria</legend>

                            <div class="mb-3 w-50">
                                <label for="materia">Matéria:</label>

                                <!-- Campo que enviará os dados -->
                                <input class="form-control" type="hidden" name="materia" id="materia" value="<?= $materia ?>">

                                <!-- Apenas para exibição -->
                                <input class="form-control" type="text" value="<?= $materia ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <div class="d-inline-block me-4">
                                    <label for="nota1">Nota 1:</label>
                                    <input type="number" value="<?= $nota1 ?>" id="nota1" name="nota1" min="0" max="10" class="form-control" style="width: 70px;">
                                </div>

                                <div class="d-inline-block">
                                    <label for="nota2">Nota 2:</label>
                                    <input type="number" value="<?= $nota2 ?>" id="nota2" name="nota2" min="0" max="10" class="form-control" style="width: 70px;">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <input type="submit" name="editar" value="Editar" class="btn btn-primary">
                        </fieldset>
                    </div>

                </form>

            <?php

            } else {
                $_SESSION['msg'] = '<p class="text-danger">Erro: Usuário não encontrado!</p>';
                header('Location: index.php');
            }

            ?>

        </div>
    </div>

</body>

</html>