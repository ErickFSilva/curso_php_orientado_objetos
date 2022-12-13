<?php

class ListUsers extends Conn
{
    // Atributos
    public object $conn;

    // Métodos
    public function listar(): array
    {
        // Preparando a conexão
        $this->conn = $this->conectar();

        // Query
        $sqlSelect = "select id, name, email from users order by id desc limit 40";

        // Preparando e executando a query no banco
        $query = $this->conn->prepare($sqlSelect);
        $query->execute();

        // Lendo todos os dados retornados pela query
        $retorno = $query->fetchAll();

        return $retorno;
    }
}