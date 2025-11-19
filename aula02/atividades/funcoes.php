<!DOCTYPE html> 
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções do Desenvolvedor</title>
</head>
<body>
    <h1>Funções do Desenvolvedor</h1>
    <p>Uma função é um bloco de código reutilizável, criado para executar uma tarefa especifica.</p>
    <h2>Vantagens:</h2>
    <p>
        Evita repetição de código<br>    
        Facilita manutenção<br>    
        Organiza melhor o projeto<br>    
        Torna o código mais fácil de entender</p>
    <p>Você pode enviar um ou mais parâmetros para que a função realize uma tarefa, devolvendo o resultado esperado, ou somente para efetuar uma tarefa simples que não precise de parâmetros.</p>
    <?php
        $nome_completo = "Carlos Eduardo Silva";
        $nota1 = 7.5;
        $nota2 = 8.0;
        $nota3 = 6.5;
        $nota4 = 9.0;
        echo saudacao();
        echo "Olá " . obterPrimeiroNome($nome_completo) . "<br/>";
        echo "Sua média é: " . number_format(calcularMedia($nota1, $nota2, $nota3, $nota4), 2) . "<br/>";
 
        function calcularMedia($n1, $n2, $n3, $n4) {
            return ($n1 + $n2 + $n3 + $n4) / 4;
        }
       
        function obterPrimeiroNome($nome_completo) {
            $partes_nome = explode(" ", $nome_completo);
            return $partes_nome[0];
        }  
 
        function saudacao() {
            return "Seja bem-vindo<br/>";
        }
    ?>
</body>
</html>