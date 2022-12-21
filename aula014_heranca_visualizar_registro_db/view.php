<!-- Incorpora as classes na página -->
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
                        <a class="nav-link active" aria-current="page" href="index.php">Listar</a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link" href="Create.php">Cadastrar</a>
                    </li>
                </ul>
            </nav>

            <h1 class="mb-4">Detalhes do Usuário</h1>

            <?php

            // if (isset($_SESSION['msg'])) {
            //     echo $_SESSION['msg'];
            //     // Destroi o conteúdo da variável global após a sua impressão
            //     unset($_SESSION['msg']);
            // }

            // Recebe o ID do usuário via 'GET'
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            
            if(!empty($id))
            {
                // Incorpora as classes no arquivo
                require "Conn.php";
                require "User.php";

                // Instancia a classe e cria o objeto
                $viewUser = new User();
                // Envia o 'id' recuperado para o atributo 'id' da classe 'User'
                $viewUser->id = $id;

                // Instanciando o método visualizar
                $valueUser = $viewUser->view();

                extract($valueUser);

                echo "ID do usuário: $id <br>";
                echo "Nome do usuário: $name <br>";
                echo "E-mail do usuário: $email <br>";
                echo "Cadastrado: " . date('d/m/y H:i:s', strtotime($created)) . "<br>";
                echo "Editado: ";

                // Verifica se o 'id' possui valor
                if(!empty($modified))
                {
                    echo date('d/m/Y H:i:s', strtotime($modified));
                }
                
                echo "<br>";
            }
            else
            {
                $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
                header("Location: index.php");
            }

            ?>

        </div>
    </div>

</body>

</html>