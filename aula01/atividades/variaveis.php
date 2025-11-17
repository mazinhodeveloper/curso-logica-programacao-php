<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Primeiro Programa</title>
</head>
<body>
    <?php echo "<h1>Meu Primeiro Programa</h1>"; ?>
    <p><?php echo "Texto do Primeiro Programa"; ?></p>
    <p><?php echo 25*5; ?></p>
    <hr>
    <p>
      <?php
        // Declaração de Variáveus 
        $nome = "Edmar";
        $sobrenome = "Inocencio"; 
        // Exibindo o valor das variáveis 
        // Concatenando as variáveis para formar uma frase completa 
        // Para concatenar em PHP, usamos o ponto (.) 
        echo "<h2>Meu nome é " . $nome . " " . $sobrenome . ".</h2>"; 

        $idade = 30; // Valor do tipo inteiro 
        echo "<h2>Eu tenho " . $idade . " anos.</h2>"; 

        $salario = 12500.50; // Variável do tipo float (Ponto flutuante), numérico com casas decimais 
        echo "<h3>Meu salário é R$ " . $salario . ".</h3>"; 
        echo "<h3>Meu salário é R$ " . number_format($salario, 2, ',', '.') . ".</h3>"; 

        $estudando = true; // Variável do tipo booleano 
        echo "<h3>Estou estudando PHP? " . ($estudando ? 'Sim' : 'Não') . ".</h3>"; 

        const SENHA = "12345"; // Declaração de constante (Usar maiúsculas por convenção) 
        echo "<h2>A senha é " . SENHA . ".<h2>"; 
        //SENHA = "67890"; Isso vai gerar um erro, constantes não pode alterar o valor 

        const ANO_ATUAL = 2025; 
        echo "<h2>O ano atual é " . ANO_ATUAL . ".</h2>"; 
        
        $ano_nascimento = 2025 - $idade; // Cálculo de ano de nascimento 
        echo "<h3>Meu ano de nascimento é " . $ano_nascimento . ".</h3>"

      ?>
    </p>
    
</body>
</html>