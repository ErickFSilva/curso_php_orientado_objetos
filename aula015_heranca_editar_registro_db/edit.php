<!-- Incorpora as classes na página -->
<?php

session_start();
ob_start();

// Incorpora as classes no arquivo
require "Conn.php";
require "User.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - PHP OO</title>

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

            <h1 class="mb-4">Editar o Usuário</h1>

            <?php

            if (isset($_SESSION['msg'])) {

                echo $_SESSION['msg'];

                // Destroi o conteúdo da variável global após a sua impressão
                unset($_SESSION['msg']);

            }

            // Receber os dados do formulário
            $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            // Verifica se o usuário clicou no botão
            if(!empty($formData['SendEditUser'])) {

                $editUser = new User();
                $editUser->formData = $formData;
                
                $value = $editUser->edit();

                if($value) {

                    $_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso!</p>";
                    header("Location: index.php"); 

                }
                else {

                    echo "<p style='color: tomato;'>Erro: Usuário não editado!</p>";

                }

            }

            // Recebe o ID do usuário via 'GET'
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

            // Verificar se o 'id' possui valor
            if (!empty($id)) {

                // Instancia a classe e cria o objeto
                $viewUser = new User();

                // Envia o 'id' recuperado para o atributo 'id' da classe 'User'
                $viewUser->id = $id;

                // Instanciando o método visualizar
                $valueUser = $viewUser->view();

                extract($valueUser);

            ?>

                <form name="EditUser" method="POST" action="">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    
                    <label>
                        Nome:
                        <input type="text" name="name" class="form-control" placeholder="Nome completo" value="<?= $name ?>" required>
                    </label>
                    <br><br>
                    <label>
                        E-mail:
                        <input type="email" name="email" class="form-control" placeholder="Melhor e-mail" value="<?= $email ?>" required>
                    </label>
                    <br><br>
                    <input type="submit" value="Editar" name="SendEditUser" class="btn btn-primary">
                </form>

            <?php

            } else {

                $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
                header("Location: index.php");

            }

            ?>

        </div>
    </div>

</body>

</html>