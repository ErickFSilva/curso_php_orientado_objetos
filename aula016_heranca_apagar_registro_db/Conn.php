<?php

abstract class Conn
{
    // Atributos
    public string $db = "mysql";
    public string $host = "localhost";
    public string $user = "root";
    public string $pass = "root";
    public string $dbname = "db_celke";
    public int $port = 3306;
    public object $connect;

    // Método
    public function connectDb(): object
    {
        try{
            $this->connect = new PDO($this->db . ":host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname, $this->user, $this->pass);

            // echo "Conexão estabelecida!";

            return $this->connect;
        }
        catch(PDOException $err)
        {
            // O 'die' mata o processamento
            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador <b>adm@php.br</b>");
        }
    }
}