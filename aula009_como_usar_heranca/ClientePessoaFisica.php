<?php

class ClientePessoaFisica extends Cliente
{

    // Atributos
    public string $nome;
    public string $cpf;

    // Métodos
    public function verInformacaoUsuario(): string
    {
        $dados = "Endereço da Pessoa Física<br>";
        $dados .= "Nome: {$this->nome}<br>";
        $dados .= "CPF: {$this->cpf}<br>";
        $dados .= "Endereço: {$this->logradouro}<br>";
        $dados .= "Bairro: {$this->bairro}<br>";
        
        return "<p>$dados</p>";
    }
}
