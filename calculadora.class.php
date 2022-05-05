<?php

class Calculadora {
    //CONSTANTES
    const DIV_0 = 'O numero não pode ser dividido por 0';
    const ADICAO = 'somar';
    const SUBTRACAO = 'subtrair';
    const DIVISAO = 'dividir';
    const MULTIPLICACAO = 'multiplicar';
   //ATRIBUTOS
    public $n1;
    public $n2;
    public $operacao;
    //MÉTODO CONSTRUTOR
    public function __construct($n1,$n2,$operacao){
        $this->n1 = $n1;
        $this->n2 = $n2;
        $this->operacao = $operacao;
    }
    //FUNÇÕES
    public function calcula(){
        //puxa a função de somar
        if($this->operacao == $this::ADICAO){ return $this->somar(); }
        //puxa a função de subtrair
        else if($this->operacao == $this::SUBTRACAO){ return $this->subtrair(); }
        //puxa a função de dividir
        else if($this->operacao == $this::DIVISAO){ return $this->dividir(); }
        //puxa a função de multiplicar
        else if($this->operacao == $this::MULTIPLICACAO){ return $this->multiplicar(); }
    }

    private function somar(){
        $soma = $this->n1 + $this->n2;
        return $soma;
    }

    private function subtrair(){
        $subtracao = $this->n1 - $this->n2;
        return $subtracao;
    }

    private function dividir(){
        $divisao = $this->n1 / $this->n2; 
        return $divisao;
        
    }

    private function multiplicar(){
        $multiplicacao = $this->n1 * $this->n2;
        return $multiplicacao;
    }
}