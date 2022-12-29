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

// Verificar se o 'id' possui valor
if(!empty($id)) {

    // Incluir od arquivos
    require "Conn.php";
    require "User.php";

    // Instanciar a classe e criar objetos
    $deliteUser = new User();

    // Enviar o 'id' para o atributo da classe 'User'
    $deliteUser->id = $id;

    // Instanciar o método apagar
    $value = $deliteUser->delete();
    
    if($value) {
        $_SESSION['msg'] = '<p class="text-success">Usuário deletado com sucesso!</p>';
        header("Location: index.php");
    }
    else {
        $_SESSION['msg'] = '<p class="text-danger">Erro: Usuário não deletado!</p>';
        header("Location: index.php");
    }
}
else {

    $_SESSION['msg'] = '<p class="text-danger">Erro: Usuário não encontrado!</p>';
    header("Location: index.php");

}