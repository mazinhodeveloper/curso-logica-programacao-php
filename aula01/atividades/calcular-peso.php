<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Peso Ideal</title>
</head>
<body>
    <h1>Cálculo de Peso Ideal</h1>
    <form method="POST" action="">
        <label for="altura">Altura (m):</label>
        <input type="text" id="altura" name="altura" required><br>

        <label for="peso">Peso (kg):</label>
        <input type="text" id="peso" name="peso" required><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $altura = $_POST["altura"];
        $peso = $_POST["peso"];

        // Cálculo do IMC
        $imc = $peso / ($altura * $altura);

        // Exibindo o resultado
        echo "<h2>Resultado:</h2>";
        echo "Seu IMC é: " . number_format($imc, 2, ',', '.') . "<br/>";

        // Verificando o estado de peso
        if ($imc < 18.5) {
            echo "<h2>Você está abaixo do peso.</h2>";
        } elseif ($imc >= 18.5 && $imc < 24.9) {
            echo "<h2>Você está com peso normal.</h2>";
        } elseif ($imc >= 25 && $imc < 29.9) {
            echo "<h2>Você está com sobrepeso.</h2>";
        } else {
            echo "<h2>Você está obeso.</h2>";
        }
    }
    ?>
</body>
</html>