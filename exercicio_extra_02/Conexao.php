<?php

class Conexao
{
    
    // Atributos
    public $host = "localhost";
    public $port = 3306;
    public $dbname = "db_celke";
    public $user = "root";
    public $pass = "";
    public $connect = null;

    // Método
    public function conectar()
    {

        try 
        {

            $this->connect = new PDO(
                "mysql:host=" . $this->host . 
                ";port=" . $this->port . 
                ";dbname=" . $this->dbname, $this->user, $this->pass
            );

            return $this->connect;

        }
        catch(PDOException $erro) 
        {

            echo "Erro na conexão!";
            echo $erro->getMessage();

        }

    }

}