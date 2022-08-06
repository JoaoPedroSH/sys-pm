-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15-Jun-2022 às 03:53
-- Versão do servidor: 8.0.17
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_pm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `armas_gto`
--

CREATE TABLE `armas_gto` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `marca` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `modelo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `n_serie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `patrimonio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `localizacao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `situacao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cautela` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `data_inspecao` varchar(255) NOT NULL,
  `obs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `armas_ord`
--

CREATE TABLE `armas_ord` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `marca` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `modelo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `n_serie` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `patrimonio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `localizacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `situacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `cautela` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `data_inspecao` varchar(255) NOT NULL,
  `obs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equip_gto`
--

CREATE TABLE `equip_gto` (
  `id` int(11) NOT NULL,
  `tipo` text,
  `marca` text,
  `modelo` text,
  `n_serie` text,
  `patrimonio` text,
  `localizacao` text,
  `situacao` text,
  `cautela` text,
  `validade` text,
  `nivel` text,
  `tamanho` text,
  `fabricacao` text,
  `obs` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equip_ord`
--

CREATE TABLE `equip_ord` (
  `id` int(11) NOT NULL,
  `tipo` text,
  `marca` text,
  `modelo` text,
  `n_serie` text,
  `patrimonio` text,
  `localizacao` text,
  `situacao` text,
  `cautela` text,
  `validade` text,
  `nivel` text,
  `tamanho` text,
  `fabricacao` text,
  `obs` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_acesso`
--

CREATE TABLE `historico_acesso` (
  `id` int(255) NOT NULL,
  `user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo_user` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_entrada` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hora_entrada` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hora_saida` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_armas`
--

CREATE TABLE `historico_armas` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `n_serie` int(11) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `cautela` varchar(255) NOT NULL,
  `data_inspecao` varchar(255) NOT NULL,
  `data_atual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `municao_gto`
--

CREATE TABLE `municao_gto` (
  `id` int(100) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `validade` varchar(200) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `obs` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `tipo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `municao_ord`
--

CREATE TABLE `municao_ord` (
  `id` int(50) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `validade` varchar(20) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(100) NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo_user` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Sistema de Login do site ';

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `user`, `senha`, `tipo_user`) VALUES
(2, 'joao', '123', 'adm');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `armas_gto`
--
ALTER TABLE `armas_gto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `armas_ord`
--
ALTER TABLE `armas_ord`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `equip_gto`
--
ALTER TABLE `equip_gto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `equip_ord`
--
ALTER TABLE `equip_ord`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico_acesso`
--
ALTER TABLE `historico_acesso`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico_armas`
--
ALTER TABLE `historico_armas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `municao_gto`
--
ALTER TABLE `municao_gto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `municao_ord`
--
ALTER TABLE `municao_ord`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `armas_gto`
--
ALTER TABLE `armas_gto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de tabela `armas_ord`
--
ALTER TABLE `armas_ord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT de tabela `equip_gto`
--
ALTER TABLE `equip_gto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `equip_ord`
--
ALTER TABLE `equip_ord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `historico_acesso`
--
ALTER TABLE `historico_acesso`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `historico_armas`
--
ALTER TABLE `historico_armas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `municao_gto`
--
ALTER TABLE `municao_gto`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `municao_ord`
--
ALTER TABLE `municao_ord`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
