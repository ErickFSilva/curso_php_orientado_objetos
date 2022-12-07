<?php

use Usuario as GlobalUsuario;

    class Usuario{

        // Atributos
        public string $nome;
        public int $idade;
        public String $email;

        // Métodos
        // Independente da tipagem, o retorno será um 'string'
        public function cadastrar($nome, $idade, $email): string 
        {
            
            $this->nome = $nome;
            $this->idade = $idade;
            $this->email = $email;

            // return 10;

            return "O usuario <strong>{$this->nome}</strong> com idade de <strong>{$this->idade}</strong> anos e o e-mail <strong>{$this->email}</strong>, cadastrado com sucesso!";

        }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes e Objetos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body class="p-3">

    <?php

        $usuario = new Usuario();

        $msg = $usuario->cadastrar("Erick", 36, "erick.silva@php.br");
        echo $msg;

    ?>

</body>

</html>