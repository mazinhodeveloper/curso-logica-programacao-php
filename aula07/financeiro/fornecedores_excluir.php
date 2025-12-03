<?php
include 'conexao.php';
$id_fornecedor = $_GET['id_fornecedor'];


try {
    $sql = "DELETE FROM fornecedores  
    WHERE id_fornecedor = :id_fornecedor";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_fornecedor', $id_fornecedor, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("location: fornecedores_main.php");
            exit(); // Encerra a execução do processo após o direcionamento 

        } else {
            echo("Erro ao excluir registro.");
        }
    } catch (PDOEexception $e) {
        echo "Erro: " . $e->getMessage();
    }

?>