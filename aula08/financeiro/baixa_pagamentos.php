<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baixa Manual de Pagamentos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
</head>
<body>
    <?php 
      include 'conexao.php';
      include 'menu.php';
      // Verificar se o parâmetro foi passado na URL
      if (isset($_GET['id_pagamento']) && is_numeric($_GET['id_pagamento'])) {
        $id_pagamento = $_GET['id_pagamento'];
        // preparar a consulta
        $sql= "SELECT * FROM pagamentos WHERE id_pagamento = :id_pagamento";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_pagamento', $id_pagamento, PDO::PARAM_INT);
        $stmt->execute();
        $resultado_baixa = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verifica se o resultado será carregado com a data do vencimento
        if ($resultado_baixa) {
            $data_pagto = $resultado_baixa['data_vcto'];
            $valor_pago = $resultado_baixa['valor'];
        } else {
            $data_pagto = '';
            $valor_pago = '';
        
        }
        
      }  else {
            $data_pagto = '';
            $valor_pago = '';
            echo "<div class='alert alert-danger'>ID de Pagamento inválido.</div>";
      }
      // Já caregamos todos os parametros e variáveis para preparar a baixa
    ?>
    <div class="container">
        <h1>Baixa de pagamentos</h1>
        <form action="baixa_pagamentos_processa.php" method="post">
            <input type="hidden" id="id_pagamento" name="id_pagamento" value="<?php echo($id_pagamento)?>">
            <label for="">Data do Pagamento</label>
            <input type="date" name="data_pagto" id="data_pagto" value="<?php echo($data_pagto)?>" class="form-control">
            <label for="">Valor do Pagamento</label>
            <input type="text" name="valor_pago" id="valor_pago"  value="<?php echo($valor_pago)?>" class="form-control">
            <br>
            <button type="submit" id="botao" class="btn btn-primary">Baixar</button>
        </form>
    </div>
    
</body>
</html>