<?php

class Funcionario
{
    // Atributo
    // public string $nome;
    // public float $salario;
    private string $salarioConvertido;


    // Construtor
    function __construct(public string $nome, public string $salario)
    {}


    // Métodos
    public function verSalario(): string
    {
        return "O funcionário <b>{$this->nome}</b> tem o salário R$ <b>{$this->converterSalario()}</b>";
    }

    private function converterSalario(): string
    {
        $this->salarioConvertido = number_format($this->salario, '2', ',', '.');
        return $this->salarioConvertido;
    }
}