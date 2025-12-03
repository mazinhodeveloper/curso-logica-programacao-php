-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/12/2025 às 15:48
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

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
(1, 'KALUNGA SA', '', 'sac.kalunga.com.br', '(11) 11111-1111', '(11) 99999-9999', '03104010', 'RUA DA MOOCA', '766', 'ANDAR 4 E 5', 'MOOCA', 'SAO PAULO', 'SP'),
(2, 'Carrefour S/A', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'EPSON DO BRASIL INDUSTRIA E COMERCIO LIMITADA', '52.106.911/0001-00', 'sac@epson.com', '(11) 3333-3333', '(11) 77777-7777', '06460020', 'AVENIDA TUCUNARE', '720', 'BLOCO III', 'TAMBORE', 'BARUERI', 'SP');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id_pagamento` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL DEFAULT 0,
  `id_conta` int(11) NOT NULL DEFAULT 0,
  `data_vcto` date NOT NULL,
  `valor` float NOT NULL DEFAULT 0,
  `data_pagto` date NOT NULL,
  `valor_pago` float NOT NULL DEFAULT 0,
  `descricao` varchar(80) NOT NULL,
  `oculto` int(11) NOT NULL DEFAULT 0,
  `id_usuario` int(11) NOT NULL DEFAULT 0,
  `data_exclusao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id_pagamento`, `id_fornecedor`, `id_conta`, `data_vcto`, `valor`, `data_pagto`, `valor_pago`, `descricao`, `oculto`, `id_usuario`, `data_exclusao`) VALUES
(1, 2, 4, '2025-12-01', 0, '2025-12-01', 0, '', 0, 0, '0000-00-00'),
(2, 5, 8, '2025-12-10', 400, '2025-12-10', 400, 'testes', 0, 0, '0000-00-00'),
(3, 1, 4, '2025-12-12', 500, '2025-12-12', 500, 'teste2', 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `plano_contas`
--

CREATE TABLE `plano_contas` (
  `id_conta` int(11) NOT NULL,
  `descricao_conta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `plano_contas`
--

INSERT INTO `plano_contas` (`id_conta`, `descricao_conta`) VALUES
(3, 'Despesa de transportes'),
(4, 'Despesa com Educação'),
(5, 'Despesa com plano de saúde'),
(8, 'Despesas com combustível');

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
(1, 'Celso', 'celso@senac.com.br', '$2y$10$ipmMHCP2x2/gXpdy25KnRua1Of.ErCFK3betYdw8FgVLV66u1XXAi', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `id_fornecedor` (`id_fornecedor`),
  ADD KEY `id_conta` (`id_conta`);

--
-- Índices de tabela `plano_contas`
--
ALTER TABLE `plano_contas`
  ADD PRIMARY KEY (`id_conta`);

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
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `plano_contas`
--
ALTER TABLE `plano_contas`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `id_conta` FOREIGN KEY (`id_conta`) REFERENCES `plano_contas` (`id_conta`),
  ADD CONSTRAINT `id_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedores` (`id_fornecedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
