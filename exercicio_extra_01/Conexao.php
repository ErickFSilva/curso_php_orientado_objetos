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

    // Métodos
    public function conectar()
    {

        try {

            $this->connect = new PDO(
                "mysql:host=" . $this->host .
                ";port=" . $this->port .
                ";dbname=" . $this->dbname, $this->user, $this->pass
            );

            // echo "<h5>Conexão estabelecida!</h5>";

            return $this->connect;

        } 
        catch (PDOException $erro) {

            echo "<h5>Falha na conexão!</h5>";
            echo "<hr> Código do erro: " . $erro->getCode();
            echo "<hr>" . $erro->getMessage();
        }
    }
}
