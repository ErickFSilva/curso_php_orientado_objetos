<?php

class ControleVisualizar extends Conexao
{
    // Atributos
    private object $connect;

    // Métodos
    public function visualizar(): array
    {
        $this->connect = $this->connectDb();

        $sql_select = "
            select bl.id, bl.cod_livro, bl.titulo, bl.paginas, bl.resumo, bl.capa, bl.capa_img, ba.autor, be.editora 
            from biblioteca_livro as bl
            inner join biblioteca_autor as ba on (bl.id = ba.id_livro)
            inner join biblioteca_editora as be on (bl.id = be.id_livro)
        ";

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
}