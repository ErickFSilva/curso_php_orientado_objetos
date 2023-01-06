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
                   bgp.grupo,
                   bl.paginas, 
                   bl.resumo, 
                   bl.data_inclusao,
                   ba.autor, 
                   be.editora,
                   bl.quantidade,
                   bl.capa
                   from biblioteca_livro as bl
                   inner join biblioteca_genero as bg on (bl.cod_genero = bg.cod_genero)
                   inner join biblioteca_grupo as bgp on (bl.cod_grupo = bgp.cod_grupo)
                   inner join biblioteca_autor as ba on (bl.cod_autor = ba.cod_autor)
                   inner join biblioteca_editora as be on (bl.cod_editora = be.cod_editora)
                   order by bgp.grupo
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
                   bgp.grupo,
                   bl.paginas, 
                   bl.resumo, 
                   bl.data_inclusao,
                   ba.autor, 
                   be.editora,
                   bl.quantidade,
                   bl.capa
                   from biblioteca_livro as bl
                   inner join biblioteca_genero as bg on (bl.cod_genero = bg.cod_genero)
                   inner join biblioteca_grupo as bgp on (bl.cod_grupo = bgp.cod_grupo)
                   inner join biblioteca_autor as ba on (bl.cod_autor = ba.cod_autor)
                   inner join biblioteca_editora as be on (bl.cod_editora = be.cod_editora)
                   where bl.cod_livro = :cod_livro limit 1
        ";

        $query = $this->connect->prepare($sql_select);
        $query->bindParam(':cod_livro', $this->cod_livro_Atual);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function listaNovoCodigo(): int
    {
        $this->connect = $this->connectDb();

        $sql_select = "select cod_livro from biblioteca_livro order by cod_livro desc limit 1";

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        $ultimoCodigo = $query->fetch(PDO::FETCH_ASSOC);

        if(empty($ultimoCodigo)) {
            return $ultimoCodigo = 10001;
        }
        else {
            return $ultimoCodigo['cod_livro'] + 1;
        }

    }

    public function listaGenero(): array
    {
        $this->connect = $this->connectDb();

        $sql_select = "select genero from biblioteca_genero";

        $array = $this->connect->prepare($sql_select);
        $array->execute();

        return $array->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listaGrupo(): array
    {
        $this->connect = $this->connectDb();

        $sql_select = "select grupo from biblioteca_grupo";

        $array = $this->connect->prepare($sql_select);
        $array->execute();

        return $array->fetchAll(PDO::FETCH_ASSOC);
    }
}
