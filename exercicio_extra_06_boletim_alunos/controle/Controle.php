<?php

class Controle extends Conexao
{

    // Atributos
    private object $connect;
    public array $formData;
    public int $id;
    public string $materia;
    public int $ultimoId;
    public string $codigo;
    public int $situacao;
    public float $nota1;
    public float $nota2;
    public float $media;

    // Métodos
    // Lista todos os alunos cadastrados
    public function listar(): array
    {
        // Instancia a classe e cria o objeto
        $this->connect = $this->connectDb();

        $sqlSelect = 'select id, codigo, aluno, situacao from boletim_alunos';

        $query = $this->connect->prepare($sqlSelect);
        $query->execute();

        return $query->fetchAll();
    }

    // Visualiza o boletim do aluno, escolhido no cadastro
    public function visualizar(): array
    {
        // Instancia a classe e cria o objeto
        $this->connect = $this->connectDb();

        $sqlSelect = '
            select ba.id, ba.codigo, ba.aluno, na.materia, na.nota1, na.nota2, na.media, ba.situacao
            from boletim_alunos ba
            left join notas_alunos na on (ba.id = na.id_boletim)
            where ba.id = :id
        ';

        $query = $this->connect->prepare($sqlSelect);
        $query->bindParam(':id', $this->id);
        $query->execute();

        return $query->fetchAll();
    }

    public function visualizar2(): array
    {
        // Instancia a classe e cria o objeto
        $this->connect = $this->connectDb();

        $sqlSelect = '
            select ba.id, ba.codigo, ba.aluno, na.materia, na.nota1, na.nota2, na.media, ba.situacao
            from boletim_alunos ba
            left join notas_alunos na on (ba.id = na.id_boletim)
            where ba.id = :id and na.materia = :materia
        ';

        $query = $this->connect->prepare($sqlSelect);
        $query->bindParam(':id', $this->id);
        $query->bindParam(':materia', $this->materia);
        $query->execute();

        return $query->fetch();
    }

    public function visualizar3($id_addMateria): array
    {
        // Instancia a classe e cria o objeto
        $this->connect = $this->connectDb();

        $sqlSelect = '
            select ba.id, ba.codigo, ba.aluno, na.materia, na.nota1, na.nota2, na.media, ba.situacao
            from boletim_alunos ba
            left join notas_alunos na on (ba.id = na.id_boletim)
            where ba.id = :id limit 1
        ';

        $query = $this->connect->prepare($sqlSelect);
        $query->bindParam(':id', $id_addMateria);
        $query->execute();

        return $query->fetch();
    }

    // Cadastra novos alunos
    public function cadastrar(): bool
    {
        // Prepara o código do aluno
        $codigo_aluno = intval($this->ultimoCodigo()) + 1;
        $this->codigo = strval($codigo_aluno);

        // Instancia a classe e cria o objeto
        $this->connect = $this->connectDb();

        // Insert na tabela 'boletim_alunos'
        $sql_insert_1 = "insert into boletim_alunos (codigo, aluno) value (:codigo, :aluno)";
        $query_1 = $this->connect->prepare($sql_insert_1);
        $query_1->bindParam(':codigo', $this->codigo);
        $query_1->bindParam(':aluno', $this->formData['aluno']);
        $query_1->execute();

        // Prepara o 'id' do cadastro atual para a 'foreign key' da tabela 'notas_alunos'
        $id_cadastro_atual = $this->idCadastroAtual();
        $this->ultimoId = $id_cadastro_atual;

        // Insert na tabela 'notas_alunos'
        $sql_insert_2 = "insert into notas_alunos (materia, id_boletim) value (:materia, :id_aluno)";
        $query_2 = $this->connect->prepare($sql_insert_2);
        $query_2->bindParam(':materia', $this->formData['materia']);
        $query_2->bindParam(':id_aluno', $this->ultimoId);
        $query_2->execute();

        // Verifica se foi cadastrado com sucesso!
        if ($query_1->rowCount() && $query_2->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function addMateria(): bool
    {
        // echo '<pre>';
        // var_dump($this->formData);
        // echo '</pre>';

        // Instancia a classe e cria o objeto
        $this->connect = $this->connectDb();

        // Insert na tabela 'notas_alunos'
        $sql_insert = "insert into notas_alunos (materia, id_boletim) value (:materia, :id_boletim)";
        
        $query = $this->connect->prepare($sql_insert);

        $query->bindParam(':materia', $this->formData['materia']);
        $query->bindParam(':id_boletim', $this->formData['id']);

        $query->execute();

        // Verifica se foi cadastrado com sucesso!
        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    // Situação do aluno
    // public function editar(): bool
    // {
    //     // Debugg do código
    //     // echo '<pre>';
    //     // var_dump($this->formData);
    //     // echo '<hr>';
    //     // echo gettype($this->formData['nota1']) . '<br>';
    //     // echo gettype($this->formData['nota2']);
    //     // echo '</pre>';

    //     // Calculando média e definindo 'situação' do aluno
    //     if (is_string($this->formData['nota1']) && empty($this->formData['nota1'])) {
    //         $this->nota1 = 0.0;
    //     } else {
    //         $this->nota1 = $this->formData['nota1'];
    //     }

    //     if (is_string($this->formData['nota2']) && empty($this->formData['nota2'])) {
    //         $this->nota2 = 0.0;
    //     } else {
    //         $this->nota2 = $this->formData['nota2'];
    //     }

    //     $this->media = ($this->nota1 + $this->nota2) / 2;

    //     // Define a situação do aluno
    //     if ($this->media >= 6) {
    //         $this->situacao = 1;
    //     } else {
    //         $this->situacao = 0;
    //     }

    //     // Instancia a classe e cria o objeto
    //     $this->connect = $this->connectDb();

    //     $sql_update = "
    //         update boletim_alunos as ba 
    //         inner join notas_alunos as na 
    //         on (ba.id = na.id_boletim) 
    //         set ba.aluno = :aluno, 
    //             ba.situacao = :situacao, 
    //             na.materia = :materia, 
    //             na.nota1 = :nota1,
    //             na.nota2 = :nota2,
    //             na.media = :media
    //         where ba.id = :id
    //     ";

    //     $query = $this->connect->prepare($sql_update);

    //     $query->bindParam(':id', $this->formData['id']);
    //     $query->bindParam(':aluno', $this->formData['aluno']);
    //     $query->bindParam(':situacao', $this->situacao);
    //     $query->bindParam(':materia', $this->formData['materia']);
    //     $query->bindParam(':nota1', $this->nota1);
    //     $query->bindParam(':nota2', $this->nota2);
    //     $query->bindParam(':media', $this->media);

    //     $query->execute();

    //     if ($query->rowCount()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function editar2(): bool
    {
        // Debugg do código
        // echo '<pre>';
        // var_dump($this->formData);
        // echo '</pre>';

        // Calculando média e definindo 'situação' do aluno
        if (is_string($this->formData['nota1']) && empty($this->formData['nota1'])) {
            $this->nota1 = 0.0;
        } else {
            $this->nota1 = $this->formData['nota1'];
        }

        if (is_string($this->formData['nota2']) && empty($this->formData['nota2'])) {
            $this->nota2 = 0.0;
        } else {
            $this->nota2 = $this->formData['nota2'];
        }

        $this->media = ($this->nota1 + $this->nota2) / 2;

        // Define a situação do aluno
        if ($this->media >= 6) {
            $this->situacao = 1;
        } else {
            $this->situacao = 0;
        }

        // Instancia a classe e cria o objeto
        $this->connect = $this->connectDb();

        $sql_update = "
            update boletim_alunos as ba 
            inner join notas_alunos as na 
            on (ba.id = na.id_boletim) 
            set ba.aluno = :aluno, 
                ba.situacao = :situacao, 
                na.materia = :materia, 
                na.nota1 = :nota1,
                na.nota2 = :nota2,
                na.media = :media
            where ba.id = :id and na.materia = :materia
        ";

        $query = $this->connect->prepare($sql_update);

        $query->bindParam(':id', $this->formData['id']);
        $query->bindParam(':aluno', $this->formData['aluno']);
        $query->bindParam(':situacao', $this->situacao);
        $query->bindParam(':materia', $this->formData['materia']);
        $query->bindParam(':nota1', $this->nota1);
        $query->bindParam(':nota2', $this->nota2);
        $query->bindParam(':media', $this->media);

        $query->execute();

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletar(): bool
    {
        $this->connect = $this->connectDb();

        $sql_delete_na = "delete from notas_alunos where id_boletim = :id";
        $sql_delete_ba = "delete from boletim_alunos where id = :id";

        $query_na = $this->connect->prepare($sql_delete_na);
        $query_na->bindParam(':id', $this->id);
        $query_na->execute();

        $query_ba = $this->connect->prepare($sql_delete_ba);
        $query_ba->bindParam(':id', $this->id);
        $query_ba->execute();

        if($query_na->rowCount() && $query_ba->rowCount()) {
            return true;
        }
        else {
            return false;
        }

    }

    // Recupera o último código de aluno cadastrado
    public function ultimoCodigo(): int
    {
        // Instancia a classe e cria o objeto
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

    // Recupera o 'id' do caastro em andamento para informa-lo na 'foreign key' da tabela 'notas_alunos'
    public function idCadastroAtual(): int
    {
        // Instancia a classe e cria o objeto
        $this->connect = $this->connectDb();

        $sql_select = 'select id from boletim_alunos';

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        $ids = $query->fetchAll();

        $ultimo_id = null;

        foreach ($ids as $id => $valor) {
            $ultimo_id = $valor['id'];
        }

        return $ultimo_id;
    }
}
