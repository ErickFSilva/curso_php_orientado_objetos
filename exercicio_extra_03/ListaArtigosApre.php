<?php

class ListaArtigosApre extends Conexao
{
    // Atributos
    public object $connect;

    // Métodos
    public function listarArtigos(): array
    {
        // Preparando a conexão com o DB
        $this->connect = $this->conectar();

        // Query
        $artigos_apresentacao = "select id, titulo, texto from artigos_apresentacao order by id desc";

        // Preparando e executando as querys no banco
        $query_apre = $this->connect->prepare($artigos_apresentacao);
        $query_apre->execute();

        // Lendo todos os dados retornados pela query
        $retorno = $query_apre->fetchAll();

        return $retorno;
    }
}