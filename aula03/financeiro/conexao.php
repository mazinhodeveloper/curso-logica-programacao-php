<?php
  $host = "localhost"; // Endenreço do servidor de banco de dados 
  $db = "financeiro"; // Nome do banco de dados 
  $user = "root"; // Usuário do banco de dados 
  $pass = ""; // Senha do banco de dados 
  $charset = "utf8mb4"; // Conjunto de caracteres usados na conexão / Permite acentuação pt-BR 

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; 

  $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Configura o PDO para lançar exceções em caso de erros 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Define o modo de busca padrão para arrays associativos 
    PDO::ATTR_EMULATE_PREPARES => false, // Desativa a emulação de prepared statements do PDO 
  ]; 

  // Código de teste de conexão
  try {
    $pdo = new PDO($dsn, $user, $pass, $options); // Tentar conectar ao banco de dados 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<h2>Conexão bem sucedida!</h2>"; 
  } catch (PDOException $e) {
    echo "<h2>Falha de conexão: " . $e->getMessage() . "</h2>";
  }
?>