<?php
    // pagamentos_editar_processa.php 

    include 'conexao.php'; // Conectando o banco de dados 
    $id_pagamento = $_POST['id_pagamento'];
    $data_vcto = $_POST['data_vcto'];
    $id_fornecedor  = $_POST['id_fornecedor'];
    $id_conta  = $_POST['id_conta'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

  
    try {
        $sql = "UPDATE pagamentos set data_vcto=:data_vcto,
            id_fornecedor=:id_fornecedor,
            id_conta=:id_conta,
            valor=:valor,
            descricao=:descricao 
        WHERE id_pagamento = :id_pagamento";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':data_vcto', $data_vcto);
        $stmt->bindParam(':id_fornecedor', $id_fornecedor);
        $stmt->bindParam(':id_conta', $id_conta);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id_pagamento', $id_pagamento);

        if ($stmt->execute()) {
            header("location: pagamentos_main.php");
            exit(); // Encerra a execução do processo após o direcionamento 

        } else {
            echo("Erro ao inserir registro.");
        }
    } catch (PDOEexception $e) {
        echo "Erro: " . $e->getMessage();
    }

 ?>