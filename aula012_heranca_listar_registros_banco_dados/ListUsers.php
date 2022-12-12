<?php

class ListUsers extends Conn
{
    // Atributos
    public object $conn;

    // Métodos
    public function list()
    {
        $this->conn = $this->connect();
    }
}