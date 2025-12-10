<!DOCTYPE html>
<!-- editar_usuario.php -->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
</head>
<body>
    <?php
        include 'menu.php';
        include 'conexao.php';
        $id_usuario = 1;
    ?>

<form action="editar_usuario_processa.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario" value="1">
    <input type="file" name="foto" required>
    <button type="submit">Alterar</button>
</form>
</body>
</html>