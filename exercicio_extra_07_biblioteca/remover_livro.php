<?php

session_start();
ob_start();

require "controles/Conexao.php";
require "controles/Remover.php";

$cod = null;

if(isset($_GET['cod'])) {
    $cod = $_GET['cod'];
}
else {
    echo 'GET não recebido';
}

$remover = new Remover();
$retorno = $remover->removerLivro($cod);

if($retorno) {

    $_SESSION['msg'] = "<p class='text-success'>Livro removido com sucesso!</p>";
    header('Location: livros.php');

}
else {

    $_SESSION['msg'] = "<p class='text-success'>Erro na remoção do livro!</p>";
    header('Location: livros.php');

}
