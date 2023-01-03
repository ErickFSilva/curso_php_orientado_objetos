<?php

class ChequeComum extends Cheque
{

    // Métodos 'final' não podem ser reescrito na class filha
    final public function calcularJuro(): string 
    {
        $valorComJuros = $this->valor + (0.20 * $this->valor);
        // O 'parent' indica que será utilizado um método da classe pai
        $valorConvReal = parent::converterReal($valorComJuros);

        return "Valor do cheque {$this->tipo} sem juros R$ {$this->converterReal($this->valor)} e com juros de 20% R$ {$valorConvReal}<br>";
    }

}