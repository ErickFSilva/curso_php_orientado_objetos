<?php

class Editar extends Conexao
{
    // Atributos
    private object $connect;
    private array $form_edit;

    // Get and set
    function __get($atributo)
    {
        return $this->$atributo;
    }

    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    // Métodos
    public function editar()
    {
        $this->connect = $this->connectDb();

        $sql_update = "";
    }
}