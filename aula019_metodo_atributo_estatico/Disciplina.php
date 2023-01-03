<?php

class Disciplina
{
    // Atributos
    // public string $aluno;
    // public float $notaTrabalho;
    // public float $notaProva;
    // // *Atributo do tipo 'static', não faz parte do objeto
    public static $media = 0;

    // Construtor
    // function __construct(string $aluno, float $notaTrabalho, float $notaProva)
    // {
    //     $this->aluno = $aluno;
    //     $this->notaTrabalho = $notaTrabalho;
    //     $this->notaProva = $notaProva;
    //     // *Usado para acessar membros estáticos
    //     self::$media = $this->notaProva + $this->notaTrabalho;
    // }

    // *Outra maneira de estruturar uma classe, disponível apenas apenas na versão 8 em diante
    function __construct(public string $aluno, public float $notaTrabalho, public float $notaProva)
    {
        self::$media = $this->notaProva + $this->notaTrabalho;
    }

    // Método
    public function situacao(): string
    {
        // Lembrando, atributo estático não faz parte do objeto
        if(self::$media >= 7) {

            if(self::$media > 10) {
                self::$media = 10;
            }

            return "Aluno(a) {$this->aluno} está <b>aprovado</b> com média " . self::$media . "<hr>";
        }
        else {
            return "Aluno(a) {$this->aluno} está <b>reprovado</b> com média " . self::$media . "<hr>";
        }
    }

    // *Método estatico
    static function situacaoAluno(float $nota): string
    {
        if($nota >= 7) {
            return "Aluno(a) está <b>aprovado</b> com média " . $nota . "<hr>";
        }
        else {
            return "Aluno(a) está <b>reprovado</b> com média " . $nota . "<hr>";
        }
    }
}