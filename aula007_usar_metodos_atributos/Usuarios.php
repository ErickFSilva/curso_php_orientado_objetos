<?php

    class Usuarios {

        // Atributos
        public string $nome;
        public int $idade;
        public String $email;

        // Métodos
        // Independente da tipagem, o retorno será um 'string'
        public function cadastrar($nome, $idade, $email): string 
        {
            
            $this->nome = $nome;
            $this->idade = $idade;
            $this->email = $email;

            // return 10;

            return "O usuario <strong>{$this->nome}</strong> com idade de <strong>{$this->idade}</strong> anos e o e-mail <strong>{$this->email}</strong>, cadastrado com sucesso!";

        }

    }

?>