<!DOCTYPE html>
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
        @$id_usuario = $_GET['id_usuario']; 
    ?>

    <form action="editar_usuario_processa.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_usuario" id="id_usuario" value="">
        
        <label for="foto">Selecione uma foto:</label>
        <input type="file" id="foto" name="foto">

        <button type="submit">Salvar alterações</button>
    </form>

</body>
</html>