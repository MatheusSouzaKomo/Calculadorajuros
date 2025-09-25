<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Calculadora de Juros</title>
</head>
<body>
    <?php
        $tipo = $_POST['tipo'] ?? '';
        if($_POST){
            if($tipo == "cf" && isset($_POST['valor'])){
                $c = $_POST['valor'];
                $fc = ($c * 9/5) + 32;
                echo "Celsius para Fahrenheit: ".number_format($fc, 2, ",", ".")."<br>";
            }
            if($tipo == "fc" && isset($_POST['valor'])){
                $f = $_POST['valor'];
                $cf = ($f - 32) * 5/9; 
                echo "Fahrenheit para Celsius: ".number_format($cf, 2, ",", ".")."<br>"; 
            }
        }
    ?>
    <?php
        if($_POST){
            $c = $_POST['c'];
            $t = $_POST['t'];
            $i = $_POST['i'];
            $j = $_POST['j'];


            $j = $c * ($i/100) * $t;
            echo "O valor dos juros é: R$ ".number_format($j, 2, ",", ".");

            $c = $j / (($i/100) * $t);
            echo "O valor do capital é: R$ ".number_format($c, 2, ",", ".");

            $i = ($j / ($c * $t)) * 100;
            echo "O valor da taxa é: ".number_format($i, 2, ",", ".")."%";

            $t = $j / ($c * ($i/100));
            echo "O valor do tempo é: ".number_format($t, 2, ",", ".")." meses";
        }
    ?>
<form method="post">

    Qual das opções quer usar?<br>
<div>
    <input type="radio" name="opção" value="1"> Conversor de C° para F°<br>
    <input type="radio" name="opção" value="2"> Calculadora de Juros<br><br>
</div> 
        <select name="operacao" id="operacao">
            <option value="3">Descobrir capital</option>
            <option value="4">Descobrir Taxa</option>
            <option value="5">Descobrir tempo</option>
            <option value="6">Calcular Juros</option>
        </select>
        <br>
        <br>
        Digite um número:
        <input type="number" name="num" required>
        <input type="submit" value="Calcular">
        <br>
        Digite o multiplicador:
        <input type="number" name="num2" required>
    </form>
    
</body>