<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case</title>
</head>
<body>
    <h1>Case</h1>
    <p> 
      <?php
        //$numero_semana = 3; // Terça-feira 
        //$numero_semana = 5; // Quinta-feira 
        $numero_semana = 8; // Inválido 
        switch ($numero_semana) {
            case 1:
                echo "Domingo";
                break; // Break é usado para sair do switch 
            case 2:
                echo "Segunda-feira";
                break;
            case 3:
                echo "Terça-feira";
                break;
            case 4:
                echo "Quarta-feira";
                break;
            case 5:
                echo "Quinta-feira";
                break;
            case 6:
                echo "Sexta-feira";
                break;
            case 7:
                echo "Sábado";
                break;
            default: // Default é usado para tratar valores não previstos 
                echo "Número da semana inválido.";
        }
      ?>
    </p>
</body>
</html>