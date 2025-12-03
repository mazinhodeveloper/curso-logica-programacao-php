<!DOCTYPE html>
<!-- pagamentos_main.php -->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas a Pagar</title>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
      <link href="https://cdn.datatables.net/2.3.5/css/dataTables.bootstrap5.css">

    <script>
        // Comantário no Javascript e PHP

function confirmarExclusao(id_pagamento) {
    var modal = new bootstrap.Modal(document.getElementById('confirmModal'));
    modal.show();
    document.getElementById('confirmDeleteBtn').onclick = function() {
        window.location.href = "pagamentos_excluir.php?id_pagamento=" + id_pagamento;
    };
}

    </script>
  

</head>
<body>
    <?php 
        include 'conexao.php';
        include 'menu.php';
    ?>
    <div class="container">
        <a href="pagamentos_inclusao.php" class="btn btn-primary">Novo Pagamento</a>
        <br>
        <table id="table_conta" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nome Fornecedor</th>
                <th>Data Vencimento</th>
                <th>Valor</th>
                <th>Conta</th>
                <th>Editar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php
                $sql="SELECT p.id_pagamento, p.data_vcto, p.valor, f.nome_fornecedor, c.descricao_conta FROM pagamentos p INNER JOIN fornecedores f ON p.id_fornecedor = f.id_fornecedor INNER JOIN plano_contas c ON p.id_conta = c.id_conta;"; // Consulta da tabela contas
                $stmt = $pdo->query($sql); // Executa a consulta usando PDO
                // laço para trazer os dados da consulta
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id_pagamento = $row['id_pagamento'];
                    $data_vcto = $row['data_vcto'];
                    $valor = $row['valor'];
                    $nome_fornecedor = $row['nome_fornecedor'];
                    $descricao_conta = $row['descricao_conta'];
                 ?>
                 <tr>
                    <td><?php echo $id_pagamento ?></td>
                    <td><?php echo $nome_fornecedor ?></td>
                    <td><?php echo date("d/m/Y", strtotime($data_vcto)) ?></td>
                    <td><?php echo "R$ " . number_format($valor,2, ",", ".") ?></td>
                    <td><?php echo $descricao_conta ?></td>
                    <td><a href="pagamentos_editar.php?id_pagamento=<?php echo $id_pagamento ?>" class="btn btn-secondary">Editar</a></td>
                    <td><a href="#" onclick="confirmarExclusao(<?php echo htmlspecialchars($id_pagamento); ?>)" class="btn btn-danger">Excluir</a></td>
                 </tr>
                 <?php
                  }
                 ?> 

            </tbody>
        </table>

    </div>

<!-- Modal de Confirmação -->

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmar Exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir este conta?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Excluir</button>
      </div>
    </div>
  </div>
</div>


 
<script src="https://code.jquery.com/jquery-3.7.1.js">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstraptstrap.bundle.min.js">
<script src="https://cdn.datatables.net/2.3.5/js/dataTables.js">

    


<script>
   $(document).ready(function() {
       $('#table_conta').DataTable();
   });
</script>

</body>
</html>