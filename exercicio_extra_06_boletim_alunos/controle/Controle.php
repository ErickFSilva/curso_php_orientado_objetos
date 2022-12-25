<?php

class Controle extends Conexao {

    // Atributos
    private object $connect;
    public array $formData;
    public int $id;
    public bool $situacao = false;

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
    public function cadastrar(): bool {

        // select ba.id, ba.cod, ba.aluno, na.materia, na.nota1, na.nota2, na.media, ba.situacao
        // from boletim_alunos ba
        // inner join notas_alunos na on (ba.id = na.id_boletim)
        // where ba.id = 1;

        // Calculando média e definindo 'situação' do aluno
        $nota1 = $this->formData['nota1'];
        $nota2 = $this->formData['nota2'];
        $media = ((int) $nota1) + (int) ($nota2) / 2;
        
        if($media >= 6) {
            $this->situacao = true;
        }

        $this->connect = $this->connectDb();

        $sql_insert = "insert into boletim_alunos value (null, :codigo, :aluno, :situacao)";
        $sql_insert += "insert into notas_alunos value (null, :materia, :nota1, :nota2, :media, :id_aluno)"; 

        $query = $this->connect->prepare($sql_insert);

        $query->bindParam(':codigo', $this->formData['codigo']);
        $query->bindParam(':aluno', $this->formData['aluno']);
        $query->bindParam(':situacao', $this->situacao);
        $query->bindParam(':materia', $this->formData['materia']);
        $query->bindParam(':nota1', $this->formData['nota1']);
        $query->bindParam(':nota2', $this->formData['nota2']);
        $query->bindParam(':media', $media);

        $query->execute();

        // Verifica se foi cadastrado com sucesso!
        if($query->rowCount()) {

            return true;

        }
        else {

            return false;

        }

    }

    // Recupera o último código de aluno cadastrado
    public function ultimoCodAlunos() {

        $this->connect = $this->connectDb();

        $sql_select = 'select cod from boletim_alunos';

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        $codigos = $query->fetchAll();

        $ultimo_codigo = null;

        foreach ($codigos as $codigo => $valor) {

            $ultimo_codigo = $valor['cod'];

        }

        return $ultimo_codigo;

    }
}
