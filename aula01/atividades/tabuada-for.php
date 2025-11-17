<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada com laço de repetição FOR</title>
</head>
<body>
    <h1>Tabuada com laço de repetição FOR</h1>
    <p>
      <?php  
        for ($i=1; $i <= 10; $i++) {
          echo $i . "<br>";
        }
      ?>
    </p>

    <?php 
      $numero = 5; 
      echo "<h2>Tabuada do " . $numero . ".</h2>"; 
      for ($i=1; $i <= 10; $i++) {
        echo ($numero . " x " . $i . " = " . ($numero * $i) . "<br>");
      }
    ?>

    <?php 
      $numero = 5; 
      echo "<h2>Tabuada do " . $numero . " em ordem decrescente.</h2>"; 
      for ($i=10; $i >= 1; $i--) {
        echo ($numero . " x " . $i . " = " . ($numero * $i) . "<br>");
      }
    ?>
    
</body>
</html>