<?php

class BuscaArtigos extends Conexao
{
    // Atributos
    public object $connect;

    // Métodos
    public function listarArtigos(): array
    {
        // Preparando a conexão com o DB
        $this->connect = $this->conectar();

        // Query
        $artigos = "select id, titulo, texto from artigos order by id desc";

        // Preparando e executando as querys no banco
        $query = $this->connect->prepare($artigos);
        $query->execute();

        // Lendo todos os dados retornados pela query
        $retorno = $query->fetchAll();

        return $retorno;
    }
}