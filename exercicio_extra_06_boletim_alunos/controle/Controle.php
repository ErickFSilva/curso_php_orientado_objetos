<?php

// select ba.id, ba.cod, ba.aluno, na.nota1, na.nota2, na.media, ba.situacao
// from boletim_alunos ba
// inner join notas_alunos na on (ba.id = na.id_boletim);

class Controle extends Conexao {

    // Atributos
    private object $connect;
    public array $formData;
    public int $id;

    // Métodos
    // Lista todos os alunos cadastrados
    public function listar(): array {

        $this->connect = $this->connectDb();

        $sqlSelect = 'select id, cod, aluno, situacao from boletim_alunos';

        $query = $this->connect->prepare($sqlSelect);
        $query->execute();

        return $query->fetchAll();

    }

    // Visualiza o boletim do aluno escolhido no cadastro
    public function visualizar(): array {

        $this->connect = $this->connectDb();

        $sqlSelect = '
            select ba.id, ba.cod, ba.aluno, na.materia, na.nota1, na.nota2, na.media, ba.situacao
            from boletim_alunos ba
            inner join notas_alunos na on (ba.id = na.id_boletim)
            where ba.id = :id limit 1
        ';

        $query = $this->connect->prepare($sqlSelect);
        $query->bindParam(':id', $this->id);
        $query->execute();

        return $query->fetch();

    }

    // Cadastra novos alunos
    public function cadastra() {

        var_dump($this->formData);

    }

}