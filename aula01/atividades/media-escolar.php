<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Escolar</title>
</head>
<body>
    <h1>Média Escolar</h1>
    <p>
      <?php
        // Declaração de variáveis para as notas
        //$nota1 = 6.5; 
        //$nota2 = 6.0; 
        //$nota1 = 4.5; 
        //$nota2 = 4.0; 
        $nota1 = 8.5; 
        $nota2 = 8.0; 

        // Cálculo da média 
        $media = ($nota1 + $nota2) / 2; 

        // Exibindo as notas e a média 
        echo "<h2>Notas:</h2>";
        echo "Nota 1: " . number_format($nota1, 2, ',', '.') . "<br/>";
        echo "Nota 2: " . number_format($nota2, 2, ',', '.') . "<br/>";
        echo "<h2>Média: " . number_format($media, 2, ',', '.') . "</h2>";
 
        // Verificando se o aluno foi aprovado ou reprovado
        // if significa "se"
        if ($media < 5) {
            echo "<h2>Status: Reprovado</h2><br/>";
        // Elseif significa "senão se"
        } elseif ($media >= 5 && $media < 7) {
            echo "<h2>Status: Em Recuperação</h2><br/>";
        // Else significa "senão"
        } else {
            echo "<h2>Status: Aprovado</h2><br/>";
        }
    ?>

    <hr>
    
    <h1>Cálculo da Média Escolar</h1>
    <p>
      <?php
        // Declaração de variáveis para as notas
        $nota1 = 7.5;
        $nota2 = 8.0;
        $nota3 = 6.5;
        $nota4 = 9.0;

        // Cálculo da média
        $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;

        // Exibindo a média// Exibindo as notas e a média 
        echo "<h2>Notas:</h2>";
        echo "Nota 1: " . number_format($nota1, 2, ',', '.') . "<br/>";
        echo "Nota 2: " . number_format($nota2, 2, ',', '.') . "<br/>";
        echo "Nota 3: " . number_format($nota3, 2, ',', '.') . "<br/>";
        echo "Nota 4: " . number_format($nota4, 2, ',', '.') . "<br/>";
        //echo "As notas são: " . $nota1 . ", " . $nota2 . ", " . $nota3 . " e " . $nota4 . ".<br>";
        echo "<h2>A média escolar é: " . number_format($media, 2, ',', '.') . ".</h2>";

        // Verificando se o aluno foi aprovado ou reprovado
        // if significa "se"
        if ($media < 5) {
            echo "<h2>Status: Reprovado</h2><br/>";
        // Elseif significa "senão se"
        } elseif ($media >= 5 && $media < 7) {
            echo "<h2>Status: Em Recuperação</h2><br/>";
        // Else significa "senão"
        } else {
            echo "<h2>Status: Aprovado</h2><br/>";
        }
      ?>

      <hr> 
      
    </p>
</body>
</html>