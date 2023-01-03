<?php

class Funcionario
{
    // Atributos públicos (+)
    public string $nome;
    public float $salario;
    // Atributos privados (-)
    private string $salarioConvertido;
    // Atributos protegidos (#)
    protected float $bonus;

    // Construtor
    function __construct($nome, $salario)
    {
        $this->nome = $nome;
        $this->salario = $salario;
    }

    // Métodos públicos (+)
    public function verSalario(): string
    {
        return "O funcionário <b>{$this->nome}</b> tem o <b>salário R$ {$this->converterSalario($this->salario)}</b>";
    }

    // Métodos privados (-)
    private function converterSalario(string $valor): string
    {
        $salarioConvertido = number_format($valor, '2', ',', '.');
        return "$salarioConvertido";
    }

    // Métodos protegidos (#)
    protected function bonusCalculado(): string
    {
        return $this->converterSalario($this->bonus);
    }
}

?>