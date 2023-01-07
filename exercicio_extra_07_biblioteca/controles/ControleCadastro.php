<?php

class ControleCadastro extends Conexao
{
    // Atributos
    private object $connect;
    private array $formData;

    // Getters & Setters
    function __get($atributo)
    {
        return $this->$atributo;
    }

    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    // Métodos
    public function cadastraLivro(): bool
    {
        $data_atual = date("Y-m-d");

        $this->connect = $this->connectDb();

        $sql_insert = "insert into biblioteca_livro values (:cod_livro, :titulo, :cod_genero, :cod_grupo, :paginas, :resumo, :capa, :data_inclusao, :cod_autor, :cod_espirito, :cod_editora, :quantidade)";

        $query = $this->connect->prepare($sql_insert);

        $query->bindParam(':cod_livro', $this->formData['cod_livro']);
        $query->bindParam(':titulo', $this->formData['titulo']);
        $query->bindParam(':cod_genero', $this->formData['cod_genero']);
        $query->bindParam(':cod_grupo', $this->formData['cod_grupo']);
        $query->bindParam(':paginas', $this->formData['paginas']);
        $query->bindParam(':resumo', $this->formData['resumo']);
        $query->bindParam(':capa', "../imagens/{$this->formData['capa']}");
        $query->bindParam(':data_inclusao', $data_atual);
        $query->bindParam(':cod_autor', $this->formData['cod_autor']);
        $query->bindParam(':cod_espirito', $this->formData['cod_espirito']);
        $query->bindParam(':cod_editora', $this->formData['cod_editora']);
        $query->bindParam(':quantidade', $this->formData['quantidade']);

        $query->execute();

        if($query->rowCount()) {

            return true;
        }
        else {

            return false;
        }
    }
}