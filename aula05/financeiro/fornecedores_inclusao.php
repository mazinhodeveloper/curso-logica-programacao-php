<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusão de Fornecedores</title>
</head>
<body>
    <?php 
        include 'menu.php';
    ?>
    <div class="container">
        <form action="fornecedores_inclusao_processa.php" method="post">
        <label for="" class="form-label">CPF / CNPJ</label> 
        <input type="text" id="cpf_cnpj" name="cpf_cnpj" class="form-control">           
        <label for="" class="form-label">Nome do Fornecedor</label>
        <input type="text" id="nome_fornecedor" name="nome_fornecedor" class="form-control">
        <label for="" class="form-label">CEP</label>
        <input type="text" id="cep" name="cep" class="form-control">
        <label for="" class="form-label">Endereço</label>
        <input type="text" id="logradouro" name="logradouro" class="form-control">
        <label for="" class="form-label">Numero</label>
        <input type="text" id="numero" name="numero" class="form-control">
        <label for="" class="form-label">Complemento</label>
        <input type="text" id="complemento" name="complemento" class="form-control">
        <label for="" class="form-label">Bairro</label>
        <input type="text" id="bairro" name="bairro" class="form-control">        
        <label for="" class="form-label">Cidade</label>
        <input type="text" id="cidade" name="cidade" class="form-control">
        <label for="" class="form-label">Estado</label>
        <input type="text" id="estado" name="estado" class="form-control">        
        <label for="">Telefone</label>
        <input type="text" id="telefone_fixo" name="telefone_fixo" class="form-control">  
        <label for="" class="form-label">Celular</label>
        <input type="text" id="celular" name="celular" class="form-control">              
        <label for="" class="form-label">E-Mail</label>
        <input type="text" id="email" name="email" class="form-control">        

        <button type="submit" id="botao" class="btn btn-primary">Incluir</button>
        <a href="fornecedores_main.php" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>
    
</body>
</html>