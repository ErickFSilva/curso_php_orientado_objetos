<?php

class CriarArtigos extends Conexao {

    // Atributos
    public object $connect;
    public array $formData;
    public int $id;

    // Métodos
    public function criar(): bool {

        // Estabelecendo a conexão com o banco
        $this->connect = $this->connectDb();

        // Inserindo dados no banco
        $sqlInsert = "insert into artigos (titulo, texto) values (:titulo, :texto)";

        // Prepara e executa a query
        $query = $this->connect->prepare($sqlInsert);
        $query->bindParam(':titulo', $this->formData['titulo']);
        $query->bindParam(':texto', $this->formData['texto']);
        $query->execute();

        // Verifica se o artigo foi inserido com sucesso
        if($query->rowCount()) {
            return true;
        }
        else {
            return false;
        }

    }

}