<?php

class Bonus extends Funcionario
{
    // Construtor
    function __construct($valor)
    {
        $this->bonus = $valor;
    }

    // Método público (+)
    public function verBonus(): string
    {
        return "O funcionário tem o <b>bônus</b> de <b>R$ {$this->bonusCalculado()}</b>";
    }
}