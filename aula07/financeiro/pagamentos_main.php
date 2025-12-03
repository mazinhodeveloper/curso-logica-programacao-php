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
    <div>
        <a href="pagamentos_inclusao.php" class="btn btn-primary">Novo Pagamento</a>
        <br>
        <form action="baixa_pagamentos_lote.php" method="post">
        <table id="table_conta" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nome Fornecedor</th>
                <th>Data Vencimento</th>
                <th>Valor</th>
                <!-- <th>Data pagamento</th> -->
                <th>Valor Pago</th>                
                <th>Conta</th>
                <th>Editar</th>
                <th>Excluir</th>
                <th>Baixa</th>
                <th>Lote</th>
            </thead>
            <tbody>
                <?php
                $sql="SELECT p.id_pagamento, p.data_vcto, p.valor,p.data_pagto,p.valor_pago, f.nome_fornecedor, c.descricao_conta FROM pagamentos p INNER JOIN fornecedores f ON p.id_fornecedor = f.id_fornecedor INNER JOIN plano_contas c ON p.id_conta = c.id_conta;"; // Consulta da tabela contas
                $stmt = $pdo->query($sql); // Executa a consulta usando PDO
                // laço para trazer os dados da consulta
                $contador = 0;
                
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id_pagamento = $row['id_pagamento'];
                    $data_vcto = $row['data_vcto'];
                    $valor = $row['valor'];
                    $data_pagto = $row['data_pagto'];
                    $valor_pago = $row['valor_pago'];                    
                    $nome_fornecedor = $row['nome_fornecedor'];
                    $descricao_conta = $row['descricao_conta'];
                    $contador=$contador+1;
                 ?>
                 <tr>
                    <td><?php echo $id_pagamento ?>
                    <input type="hidden" name="id_pagamento<?php echo $contador; ?>" id="id_pagamento<?php echo $contador; ?>" value="<?php echo $id_pagamento ?>">

                    </td>
                    <td><?php echo $nome_fornecedor ?></td>
                    <td><?php echo date("d/m/Y", strtotime($data_vcto)) ?></td>
                    <td><?php echo "R$ " . number_format($valor,2, ",", ".") ?></td>
                    <!-- <td><?php echo date("d/m/Y", strtotime($data_pagto)) ?></td> -->
                    <td><?php echo "R$ " . number_format($valor_pago,2, ",", ".") ?></td>                    
                    <td><?php echo $descricao_conta ?></td>
                    <td><a href="pagamentos_editar.php?id_pagamento=<?php echo $id_pagamento ?>" class="btn btn-secondary">Editar</a></td>
                    <td><a href="#" onclick="confirmarExclusao(<?php echo htmlspecialchars($id_pagamento); ?>)" class="btn btn-danger">Excluir</a></td>
                    <td><a href="baixa_pagamentos.php?id_pagamento=<?php echo $id_pagamento ?>" class="btn btn-primary">Baixa</a></td>
                    <td><input type="checkbox" name="check<?php echo($contador) ?>" id="check<?php echo($contador) ?>" value="1" style="transform: scale(2);"></td>
                 </tr>
                 <?php
                  }
                 ?> 

            </tbody>
        </table>
        <hr>
        <input type="hidden" id="contador" name="contador" value="<?php echo($contador) ?>">
        <button type="submit" id="botao_baixa" class="btn btn-primary">Baixar por lote</button>
        </form>
        <hr>
        <?php 
                $sql2="select descricao_conta,sum(valor) as total from financeiro.pagamentos p inner join financeiro.plano_contas c on p.id_conta=c.id_conta group by c.descricao_conta"; // Consulta da tabela contas
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute();
        ?>
        <table>
          <th>Tipo Despesa</th>
          <th>Valor Total</th>
     
        <?php while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
             <tr>
                <td><?= $row['descricao_conta'] ?></td>
                <td><?= number_format($row['total'], 2, ",", ".") ?></td>
             </tr>
        <?php endwhile; ?>



        </table>

    </div>
    <hr>

        <?php 
                $sql3="select descricao_conta,sum(valor) as total from financeiro.pagamentos p inner join financeiro.plano_contas c on p.id_conta=c.id_conta group by c.descricao_conta"; // Consulta da tabela contas
                $stmt3 = $pdo->prepare($sql3);
                $stmt3->execute();
        ?>


<!-- Grafico do Google pizza Chart -->
 
<div id="piechart_3d" style="width: 900px; height: 500px;"></div>




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
<!-- Script do grafico -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tipo Despesas', 'Valores'],
          <?php while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)): ?>
              ['<?= $row['descricao_conta'] ?>', <?= $row['total'] ?>],
          <?php endwhile; ?>  
        ]);

        var options = {
          title: 'Minhas despesas',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>


<!-- Fim do grafico -->




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