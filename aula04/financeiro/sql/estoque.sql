-- banco de dados estoque
CREATE DATABASE IF NOT EXISTS `estoque` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `estoque`;

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `descricao_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 
--
-- Despejando dados para a tabela `categorias`
--
INSERT INTO `categorias` (`id_categoria`, `descricao_categoria`) VALUES
(1, 'bebidas'),
(2, 'Frutas'),
(3, 'Enlatados'),
(4, 'Legumes'),
(5, 'Farinhas'),
(6, 'Grãos');
 
-- --------------------------------------------------------
--
-- Estrutura para tabela `produtos`
--
CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `descricao_produto` varchar(60) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `preco` float NOT NULL DEFAULT 0,
  `observacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 
--
-- Despejando dados para a tabela `produtos`
--
INSERT INTO `produtos` (`id_produto`, `descricao_produto`, `id_categoria`, `preco`, `observacao`) VALUES
(1, 'Coca Cola', 1, 5, 'Refrigerante sabor cola, gazoso, '),
(2, 'Guarana', 1, 6.5, 'Refrigerante sabor guarana'),
(3, 'Bananas', 2, 4, ''),
(4, 'Maça', 2, 2, ''),
(5, 'Batata', 4, 2, '');
 
--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--

ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);
  
--
-- Índices de tabela `produtos`
--

ALTER TABLE `produtos`

  ADD PRIMARY KEY (`id_produto`),

  ADD KEY `fk_produtos_categorias` (`id_categoria`);
 
--

-- AUTO_INCREMENT para tabelas despejadas

--
 
--

-- AUTO_INCREMENT de tabela `categorias`

--

ALTER TABLE `categorias`

  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
 
--

-- AUTO_INCREMENT de tabela `produtos`

--

ALTER TABLE `produtos`

  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
 
--

-- Restrições para tabelas despejadas

--
 
--

-- Restrições para tabelas `produtos`

--

ALTER TABLE `produtos`

  ADD CONSTRAINT `fk_produtos_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
