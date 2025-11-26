<?php
    // processa_incluir_usuario.php 

    include 'conexao.php'; // Conectando o banco de dados 
    $nome_usuario = $_POST['nome_usuario'];
    $email  = $_POST['email'];
    $senha  = $_POST['senha'];

    if (empty($nome_usuario) || empty($email) || empty($senha)) {
        die("Erro: Todos os campos são obrigatórios");
    }
    $hashed_senha = password_hash($senha, PASSWORD_DEFAULT); // Criptografa a senha

    try {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome_usuario, :email, :senha)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_usuario', $nome_usuario);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $hashed_senha);

        if ($stmt->execute()) {
            header("location: index.php");
            exit(); // Encerra a execução do processo após o direcionamento 

        } else {
            echo("Erro ao inserir registro.");
        }
    } catch (PDOEexception $e) {
        echo "Erro: " . $e->getMessage();
    }

 ?>