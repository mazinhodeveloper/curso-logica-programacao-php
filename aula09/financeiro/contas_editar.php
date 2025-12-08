<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de plano de contas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
</head>
<body>
    <?php
        include 'menu.php'; // Inclímos o Menu
        include 'conexao.php';
        $id_conta = $_GET['id_conta'];
        $sql = "SELECT * FROM plano_contas WHERE id_conta = :id_conta";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_conta', $id_conta, PDO::PARAM_INT);
        $stmt->execute();
        $contas = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($contas) {
            $id_conta = $contas['id_conta'];
            $descricao_conta = $contas['descricao_conta'];
        }        

    ?>
    <div class="container">
        <form action="contas_editar_processa.php" method="post">
            <input type="hidden" id="id_conta" name="id_conta" value="<?php echo $id_conta ?>" >
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao_conta" name="descricao_conta" class="form-control" value="<?php echo $descricao_conta ?>" required>
            <button type="submit" id="botao" class="btn btn-primary">Alterar</button>
        </form>
    </div>

</body>
</html>