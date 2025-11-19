<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laço While</title>
</head>
<body>
    <h1>Laço While</h1>
    <p>
      <?php
        // Exemplo de laço while 
        $contador = 1;
        while ($contador <= 5) {
            echo "Contador: $contador <br>";
            $contador++;
        }
      ?>
    </p>
    <p>
      <?php
        // Exemplo de laço for 
        for ($i = 1; $i <= 5; $i++) {
            echo "Número: $i <br>";
        }
      ?>
    </p>
    <p>
      <?php
        // Não se usa com frequência, mas é importante conhecer
        // É utilizado quando precisamos garantir que o bloco de código seja executado pelo menos uma vez
        $contador = 1;
        // Exemplo de laço do...while 
        do {
          echo "Contador do...while: $contador <br>";
          $contador++;
        } while ($contador <= 5);
        echo "<br>"; 
      ?>
    </p>
    <p>
      <?php
        // Exemplo de laço foreach 
        // Array de estrutura de dados 
        $frutas = array("Maçã", "Banana", "Laranja");
        foreach ($frutas as $fruta) {
          echo "Fruta: $fruta <br>";
        }
      ?>
    </p>
    <p>
      <?php
        // Nome completo da pessoa
        $nome = "João da Silva Souza";
        $nome_completo = explode(" ", $nome); // Divide o nome em partes
        //echo "Nome completo: $nome"; 
        echo "<br>Primeiro nome: " . $nome_completo[0]; // Acessa o primeiro elemento do array 
        echo "<br>Último nome: " . $nome_completo[count($nome_completo) - 1]; // Acessa o último elemento do array 

        // Funções de String em PHP 
        // https://www.php.net/manual/pt_BR/ref.strings.php 
      ?>
    </p>
    <hr>
    <h2>Funções de String em PHP</h2>
    <p><a href="https://www.php.net/manual/pt_BR/ref.strings.php" target="_blank">https://www.php.net/manual/pt_BR/ref.strings.php</a></p>
    <p>
      <?php
        $nome = "   João da Silva Souza   ";
        echo "Nome original: '" . $nome . "'<br>";
        echo "Nome sem espaços: '" . trim($nome) . "'<br>";
        echo "Nome em maiúsculas: '" . strtoupper(trim($nome)) . "'<br>";
        echo "Nome em minúsculas: '" . strtolower(trim($nome)) . "'<br>"; 

        echo str_repeat("-", 30) . "<br>"; // Repete o caractere "-" 30 vezes
        
        $nome = "    João da Silva Souza  ";
        echo strlen($nome) . "<br>"; // Conta o número de caracteres do nome com espaços 
        echo strlen(trim($nome)) . "<br>"; // Conta o número de caracteres do nome sem espaços
      ?>
    </p>
    <p>
      <?php
        echo substr("João da Silva Souza", 0, 4) . "<br>"; // Extrai os primeiros 4 caracteres
        echo substr("João da Silva Souza", -5) . "<br>"; // Extrai os últimos 5 caracteres
      ?>
    </p>
    <p>
      <?php
        $nome = "Maria Rita Silva";
        echo $nome . "<br>";
        echo str_replace("Silva", "Pereira", $nome) . "<br>"; // Substitui "Silva" por "Pereira"
        echo $nome . "<br>"; // O nome original permanece inalterado
        echo strtoupper($nome) . "<br>"; // Converte para maiúsculas
        echo strtolower($nome) . "<br>"; // Converte para minúsculas
      ?>
    </p>
    <hr>
    <h3>chr - PHP</h3>
    <p>chr — Gera uma string de um byte a partir de um número</p>
    <p>https://pt.wikipedia.org/wiki/ASCII | https://www.php.net/manual/pt_BR/function.chr.php</p>
    <p>
      <?php
        echo "<br>" . chr(65), chr(66), chr(67), PHP_EOL; // A B C
        echo "<br>" . chr(-159), chr(833), PHP_EOL . "<br>";
      ?>
    </p>
    <hr>
    <p>
      <?php
        echo round(4.3) . "<br>"; // Arredonda para o inteiro mais próximo
        echo round(4.6) . "<br>"; // Arredonda para o inteiro
      ?>
    </p>
</body>
</html>