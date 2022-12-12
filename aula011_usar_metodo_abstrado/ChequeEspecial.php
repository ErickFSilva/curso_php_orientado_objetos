<?php

class ChequeEspecial extends Cheque
{
    // Métodos
    public function calcularJuro(): string
    {
        $valorComJuro = $this->valor + ($this->valor * 0.25);
        $valorComJuro = parent::converterReal($valorComJuro);
        return "Valor do cheque {$this->tipo} sem juros R$ {$this->converterReal($this->valor)}<br>
                Valor do cheque {$this->tipo} com juros de 25% R$ {$valorComJuro}";
    }
}