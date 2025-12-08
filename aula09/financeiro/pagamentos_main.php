<!DOCTYPE html>
<!-- pagamentos_main.php -->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas a Pagar</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.5/css/dataTables.bootstrap5.css">

    <script>
        // Modal de exclusão
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

    // Filtros GET
    $data_inicial = isset($_GET['data_inicial']) ? $_GET['data_inicial'] : '';
    $data_final   = isset($_GET['data_final']) ? $_GET['data_final'] : '';
?>

<div class="mt-4">

    <form action="pagamentos_main.php" method="get">
        <div class="row">
            <div class="col-sm">
                <label for="">Data Inicial</label>
                <input type="date" name="data_inicial" id="data_inicial" class="form-control"
                    value="<?php echo $data_inicial ?>">
            </div>

            <div class="col-sm">
                <label for="">Data Final</label>
                <input type="date" name="data_final" id="data_final" class="form-control"
                    value="<?php echo $data_final ?>">
            </div>

            <div class="col-sm">
                <br>
                <button type="submit" class="btn btn-primary mt-2">Pesquisar</button>
            </div>
        </div>
    </form>

    <a href="pagamentos_inclusao.php" class="btn btn-success mt-3">Novo Pagamento</a>

    <br><br>

    <form action="baixa_pagamentos_lote.php" method="post">

    <table id="table_conta" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Fornecedor</th>
                <th>Data Vencimento</th>
                <th>Valor</th>
                <th>Valor Pago</th>
                <th>Descrição</th>
                <th>Editar</th>
                <th>Excluir</th>
                <th>Baixa</th>
                <th>Lote</th>
            </tr>
        </thead>

        <tbody>

        <?php
            // MONTA SQL
            $sql = "SELECT 
                        p.id_pagamento, 
                        p.data_vcto, 
                        p.valor,
                        p.data_pagto,
                        p.valor_pago, 
                        f.nome_fornecedor, 
                        c.descricao_conta
                    FROM pagamentos p 
                    INNER JOIN fornecedores f ON p.id_fornecedor = f.id_fornecedor 
                    INNER JOIN plano_contas c ON p.id_conta = c.id_conta
                    WHERE 1 = 1";

            if (!empty($data_inicial) && !empty($data_final)) {
                $sql .= " AND p.data_vcto BETWEEN :data_inicial AND :data_final";
            }

            $stmt = $pdo->prepare($sql);

            if (!empty($data_inicial) && !empty($data_final)) {
                $stmt->bindParam(':data_inicial', $data_inicial);
                $stmt->bindParam(':data_final', $data_final);
            }

            $stmt->execute();

            $contador = 0;

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contador++;
        ?>

        <tr>
            <td>
                <?php echo $row['id_pagamento']; ?>
                <input type="hidden" name="id_pagamento<?php echo $contador; ?>" 
                       value="<?php echo $row['id_pagamento']; ?>">
            </td>

            <td><?php echo $row['nome_fornecedor']; ?></td>

            <td><?php echo date("d/m/Y", strtotime($row['data_vcto'])); ?></td>

            <td><?php echo "R$ " . number_format($row['valor'],2,",","."); ?></td>

            <td><?php echo "R$ " . number_format($row['valor_pago'],2,",","."); ?></td>

            <td><?php echo $row['descricao_conta']; ?></td>

            <td>
                <a href="pagamentos_editar.php?id_pagamento=<?php echo $row['id_pagamento']; ?>" 
                   class="btn btn-secondary">Editar</a>
            </td>

            <td>
                <a href="#" onclick="confirmarExclusao(<?php echo $row['id_pagamento']; ?>)" 
                   class="btn btn-danger">Excluir</a>
            </td>

            <td>
                <a href="baixa_pagamentos.php?id_pagamento=<?php echo $row['id_pagamento']; ?>" 
                   class="btn btn-primary">Baixa</a>
            </td>

            <td>
                <input type="checkbox" name="check<?php echo $contador; ?>" value="1"
                       style="transform: scale(1.5);">
            </td>
        </tr>

        <?php } ?>

        </tbody>
    </table>

    <input type="hidden" name="contador" value="<?php echo $contador; ?>">

    <button type="submit" class="btn btn-primary">Baixar por lote</button>

    </form>

    <hr>

    <!-- RESUMO POR TIPO DE CONTA -->
    <?php 
        $sql2="SELECT descricao_conta, SUM(valor) AS total 
               FROM pagamentos p 
               INNER JOIN plano_contas c ON p.id_conta=c.id_conta 
               GROUP BY c.descricao_conta";

        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute();
    ?>

    <h4>Total por Tipo de Despesa</h4>
    <table class="table table-bordered w-50">
        <thead>
            <tr>
                <th>Tipo Despesa</th>
                <th>Valor Total</th>
            </tr>
        </thead>

        <?php while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['descricao_conta'] ?></td>
                <td><?= number_format($row['total'], 2, ",", ".") ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <hr>

    <!-- GRÁFICO GOOGLE -->
    <?php 
        $sql3="SELECT descricao_conta, SUM(valor) AS total 
               FROM pagamentos p 
               INNER JOIN plano_contas c ON p.id_conta=c.id_conta 
               GROUP BY c.descricao_conta";

        $stmt3 = $pdo->prepare($sql3);
        $stmt3->execute();
    ?>

    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>

</div>

<!-- Modal de Exclusão -->
<div class="modal fade" id="confirmModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar Exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir este pagamento?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Excluir</button>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.datatables.net/2.3.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.5/js/dataTables.bootstrap5.js"></script>

<script>
    $(document).ready(function() {
        $('#table_conta').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json'
            }
        });
    });
</script>

<!-- Google Chart -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
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

</body>
</html>
