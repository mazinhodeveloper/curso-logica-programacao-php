<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
    <h1>Arrays</h1>
    <p>
      <?php
        // Criando um array em PHP
        $frutas = array("Maçã", "Banana", "Laranja", "Uva", "Manga");
        echo "<br/>";
        echo implode(", ", $frutas); // Concatena os elementos do array em uma string separada por vírgulas
        echo "<br/><br/>";
        // exibir somente a primeira fruta
        echo "Primeira fruta: " . $frutas[0];
        echo "<br/><br/>";
        // exibir somente a última fruta
        echo "Última fruta: " . $frutas[count($frutas) - 1];
        echo "<br/><hr><br/>";
    
        // laço foreach para percorrer o array de frutas
        foreach ($frutas as $fruta) {
            echo "Fruta: $fruta <br>";
        }
        echo "<br/><hr>";

        //Incluir um novo elemento ao array
        $frutas[] = "Abacaxi";
        echo "<br/>Após adicionar uma nova fruta:<br/>";
        foreach ($frutas as $fruta) {
            echo "Fruta: $fruta <br>";
        }
        echo "<br/><hr>";
    
        // Remover o último elemento do array
        array_pop($frutas);
    
        // unset para remover um elemento específico (por exemplo, o segundo elemento)
        unset($frutas[1]);
        echo "<br/>Após remover frutas:<br/>";
        foreach ($frutas as $fruta) {  
            echo "Fruta: $fruta <br>";
        }
        echo "<br/><hr>";
    
        // colocar em ordem alfabética
        sort($frutas);
        echo "<br/>Após ordenar as frutas:<br/>";
        foreach ($frutas as $fruta) {
            echo "Fruta: $fruta <br>";
        }  
        echo "<br/><hr>"; 

        // Verificar se existe laranja no array de frutas
        if (in_array("Laranja", $frutas)) {
            echo "Laranja está no array de frutas.<br/>";
        } else {
            echo "Laranja não está no array de frutas.<br/>";
        }
        echo "<br/><hr>";
    
        // Array associativo
        $idades = array("João" => 25, "Maria" => 30, "Pedro" => 22);
        echo "<br/>Idades:<br/>";
        foreach ($idades as $nome => $idade) {
            echo "Nome: $nome, Idade: $idade<br/>";
        }
        echo "<br/><hr>";
    
        // Adicionar um novo par chave-valor
        $idades["Ana"] = 28;
        echo "<br/>Após adicionar uma nova idade:<br/>";
        foreach ($idades as $nome => $idade) {
            echo "Nome: $nome, Idade: $idade<br/>";
        }  
        echo "<br/><hr>";
    
        // Alterar a idade do João
        $idades["João"] = 26;
        echo "<br/>Após alterar a idade do João:<br/>";
        foreach ($idades as $nome => $idade) {
            echo "Nome: $nome, Idade: $idade<br/>";
        }  
        echo "<br/><hr>";
    
        // Excluir o joão do array
        unset($idades["João"]);
        echo "<br/>Após remover o João:<br/>";
        foreach ($idades as $nome => $idade) {  
            echo "Nome: $nome, Idade: $idade<br/>";
        }

        // Fizemos um Crud básico em arrays simples e associativos 
        echo "<br/><hr>";

        // Verificar se existe João no array de idades
        if (array_key_exists("João", $idades)) {
            echo "João está no array de idades.<br/>";
        } else {
            echo "João não está no array de idades.<br/>";
        }
        
        echo "<br/><hr>";
      ?>
    </p>
</body>
</html>