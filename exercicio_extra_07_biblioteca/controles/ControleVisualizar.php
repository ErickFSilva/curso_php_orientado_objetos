<?php

class ControleVisualizar extends Conexao
{
    // Atributos
    private object $connect;
    private string $cod_livro_Atual;

    // Getters and Setters
    function __get($atributo)
    {
        return $this->$atributo;
    }

    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    // Métodos
    // * listar()
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
                   besp.espirito,
                   be.editora,
                   bl.quantidade,
                   bl.capa
                   from biblioteca_livro as bl
                   inner join biblioteca_genero as bg on (bl.cod_genero = bg.cod_genero)
                   inner join biblioteca_grupo as bgp on (bl.cod_grupo = bgp.cod_grupo)
                   inner join biblioteca_autor as ba on (bl.cod_autor = ba.cod_autor)
                   inner join biblioteca_espirito as besp on (bl.cod_autor = besp.cod_espirito)
                   inner join biblioteca_editora as be on (bl.cod_editora = be.cod_editora)
                   order by bgp.grupo
        ";

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // * visualizarLivro()
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
                   besp.espirito,
                   be.editora,
                   bl.quantidade,
                   bl.capa
                   from biblioteca_livro as bl
                   inner join biblioteca_genero as bg on (bl.cod_genero = bg.cod_genero)
                   inner join biblioteca_grupo as bgp on (bl.cod_grupo = bgp.cod_grupo)
                   inner join biblioteca_autor as ba on (bl.cod_autor = ba.cod_autor)
                   inner join biblioteca_espirito as besp on (bl.cod_autor = besp.cod_espirito)
                   inner join biblioteca_editora as be on (bl.cod_editora = be.cod_editora)
                   where bl.cod_livro = :cod_livro limit 1
        ";

        $query = $this->connect->prepare($sql_select);
        $query->bindParam(':cod_livro', $this->cod_livro_Atual);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // * listaNovoCodigoLivro()
    public function listaNovoCodigoLivro(): int
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

    // * listaGenero()
    public function listaGenero(): array
    {
        $this->connect = $this->connectDb();

        $sql_select = "select cod_genero, genero from biblioteca_genero";

        $array = $this->connect->prepare($sql_select);
        $array->execute();

        return $array->fetchAll(PDO::FETCH_ASSOC);
    }

    // * listaGrupo()
    public function listaGrupo(): array
    {
        $this->connect = $this->connectDb();

        $sql_select = "select cod_grupo, grupo from biblioteca_grupo";

        $array = $this->connect->prepare($sql_select);
        $array->execute();

        return $array->fetchAll(PDO::FETCH_ASSOC);
    }

    // * listaAutor()
    public function listaAutor(): array
    {
        $this->connect = $this->connectDb();

        $sql_select = "select cod_autor, autor from biblioteca_autor";

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // * listaEspirito()
    public function listaEspirito(): array
    {
        $this->connect = $this->connectDb();

        $sql_select = "select cod_espirito, espirito from biblioteca_espirito";

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // * listaEditora()
    public function listaEditora(): array
    {
        $this->connect = $this->connectDb();

        $sql_select = "select cod_editora, editora from biblioteca_editora";

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
