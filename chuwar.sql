-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Set-2017 às 21:13
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
(5, 'Gabriel Mazurco Ribeiro', 'mazurco066', '10dbb802f4db0b7453a1c8331ede5b8970fce761'),
(6, 'Testando', 'Teste01', 'bef572ee99ab49b8781dacd36baed1fb35779049');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `status_paises`
--
ALTER TABLE `status_paises`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=745;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
