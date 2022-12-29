<?php

session_start();
ob_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Aluno - Visualizar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    $pagina = 'visualizar';
    require "navegacao.php";
    ?>

    <div class="container mt-4">
        <div class="row">

            <h1 class="mb-4 h3 text-secondary">Boletim do Aluno</h1>

            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cód.</th>
                            <th scope="col">Aluno</th>
                            <th scope="col">Matéria</th>
                            <th scope="col">1ª nota</th>
                            <th scope="col">2ª Nota</th>
                            <th scope="col">Média</th>
                            <th scope="col">Situação</th>
                            <th scope="col">Controle</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">

                        <?php

                        if (isset($_SESSION['msg'])) {

                            echo $_SESSION['msg'];

                            // Destroi o conteúdo da variável global após a sua impressão
                            unset($_SESSION['msg']);
                        }

                        // Recebe o ID do usuário via 'GET'
                        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

                        // Verifica se o 'id' possui valor
                        if (!empty($id)) {

                            // Incorpora as classes no arquivo
                            require "controle/Conexao.php";
                            require "controle/Controle.php";

                            // Instancia a classe e cria o objeto
                            $controle = new Controle();

                            // Envia o 'id', recuperado pelo GET, para o atributo 'id' da classe 'Controle'
                            $controle->id = $id;

                            // Instancia o método 'visualizar()', transformando uma variável em array
                            $boletim_alunos = $controle->visualizar();
                            
                        ?>

                            <div class="col-12">
                                <div class="navbar">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-3 text-bg-success rounded" href="addMateria.php?id=<?= $id ?>">
                                                Add. Matéria
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <?php

                            foreach ($boletim_alunos as $aluno => $valor) {

                                extract($valor);

                                // Armazena a situação do aluno
                                $situacao_aluno = null;

                                if ($valor['situacao'] == '1') {

                                    $situacao_aluno = '<span style="color: green;">Aprovado</span>';
                                } else if ($valor['situacao'] == '0') {

                                    $situacao_aluno = '<span style="color: tomato;">Reprovado</span>';
                                } else if ($valor['situacao'] == '2') {

                                    $situacao_aluno = '<span class="text-info">Indefinido</span>';
                                }

                            ?>

                                <tr>
                                    <td style="width: 7%;"><?= $codigo ?></td>
                                    <td style="width: 36%"><?= $aluno ?></td>
                                    <td style="width: 17%"><?= $materia ?></td>
                                    <td style="width: 8%;"><?= $nota1 ?></td>
                                    <td style="width: 8%;"><?= $nota2 ?></td>
                                    <td style="width: 8%;"><?= $media ?></td>
                                    <td style="width: 8%;"><?= $situacao_aluno ?></td>
                                    <td class="text-bg-warning text-center" style="width: 8%;">
                                        <a class="nav-link" href="editar.php?id=<?= $id ?>&&materia=<?= $materia ?>">
                                            Editar
                                        </a>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>

                        <?php
                        } else {

                            $_SESSION['msg'] = '<p style="color: #f00;">Erro: Usuário não encontrado!</p>';
                            header('Location: index.php');
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>