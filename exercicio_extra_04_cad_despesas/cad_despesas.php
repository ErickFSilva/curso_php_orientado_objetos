<?php

session_start();
ob_start();

require_once "Conexao.php";
require_once "Despesas.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OO - Cadastrar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link active" aria-current="page" href="cad_despesas.php">Cadastrar</a>
                    </li>
                </ul>
            </nav>

            <div class="col-xl-10 offset-xl-1">
                <h1 class="h3 pb-2 mb-4 border-bottom border-secondary">
                    Cadastrar Despesas
                </h1>
            </div>

            <div class="col-xl-10 offset-xl-1">

                <?php

                // Recebe os dados pelo método 'POST' e no formato de 'string'
                $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                // Só executa a ação se o botão 'Cadastrar' doe clicado
                if(!empty($formData['cadDespesa']))
                {
                    // var_dump($formData);

                    $criaDespesa = new Despesas();
                    $criaDespesa->formData = $formData;
                    $retorno = $criaDespesa->cadastrarDespesas();

                    if($retorno)
                    {
                        $_SESSION["msg"] = '<p class="text-success">Despesa cadastrada com sucesso!</p>';
                        header("Location: index.php");
                        // echo "<p>Despesa cadastrada com sucesso!</p>";
                    }
                    else
                    {
                        $_SESSION["msg"] = '<p class="text-danger">Erro no cadastro da despesa!</p>';
                        header("Location: index.php");
                        // echo "<p>Erro no cadastro da despesa!</p>";
                    }
                }

                ?>

                <form method="POST" action="">

                    <div class="row justify-content-md-center">

                        <div class="col-md-8 col-lg-3">
                            <label class="w-100">
                                <div class="fs-4 py-2">
                                    <span class="text-bg-primary px-2 py-0 rounded">T</span>ipo
                                </div>
                                <select class="form-select" name="tipo" required>
                                    <!-- <option selected>-- Opcões --</option> -->
                                    <option value="cartao_passai">Cartão Passaí</option>
                                    <option value="cartao_hiper">Cartão Hipercard</option>
                                    <option value="dia_a_dia">Dia a dia</option>
                                    <option value="onibus_moto_taxi">Ônibus | Moto | Taxi</option>
                                    <option value="refeicao">Lanchonete | Refeição</option>
                                    <option value="utilitarios">Utilitários Domésticos</option>
                                    <option value="outras_dispesas">Outras Dispesas</option>
                                </select>
                            </label>
                        </div>

                        <div class="col-md-8 col-lg-5">
                            <label class="w-100">
                                <div class="fs-4 py-2">
                                    <span class="text-bg-info px-2 py-0 rounded">D</span>escrição:
                                </div>
                                <input type="text" class="form-control" name="descricao" required>
                            </label>
                        </div>

                        <div class="col-md-8 col-lg-2">
                            <label class="w-100">
                                <div class="fs-4 py-2">
                                    <span class="text-bg-warning px-2 py-0 rounded">V</span>alor:
                                </div>
                                <input type="text" class="form-control" name="valor" placeholder="Separar com '.'" required>
                            </label>
                        </div>

                        <div class="col-md-8 col-lg-2">
                            <label class="w-100">
                                <div class="fs-4 py-2">
                                    <span class="text-bg-danger px-2 py-0 rounded">D</span>ata:
                                </div>
                                <input type="date" class="form-control" name="_data" required>
                            </label>
                        </div>

                        <div class="col-md-8 col-lg-12 mt-3">
                            <input type="submit" class="btn btn-success" name="cadDespesa" value="Cadastrar">
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>

</body>

</html>