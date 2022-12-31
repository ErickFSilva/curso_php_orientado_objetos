<?php

class Despesa extends Conexao
{
    // Atributos
    public object $connect;
    public array $formData;
    public float $valor_total = 0;

    // Métodos
    public function listaDespesas(): array
    {
        $this->connect = $this->connectDb();

        $sql_select = "select id, tipo, descricao, valor, _data from despesa order by _data desc";

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        $retorno = $query->fetchAll(PDO::FETCH_ASSOC);

        return $retorno;
    }

    public function addDespesa(): bool
    {
        $this->connect = $this->connectDb();

        $sql_insert = "insert into despesa (tipo, descricao, valor, _data) values(:tipo, :descricao, :valor, :_data)";

        $query = $this->connect->prepare($sql_insert);

        $query->bindParam(':tipo', $this->formData['tipo']);
        $query->bindParam(':descricao', $this->formData['descricao']);
        $query->bindParam(':valor', $this->formData['valor']);
        $query->bindParam(':_data', $this->formData['_data']);

        $query->execute();

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function calculaTotDespesa(): float
    {
        $this->connect = $this->connectDb();

        $sql_select = "select valor from despesa";

        $query = $this->connect->prepare($sql_select);
        $query->execute();

        $valores = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($valores as $valor) {

            $this->valor_total += $valor['valor'];
        }

        return $this->valor_total;
    }
}
