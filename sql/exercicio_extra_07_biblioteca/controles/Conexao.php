<?php

abstract class Conexao
{
    // Atributos
    private string $db = 'mysql';
    private string $host = 'localhost';
    private string $port = '3306';
    private string $dbname = 'db_celke';
    private string $user = 'root';
    private string $pass = 'root';
    private object $connect;

    // Métodos
    public function connectDb(): object
    {
        try {
            $this->connect = new PDO($this->db.':host='.$this->host.';port='.$this->port.';dbname='.$this->dbname,$this->user,$this->pass);

            return $this->connect;
        }
        catch(PDOException $erro)
        {
            die('<b>Erro na conexão:</b><br> ' . $erro->getMessage());
        }
    }
}