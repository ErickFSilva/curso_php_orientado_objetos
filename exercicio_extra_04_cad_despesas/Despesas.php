<?php

class Despesas extends Conexao
{
    // Atributos
    public object $conexao;
    public array $formData;

    // Métodos
    // - listarDespesas()
    public function listarDespesas(): array
    {
        $this->conexao = $this->connectDb();

        $query_listar = "select id, tipo, descricao, valor, _data from cad_despesas order by id desc";
        
        $consulta_desp = $this->conexao->prepare($query_listar);
        $consulta_desp->execute();

        return $consulta_desp->fetchAll(PDO::FETCH_ASSOC);;
    }

    // public function listarDespesas2()
    // {
    //     $this->conexao = $this->connectDb();

    //     $q = "select id, tipo, descricao, valor, _data from cad_despesas order by id desc";

    //     return $this->conexao->query($q)->fetchAll();
    // }

    // - cadastrarDespesas()
    public function cadastrarDespesas(): bool
    {
        $this->conexao = $this->connectDb();

        $query_cadastrar = "insert into cad_despesas values(
            null, :tipo, :descricao, :valor, :_data
        )";
        
        $add_despesa = $this->conexao->prepare($query_cadastrar);
        
        $add_despesa->bindParam(":tipo", $this->formData["tipo"]);
        $add_despesa->bindParam(":descricao", $this->formData["descricao"]);
        $add_despesa->bindParam(":valor", $this->formData["valor"]);
        $add_despesa->bindParam(":_data", $this->formData["_data"]);

        $add_despesa->execute();

        if($add_despesa->rowCount())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}