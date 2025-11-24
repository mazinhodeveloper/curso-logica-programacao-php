<!DOCTYPE html>
<!-- cadastro.php -->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div style="padding: 10px">
        <div class="container" style="width: 400px; text-align:center; margin: auto;">
            <h3>Cadastro de usuários</h3>
            <br>
            <form action="processa-incluir-usuario.php" method="post">
                <div class="form-group">
                    <label>Nome do usuário</label>
                    <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" required>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
 
                <div style="text-align: center;">
                    <button type="submit" id="botao" class="btn btn-primary">Gravar</button>
                </div>
 
 
            </form>
 
        </div>
 
 
 
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>