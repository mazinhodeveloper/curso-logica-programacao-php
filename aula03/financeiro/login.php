<?php
  session_start(); // Iniciar uma sessão 

  // Quando se inicia uma sessão, estamos preparando 
  // para enviar alguns parametros para outra página 
  // Vamos enviar o ID, email para o principal.php
  // Dizendo então que se está logado. "Fator de Segurança"

  include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados    
  $usuario = $_POST['email']; // Pega o valor do campo email do formulário
  $senha = $_POST['senha']; // Pega o valor do campo senha do formulário 

  try {
    // Preparar a consulta SQL 
    $sql = "SELECT * FROM usuarios WHERE email = :email"; 
    $stmt = $pdo->prepare($sql); 
    // Verificar os parametros corretamente
    $stmt->bindParam(':email', $usuario, PDO::PARAM_STR);
    // Executar a consulta 
    $stmt->execute(); 
    // Trouxe todos os campos do usuário para uma lista (array)
    $usuarioEncontrado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuarioEncontrado) {
      $id_usuario = $usuarioEncontrado['id_usuario'];
      $hashed_password = $usuarioEncontrado['senha'];
      $nome_usuario = $usuarioEncontrado['nome'];

      // Verificar a senha usando password_verify
      if (password_verify($senha, $hashed_password)) {
        // Armazena dados da sessão
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['nome_usuario'] = $nome_usuario;
        // Redirecionar para a página principal
        header("location: principal.php");
        exit();
      } else {
        // Senha incorreta
        echo "Senha incorreta. Tente novamente.";
      }
    } else {
      // Usuário não encontrado
      echo "Usuário não encontrado. Verifique o e-mail.";
    }
  } catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
  }
?>