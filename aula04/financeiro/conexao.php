<<<<<<< HEAD
<?php
$host = 'localhost'; // Endereço do servidor do banco de dados
$db = 'financeiro'; // Nome do banco de dados
$user = 'root'; // Nome do usuário 
$pass = ''; // Senha do banco
$charset = 'utf8mb4'; // conjunto de caracteres usados na conexão - Permitir acentuação padrão Brasil

// Dara source Name (DNS) - Informaçõe necessárias
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
    // Configura  PDO para lançar exceções em caso de erros
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Defina o modo de busca padrão para array associativo
    PDO::ATTR_EMULATE_PREPARES  => false,
    // Desativa a emulação de prepared statements 

];

try {
    // Tentar criar uma nova instância da classe PDO, estabelecendo a conexão com o banco de dados
    $pdo = new PDO($dsn, $user, $pass, $options);
    //echo "<h2>Conexão bem sucedida</h2>";

} catch (PDOException $e) {
    echo "<h2>Falha de Conexão: " . $e->getMessage() . "</h2>";
}

=======
<?php
$host = 'localhost'; // Endereço do servidor do banco de dados
$db = 'financeiro'; // Nome do banco de dados
$user = 'root'; // Nome do usuário 
$pass = ''; // Senha do banco
$charset = 'utf8mb4'; // conjunto de caracteres usados na conexão - Permitir acentuação padrão Brasil

// Dara source Name (DNS) - Informaçõe necessárias
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
    // Configura  PDO para lançar exceções em caso de erros
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Defina o modo de busca padrão para array associativo
    PDO::ATTR_EMULATE_PREPARES  => false,
    // Desativa a emulação de prepared statements 

];

try {
    // Tentar criar uma nova instância da classe PDO, estabelecendo a conexão com o banco de dados
    $pdo = new PDO($dsn, $user, $pass, $options);
    //echo "<h2>Conexão bem sucedida</h2>";

} catch (PDOException $e) {
    echo "<h2>Falha de Conexão: " . $e->getMessage() . "</h2>";
}

>>>>>>> a8d0542b7829f62e467f55fa2aa34013dcf8786c
?>