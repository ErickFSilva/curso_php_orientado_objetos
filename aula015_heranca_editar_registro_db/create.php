<!-- Incorpora as classes na página -->
<?php
session_start();
ob_start();

require "Conn.php";
require "User.php";
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
        <div class="row">

            <nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a class="nav-link" href="index.php">Listar</a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link active" aria-current="page" href="Create.php">Cadastrar</a>
                    </li>
                </ul>
            </nav>

            <h1 class="mb-4">Cadastrar Usuário</h1>

            <?php

            // Recebe os dados pelo método 'POST' e no formato de 'string'.
            $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            // Só executa a ação se o botão 'Cadastrar' for clicado
            if(!empty($formData['SendAddUser'])) {
				
                // var_dump($formData);
                
                $createUser = new User();
                $createUser->formData = $formData;
                $valorCad = $createUser->create();

                if($valorCad)
                {
                    $_SESSION['msg'] = "<p>Usuário cadastrado com sucesso!</p>";
                    header("Location: index.php");
                }
                else 
                {
                    $_SESSION['msg'] = "<p>Erro no cadastro do usuário!</p>";
                    header("Location: index.php");
                }
				
            }

            ?>

            <form name="CreateUser" method="POST" action="">
                <label>
                    Nome:
                    <input type="text" name="name" class="form-control" placeholder="Nome completo" required>
                </label>
                <br><br>
                <label>
                    E-mail:
                    <input type="email" name="email" class="form-control" placeholder="Melhor e-mail" required>
                </label>
                <br><br>
                <input type="submit" value="Cadastrar" name="SendAddUser" class="btn btn-primary">
            </form>

        </div>
    </div>

</body>

</html>