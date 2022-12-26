<?php

$controle = new Controle();

// Armazena o último código de aluno cadastrado
$ultimo_codigo = $controle->ultimoCodAluno();
$ultimo_codigo += 1;

// Recebe os dados pelo método 'POST' e no formato de string
$form_data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Só executa a ação se o botão 'cadastrar' for clicado
if(!empty($form_data['cadastrar'])) {

    $controle->formData = $form_data;
    $valor_msg = $controle->cadastrar();

    if($valor_msg) {

        $_SESSION['msg'] = '<p>Aluno cadastrado com sucesso!</p>';
        header('Location: index.php');

    }
    else {

        $_SESSION['msg'] = '<p>Erro no cadastrado do aluno!</p>';
        header('Location: index.php');

    }

}