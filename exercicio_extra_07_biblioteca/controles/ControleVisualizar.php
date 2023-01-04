<?php

class ControleVisualizar extends Conexao
{
    // Atributos
    private object $connect;
    public string $cod_livro_Atual;

    // Métodos
    public function listar(): array
    {
        $this->connect = $this->connectDb();

        $sql_select = "
            select bl.cod_livro, 
                   bl.titulo, 
                   bg.genero, 
                   bl.paginas, 
                   bl.resumo, 
                   ba.autor, 
                   be.editora,
                   bl.capa
                   from biblioteca_livro as bl
                   inner join biblioteca_genero as bg on (bl.cod_genero = bg.cod_genero)
                   inner join biblioteca_autor as ba on (bl.cod_autor = ba.cod_autor)
                   inner join biblioteca_editora as be on (bl.cod_editora = be.cod_editora)
        ";

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function visualizarLivro()
    {
        $this->connect = $this->connectDb();

        $sql_select = "
            select bl.cod_livro, 
                   bl.titulo, 
                   bg.genero, 
                   bl.paginas, 
                   bl.resumo, 
                   ba.autor, 
                   be.editora,
                   bl.capa
                   from biblioteca_livro as bl
                   inner join biblioteca_genero as bg on (bl.cod_genero = bg.cod_genero)
                   inner join biblioteca_autor as ba on (bl.cod_autor = ba.cod_autor)
                   inner join biblioteca_editora as be on (bl.cod_editora = be.cod_editora)
                   where bl.cod_livro = :cod_livro limit 1
        ";

        $query = $this->connect->prepare($sql_select);
        $query->bindParam(':cod_livro', $this->cod_livro_Atual);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
