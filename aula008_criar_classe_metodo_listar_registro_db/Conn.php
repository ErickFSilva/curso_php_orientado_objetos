<?php

    class Conn {

        // Atributos
        public $host = "localhost";
        public $user = "root";
        public $pass = "";
        public $dbname = "db_celke";
        public $port = 3306;
        public $connect = null;

        // Metodos
        public function conectar() {

            try {

                $this->connect = new PDO(
                    "mysql:host=" . $this->host . 
                    ";port=" . $this->port . // O uso da porta é opcional
                    ";dbname=" . $this->dbname, $this->user, $this->pass
                );

                echo "<p>Conexão realizada com sucesso!</p>";

                return $this->connect;

            }
            catch(Exception $err) {

                echo "<p>Conexão com o banco de dados não realizada com sucesso!</p>";
                echo "Erro: " . $err . "<hr>";

                return false;

            }

        }

    }