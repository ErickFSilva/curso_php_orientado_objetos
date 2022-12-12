<?php

// Incorpora a classe Conexao.php
require_once "Conexao.php";

class ClientesPj 
{

    // Atributos
    public $connect;

    // Métodos
    public function listar() 
    {

        $conexao = new Conexao();
        $this->connect = $conexao->conectar();

        $sqlSelectPj = "
            select c.id, cjus.nome_fantasia, c.email, cjus.cnpf, c.endereco, cjus.id_cliente 
            from extra_02_clientes c
            inner join extra_02_clientes_pj cjus on c.id = cjus.id_cliente
            order by c.id
        ";

        $query = $this->connect->prepare($sqlSelectPj);
        $query->execute();

        return $query;

    }

}