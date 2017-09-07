-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Set-2017 às 20:39
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
(14, 1, 1),
(15, 2, 1),
(16, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises`
--

CREATE TABLE `paises` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `tropas` int(11) DEFAULT NULL,
  `fronteiras` varchar(90) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paises`
--

INSERT INTO `paises` (`ID`, `Nome`, `tropas`, `fronteiras`) VALUES
(1, 'Africa do Sul', 3, 'Egito'),
(2, 'Alemanha', 3, 'Franca,Reino Unido,Egito,Russia'),
(3, 'Argentina', 3, 'Brasil,Colombia'),
(4, 'Brasil', 3, 'Argentina,Egito,Colombia'),
(5, 'China', 3, 'Russia'),
(6, 'Colombia', 3, 'Brasil,Mexico'),
(7, 'Egito', 3, 'Franca,Alemanha,Brasil,Africa do Sul'),
(8, 'EUA', 3, 'Mexico,Russia,Reino Unido'),
(9, 'Franca', 3, 'Alemanha,Reino Unido,Egito'),
(10, 'Mexico', 3, 'Colombia,EUA'),
(11, 'Reino Unido', 3, 'EUA,Franca,Alemanha'),
(12, 'Russia', 3, 'Alemanha,China,EUA');

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
  `Pertence` varchar(50) NOT NULL,
  `fronteiras` varchar(90) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_paises`
--

INSERT INTO `status_paises` (`ID`, `Jogo_ID`, `Pais_ID`, `Nome`, `tropas`, `Pertence`, `fronteiras`) VALUES
(97, 14, 1, 'Africa do Sul', 3, 'Jogador', 'Egito'),
(98, 14, 5, 'China', 3, 'Jogador', 'Russia'),
(99, 14, 7, 'Egito', 3, 'Jogador', 'Franca,Alemanha,Brasil,Africa do Sul'),
(100, 14, 8, 'EUA', 3, 'Jogador', 'Mexico,Russia,Reino Unido'),
(101, 14, 9, 'Franca', 3, 'Jogador', 'Alemanha,Reino Unido,Egito'),
(102, 14, 11, 'Reino Unido', 3, 'Jogador', 'EUA,Franca,Alemanha'),
(103, 14, 2, 'Alemanha', 3, 'Computador', 'Franca,Reino Unido,Egito,Russia'),
(104, 14, 3, 'Argentina', 3, 'Computador', 'Brasil,Colombia'),
(105, 14, 4, 'Brasil', 3, 'Computador', 'Argentina,Egito,Colombia'),
(106, 14, 6, 'Colombia', 3, 'Computador', 'Brasil,Mexico'),
(107, 14, 10, 'Mexico', 3, 'Computador', 'Colombia,EUA'),
(108, 14, 12, 'Russia', 3, 'Computador', 'Alemanha,China,EUA'),
(109, 15, 1, 'Africa do Sul', 3, 'Jogador', 'Egito'),
(110, 15, 4, 'Brasil', 3, 'Jogador', 'Argentina,Egito,Colombia'),
(111, 15, 6, 'Colombia', 3, 'Jogador', 'Brasil,Mexico'),
(112, 15, 9, 'Franca', 3, 'Jogador', 'Alemanha,Reino Unido,Egito'),
(113, 15, 10, 'Mexico', 3, 'Jogador', 'Colombia,EUA'),
(114, 15, 11, 'Reino Unido', 3, 'Jogador', 'EUA,Franca,Alemanha'),
(115, 15, 2, 'Alemanha', 3, 'Computador', 'Franca,Reino Unido,Egito,Russia'),
(116, 15, 3, 'Argentina', 3, 'Computador', 'Brasil,Colombia'),
(117, 15, 5, 'China', 3, 'Computador', 'Russia'),
(118, 15, 7, 'Egito', 3, 'Computador', 'Franca,Alemanha,Brasil,Africa do Sul'),
(119, 15, 8, 'EUA', 3, 'Computador', 'Mexico,Russia,Reino Unido'),
(120, 15, 12, 'Russia', 3, 'Computador', 'Alemanha,China,EUA'),
(121, 16, 1, 'Africa do Sul', 3, 'Jogador', 'Egito'),
(122, 16, 5, 'China', 3, 'Jogador', 'Russia'),
(123, 16, 7, 'Egito', 3, 'Jogador', 'Franca,Alemanha,Brasil,Africa do Sul'),
(124, 16, 8, 'EUA', 3, 'Jogador', 'Mexico,Russia,Reino Unido'),
(125, 16, 9, 'Franca', 3, 'Jogador', 'Alemanha,Reino Unido,Egito'),
(126, 16, 12, 'Russia', 3, 'Jogador', 'Alemanha,China,EUA'),
(127, 16, 2, 'Alemanha', 3, 'Computador', 'Franca,Reino Unido,Egito,Russia'),
(128, 16, 3, 'Argentina', 3, 'Computador', 'Brasil,Colombia'),
(129, 16, 4, 'Brasil', 3, 'Computador', 'Argentina,Egito,Colombia'),
(130, 16, 6, 'Colombia', 3, 'Computador', 'Brasil,Mexico'),
(131, 16, 10, 'Mexico', 3, 'Computador', 'Colombia,EUA'),
(132, 16, 11, 'Reino Unido', 3, 'Computador', 'EUA,Franca,Alemanha');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `status_paises`
--
ALTER TABLE `status_paises`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
