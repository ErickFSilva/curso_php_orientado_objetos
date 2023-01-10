<?php

class Remover extends Conexao
{
    // Atributos
    private object $connect;

    // Método
    public function removerLivro($atributo): bool
    {
        // Estabelece a conexão
        $this->connect = $this->connectDb();

        $sql_delete = "delete from biblioteca_livro where cod_livro = :cod_livro";

        $query = $this->connect->prepare($sql_delete);
        $query->bindParam(':cod_livro', $atributo);
        $query->execute();

        if($query->rowCount()) {
            return true;
        }
        else {
            return false;
        }
    }
}