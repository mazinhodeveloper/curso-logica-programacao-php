<?php
include 'conexao.php';
$id_conta = $_GET['id_conta'];

try {
    $sql = "DELETE FROM plano_contas  
    WHERE id_conta = :id_conta";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_conta', $id_conta, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("location: contas_main.php");
            exit(); // Encerra a execução do processo após o direcionamento 

        } else {
            echo("Erro ao excluir registro.");
        }
    } catch (PDOEexception $e) {
        echo "Erro: " . $e->getMessage();
    }
?>