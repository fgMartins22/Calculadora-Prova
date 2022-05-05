<?php
session_start();
require_once 'calculadora.class.php';


if(isset($_POST['numero1']) &&
   isset($_POST['numero2']) &&
   isset($_POST['operacao'])){
    //Criando as variaveis após a verificação de preenchimento no formulário
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $operacao = $_POST['operacao'];
    
        if(is_numeric($numero1) &&
           is_numeric($numero2)){
            
            $calculadora = new Calculadora($numero1,$numero2,$operacao);

            if($numero2 == 0 && $operacao == Calculadora::DIVISAO){
                $_SESSION['erro0'] = 'O número não pode ser dividido por 0';
                header('location:index.php');
                return Calculadora::DIV_0;
            }


            if (!isset($_SESSION['numeros'])) {
                // Inicializar o historico com um array vazio
                $_SESSION['numeros'] = [];
            }

            //Serialize
            $_SESSION['numeros'][] = serialize($calculadora);

            $_SESSION['sucesso'] = 'Calculo realizado com sucesso!';

            header('location:index.php'); 
           
        }else {
            $_SESSION['erro'] = 'Preencha os dados corretamente!';
            header('location:index.php');
        }
   }else{
       header('location:index.php');
   }