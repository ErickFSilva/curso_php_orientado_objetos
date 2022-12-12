<?php

class ClientePessoaJuridica extends Cliente
{

    // Atributos
    public string $nomeFantasia;
    public string $cnpj;

    // Métodos
    public function verInformacaoEmpresa(): string
    {
        $dados = "Endereço da Pessoa Jurídica<br>";
        $dados .= "Nome Fantasia: {$this->nomeFantasia}<br>";
        $dados .= "CNPJ: {$this->cnpj}<br>";
        $dados .= "Endereço: {$this->logradouro}<br>";
        $dados .= "Bairro: {$this->bairro}<br>";
        
        return "<p>$dados</p>";
    }
}
