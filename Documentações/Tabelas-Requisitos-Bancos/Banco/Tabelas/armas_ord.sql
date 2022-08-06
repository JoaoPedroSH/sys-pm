-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15-Jun-2022 às 03:55
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

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `armas_ord`
--
ALTER TABLE `armas_ord`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `armas_ord`
--
ALTER TABLE `armas_ord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
