<?php

abstract class Conexao
{
    // Atributos
    private string $db = "mysql";
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $dbname = "db_celke";
    private int $port = 3306;
    private object $connect;

    // Método que estabelece a conexão com o DB
    public function conectar()
    {
        try 
        {
            $this->connect = new PDO($this->db . ":host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname, $this->user, $this->pass);

            // echo "<p>Conexão estabelecida!</p>";

            return $this->connect;
        } 
        catch (Exception $erro) 
        {
            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador <b>adm@php.br</b> e informe o código do erro ".$erro->getCode());
        }
    }
}
