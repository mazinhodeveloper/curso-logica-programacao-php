<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMC - Índice de Massa Corporal</title>
</head>
<body>
    <h1>IMC - Índice de Massa Corporal</h1>
    <p>Função para calcular o IMC.</p>
    <?php
        function calcularIMC($peso, $altura) {
            return $peso / ($altura * $altura);
        }
 
        // Função para classificar o IMC
        function classificarIMC($imc) {
            if ($imc < 18.5) {
                return "Abaixo do peso";
            } elseif ($imc < 24.9) {
                return "Peso normal";
            } elseif ($imc < 29.9) {
                return "Sobrepeso";
            } else {
                return "Obesidade";
            }
        }
 
        $peso = 70; // em kg
        $altura = 1.75; // em metros
        
        // Cálculo do IMC (usando as funções definidas)
        $imc = calcularIMC($peso, $altura);
        $classificacao = classificarIMC($imc);
 
        echo "Seu IMC é: " . number_format($imc, 2) . "<br/>";
        echo "Classificação: " . $classificacao . "<br/>";
    ?>
</body>
</html>
 