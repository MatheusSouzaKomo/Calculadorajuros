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
<h1>Calculadora de Juros Simples e Conversor de C° para F°</h1>
<form method="post">
    Qual das opções quer usar?<br>
    <input type="radio" name="opcao" value="1" id="c"> 
    <label for="c">Conversor de C° para F°</label><br>

    <input type="radio" name="opcao" value="2" id="j"> 
    <label for="j">Calculadora de Juros</label><br><br>

    <select name="operacao" class="operacoes">
        <option value="capital">Descobrir capital</option>
        <option value="taxa">Descobrir taxa</option>
        <option value="tempo">Descobrir tempo</option>
        <option value="juros">Calcular juros</option>
    </select><br><br>

    Número 1 (C° ou capital):
    <input type="number" name="num" required><br><br>

    Número 2 (multiplicador ou tempo em meses):
    <input type="number" name="num2"><br><br>

    Taxa de juros (%):
    <input type="number" name="taxa" step="0.01"><br><br>

    <input type="submit" value="Calcular">
</form>
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
            $c = $_POST['num'];
            $t = $_POST['num2'];
            $i = $_POST['taxa'];
            $j = $_POST['j'];
            $m = $_POST['montante'];


            $j = $c * ($i/100) * $t;
            echo " O valor dos juros é: R$ ".number_format($j, 2, ",", "." )."<br>";
            $c = $j / (($i/100) * $t);
            echo " O valor do capital é: R$ ".number_format($c, 2, ",", ".")."<br>" ;

            $i = ($j / ($c * $t)) * 100;
            echo " O valor da taxa é: ".number_format($i, 2, ",", ".")."%"."<br>";

            $t = $j / ($c * ($i/100));
            echo " O valor do tempo é: ".number_format($t)." meses"."<br>";

            $m = $c + $j;
            echo " O valor do montante é: R$ ".number_format($m, 2, ",", ".")."<br>";
        }
    ?>
</html>