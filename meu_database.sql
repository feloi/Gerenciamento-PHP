-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Mar-2023 às 04:12
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroanuidades`
--

CREATE TABLE `cadastroanuidades` (
  `id` int(11) NOT NULL,
  `ano` int(4) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cadastroanuidades`
--

INSERT INTO `cadastroanuidades` (`id`, `ano`, `valor`) VALUES
(11, 2020, 100),
(12, 2021, 110),
(13, 2022, 200);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroassociados`
--

CREATE TABLE `cadastroassociados` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `filiacao` int(4) NOT NULL,
  `pagamento` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cadastroassociados`
--

INSERT INTO `cadastroassociados` (`id`, `name`, `email`, `cpf`, `filiacao`, `pagamento`) VALUES
(19, 'eloi', 'eloi@123', '01234567890', 2020, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cobrançapagamento`
--

CREATE TABLE `cobrançapagamento` (
  `id` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `ano` int(4) NOT NULL,
  `pagamento` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cobrançapagamento`
--

INSERT INTO `cobrançapagamento` (`id`, `cpf`, `ano`, `pagamento`) VALUES
(38, '01234567890', 2020, 0),
(39, '01234567890', 2021, 1),
(40, '01234567890', 2022, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastroanuidades`
--
ALTER TABLE `cadastroanuidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastroassociados`
--
ALTER TABLE `cadastroassociados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cobrançapagamento`
--
ALTER TABLE `cobrançapagamento`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `unique_ano_cpf` (`cpf`,`ano`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastroanuidades`
--
ALTER TABLE `cadastroanuidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `cadastroassociados`
--
ALTER TABLE `cadastroassociados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `cobrançapagamento`
--
ALTER TABLE `cobrançapagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
