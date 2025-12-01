<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusão de plano de contas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
</head>
<body>
    <?php
        include 'menu.php'; // Inclímos o Menu
    ?>
    <div class="container">
        <form action="contas_inclusao_processa.php" method="post">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao_conta" name="descricao_conta" class="form-control" placeholder="Entre com a descrição" required>
            <button type="submit" id="botao" class="btn btn-primary">Incluir</button>
        </form>
    </div>

</body>
</html>