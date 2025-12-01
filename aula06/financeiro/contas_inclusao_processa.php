<?php
    // processa_incluir_contas.php
    include 'conexao.php'; //Conectamos o banco de dados
    $descricao_conta = $_POST['descricao_conta'];

try {
        $sql = "INSERT INTO plano_contas (descricao_conta) VALUES (:descricao_conta)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':descricao_conta', $descricao_conta);

        if ($stmt->execute()) {
            header("location: contas_main.php");
            exit(); // Encerra a execução do processo após o direcionamento 

        } else {
            echo("Erro ao inserir registro.");
        }
    } catch (PDOEexception $e) {
        echo "Erro: " . $e->getMessage();
    }

 ?>