<?php

// Incorpora a classe Conexao.php
require_once "Conexao.php";

class ClientesPf 
{

    // Atributos
    public $connect;


    // Métodos
    public function listar()
    {

        $conexao = new Conexao();
        $this->connect = $conexao->conectar();

        $sqlSelectPf = "
            select c.id, cfis.nome, c.email, cfis.cpf, c.endereco, cfis.id_cliente 
            from extra_02_clientes c
            inner join extra_02_clientes_pf cfis on c.id = cfis.id_cliente
            order by c.id
        ";

        $query = $this->connect->prepare($sqlSelectPf);
        $query->execute();

        return $query->fetchAll();

    }

}