<?php
include 'conexao.php';
$id_fornecedor = $_POST['id_fornecedor'];
$nome_fornecedor = $_POST['nome_fornecedor'];
$cpf_cnpj  = $_POST['cpf_cnpj'];
$cep  = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$telefone_fixo = $_POST['telefone_fixo'];
$celular = $_POST['celular'];
$email_fornecedor = $_POST['email_fornecedor'];

try {
    $sql = "UPDATE fornecedores SET 
    nome_fornecedor = :nome_fornecedor,
    cpf_cnpj = :cpf_cnpj,
    celular = :celular,
    email_fornecedor = :email_fornecedor,
    telefone_fixo =  :telefone_fixo,
    cep = :cep,
    logradouro = :logradouro,
    numero = :numero,
    complemento = :complemento,
    bairro = :bairro,
    cidade = :cidade,
    estado = :estado 
    WHERE id_fornecedor = :id_fornecedor";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_fornecedor', $id_fornecedor, PDO::PARAM_INT);
        $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
        $stmt->bindParam(':nome_fornecedor', $nome_fornecedor);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':telefone_fixo', $telefone_fixo);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':email_fornecedor', $email_fornecedor);

        if ($stmt->execute()) {
            header("location: fornecedores_main.php");
            exit(); // Encerra a execução do processo após o direcionamento 

        } else {
            echo("Erro ao inserir registro.");
        }
    } catch (PDOEexception $e) {
        echo "Erro: " . $e->getMessage();
    }



?>