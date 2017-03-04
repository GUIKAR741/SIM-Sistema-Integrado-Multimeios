-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Mar-2017 às 09:54
-- Versão do servidor: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_acervo`
--

DROP TABLE IF EXISTS `tb_acervo`;
CREATE TABLE IF NOT EXISTS `tb_acervo` (
  `idtb_acervo` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `volume` varchar(15) NOT NULL,
  `exemplares` int(11) NOT NULL,
  `disponiveis` int(11) NOT NULL,
  `local` varchar(25) NOT NULL,
  `editora` varchar(100) NOT NULL,
  `ano_publicacao` varchar(15) NOT NULL,
  `forma_de_aquisicao` varchar(10) NOT NULL,
  `observacao` varchar(50) NOT NULL,
  `capa` varchar(255) NOT NULL,
  `sinopse` longtext NOT NULL,
  PRIMARY KEY (`idtb_acervo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agendamento`
--

DROP TABLE IF EXISTS `tb_agendamento`;
CREATE TABLE IF NOT EXISTS `tb_agendamento` (
  `idtb_agendamento` int(11) NOT NULL AUTO_INCREMENT,
  `tb_usuario_idtb_usuario` int(11) NOT NULL,
  `tb_turma_idtb_turma` int(11) NOT NULL,
  `tb_recurso_idtb_recurso` int(11) NOT NULL,
  `tb_horario_idtb_horario` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`idtb_agendamento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_horario`
--

DROP TABLE IF EXISTS `tb_horario`;
CREATE TABLE IF NOT EXISTS `tb_horario` (
  `idtb_horario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_horario` varchar(20) NOT NULL,
  `inicio_horario` time NOT NULL,
  `fim_horario` time NOT NULL,
  PRIMARY KEY (`idtb_horario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_locacao`
--

DROP TABLE IF EXISTS `tb_locacao`;
CREATE TABLE IF NOT EXISTS `tb_locacao` (
  `idtb_locacao` int(11) NOT NULL AUTO_INCREMENT,
  `tb_aluno_idtb_aluno` int(11) NOT NULL,
  `tb_acervo_idtb_aluno` int(11) NOT NULL,
  `data_locacao` date NOT NULL,
  `data_devolucao` date NOT NULL,
  PRIMARY KEY (`idtb_locacao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_recursos`
--

DROP TABLE IF EXISTS `tb_recursos`;
CREATE TABLE IF NOT EXISTS `tb_recursos` (
  `idtb_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `nome_recurso` varchar(20) NOT NULL,
  `status_recurso` int(11) NOT NULL,
  PRIMARY KEY (`idtb_recurso`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `idtb_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`idtb_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
