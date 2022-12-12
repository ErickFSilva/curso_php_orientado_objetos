<?php

    // Incorpora a classe Conn.php
    require_once "Conn.php";

    class Usuarios {

        // Atributos
        public $connect;

        // Métodos
        public function listar() {

            $conn = new Conn();
            $this->connect = $conn->conectar();

            $query_usuarios = "select id, nome, email from usuarios order by id desc limit 40";
            
            $result_usuarios = $this->connect->prepare($query_usuarios);
            $result_usuarios->execute();

            return $result_usuarios->fetchAll();
            
        }

    }

?>