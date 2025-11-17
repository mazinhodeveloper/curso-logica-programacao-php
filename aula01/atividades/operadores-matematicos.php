<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores Matemáticos</title>
</head>
<body>
    <h1>Operadores Matemáticos</h1>
    <p>
      <?php
        // Declaração de variáveis numéricas
        $a = 10;
        $b = 3;
        
        // Operadores matemáticos básicos
        $soma = $a + $b;          // Adição
        $subtracao = $a - $b;     // Subtração
        $multiplicacao = $a * $b; // Multiplicação
        $divisao = $a / $b;       // Divisão
        $modulo = $a % $b;        // Módulo (resto da divisão)
 
        // Exibindo os resultados
        echo "<h2>Operadores Matemáticos</h2><br/>";
        echo "Soma: " . $a . " + " . $b . " = " . $soma . "<br/>";
        echo "Subtração: " . $a . " - " . $b . " = " . $subtracao . "<br/>";
        echo "Multiplicação: " . $a . " * " . $b . " = " . $multiplicacao . "<br/>";
        echo "Divisão: " . $a . " / " . $b . " = " . number_format($divisao, 2, ',', '.') . "<br/>";
        echo "Módulo: " . $a . " % " . $b . " = " . $modulo . "<br/>";
        
        // Saber se um número é par ou ímpar usando o operador módulo
        $numero = 16;
        echo "<h3>O número " . $numero . " é " . ($numero % 2 == 0 ? "par" : "ímpar") . ".</h3><br/>";
      ?> 
    </p>
    
</body>
</html>