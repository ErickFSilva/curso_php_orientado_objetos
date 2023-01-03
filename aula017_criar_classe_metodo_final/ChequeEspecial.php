<?php

class ChequeEspecial extends Cheque
{

    // Métodos 'final' não podem ser reescrito na class filha
    final public function calcularJuro(): string
    {
        $valorComJuro = $this->valor + (0.2 * $this->valor);
        $valorConvReal = $this->converterReal($valorComJuro);

        return "Valor do cheque {$this->tipo} sem juros R$ {$this->converterReal($this->valor)} e com juros de 20% R$ {$valorConvReal}<br>";
    }

}