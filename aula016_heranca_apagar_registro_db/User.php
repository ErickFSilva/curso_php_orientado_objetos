<?php

class User extends Conn
{
    // Atributos
    public object $conn;
    public array $formData;
    public int $id;

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

    public function create(): bool
    {

        $this->conn = $this->connectDb();

        $query_user = "insert into users (name, email, created) values (:name, :email, now())";

        $add_user = $this->conn->prepare($query_user);
        $add_user->bindParam(':name', $this->formData['name']);
        $add_user->bindParam(':email', $this->formData['email']);
        $add_user->execute();

        // Verifica se foi cadastrado com sucesso!
        if ($add_user->rowCount()) {

            return true;

        } else {

            return false;

        }
    }

    public function view(): array
    {

        $this->conn = $this->connectDb();

        $query_user = "SELECT id, name, email, created, modified FROM users WHERE id = :id LIMIT 1";

        $result_user = $this->conn->prepare($query_user);
        $result_user->bindParam(':id', $this->id);
        $result_user->execute();

        // Retorna apenas um registro
        $value = $result_user->fetch();

        return $value;
    }

    public function edit(): bool {

        $this->conn = $this->connectDb();

        $query_user = "update users set name = :name, email = :email, modified = now() where id = :id";

        $edit_user = $this->conn->prepare($query_user);
        $edit_user->bindParam(':name', $this->formData['name']);
        $edit_user->bindParam(':email', $this->formData['email']);
        $edit_user->bindParam(':id', $this->formData['id']);
        $edit_user->execute();

        // Verifica se foi atualizado com sucesso!
        if($edit_user->rowCount()) {

            return true;

        }
        else {

            return false;

        }

    }
}
