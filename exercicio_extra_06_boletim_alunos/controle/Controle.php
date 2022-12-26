<?php

class Controle extends Conexao {

    // Atributos
    private object $connect;
    public array $formData;
    public int $id;
    public string $codigo;
    public int $situacao;

    // Métodos
    // Lista todos os alunos cadastrados
    public function listar(): array {

        $this->connect = $this->connectDb();

        $sqlSelect = 'select id, codigo, aluno, situacao from boletim_alunos';

        $query = $this->connect->prepare($sqlSelect);
        $query->execute();

        return $query->fetchAll();

    }

    // Visualiza o boletim do aluno escolhido no cadastro
    public function visualizar(): array {

        $this->connect = $this->connectDb();

        $sqlSelect = '
            select ba.id, ba.codigo, ba.aluno, na.materia, na.nota1, na.nota2, na.media, ba.situacao
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
    public function cadastrar() {

        // echo '<pre>';
        // echo $this->ultimoCodAluno() . '<br>';
        // var_dump($this->formData);
        // echo '</pre>';

        // Prepara o código do aluno
        $codigo_aluno = intval($this->ultimoCodAluno()) + 1;
        $this->codigo = strval($codigo_aluno);

        // Calculando média e definindo 'situação' do aluno
        $nota1 = intval($this->formData['nota1']);
        $nota2 = intval($this->formData['nota2']);
        $media = ($nota1 + $nota2) / 2;
        
        if($media >= 6) {

            $this->situacao = 1;

        }
        else {

            $this->situacao = 0;

        }

        $this->connect = $this->connectDb();

        $sql_insert_1 = "insert into boletim_alunos value (null, :codigo, :aluno, :situacao)";
        $query_1 = $this->connect->prepare($sql_insert_1);
        $query_1->bindParam(':codigo', $this->codigo);
        $query_1->bindParam(':aluno', $this->formData['aluno']);
        $query_1->bindParam(':situacao', $this->situacao);
        $query_1->execute();

        $sql_insert_2 = "insert into notas_alunos value (null, :materia, :nota1, :nota2, :media, :id_aluno)";
        $query_2 = $this->connect->prepare($sql_insert_2);
        $query_2->bindParam(':materia', $this->formData['materia']);
        $query_2->bindParam(':nota1', $this->formData['nota1']);
        $query_2->bindParam(':nota2', $this->formData['nota2']);
        $query_2->bindParam(':media', $media);
        $query_2->bindParam(':id_aluno', $this->formData['id']);
        $query_2->execute();

        // Verifica se foi cadastrado com sucesso!
        if($query_1->rowCount() && $query_2->rowCount()) {

            return true;

        }
        else {

            return false;

        }

    }

    // Recupera o último código de aluno cadastrado
    public function ultimoCodAluno(): string {

        $this->connect = $this->connectDb();

        $sql_select = 'select codigo from boletim_alunos';

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        $codigos = $query->fetchAll();

        $ultimo_codigo = null;

        foreach ($codigos as $codigo => $valor) {

            $ultimo_codigo = $valor['codigo'];

        }

        return $ultimo_codigo;

    }
}
