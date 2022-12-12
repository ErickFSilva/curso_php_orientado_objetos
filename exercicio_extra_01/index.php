<!-- Incorpora a class Usuarios.php -->
<?php require_once "Usuarios.php" ?>

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

<body>

    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2 mt-4">

                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </thead>

                    <tbody class="table-group-divider">

                        <?php

                        // Variável que informará a quantidade de usuários
                        $id = 0;

                        // Instanciando a classe e criando o objeto $usuarios
                        $usuarios = new Usuarios();

                        // Chama o método listar
                        $lista_usuarios = $usuarios->listar();

                        // Imprime em tela os usuarios do banco
                        foreach ($lista_usuarios as $usuario) {


                            // Extrai os usuário do array
                            extract($usuario); // Opcional

                            $id++;

                        ?>
                            <!-- Linha da tabela -->
                            <tr>
                                <td><?= $id ?></td>
                                <td><?= $nome ?></td>
                                <td><?= $email ?></td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>

    </div>

</body>

</html>