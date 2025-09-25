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