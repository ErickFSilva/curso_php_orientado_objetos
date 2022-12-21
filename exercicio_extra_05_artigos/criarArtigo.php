<?php

session_start();
ob_start();

require "controle/Conexao.php";
require "controle/CriarArtigos.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Artigo</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand navbar-dark bg-success">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Voltar</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <?php

            // Recebe os dados pelo método 'POST' e no formato de 'string'
            $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            // Só executa a ação se o botão 'Cadastrar' for clicado
            if(!empty($formData['cad_artigo'])) {

                $criaArtigo = new CriarArtigos();
                $criaArtigo->formData = $formData;

                $msg = $criaArtigo->criar();

                if($msg) {

                    $_SESSION['msg'] = "<p style='padding-top: 20px; color: darkgreen'>Artigo cadastrado com sucesso!</p>";
                    header('Location: index.php');

                }
                else {

                    $_SESSION['msg'] = "<p style='padding-top: 20px; color: tomato'>Erro no cadastro do Artigo!</p>";
                    header('Location: index.php');

                }

            }

            ?>

            <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-2 my-3">
                <form name="form_cria_artigo" method="POST" action="">

                    <fieldset>

                        <legend class="mb-3 pb-3 border-bottom">Cadastrar Artigo</legend>

                        <div class="mb-3">
                            <label for="titulo_art" class="form-label">Título</label>
                            <input type="text" name="titulo" id="titulo_art" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="texto_art" class="form-label">Texto</label>
                            <textarea name="texto" id="texto_art" class="form-control" rows="7" required></textarea>
                        </div>

                    </fieldset>

                    <input type="submit" value="Cadastrar" name="cad_artigo" class="btn btn-secondary">

                </form>
            </div>

        </div>
    </div>

</body>

</html>