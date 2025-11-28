<<<<<<< HEAD
<?php
    // fornecedores_inclusao_processa.php 

    include 'conexao.php'; // Conectando o banco de dados 
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
    $email = $_POST['email'];
  
    try {
        $sql = "INSERT INTO fornecedores (nome_fornecedor, cpf_cnpj, cep, logradouro, numero, complemento, bairro, cidade, estado, telefone_fixo, celular, email_fornecedor) VALUES (:nome_fornecedor, :cpf_cnpj, :cep, :logradouro, :numero, :complemento, :bairro, :cidade, :estado, :telefone_fixo, :celular, :email)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_fornecedor', $nome_fornecedor);
        $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':telefone_fixo', $telefone_fixo);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            header("location: fornecedores_main.php");
            exit(); // Encerra a execução do processo após o direcionamento 

        } else {
            echo("Erro ao inserir registro.");
        }
    } catch (PDOEexception $e) {
        echo "Erro: " . $e->getMessage();
    }

=======
<?php
    // fornecedores_inclusao_processa.php 

    include 'conexao.php'; // Conectando o banco de dados 
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
    $email = $_POST['email'];
  
    try {
        $sql = "INSERT INTO fornecedores (nome_fornecedor, cpf_cnpj, cep, logradouro, numero, complemento, bairro, cidade, estado, telefone_fixo, celular, email_fornecedor) VALUES (:nome_fornecedor, :cpf_cnpj, :cep, :logradouro, :numero, :complemento, :bairro, :cidade, :estado, :telefone_fixo, :celular, :email)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome_fornecedor', $nome_fornecedor);
        $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':telefone_fixo', $telefone_fixo);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            header("location: fornecedores_main.php");
            exit(); // Encerra a execução do processo após o direcionamento 

        } else {
            echo("Erro ao inserir registro.");
        }
    } catch (PDOEexception $e) {
        echo "Erro: " . $e->getMessage();
    }

>>>>>>> a8d0542b7829f62e467f55fa2aa34013dcf8786c
 ?>