<?php
require "Conexao.php";
require "ListaArtigosApre.php";
require "ListaArtigosComp.php";
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

<body class="p-4">

    <div class="container">
        <div class="row">

            <div class="col-lg-8 offset-lg-2">
                <?php
                $listaApre = new ListaArtigosApre();
                $lista_artigos = $listaApre->listarArtigos();

                foreach ($lista_artigos as $artigo) {
                    $cont = 0;
                    extract($artigo);
                ?>

                    <div class="card mb-4">
                        <div class="card-header">
                            <?= $titulo ?>
                        </div>
                        <div class="card-body">
                            <?= $texto ?>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="nav-link text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <span style="font-size: 13px;">continue lendo...</span>
                            </a>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        TÍTULO
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    CONTEÚDO
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php
                    $cont++;
                }
                ?>
            </div>

        </div>
    </div>

</body>

</html>