<?php

class Cliente
{

    // Atributos
    public string $logradouro;
    public string $bairro;

    // Métodos
    public function verEndereco(): string
    {
        return "<p>Endereço: {$this->logradouro}<br>Bairro: {$this->bairro}</p>";
    }
}
