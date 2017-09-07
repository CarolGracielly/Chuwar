-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Set-2017 às 16:54
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
(11, 1, 1),
(12, 2, 1),
(13, 3, 1);

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
(2, 'Alemanha', 3, 'Franca, Reino Unido, Egito, Russia'),
(3, 'Argentina', 3, 'Brasil, Colombia'),
(4, 'Brasil', 3, 'Argentina, Egito, Colombia'),
(5, 'China', 3, 'Russia'),
(6, 'Colombia', 3, 'Brasil, Mexico'),
(7, 'Egito', 3, 'Franca, Alemanha, Brasil, Africa do Sul'),
(8, 'EUA', 3, 'Mexico, Russia, Reino Unido'),
(9, 'Franca', 3, 'Alemanha, Reino Unido, Egito'),
(10, 'Mexico', 3, 'Colombia, EUA'),
(11, 'Reino Unido', 3, 'EUA, Franca, Alemanha'),
(12, 'Russia', 3, 'Alemanha, China, EUA');

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
(61, 11, 2, 'Alemanha', 3, 'Jogador', 'Franca, Reino Unido, Egito, Russia'),
(62, 11, 3, 'Argentina', 3, 'Jogador', 'Brasil, Colombia'),
(63, 11, 4, 'Brasil', 3, 'Jogador', 'Argentina, Egito, Colombia'),
(64, 11, 6, 'Colombia', 3, 'Jogador', 'Brasil, Mexico'),
(65, 11, 7, 'Egito', 3, 'Jogador', 'Franca, Alemanha, Brasil, Africa do Sul'),
(66, 11, 10, 'Mexico', 3, 'Jogador', 'Colombia, EUA'),
(67, 11, 1, 'Africa do Sul', 3, 'Computador', 'Egito'),
(68, 11, 5, 'China', 3, 'Computador', 'Russia'),
(69, 11, 8, 'EUA', 3, 'Computador', 'Mexico, Russia, Reino Unido'),
(70, 11, 9, 'Franca', 3, 'Computador', 'Alemanha, Reino Unido, Egito'),
(71, 11, 11, 'Reino Unido', 3, 'Computador', 'EUA, Franca, Alemanha'),
(72, 11, 12, 'Russia', 3, 'Computador', 'Alemanha, China, EUA'),
(73, 12, 2, 'Alemanha', 3, 'Jogador', 'Franca, Reino Unido, Egito, Russia'),
(74, 12, 3, 'Argentina', 3, 'Jogador', 'Brasil, Colombia'),
(75, 12, 5, 'China', 3, 'Jogador', 'Russia'),
(76, 12, 6, 'Colombia', 3, 'Jogador', 'Brasil, Mexico'),
(77, 12, 9, 'Franca', 3, 'Jogador', 'Alemanha, Reino Unido, Egito'),
(78, 12, 12, 'Russia', 3, 'Jogador', 'Alemanha, China, EUA'),
(79, 12, 1, 'Africa do Sul', 3, 'Computador', 'Egito'),
(80, 12, 4, 'Brasil', 3, 'Computador', 'Argentina, Egito, Colombia'),
(81, 12, 7, 'Egito', 3, 'Computador', 'Franca, Alemanha, Brasil, Africa do Sul'),
(82, 12, 8, 'EUA', 3, 'Computador', 'Mexico, Russia, Reino Unido'),
(83, 12, 10, 'Mexico', 3, 'Computador', 'Colombia, EUA'),
(84, 12, 11, 'Reino Unido', 3, 'Computador', 'EUA, Franca, Alemanha'),
(85, 13, 2, 'Alemanha', 3, 'Jogador', 'Franca, Reino Unido, Egito, Russia'),
(86, 13, 3, 'Argentina', 3, 'Jogador', 'Brasil, Colombia'),
(87, 13, 6, 'Colombia', 3, 'Jogador', 'Brasil, Mexico'),
(88, 13, 8, 'EUA', 3, 'Jogador', 'Mexico, Russia, Reino Unido'),
(89, 13, 9, 'Franca', 3, 'Jogador', 'Alemanha, Reino Unido, Egito'),
(90, 13, 12, 'Russia', 3, 'Jogador', 'Alemanha, China, EUA'),
(91, 13, 1, 'Africa do Sul', 3, 'Computador', 'Egito'),
(92, 13, 4, 'Brasil', 3, 'Computador', 'Argentina, Egito, Colombia'),
(93, 13, 5, 'China', 3, 'Computador', 'Russia'),
(94, 13, 7, 'Egito', 3, 'Computador', 'Franca, Alemanha, Brasil, Africa do Sul'),
(95, 13, 10, 'Mexico', 3, 'Computador', 'Colombia, EUA'),
(96, 13, 11, 'Reino Unido', 3, 'Computador', 'EUA, Franca, Alemanha');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `status_paises`
--
ALTER TABLE `status_paises`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
