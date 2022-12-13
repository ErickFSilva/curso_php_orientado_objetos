<?php

class ListaArtigosComp extends Conexao
{
    // Atributos
    public object $connect;

    // Métodos
    public function listarArtigos(): array
    {
        // Preparando a conexão com o DB
        $this->connect = $this->conectar();

        // Query
        $artigos_completos = "select id, titulo, texto from artigos_completos order by desc";

        // Preparando e executando as querys no banco
        $query_comp = $this->connect->prepare($artigos_completos);
        $query_comp->execute();

        // Lendo todos os dados retornados pela query
        $retorno = $query_comp->fetchAll();

        return $retorno;
    }
}