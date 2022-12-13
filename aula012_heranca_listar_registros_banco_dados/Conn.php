<?php

abstract class Conn 
{
    // Atributos
    public string $db = "mysql";
    public string $host = "localhost";
    public string $user = "root";
    public string $pass = "";
    public string $dbname = "db_celke";
    public int $port = 3306; // Informar a porta é opcional em alguns servidores
    public object $connect;

    // Estabelecendo a conexão com o DB
    public function conectar()
    {
        try 
        {
            $this->connect = new PDO($this->db . ":host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname, $this->user, $this->pass);

            return $this->connect;
        }
        catch(Exception $err)
        {
            // O 'die' mata o processamento
            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador <b>adm@php.br</b>");
        }
    }
}