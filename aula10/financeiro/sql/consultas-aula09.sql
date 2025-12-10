USE financeiro; 

-- SELECT * FROM pagamentos;
-- SELECT data_vcto FROM pagamentos WHERE 1;
-- SELECT 5*5 as total; 
-- SELECT *, valor*1.1 as valor_reajustado FROM pagamentos;
-- SELECT *, round(valor*1.1,2) as valor_reajustado FROM pagamentos;

SELECT * FROM fornecedores; 

-- INCLUSÃO DE RESGISTRO 
-- INSERT INTO fornecedores (nome_fornecedor,cpf_cnpj,celular) VALUES ('Sebrae', '11.111.111/0001-11', '(11) 9999-0000'); 


-- ALTERAÇÃO DE RESGISTRO 
-- UPDATE fornecedores SET celular='(21) 4356-4234' WHERE id_fornecedor = 9;

-- EXCLUSÃO DE RESGISTRO 
-- DELETE FROM fornecedores WHERE id_fornecedor = 9; 

-- SELECT * FROM fornecedores; 


-- 
-- Base de banco de dados (CRUD) 
-- 

-- Inclusão de registros:
-- insert into fornecedores (nome_fornecedor,cpf_cnpj,celular) values ('Sebrae','11.111.111/0001-11','(11) 9999-0000')
 
-- Alteração de registros:
-- update fornecedores set celular='(21) 98888-8888' where id_fornecedor = 10
 
 
-- Exclusão de registros:
-- delete from fornecedores where id_fornecedor=10
 
 
-- Consulta:
-- select * from fornecedores where nome fornecedor like '%senac%'
 
 
-- Prompt para IA
-- Preciso criar uma view em mysql com o nome abobrinha que execute a seguinte query: SELECT p.id_pagamento, p.data_vcto, p.valor,p.data_pagto,p.valor_pago, f.nome_fornecedor, c.descricao_conta FROM pagamentos p INNER JOIN fornecedores f ON p.id_fornecedor = f.id_fornecedor INNER JOIN plano_contas c ON p.id_conta = c.id_conta; 


-- Criando uma view 
CREATE OR REPLACE VIEW pagamentos_view AS
SELECT
    p.id_pagamento,
    p.data_vcto,
    p.valor,
    p.data_pagto,
    p.valor_pago,
    f.nome_fornecedor,
    c.descricao_conta
FROM pagamentos AS p
INNER JOIN fornecedores AS f
    ON p.id_fornecedor = f.id_fornecedor
INNER JOIN plano_contas AS c
    ON p.id_conta = c.id_conta; 


SHOW CREATE VIEW pagamentos_view;
