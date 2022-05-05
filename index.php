<?php 
    session_start();
    require_once 'calculadora.class.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora - Prova N1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="container-fluid">
    <h1 class="text-center mt-1">Prova - Calculadora - Web II</h1>
    <?php
        if (isset($_SESSION['sucesso'])){
    ?>
        <h2 class="text-success text-center"><?=$_SESSION['sucesso']?></h2>
        <?php
            unset($_SESSION['sucesso']);
        } else if(isset($_SESSION['erro'])){
        ?>
        <h2 class="text-danger text-center"><?=$_SESSION['erro']?></h2>
            <?php
            unset($_SESSION['erro']);

        }
            ?>
            <?php
            if(isset($_SESSION['erro0'])){
            ?>    
                <h2 class="text-success text-danger text-center"><?=$_SESSION['erro0']?></h2>
            <?php
                unset($_SESSION['erro0']);
                    
            }
            ?>

    <form action="numeros.php" method="post">        
        <input type="number" name="numero1" placeholder="Numero 1" step="0.01" class="form-control" required>
        <input type="number" name="numero2" placeholder="Numero 2" step="0.01" class="form-control" required><br>
        <input type="radio" value=<?=Calculadora::ADICAO?> name="operacao"/> Adição  
        <input type="radio" value=<?=Calculadora::SUBTRACAO?> name="operacao"/> Subtração  
        <input type="radio" value=<?=Calculadora::DIVISAO?> name="operacao"/> Divisão  
        <input type="radio" value=<?=Calculadora::MULTIPLICACAO?> name="operacao"/> Multiplicação  <br><br>
        <input type="submit" value="Calcular" class="btn btn-success">
    </form>

    <div class="row mt-4">
        <div class= "col-12">
            <?php
                if(isset($_SESSION['numeros'])){
            ?>
            <h2 class="text-center">Histórico de operações</h2>
            <table class="table table-light table-hover table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Número 1 </th>
                        <th>Número 2</th>
                        <th>Operação</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $numeros=$_SESSION['numeros'];

                        foreach($numeros as $numeros){
                            $numeros = unserialize($numeros);
                    ?>
                        <tr>                            
                            <td><?=$numeros->n1?></td>
                            <td><?=$numeros->n2?></td>
                            <td><?=$numeros->operacao?></td>
                            <td><?=round($numeros->calcula())?></td>
                        </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>
            <a href="limpahistorico.php" class= "btn btn-danger">Limpar Histórico</a>
            <?php
                }else{
            ?>
                    <h2>Nenhum cálculo cadastrado.</h2>
                    <?php
                }
                ?>
        </div>
    </div>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>