-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jan-2022 às 17:50
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancositecan`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `sobrenome`, `login`, `senha`, `email`) VALUES
(1, 'julio', 'cesar', 'julio', '123', 'julio@j.com'),
(8, 'Jose', 'Lucas', 'Jose', '159', 'Jose@j.com'),
(9, 'Ana', 'Maria', 'Ana', '789', 'Ana@A.com'),
(10, 'asdsa', 'asdasd', 'asdasd', '123123', 'sadsad@asdf.com'),
(11, 'Marcos', 'Almeida', 'macos', '789', 'marcos@m.com'),
(12, 'julia', 'maria', 'julia', '8asdw2', 'julia@j.com'),
(13, 'Ana', 'Carla', 'Ana', 'a48w', 'Ana@ana.com'),
(14, 'lucas', 'machado', 'lucas', 'lulu4', 'lucas@l.com'),
(15, 'sd', 'asdasd', 'asdasd', 'asd2e1', 'asdsad@grgrg'),
(16, 'emanuel', 'jose', 'emanuel', '44448', 'emanuel@m.com'),
(21, 'kjhbkjh', 'hjgfkhjglkjhg', 'hghjgjhgjhgj', '465548k', '12312@2');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
