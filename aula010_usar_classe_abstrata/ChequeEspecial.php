<?php

class ChequeEspecial extends Cheque
{

    // Métodos
    public function calcularJuro(): string
    {
        $valorComJuro = $this->valor + (0.2 * $this->valor);
        $valorConvReal = $this->converterReal($valorComJuro);

        return "Valor do cheque {$this->tipo} sem juros R$ {$this->converterReal($this->valor)} e com juros de 20% R$ {$valorConvReal}<br>";
    }

}