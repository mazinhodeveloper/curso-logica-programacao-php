USE `financeiro`;

CREATE TABLE `fornecedores` (
  `id_fornecedor` int(11) NOT NULL,
  `nome_fornecedor` varchar(70) NOT NULL,
  `cpf_cnpj` varchar(25) NOT NULL,
  `email_fornecedor` varchar(80) NOT NULL,
  `telefone_fixo` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(15) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 
--
-- Despejando dados para a tabela `fornecedores`
--
 
INSERT INTO `fornecedores` (`id_fornecedor`, `nome_fornecedor`, `cpf_cnpj`, `email_fornecedor`, `telefone_fixo`, `celular`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES
(1, 'Kalunga S/A', '', 'sac.kalunga.com.br', '', '', '', '', '', '', '', '', ''),
(2, 'Carrefour S/A', '', '', '', '', '', '', '', '', '', '', '');
 
-- --------------------------------------------------------
 
--
-- Estrutura para tabela `pessoas`
--
 
CREATE TABLE `pessoas` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 
--
-- Despejando dados para a tabela `pessoas`
--
 
INSERT INTO `pessoas` (`id_pessoa`, `nome`, `celular`, `email`) VALUES
(1, 'Maria da Silva', '(11) 9999-9999', 'mariaj@hotmail.com'),
(2, 'JOSÉ da Silva', '(11) 98888-9999', 'jsilva@gmail.com.br');
 
-- --------------------------------------------------------
 
--
-- Estrutura para tabela `usuarios`
--
 
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `permissao` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 
--
-- Despejando dados para a tabela `usuarios`
--
 
INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `permissao`) VALUES
(1, 'Celso', 'celso@senac.br', '$2y$10$TDkv8nJSjS0jKI9q9RTJBOxAvpVe5QNnQhuFfaj3OY6wkFktW/v6a', 0);
 
--
-- Índices para tabelas despejadas
--
 
--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id_fornecedor`);
 
--
-- Índices de tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id_pessoa`);
 
--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);
 
--
-- AUTO_INCREMENT para tabelas despejadas
--
 
--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
 
--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
 
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;