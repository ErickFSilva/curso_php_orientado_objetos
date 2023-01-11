<?php

class Editar extends Conexao
{
    // Atributos
    private object $connect;
    private array $form_edit;

    // Get and set
    function __get($atributo)
    {
        return $this->$atributo;
    }

    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    // Métodos
    public function editar(): bool
    {
        $this->connect = $this->connectDb();

        $sql_update = "update biblioteca_livro set cod_livro = :cod_livro, titulo = :titulo, genero = :genero, grupo = :grupo, paginas = :paginas, resumo = :resumo, autor = :autor, espirito = :espirito, editora = :editora, data_update = now(), quantidade = :quantidade, capa = :capa where cod_livro = :cod_livro";

        $query = $this->connect->prepare($sql_update);

        $query->bindParam(':cod_livro', $this->form_edit['cod_livro']);
        $query->bindParam(':titulo', $this->form_edit['titulo']);
        $query->bindParam(':genero', $this->form_edit['genero']);
        $query->bindParam(':grupo', $this->form_edit['grupo']);
        $query->bindParam(':paginas', $this->form_edit['paginas']);
        $query->bindParam(':resumo', $this->form_edit['resumo']);
        $query->bindParam(':autor', $this->form_edit['autor']);
        $query->bindParam(':espirito', $this->form_edit['espirito']);
        $query->bindParam(':editora', $this->form_edit['editora']);
        $query->bindParam(':quantidade', $this->form_edit['quantidade']);
        $query->bindParam(':capa', $this->form_edit['capa']);

        $query->execute();

        if($query->rowCount()) {

            return true;

        }
        else {

            return false;

        }
    }
}