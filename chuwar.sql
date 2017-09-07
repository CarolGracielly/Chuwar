-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Set-2017 às 14:37
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chuwar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `ID` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `emJogo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`ID`, `id_usuario`, `emJogo`) VALUES
(4, 1, 1),
(5, 2, 1),
(10, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises`
--

CREATE TABLE `paises` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `tropas` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paises`
--

INSERT INTO `paises` (`ID`, `Nome`, `tropas`) VALUES
(1, 'Africa do Sul', 3),
(2, 'Alemanha', 3),
(3, 'Argentina', 3),
(4, 'Brasil', 3),
(5, 'China', 3),
(6, 'Colombia', 3),
(7, 'Egito', 3),
(8, 'EUA', 3),
(9, 'Franca', 3),
(10, 'Mexico', 3),
(11, 'Reino Unido', 3),
(12, 'Russia', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_paises`
--

CREATE TABLE `status_paises` (
  `ID` int(11) NOT NULL,
  `Jogo_ID` int(11) NOT NULL,
  `Pais_ID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `tropas` int(11) NOT NULL,
  `Pertence` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_paises`
--

INSERT INTO `status_paises` (`ID`, `Jogo_ID`, `Pais_ID`, `Nome`, `tropas`, `Pertence`) VALUES
(1, 4, 3, 'Argentina', 3, 'Jogador'),
(2, 4, 4, 'Brasil', 3, 'Jogador'),
(3, 4, 5, 'China', 3, 'Jogador'),
(4, 4, 6, 'Colombia', 3, 'Jogador'),
(5, 4, 10, 'Mexico', 3, 'Jogador'),
(6, 4, 11, 'Reino Unido', 3, 'Jogador'),
(7, 4, 1, 'Africa do Sul', 3, 'Computador'),
(8, 4, 2, 'Alemanha', 3, 'Computador'),
(9, 4, 7, 'Egito', 3, 'Computador'),
(10, 4, 8, 'EUA', 3, 'Computador'),
(11, 4, 9, 'Franca', 3, 'Computador'),
(12, 4, 12, 'Russia', 3, 'Computador'),
(13, 5, 3, 'Argentina', 3, 'Jogador'),
(14, 5, 4, 'Brasil', 3, 'Jogador'),
(15, 5, 5, 'China', 3, 'Jogador'),
(16, 5, 6, 'Colombia', 3, 'Jogador'),
(17, 5, 11, 'Reino Unido', 3, 'Jogador'),
(18, 5, 12, 'Russia', 3, 'Jogador'),
(19, 5, 1, 'Africa do Sul', 3, 'Computador'),
(20, 5, 2, 'Alemanha', 3, 'Computador'),
(21, 5, 7, 'Egito', 3, 'Computador'),
(22, 5, 8, 'EUA', 3, 'Computador'),
(23, 5, 9, 'Franca', 3, 'Computador'),
(24, 5, 10, 'Mexico', 3, 'Computador'),
(60, 10, 9, 'Franca', 3, 'Computador'),
(59, 10, 8, 'EUA', 3, 'Computador'),
(58, 10, 6, 'Colombia', 3, 'Computador'),
(57, 10, 4, 'Brasil', 3, 'Computador'),
(56, 10, 3, 'Argentina', 3, 'Computador'),
(55, 10, 1, 'Africa do Sul', 3, 'Computador'),
(54, 10, 12, 'Russia', 3, 'Jogador'),
(53, 10, 11, 'Reino Unido', 3, 'Jogador'),
(52, 10, 10, 'Mexico', 3, 'Jogador'),
(51, 10, 7, 'Egito', 3, 'Jogador'),
(50, 10, 5, 'China', 3, 'Jogador'),
(49, 10, 2, 'Alemanha', 3, 'Jogador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `nome`, `usuario`, `senha`) VALUES
(1, 'Gabriel Mazurco Ribeiro', 'mazurco066', '10dbb802f4db0b7453a1c8331ede5b8970fce761'),
(2, 'Testando', 'Teste01', 'bef572ee99ab49b8781dacd36baed1fb35779049'),
(3, 'Testando', 'Teste02', 'bef572ee99ab49b8781dacd36baed1fb35779049');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `status_paises`
--
ALTER TABLE `status_paises`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jogos`
--
ALTER TABLE `jogos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `status_paises`
--
ALTER TABLE `status_paises`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
