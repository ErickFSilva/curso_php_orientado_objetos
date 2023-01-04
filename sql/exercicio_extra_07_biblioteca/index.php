<?php

require "controles/Conexao.php";
require "controles/ControleVisualizar.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>

    <?php

    require "navegacao.php";

    $controle_visualizar = new ControleVisualizar();
    $livros = $controle_visualizar->visualizar();

    ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10 offset-md-1 mt-4">

                <table class="table">

                    <?php

                    foreach ($livros as $livro) {

                        // echo '<pre>';
                        // var_dump($livro);
                        // echo '</pre>';

                    ?>

                        <thead>
                            <tr>
                                <th>Cód. Livro</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Editora</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td><?= $livro['cod_livro'] ?></td>
                                <td><?= $livro['titulo'] ?></td>
                                <td><?= $livro['autor'] ?></td>
                                <td><?= $livro['razao'] ?></td>
                                <td>
                                    <a href="pdf/livro_o-livro-dos-espiritos.pdf" data-bs-toggle="modal" data-bs-target="#exampleModal" title="o-livro-dos-espiritos">
                                        Visualizar
                                    </a>
                                </td>
                            </tr>
                        </tbody>

                    <?php } ?>

                </table>

            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <?= $livros['titulo'] ?>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p>
                        <?php ?>
                    </p>
                    <div>
                        <a href="pdf/livro_o-livro-dos-espiritos.pdf" target="_blank" title="a-genese">
                            <img src="<?php ?>" class="img-fluid rounded" alt="capa_a-genese">
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

</body>

</html>