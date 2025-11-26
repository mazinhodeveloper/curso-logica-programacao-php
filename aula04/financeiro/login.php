<?php
session_start(); // Inicia uma seção
// Quando se inicia uma seção estamos preparando
// para enviar alguns parametros para outra página
// Vamos enviar o ID, o email para o principal.php
// Dizendo então que se está logado. "Fator de Segurança"
include 'conexao.php';
$usuario = $_POST['email'];
$senha = $_POST['senha'];
try {
    // Preparar a consulta SQL
    $sql = "SELECT * FROM usuarios where email = :email";
    $stmt = $pdo->prepare($sql);
    // Vincular os parametros corretamente
    $stmt->bindParam(':email', $usuario, PDO::PARAM_STR);
    // Executar a consulta
    $stmt->execute();
    // Trouxe todos os campos do usuário para uma lista (array)
    $usuarioEncontrado = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuarioEncontrado) {
        $id_usuario = $usuarioEncontrado['id_usuario'];
        $hashed_password = $usuarioEncontrado['senha'];
        $nome_usuario = $usuarioEncontrado['nome'];
        //Verifica se a senha está correta
        if (password_verify($senha, $hashed_password)) {
            //Armazenar dados da seção
            $_SESSION['id_usuario'] = $id_usuario;
            $_SESSION['nome_usuario'] = $nome_usuario;
            // Redireciona para o proncipal.php;
            header('location:principal.php');
            exit();
        }

    }
    // Se a senha for invalida ou usuário não encontrado
    // Criar um php chamado usuario_recusado.php
    exit();
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>