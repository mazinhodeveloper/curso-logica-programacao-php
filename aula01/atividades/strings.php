<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strings</title>
</head>
<body>
    <h1>Manipulação de Strings em PHP</h1>
    <?php
        //$texto = "Olá, Mundo!";
        $texto = 'maria luiza';
        echo "<p>$texto</p>";

        $texto = strtoupper($texto);
        echo "<p>$texto</p>";

        $texto = strtolower($texto);
        echo "<p>$texto</p>";

        $texto = str_replace("Mundo", "PHP", $texto);
        echo "<p>$texto</p>";
    ?>
</body>
</html>