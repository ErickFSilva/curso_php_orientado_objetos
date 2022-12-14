<?php

class User extends Conn
{
    // Atributos
    public object $conn;
    public array $formData;

    // Métodos
    public function list(): array
    {
        $this->conn = $this->connectDb();

        $query_users = "select id, name, email from users order by id desc limit 40";

        $result_users = $this->conn->prepare($query_users);
        $result_users->execute();

        $retorno = $result_users->fetchAll();

        return $retorno;
    }

    public function create()
    {
        // echo "<pre>";
        // var_dump($this->formData);
        // echo "</pre>";

        $this->conn = $this->connectDb();

        $query_user = "insert into users (name, email, created) values (:name, :email, now())";

        // Preparando a query
        $add_user = $this->conn->prepare($query_user);
        $add_user->bindParam(':name', $this->formData['name']);
        $add_user->bindParam(':email', $this->formData['email']);
        
        // Executando a query
        $add_user->execute();

        // Verifica se foi cadastrado com sucesso
        if($add_user->rowCount())
        {
            return true;
        }
    }
}
