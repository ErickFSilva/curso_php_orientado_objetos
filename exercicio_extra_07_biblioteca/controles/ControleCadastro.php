<?php

class ControleCadastro extends Conexao
{
    // Atributos
    private object $connect;
    public array $formData;

    // Métodos
    public function cadastraLivro()//: bool
    {
        $this->connect = $this->connectDb();

        $sql_insert = "insert into biblioteca_livro values (null, :cod_livro, :titulo, :genero, :grupo, :paginas, :resumo, :data_inclusao, :autor, :espirito, :editora, :quantidade, :capa)";

        $query = $this->connect->prepare($sql_insert);

        $query->bindParam(':cod_livro', $this->formData['cod_livro']);
        $query->bindParam(':titulo', $this->formData['titulo']);
        $query->bindParam(':genero', $this->formData['genero']);
        $query->bindParam(':grupo', $this->formData['grupo']);
        $query->bindParam(':paginas', $this->formData['paginas']);
        $query->bindParam(':resumo', $this->formData['resumo']);
        $query->bindParam(':data_inclusao', $this->formData['data_inclusao']);
        $query->bindParam(':autor', $this->formData['autor']);
        $query->bindParam(':espirito', $this->formData['espirito']);
        $query->bindParam(':editora', $this->formData['editora']);
        $query->bindParam(':quantidade', $this->formData['quantidade']);
        $query->bindParam(':capa', "imagens/{$this->formData['capa']}");

        $query->execute();

        // if ($query->rowCount()) {

        //     return true;
        // } 
        // else {

        //     return false;
        // }
    }
}
