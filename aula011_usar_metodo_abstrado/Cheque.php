<?php

// Classe abstrata
abstract class Cheque 
{
    // Atributos
    public float $valor;
    public string $tipo;

    // Construtor
    public function __construct(float $valor, string $tipo)
    {
        $this->valor = $valor;
        $this->tipo = $tipo;
    }

    // Métodos abstrato
    abstract function calcularJuro(); 
    
    // Métodos Comúns
    public function converterReal(float $valor): string
    {
        return number_format($valor, '2', ',', '.');
    }
}