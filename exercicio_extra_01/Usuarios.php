<?php

// Incorpora a classe Conexao.php
require_once "Conexao.php";

class Usuarios
{

    // Atributos
    public $connect;

    // Métodos
    public function listar()
    {

        $conexao = new Conexao();
        $this->connect = $conexao->conectar();

        $sqlSelect = "select nome, email from usuarios order by id";

        $query = $this->connect->prepare($sqlSelect);
        $query->execute();

        return $query->fetchAll();

    }
    
}
