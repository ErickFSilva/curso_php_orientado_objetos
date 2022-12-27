<?php

$controle = new Controle();

// Armazena o último código de aluno cadastrado
$ultimo_codigo = $controle->ultimoCodigo();
$ultimo_codigo += 1;

// Exibe a mensagem da variável global '$_SESSION'
if (isset($_SESSION['msg'])) {

    echo $_SESSION['msg'];

    // Destroi o conteúdo da variável global após a sua impressão
    unset($_SESSION['msg']);
}

// Recebe os dados pelo método 'POST' e no formato de string
$form_data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Só executa a ação se o botão 'cadastrar' for clicado
if (!empty($form_data['cadastrar'])) {

    $controle->formData = $form_data;
    
    $valor_msg = $controle->cadastrar();

    if ($valor_msg) {

        $_SESSION['msg'] = '<p class="text-success">Aluno cadastrado com sucesso!</p>';
        header('Location: index.php');
    } else {

        $_SESSION['msg'] = '<p class="text-danger">Erro no cadastrado do aluno!</p>';
        header('Location: index.php');
    }
}
