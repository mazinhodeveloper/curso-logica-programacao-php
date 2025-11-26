<!DOCTYPE html>
<!-- fornecedores_main.php -->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fornecedores</title>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
      <link href="https://cdn.datatables.net/2.3.5/css/dataTables.bootstrap5.css">

</head>
<body>
    <?php 
        include 'conexao.php';
        include 'menu.php';
    ?>
    <div class="container">
        <a href="fornecedores_inclusao.php" class="btn btn-primary">Novo Fornecedor</a>
        <br>
        <table id="table_fornecedor" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nome Fornecedor</th>
                <th>Editar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php
                $sql="select id_fornecedor,nome_fornecedor from fornecedores"; // Consulta da tabela fornecedores
                $stmt = $pdo->query($sql); // Executa a consulta usando PDO
                // laço para trazer os dados da consulta
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id_fornecedor = $row['id_fornecedor'];
                    $nome_fornecedor = $row['nome_fornecedor'];
                 ?>
                 <tr>
                    <td><?php echo $id_fornecedor ?></td>
                    <td><?php echo $nome_fornecedor ?></td>
                    <td><a href="" class="btn btn-secondary">Editar</a></td>
                    <td><a href="" class="btn btn-danger">Excluir</a></td>
                 </tr>
                 <?php
                  }
                 ?> 

            </tbody>
        </table>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js">
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.js">
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.bootstrap5.js">


<script>
   $(document).ready(function() {
       $('#table_fornecedor').DataTable();
   });
</script>

</body>
</html>