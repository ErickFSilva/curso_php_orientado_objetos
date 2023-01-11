<?php

class Visualizar extends Conexao
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

        $sql_select = "select id, cod_livro, titulo, genero, grupo, paginas, resumo, data_inclusao, autor, espirito, editora, quantidade, capa from biblioteca_livro order by grupo, titulo";

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // * visualizarLivro()
    public function visualizarLivro()
    {
        $this->connect = $this->connectDb();

        $sql_select = "select id, cod_livro, titulo, genero, grupo, paginas, resumo, data_inclusao, data_update, autor, espirito, editora, quantidade, capa from biblioteca_livro where cod_livro = :cod_livro limit 1";

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
