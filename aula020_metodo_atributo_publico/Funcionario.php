<?php

class Funcionario
{ // O padrão PCR-4 instrue a colocar as chaves abaixo da declaração
    // Atributos
    public string $nome;
    public float $salario;

    // Métodos
    public function verSalario(): string
    {
        // var_dump($this->converterSalario(123456));

        return "O funcionário {$this->nome} tem o salário R$ {$this->converterSalario($this->salario)}<hr>";
    }

    public function converterSalario($salario): string
    {
        return number_format($salario, '2', ',', '.');
    }
}