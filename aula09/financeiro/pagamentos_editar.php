<!DOCTYPE html>
<!-- pagamentos_editar.php -->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Pagamentos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
</head>
<body>
    <?php
        include 'menu.php'; // Inclímos o Menu
        include 'conexao.php'; // Conexão

        $id_pagamento = $_GET['id_pagamento'];
        $sql = "SELECT * FROM pagamentos WHERE id_pagamento=:id_pagamento";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_pagamento', $id_pagamento, PDO::PARAM_INT);
        $stmt->execute();
        $resultado_pagamentos = $stmt->fetch(PDO::FETCH_ASSOC);
        $data_vcto = $resultado_pagamentos['data_vcto'];
        $id_fornecedor_fornecedor = $resultado_pagamentos['id_fornecedor'];
        $id_conta_conta = $resultado_pagamentos['id_conta'];
        $valor = $resultado_pagamentos['valor'];
        $descricao = $resultado_pagamentos['descricao'];

    ?>
    <div class="container">
        <form action="pagamentos_editar_processa.php" method="post">
            <input type="hidden" name="id_pagamento" id="id_pagamento" value="<?php echo $id_pagamento ?>">
            <label for="data_vcto">Data_vencimento</label>
            <input type="date" id="data_vcto" name="data_vcto" class="form-control" value="<?php echo $data_vcto; ?>" required>
            <label for="fornecedor">Fornecedor</label>
            <select name="id_fornecedor" id="id_fornecedor" class="form-control">
                <option value="0">-- Selecione o Fornecedor --</option>
                <!-- Consulta na tabela -->
                <?php 
                try {
                $sql = "select * from fornecedores order by nome_fornecedor";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                // Laço para trazer linha a linha
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      $id_fornecedor = htmlspecialchars($row['id_fornecedor']);
                      $nome_fornecedor = $row['nome_fornecedor'];
                      $selected = ($id_fornecedor_fornecedor == $row['id_fornecedor']) ? 'selected' : '';
                      echo $id_fornecedor_fornecedor;
                      echo "<option value='$id_fornecedor' $selected>$nome_fornecedor</option> ";
                }
                } catch (PDOExeption $e) {
                    echo "Erro: " . $e->getMessage();
                }
                ?>
            </select>

            <!-- Seleção do plano de contas -->

            <label for="conta">Conta</label>
            <select name="id_conta" id="id_conta" class="form-control">
                <option value="0">-- Selecione a Conta --</option>
                <!-- Consulta na tabela -->
                <?php 
                try {
                $sql = "select * from plano_contas order by descricao_conta";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                // Laço para trazer linha a linha
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      $selected = ($id_conta_conta == $row['id_conta']) ? 'selected' : '';
                      $id_conta = htmlspecialchars($row['id_conta']);
                      $descricao_conta = $row['descricao_conta'];
                      echo "<option value='$id_conta' $selected>$descricao_conta</option> ";
                }
                } catch (PDOExeption $e) {
                    echo "Erro: " . $e->getMessage();
                }
                ?>
            </select>
            <label for="Valor">Valor</label>
            <input type="text" id="valor" name="valor" class="form-control" value="<?php echo $valor; ?>" required>    
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control" value="<?php echo $descricao; ?>">  
            

            <button type="submit" id="botao" class="btn btn-primary">Alterar</button>
        </form>
    </div>

</body>
</html>