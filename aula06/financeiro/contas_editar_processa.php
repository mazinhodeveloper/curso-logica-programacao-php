<?php
include 'conexao.php';
$id_conta = $_POST['id_conta'];
$descricao_conta = $_POST['descricao_conta'];

try {
    $sql = "UPDATE plano_contas SET 
    descricao_conta = :descricao_conta
    WHERE id_conta = :id_conta";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_conta', $id_conta, PDO::PARAM_INT);
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