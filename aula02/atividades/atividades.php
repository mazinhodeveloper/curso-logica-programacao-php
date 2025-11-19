<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades</title>
</head>
<body>
    <h1>Atividades</h1>
    <p>Esta é a página de atividades.</p>

    <h2>Tabuada do 5, calculada com o laço while.</h2>
    <p>
      <?php
        // Tabuada com o laço while
        $numero = 5; // Número para o qual queremos a tabuada
        $contador = 1;
        while ($contador <= 10) {
            echo "$numero x $contador = " . ($numero * $contador) . "<br>";
            $contador++;
        }
      ?>
    </p>
    <hr>
    <h2>Função</h2>
    <p>Esta função calcula a tabuada do 5.</p>
    <p>
      <?php
        // Função para calcular a tabuada
        function tabuada($numero) {
            $resultado = "";
            for ($contador = 1; $contador <= 10; $contador++) {
                $resultado .= "$numero x $contador = " . ($numero * $contador) . "<br>";
            }
            return $resultado;
        }

        // Chamando a função
        echo tabuada(5);
      ?>
    </p>
    <hr>
    <h2>Função para calcular a soma de 4 notas retornando a média.</h2>
    <p>
      <?php 
        
        // Função para calcular a média de 4 notas
        function media($nota1, $nota2, $nota3, $nota4) {
            $soma = $nota1 + $nota2 + $nota3 + $nota4;
            return $soma / 4  ;
        }

        // Chamando a função
        echo "A média das notas é: " . media(5, 10, 7, 8 );
      ?>
    </p>
</body>
</html>