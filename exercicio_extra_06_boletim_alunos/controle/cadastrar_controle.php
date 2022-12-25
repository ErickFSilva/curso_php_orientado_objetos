<?php

// Recebe os dados pelo método 'POST' e no formato de string
$form_data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Só executa a ação se o botão 'cadastrar' for clicado
if(!empty($form_data['cadastrar'])) {

    var_dump($form_data);

}