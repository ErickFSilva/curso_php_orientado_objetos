<?php

abstract class Conexao {

    // Atributos
    private string $db = 'mysql';
    private string $host = '127.0.0.1';
    private string $port = '3306';
    private string $dbname = 'db_celke';
    private string $user = 'root';
    private string $pass = 'root';
    private object $connect;

    // Método - Estabelece a conexão
    public function connectDb(): object {

        try {

            $this->connect = new PDO($this->db.":host=".$this->host.";port=".$this->port.";dbname=".$this->dbname,$this->user,$this->pass);

            // echo 'Conexão estabelecida';
            return $this->connect;

        }
        catch(PDOException $erro) {

            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador <b>adm@php.br</b>");

        }

    }

}