<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora de Juros</title>
</head>
<header>
<h1>Calculadora de Juros Simples e Conversor de C° para F°</h1>
</header>
<body>
<?php
$opcao = $_POST['opcao'] ?? '';
//Selecionador de opção (deu um trabalho pra conseguir funcionar mas deu KKKK)
if (empty($opcao)) {
?>
    <form method="post">
        <strong> Qual das opções quer usar?<br>
        <input type="radio" name="opcao" value="1" id="c"> 
        <label for="c">Conversor de C° para F°</label><br>

        <input type="radio" name="opcao" value="2" id="j" checked> 
        <label for="j">Calculadora de Juros</label><br><br> </strong>

        <input type="submit" value="Selecionar">
    </form>

<?php
} else if ($opcao == "1") {
    // Ciclo para escolha do conversor .-.
?>
    <h2>Conversor de Temperatura</h2>
    <form method="post">
        <input type="hidden" name="opcao" value="1">
        
        Tipo de conversão:<br>
        <input type="radio" name="tipo" value="cf" id="cf"> 
        <label for="cf">Celsius para Fahrenheit</label><br>
        <input type="radio" name="tipo" value="fc" id="fc"> 
        <label for="fc">Fahrenheit para Celsius</label><br><br>

        Valor da temperatura:
        <input type="number" name="valor" step="0.01" required><br><br>

        <input type="submit" value="Converter">
    </form>

    <?php
    $tipo = $_POST['tipo'] ?? '';
    if($_POST && isset($_POST['valor'])){
        if($tipo == "cf"){
            $c = $_POST['valor'];
            $fc = ($c * 9/5) + 32;
            echo "Celsius para Fahrenheit: ".number_format($fc, 2, ",", ".")."<br>";
        }
        if($tipo == "fc"){
            $f = $_POST['valor'];
            $cf = ($f - 32) * 5/9; 
            echo "Fahrenheit para Celsius: ".number_format($cf, 2, ",", ".")."<br>"; 
        }
    }
    ?>

    <br><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Voltar</a>

<?php
} else if ($opcao == "2") { //Ciclo para escolha da calculadora :3

?>
    <h2>Calculadora de Juros</h2>
    <form method="post">
        <input type="hidden" name="opcao" value="2">
        O que deseja calcular?<br>
        
        <input type="radio" name="operacao" value="capital" id="capital" checked> 
        <label for="capital">Capital (C)</label><br>

        <input type="radio" name="operacao" value="taxa" id="taxa"> 
        <label for="taxa">Taxa (i)</label><br> 

        <input type="radio" name="operacao" value="tempo" id="tempo"> 
        <label for="tempo">Tempo (t)</label><br>

        <input type="radio" name="operacao" value="juros" id="juros"> 
        <label for="juros">Juros (J)</label><br>

        
        
        <div id="capital-caixa">
        <p>Insira o valor do capital:</p>
        <input type="number" name="capital"><br>
        </div>

        <div id="tempo-caixa">
        <p>Insira o número de tempo em meses:</p>
        <input type="number" name="tempo"><br>
        </div>

        <div id="taxa-caixa">
        <p>Taxa de juros (%):</p>
        <input type="number" name="taxa" step="0.01"><br>
        </div>
        
        <div id="juros-caixa">
        <p>Valor dos juros:</p>
        <input type="number" name="j" step="0.01"><br>
        </div>
<br>
        <input type="submit" value="Calcular">
    </form>

    <?php

     if ($_POST && isset($_POST['operacao'])) {
        $operacao = $_POST['operacao'];
        $c = $_POST['capital'] ?? null;
        $t = $_POST['tempo'] ?? null;
        $i = $_POST['taxa'] ?? null;
        $j = $_POST['j'] ?? null; 

        switch ($operacao) {
            case "capital":
                if ($j !== null && $i !== null && $t !== null && $i != 0 && $t != 0) {
                    $c = $j / (($i/100) * $t);
                    echo "O valor do capital é: R$ " . number_format($c, 2, ",", ".") . "<br>";
                } else {
                    echo "Preencha juros, taxa e tempo.<br>";
                }
                break;
            case "taxa":
                if ($j !== null && $c !== null && $t !== null && $c != 0 && $t != 0) {
                    $i = ($j / ($c * $t)) * 100;
                    echo "O valor da taxa é: " . number_format($i, 2, ",", ".") . "%<br>";
                } else {
                    echo "Preencha juros, capital e tempo.<br>";
                }
                break;
            case "tempo":
                if ($j !== null && $c !== null && $i !== null && $c != 0 && $i != 0) {
                    $t = $j / ($c * ($i/100));
                    echo "O valor do tempo é: " . number_format($t) . " meses<br>";
                } else {
                    echo "Preencha juros, capital e taxa.<br>";
                }
                break;
            case "juros":
                if ($c !== null && $i !== null && $t !== null) {
                    $j = $c * ($i/100) * $t;
                    echo "O valor dos juros é: R$ " . number_format($j, 2, ",", ".") . "<br>";
                } else {
                    echo "Preencha capital, taxa e tempo.<br>";
                }
                break;
            }
        }
    ?>
     <br><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Voltar</a> 

<?php
} //outra coisa que demorou muito foi esse voltar. mas deu.
?>

</body>
</html>
