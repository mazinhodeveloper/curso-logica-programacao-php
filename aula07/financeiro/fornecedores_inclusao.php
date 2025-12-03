<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusão de Fornecedores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7z27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php 
        include 'menu.php';
    ?>
    <div class="container">
        <h1>Inclusão de Fornecedores</h1>
        <form action="fornecedores_inclusao_processa.php" method="post">
        <div class="row">
            <div class="form-group col-sm-4">
                <label for="" class="form-label">CPF / CNPJ</label> 
                <input type="text" id="cpf_cnpj" name="cpf_cnpj" class="form-control cpfOuCnpj" placeholder="Entre com o CPF/CNPJ" required>

            </div>
            <div class="form-group col-sm-8">           
                <label for="" class="form-label">Nome do Fornecedor</label>
                <input type="text" id="nome_fornecedor" name="nome_fornecedor" class="form-control">
            </div>    
        </div>  
        
        <div class="row">
            <div class="form-group col-sm-4">   
                <label for="" class="form-label">CEP</label>
                <input type="text" id="cep" name="cep" class="form-control">
            </div>
            <div class="form-group col-sm-8">
                <label for="" class="form-label">Endereço</label>
                <input type="text" id="logradouro" name="logradouro" class="form-control">
            </div>
        </div>
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
        <input type="text" id="email_fornecedor" name="email_fornecedor" class="form-control">        

        <button type="submit" id="botao" class="btn btn-primary">Incluir</button>
        <a href="fornecedores_main.php" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>

     <!-- Carregando bibliotecas corretamente -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>

    <script type="text/javascript">
        // Função para mascaramento automatico de cpf ou cnpj
        var options = {
            onKeyPress: function (cpf, ev, el, op) {
                var masks = ['000.000.000-000', '00.000.000/0000-00'];
                $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
            }
        }
        
        $('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
        
        // Função para buscar CEP via API do ViaCEP
        // Converte o JSON para os inputs que declararamos no form
        $(document).ready(function() {
            $("#cep").blur(function() {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep.length === 8) {
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/", function(dados) {
                        if (!("erro" in dados)) {
                            $("#logradouro").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#estado").val(dados.uf);
                        } else {
                            alert("CEP não encontrado.");
                        }
                    });
                }
            });
        });

        // Função para buscar CNPJ na API do minhareceita.org
        // Converte o JSON para os inputs que declararamos no form
        $(document).ready(function() {
           $("#cpf_cnpj").blur(function() {
                var cpf_cnpj = $(this).val().replace(/\D/g, ""); // Remove caracteres não numéricos

                if (cpf_cnpj.length === 14) { // CNPJ válido sem pontuação
                    $.getJSON(`https://minhareceita.org/${cpf_cnpj}`, function(dados) {
                        if (!dados.erro) {
                            $("#nome_fornecedor").val(dados.razao_social || "");
                            $("#logradouro").val((dados.descricao_tipo_de_logradouro || "") + " " + (dados.logradouro || ""));
                            $("#cep").val(dados.cep || "");
                            $("#cidade").val(dados.municipio || "");
                            $("#estado").val(dados.uf || "");
                            $("#bairro").val(dados.bairro || "");
                            $("#numero").val(dados.numero || "");
                            $("#complemento").val(dados.complemento || "");
                            $("#contato").val(dados.nome_socio || "");
                        } else {
                            alert("CNPJ não encontrado.");
                        }
                    }).fail(function() {
                        alert("Erro ao consultar a API.");
                    });
                }
            });
        });

        // Função para mascaramento do CEP após digitado, pra inserir o tracinho
        function formatarCEP(input) {
            let valor = input.value.replace(/\D/g, ""); // Remove tudo que não for número
            if (valor.length > 5) {
                valor = valor.substring(0, 5) + "-" + valor.substring(5, 8);
            }
            input.value = valor;
        }
    </script>


</body>
</html>