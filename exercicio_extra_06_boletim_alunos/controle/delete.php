<?php

// Inicia uma sessão na página
session_start();

// Limpa o buffer de saída
ob_start();

// Receber o 'id' da URL pelo GET
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// echo '<pre>';
// var_dump($id);
// echo '</pre>';

// Verifica se o 'id' possui valor
if(!empty($id)) {

    // Incluir os arquivos 'Conexao' e 'Controle' ao arquivo
    require "Conexao.php";
    require "Controle.php";

    // Instancia a classe e cria o objeto de 'Controle'
    $controle = new Controle();
    
    // Envia o 'id', recebido por GET, para a classe 'Controle'
    $controle->id = $id;

    // Instancia o método 'apagar'
    $retorno = $controle->deletar();

    if($retorno) {

        $_SESSION['msg'] = '<p class="text-success">Usuário deletado com sucesso!</p>';
        header("Location: ../index.php");

    }
    else {

        $_SESSION['msg'] = '<p class="text-danger">Erro: Usuário não deletado!</p>';
        header("Location: ../index.php");

    }

}
else {

    $_SESSION['msg'] = '<p class="text-danger">Erro: Usuário não encontrado!</p>';
    header('Location: index.php');

}