<?php

class ListarArtigos extends Conexao
{
    // Atributos
    private object $connect;
    public array $formData;
    public int $id;

    // Métodos
    // Lista os artigos do banco
    public function listar(): array
    {
        // Estabelecendo a conexão com o banco
        $this->connect = $this->connectDb();

        // Consulta no banco
        $sql_select = "select id, titulo, texto from artigos order by id desc";

        // Prepara e executa a query
        $query = $this->connect->prepare($sql_select);
        $query->execute();

        // Retorna os dados solicitados
        return $query->fetchAll();
    }

    // Exibe o artigo selecionado
    public function exibirArtigo(): array
    {
        // Estabelecendo a conexão com o banco
        $this->connect = $this->connectDb();

        // Consulta no banco
        $sql_select = "select id, titulo, texto from artigos where id = :id limit 1";

        // Prepara e executa a query
        $query = $this->connect->prepare($sql_select);
        $query->bindParam(':id', $this->id);
        $query->execute();

        // Retorna os dados solicitados
        return $query->fetch();
    }
}