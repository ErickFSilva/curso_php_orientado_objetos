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

    <!-- 
        create table if not exists cad_despesas (
            id int primary key auto_increment,
            tipo varchar(32) not null,
            descricao varchar(256) not null,
            valor float(5,2) not null,
            _data date not null
        ); 
    -->

    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-10 offset-xl-1">
                <form method="POST" action="">

                    <div class="row justify-content-md-center">

                        <div class="col-md-8 col-lg-2">
                            <label class="w-100">
                                <div class="fs-4 py-2">
                                    <span class="text-bg-primary px-2 py-0 rounded">T</span>ipo
                                </div>
                                <select class="form-select" name="tipo" required>
                                    <option selected>-- Opcões --</option>
                                    <option value="cartao_passai">Cartão Passaí</option>
                                    <option value="cartao_hiper">Cartão Hipercard</option>
                                    <option value="dia_a_dia">Dia a dia</option>
                                    <option value="onibus_moto_taxi">Ônibus | Moto | Taxi</option>
                                    <option value="refeicao">Lanchonete | Refeição</option>
                                    <option value="utilitarios">Utilitários Domésticos</option>
                                </select>
                            </label>
                        </div>

                        <div class="col-md-8 col-lg-6">
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
                                <input type="number" class="form-control" name="valor" required>
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

                        <div class="col-md-8 col-lg-2 py-2">
                            <input type="submit" class="btn btn-primary" name="cadDespesa" value="Cadastrar">
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>

</body>

</html>