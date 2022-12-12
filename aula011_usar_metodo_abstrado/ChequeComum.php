<?php

class ChequeComum extends Cheque
{
    // Método
    public function calcularJuro(): string
    {
        $valorComJuros = $this->valor + ($this->valor * 0.2);
        // O 'parent' indica que será utilizado um método da classe pai
        $valorConvReal = parent::converterReal($valorComJuros);

        return "Valor do cheque {$this->tipo} sem juros R$ {$this->converterReal($this->valor)}.<br>
                Valor do cheque {$this->tipo} com juros de 20% R$ {$valorConvReal}<hr>";
    }
}