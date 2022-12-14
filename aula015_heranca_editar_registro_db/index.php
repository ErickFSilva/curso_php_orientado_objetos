<!-- Incorpora as classes na página -->
<?php
session_start();

require "Conn.php";
require "User.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - PHP OO</title>

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
                        <a class="nav-link active" aria-current="page" href="index.php">Listar</a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link" href="Create.php">Cadastrar</a>
                    </li>
                </ul>
            </nav>

            <h1 class="mb-4">Listar Usuário</h1>

            <?php

            if(isset($_SESSION['msg'])) {

                echo $_SESSION['msg'];

                // Destroi o conteúdo da variável global após a sua impressão
                unset($_SESSION['msg']);

            }

            $listUser = new User();
            $result_users = $listUser->list();

            foreach($result_users as $row_user) {

                extract($row_user);

                echo "ID: $id <br>";
                echo "Nome: $name <br>";
                echo "E-mail: $email <br>";
                echo "<a href='view.php?id=$id' class='nav-link text-primary'>Visualizar</a><br>";
                echo "<a href='edit.php?id=$id' class='nav-link text-primary'>Editar</a><br>";
                echo "<hr>";
                
            }

            ?>

        </div>
    </div>

</body>

</html>