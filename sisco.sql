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
-- Database: `sisco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno`
--

DROP TABLE IF EXISTS `tb_aluno`;
CREATE TABLE IF NOT EXISTS `tb_aluno` (
  `idtb_aluno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_turma_idtb_turma` int(10) UNSIGNED NOT NULL,
  `nome_aluno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_aluno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matricula` int(10) UNSIGNED DEFAULT NULL,
  `diario` int(10) UNSIGNED DEFAULT NULL,
  `responsavel_aluno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_responsavel` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cel_aluno` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_aluno` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto_aluno` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_user` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'aluno',
  PRIMARY KEY (`idtb_aluno`),
  KEY `tb_aluno_FKIndex1` (`tb_turma_idtb_turma`)
) ENGINE=MyISAM AUTO_INCREMENT=474 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`idtb_aluno`, `tb_turma_idtb_turma`, `nome_aluno`, `email_aluno`, `matricula`, `diario`, `responsavel_aluno`, `tel_responsavel`, `cel_aluno`, `tel_aluno`, `foto_aluno`, `tipo_user`) VALUES
(79, 22, 'GILMAR PAULO SOUSA DA SILVA JUNIOR', 'exemplo@gmail.com', 3207578, 14, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(78, 7, 'LAISA DE SOUSA PESSOA', 'EXEMPLO@MAI.COM', 1763599, 24, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(77, 22, 'FANCISCO DENNIS VIEIRA DA SILVA', 'exemplo@gmail.com', 2877492, 13, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(76, 7, 'JOAO VITOR COSTA FERREIRA ', 'EXEMPLO@MAI.COM', 3867746, 23, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(75, 7, 'JOAO GUILHERME DA COSTA SILVA', 'EXEMPLO@MAI.COM', 2474159, 22, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(74, 22, 'FRANCISCO BRENO DA COSTA ALMEIDA', 'exemplo@gmail.com', 1812088, 12, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(73, 7, 'JEFESSON BRENO CAVALCANTE DE SOUSA', 'EXEMPLO@MAI.COM', 1600128, 21, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(72, 7, 'JANAINA MACARIO DE SOUSA', 'EXEMPLO@MAI.COM', 1978939, 20, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(71, 22, 'FRANCISCA FABIANA OLIVEIRA ARAUJO', 'exemplo@gmail.com', 1848159, 11, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(70, 7, 'ISADORA ESTEFANY PAULO DE LIMA', 'EXEMPLO@MAI.COM', 1766059, 19, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(69, 22, 'EMILLY DE ALENCAR VIRGILIO', 'exemplo@gmail.com', 1800298, 10, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(68, 7, 'FRANCISCO WANDERSON LIMA MELO', 'EXEMPLO@MAI.COM', 1835963, 18, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(67, 22, 'ELIZIEL SILVA DE SOUSA', 'exemplo@gmail.com', 1790085, 9, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(66, 7, 'FRANCISCO THAYRON MATOS JUCA', 'EXEMPLO@MAI.COM', 1771902, 17, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(65, 7, 'FRANCISCO REGIANO LEAO DE OLIVEIRA', 'EXEMPLO@MAI.COM', 1835904, 16, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(64, 22, 'DAVILA DOS SANTOS OLIVEIRA', 'exemplo@gmail.com', 3678992, 8, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(63, 7, 'FRANCISCO GENILSON DOS SANTOS NOGUEIRA', 'EXEMPLO@MAI.COM', 1811828, 15, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(62, 22, 'AVILA BARROSO COSTA OLIVEIRA', 'exemplo@gmail.com', 1765721, 7, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(61, 7, 'EMILLE RAYANE HOLANDA DE LIMA', 'EXEMPLO@MAI.COM', 1789086, 14, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(60, 22, 'ANTONIO RAILSON MATEUS DA SILVA', 'exemplo@gmail.com', 1852607, 6, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(59, 7, 'DYEIVISON DE JESUS PEREIRA DE FREITAS', 'EXEMPLO@MAI.COM', 1805160, 13, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(58, 22, 'ANTONIA RAFAELA BRITO DE SOUSA', 'exemplo@gmail.com', 1939853, 5, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(57, 7, 'DAVI FERREIRA REIS', 'EXEMPLO@MAI.COM', 1821293, 12, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(56, 7, 'ANTONIO SAMUEL OLIVEIRA SOUSA', 'EXEMPLO@MAI.COM', 1815201, 11, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(55, 22, 'ANTONIA BEATRIZ SILVA LIMA', 'exemplo@gmail.com', 1775178, 4, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(54, 7, 'ANTONIO RONDINELE DANTAS DA SILVA', 'EXEMPLO@MAI.COM', 1815158, 10, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(53, 22, 'ANA PRISCILA DA SILVA OLIVEIRA', 'exemplo@gmail.com', 2670501, 3, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(52, 7, 'ANTONIO ALEX SARAIVA DOS SANTOS JUNIOR', 'EXEMPLO@MAI.COM', 3011247, 9, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(51, 22, 'ANA LARISSA NUNES MELO', 'exemplo@gmail.com', 3681090, 2, 'b', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(50, 7, 'ANTONIA GESSILANE OLIVEIRA BATISTA', 'EXEMPLO@MAI.COM', 2929279, 8, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(49, 7, 'ANA LUISA NOGUEIRA SANTO', 'EXEMPLO@MAI.COM', 1753878, 7, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(48, 22, 'ANA CYBELLE RODRIGUES SOUZA', 'exemplo@gmail.com', 1806013, 1, 'v', '(85)00000-0000', '(85)00000-0000', '', 'perfil2.jpg', 'aluno'),
(47, 7, 'ANA LISA LIMA COSTA RAMOS', 'EXEMPLO@MAI.COM', 1784620, 6, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(46, 7, 'ANA KILVIA OLIVEIRA QUEIROZ', 'EXEMPLO@MAI.COM', 2923663, 5, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(45, 7, 'ANA CIBELE DA SILVA FELIX', 'EXEMPLO@GMAIL.COM', 1853574, 4, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(44, 7, 'ALAN ALVES CASTRO', 'EXEMPLO@MAI.COM', 2923597, 3, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(43, 7, 'AIRTON CESAR DE SOUSA LIMA', 'EXEMPLO@MAI.COM', 1784941, 2, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(42, 7, 'ADRIA CAMURCA PEIXOTO', 'EXEMPLO@MAI.COM', 3868036, 1, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(80, 7, 'LEANDRO MENDES DE SOUZA', 'EXEMPLO@MAI.COM', 1772040, 25, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(81, 7, 'LUCAS OLIVEIRA PINHEIRO', 'EXEMPLO@MAI.COM', 3208066, 26, '', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(82, 22, 'GILVANIA NOGUEIRA DE SOUSA', 'exemplo@gmail.com', 1762317, 15, '', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(83, 7, 'LUIZ EDUARDO ALEXANDRE DE MORAES', 'EXEMPLO@MAI.COM', 1756585, 27, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(84, 22, 'GISELE CARVALHO PINHEIRO', 'exemplo@gmail.com', 3681041, 16, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(85, 7, 'MAIARA SOUZA DA SILVA', 'EXEMPLO@MAI.COM', 1789102, 28, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(86, 22, 'GIULIA REBECCA FERNANDES LOPES', 'exemplo@gmail.com', 2325096, 17, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(87, 7, 'MARCOS VENICIUS DOS SANTOS QUEIROZ', 'EXEMPLO@MAI.COM', 1923882, 29, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(88, 22, 'INARA SILVA SOUSA', 'exemplo@gmail.com', 3681126, 18, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(89, 7, 'MARIA CLARA OLIVEIRA FERNANDES', 'EXEMPLO@MAI.COM', 3878543, 30, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(90, 22, 'JACKSON FERNANDO ALMEIDA RIBEIRO', 'exemplo@gmail.com', 1774984, 19, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(91, 7, 'MARIA EDUARDA LOPES DE CARVALHO', 'EXEMPLO@MAI.COM', 3868008, 31, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(92, 7, 'MARIA GIRLENE FELICIANO DA SILVA', 'EXEMPLO@MAI.COM', 1763611, 32, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(93, 22, 'JARDENIA BARBOSA DA SILVA', 'exemplo@gmail.com', 2148726, 20, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(94, 7, 'MARIA RITHELLY DOS SANTOS LIMA', 'EXEMPLO@MAI.COM', 1853683, 33, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(95, 7, 'MATHEUS DE PAULA PEREIRA ', 'EXEMPLO@MAI.COM', 1767709, 34, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(96, 22, 'JOAO PEDRO VIEIRA BAIA', 'exemplo@gmail.com', 2596175, 21, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(97, 7, 'MATHEUS LIMA ROCHA', 'EXEMPLO@MAI.COM', 1769133, 35, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(98, 7, 'MIKAEL LUCAS NOGUEIRA DA SILVA', 'EXEMPLO@MAI.COM', 1600126, 36, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(99, 22, 'JOAO WESLEN DE OLIVEIRA SILVA', 'exemplo@gmail.com', 1782709, 22, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(100, 7, 'MIRIAN OLIVEIRA DA SILVA', 'EXEMPLO@MAI.COM', 1774550, 37, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(101, 22, 'LAIS DA SILVA DE SOUSA', 'exemplo@gmail.com', 1858722, 23, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(102, 7, 'MYLLENA DE SOUZA FERREIRA', 'EXEMPLO@MAI.COM', 1770561, 38, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(103, 7, 'PAIRON ROBERTO DA SILVA', 'EXEMPLO@MAI.COM', 1756612, 39, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(104, 22, 'LANA RAQUEL SOARES', 'exemplo@gmail.com', 1866371, 24, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(105, 7, 'PEDRO HENRIQUE ESTEVAO SILVA', 'EXEMPLO@MAI.COM', 1924450, 40, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(106, 22, 'LARISSA DA SILVA SOUSA', 'exemplo@gmail.com', 1850711, 25, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(107, 7, 'RAIVYLA CASTRO SILVA', 'EXEMPLO@MAI.COM', 1730948, 41, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(108, 7, 'RENAN SOUSA PAULA', 'EXEMPLO@MAI.COM', 3868033, 42, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(110, 22, 'LORENA MARTINS BANDEIRA', 'exemplo@gmail.com', 3685143, 26, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(111, 7, 'SAVIO FREITAS DE OLIVEIRA GIRAO', 'EXEMPLO@MAI.COM', 3868018, 43, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(112, 22, 'LORRANY DE SOUSA OLIVEIRA', 'exemplo@gmail.com', 3681166, 27, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(113, 7, 'VITORIA BRAGA DA SILVA', 'EXEMPLO@MAI.COM', 1684203, 44, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(114, 7, 'YARA KENNER OLIVEIRA', 'EXEMPLO@MAI.COM', 1774563, 45, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(116, 22, 'MARIA BEATRIZ RODRIGUES DE LIMA', 'exemplo@gmail.com', 1785637, 28, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(117, 22, 'MARIA HERLANIA DE SOUZA', 'exemplo@gmail.com', 2351840, 29, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(118, 22, 'MARYANNA NASCIMENTO', 'exemplo@gmail.com', 1759028, 30, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(119, 22, 'MARYNA VASCONCELOS BASTOS', 'exemplo@gmail.com', 2397148, 31, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(120, 22, 'MICHELLE CASTRO DA SILVA FONTENELE', 'exemplo@gmail.com', 1774517, 32, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(121, 22, 'NAATE MAIA MUNIZ', 'exemplo@gmail.com', 3685187, 33, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(122, 22, 'WELLEN COSTA FREITAS', 'EXEMPLO@MAI.COM', 1775043, 46, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(123, 22, 'RAFAELA KELY MATOS SILVA', 'exemplo@gmail.com', 1792246, 34, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(124, 22, 'VITORIA LOPES DA SILVA', 'EXEMPLO@MAI.COM', 1758910, 45, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(125, 22, 'RAFAEL ARAUJO GONCALVES', 'exemplo@gmail.com', 3473207, 35, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(126, 22, 'VITORIA DA SILVA MOREIRA', 'EXEMPLO@MAI.COM', 3397443, 44, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(127, 22, 'RAFAEL COSTA DE ALMEIDA MOREIRA', 'exemplo@gmail.com', 3020042, 36, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(128, 22, 'VITORIA ALVES SALDANHA', 'EXEMPLO@MAI.COM', 1792258, 43, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(129, 22, 'VANESSA LUCIANO DE OLIVEIRA', 'EXEMPLO@MAI.COM', 1788744, 42, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(130, 22, 'RANIELLY DE OLIVEIRA FERNANDES', 'exemplo@gmail.com', 1942538, 37, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(131, 22, 'RODRIGO COELHO PORTO', 'exemplo@gmail.com', 3685118, 38, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(132, 22, 'THIAGO MOURA DO NASCIMENTO', 'EXEMPLO@MAI.COM', 1753726, 41, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(133, 22, 'SARAH MARIA AQUINO DUARTE', 'exemplo@gmail.com', 3681065, 39, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(134, 22, 'THALYTA SOARES PINHEIRO', 'EXEMPLO@MAI.COM', 2391526, 40, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(135, 14, 'ADRYELE CASTRO MENDES DA SILVA', 'exemplo@gmail.com', 3220706, 1, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(136, 14, 'ALICE HELLEN MATOS BRAGA', 'exemplo@gmail.com', 1756376, 2, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(137, 14, 'AMANDA LEMOS DIOGENES', 'exemplo@gmail.com', 1789072, 3, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(138, 15, 'ALVARO MARCOS LIMA DE CARVALHO', 'EXEMPLO@GMAIL.COM', 1778161, 1, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(139, 14, 'ANA ALICE DA SILVA ASSUNCAO', 'exemplo@gmail.com', 3522529, 4, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(140, 15, 'ANADILA GOMES LIMA', 'EXEMPLO@GMAIL.COM', 1750303, 2, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(141, 14, 'ANA BEATRIZ XAVIER LOURENCO DE PAULO', 'exemplo@gmail.com', 1769746, 5, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(142, 15, 'ANAKELLY VERISSIMO DA SILVA', 'EXEMPLO@GMAIL.COM', 1949929, 3, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(143, 15, 'ANA RAFAELA DA SILVA ALMEIDA', 'EXEMPLO@GMAIL.COM', 1681981, 4, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(144, 14, 'ANA CLARA ALMEIDA BANDEIRA', 'exemplo@gmail.com', 3874394, 6, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(145, 15, 'ANDRESSA GUIMARÃES DA COSTA', 'EXEMPLO@GMAIL.COM', 1763124, 5, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(146, 14, 'ANA VANESSA LIMA DA SILVA', 'exemplo@gmail.com', 2938896, 7, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(147, 15, 'ANTONIO MAURICIO DE OLIVEIRA SAMPAIO', 'EXEMPLO@GMAIL.COM', 2198830, 6, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(148, 14, 'ANTONIO JIVANIO DANTAS', 'exemplo@gmail.com', 2672319, 8, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(149, 15, 'ARIANE FERREIRA LIMA', 'EXEMPLO@GMAIL.COM', 1740378, 7, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(150, 14, 'ARIELLY RIBEIRO DE OLIVEIRA', 'exemplo@gmail.com', 3035923, 9, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(151, 15, 'CAMILA DE OLIVEIRA DA ROCHA', 'EXEMPLO@GMAIL.COM', 1776192, 8, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(152, 14, 'ARYCIA MARY NUNES DE BRITO', 'exemplo@gmail.com', 1789120, 10, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(153, 15, 'CAROLINA DE SOUSA PEREIRA', 'EXEMPLO@GMAIL.COM', 2511985, 9, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(154, 15, 'DALYLA BATISTA DE CASTRO', 'EXEMPLO@GMAIL.COM', 3453218, 10, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(155, 15, 'DAVI AVILA DE ALMEIDA', 'EXEMPLO@GMAIL.COM', 1742377, 11, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(156, 15, 'ELKANA TAVARES MONTEIRO', 'EXEMPLO@GMAIL.COM', 1750445, 12, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(157, 14, 'AYNARA KELLY VIEIRA DA SILVA', 'exemplo@gmail.com', 1797730, 11, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(158, 15, 'EMILIANA OLIVEIRA DA SILVA', 'EXEMPLO@GMAIL.COM', 1940048, 13, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(159, 14, 'BIANCA JANUARIO BATISTA', 'exemplo@gmail.com', 2921191, 12, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(160, 16, 'ADRIANO WEVERTON CRUZ OLIVEIRA', 'EXEMPLO@MAI.COM', 3096759, 1, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(161, 14, 'CARMEM MIRYAN DE SALES', 'exemplo@gmail.com', 2233498, 14, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(162, 16, 'ANA LETICIA RODRIGUES DA SILVA', 'EXEMPLO@MAI.COM', 1758561, 2, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(163, 15, 'EVERTOM SILVA VIEIRA', 'EXEMPLO@GMAIL.COM', 2433253, 14, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(164, 14, 'CICERA LEILIANE DA SILVA PINHEIRO', 'exemplo@gmail.com', 1754025, 15, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(165, 16, 'ANA RHAYSSA PEREIRA COSTA', 'EXEMPLO@MAI.COM', 1800190, 3, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(166, 15, 'FRANCISCO JEFFERSON MONTEIRO GONDIM', 'EXEMPLO@GMAIL.COM', 3151703, 15, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(167, 14, 'DARLIANE DE SOUSA MARTINS', 'exemplo@gmail.com', 1821303, 16, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(168, 16, 'ANA RUTH SANTOS MARIANO', 'EXEMPLO@MAI.COM', 1782035, 4, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(169, 15, 'GEISA DE SOUSA PESSOA', 'EXEMPLO@GMAIL.COM', 1763760, 16, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(170, 14, 'DAVILA ROCHA GERALDO', 'exemplo@gmail.com', 1789082, 17, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(171, 14, 'EDUARDA NOGUEIRA DE SOUSA', 'exemplo@gmail.com', 1811779, 18, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(172, 15, 'GUILHERME QUEIROZ PEIXOTO DE FREITAS', 'EXEMPLO@GMAIL.COM', 1951095, 17, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(173, 14, 'ELISAMA DA SILVA DIAS', 'exemplo@gmail.com', 1761074, 19, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(174, 14, 'HUMBERTO TEOFILO RODRIGUES', 'exemplo@gmail.com', 3010504, 20, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(175, 15, 'HELOISA DE MOURA OLIVEIRA', 'EXEMPLO@GMAIL.COM', 1740457, 18, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(176, 16, 'ANGELA MELYSA RODRIGUES DE OLIVEIRA', 'EXEMPLO@MAI.COM', 1769819, 5, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(177, 15, 'ISADORA OLIVEIRA MORAIS', 'EXEMPLO@GMAIL.COM', 1767887, 19, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(178, 14, 'JAYANE DA SILVA MORAES', 'exemplo@gmail.com', 1744514, 21, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(179, 14, 'JEAN VICTOR BRAGA DE QUEIROZ', 'exemplo@gmail.com', 3057470, 22, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(180, 16, 'ANTONIO JEFFERSON DA SILVA MATOS', 'EXEMPLO@MAI.COM', 1852562, 6, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(181, 15, 'JESSICA SOUSA RODRIGUES', 'EXEMPLO@GMAIL.COM', 1750602, 20, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(182, 14, 'JESSICA KELLY FREITAS DE LIMA', 'exemplo@gmail.com', 1767651, 23, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(183, 16, 'ANTONIO MARCOS DOS SANTOS VERISSIMO', 'EXEMPLO@MAI.COM', 2194148, 7, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(184, 15, 'JOSE WELLISON GOMES FERREIRA', 'EXEMPLO@GMAIL.COM', 3452983, 21, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(185, 14, 'JESSILANIA MARIA DE LIMA', 'exemplo@gmail.com', 1818207, 24, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(186, 16, 'ANTONIO MARCOS OLIVEIRA COSTA', 'EXEMPLO@MAI.COM', 1721448, 8, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(187, 15, 'LETICIA MENEZES MAIA', 'EXEMPLO@GMAIL.COM', 1770364, 22, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(188, 14, 'JOCIELEN ANGELINE SOUSA CAVALCANTE', 'exemplo@gmail.com', 3576101, 25, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(189, 15, 'LIVIA ESTEVAM DA SILVA', 'EXEMPLO@GMAIL.COM', 1750657, 23, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(190, 14, 'JORDAN VICTOR DA SILVA ARAUJO', 'exemplo@gmail.com', 3757695, 26, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(191, 16, 'ANTONIO WILSON DE OLIVEIRA DAS NEVES', 'EXEMPLO@MAI.COM', 1852660, 9, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(192, 15, 'LUCAS SANTOS DA COSTA', 'EXEMPLO@GMAIL.COM', 1750664, 24, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(193, 14, 'JOYCE BENICIO VIEIRA', 'exemplo@gmail.com', 1767676, 27, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(194, 16, 'BRUNO QUEIROZ DA SILVA', 'EXEMPLO@MAI.COM', 1765748, 10, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(195, 14, 'JULLIA CECILIA DE ARAUJO SILVA', 'exemplo@gmail.com', 1730359, 28, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(196, 16, 'CLEIDIANE DE FREITAS MOREIRA', 'EXEMPLO@MAI.COM', 1772785, 11, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(197, 12, 'ANA RAQUEL SANTOS MARIANO', 'EXEMPLO@GMAIL.COM', 1782022, 1, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(198, 14, 'LARA VANESSA SALES DE FREITAS', 'exemplo@gmail.com', 1845556, 29, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(199, 15, 'LUIZ FERNANDA BRANDAO DE VASCONCELOS', 'EXEMPLO@GMAIL.COM', 1776615, 25, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(200, 12, 'ANA REBECA MELO DOS SANTOS ', 'EXEMPLO@GMAIL.COM', 1758687, 2, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(201, 16, 'EMANUEL DA SILVA SOARES', 'EXEMPLO@MAI.COM', 1705527, 12, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(202, 14, 'LARA VITORIA DA SILVA SOUSA', 'exemplo@gmail.com', 3874160, 30, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(203, 12, 'ANA VITORIA DA SILVA VIEIRA ', 'EXEMPLO@GMAIL.COM', 1858600, 3, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(204, 15, 'MARIA DE FATIMA SILVA AQUINO', 'EXEMPLO@GMAIL.COM', 1745654, 26, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(205, 14, 'LUCAS DA SILVA OLIVEIRA', 'exemplo@gmail.com', 1784925, 31, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(206, 15, 'MARIA LARISSE DA SILVA COSTA', 'EXEMPLO@GMAIL.COM', 1845428, 27, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(207, 12, 'ANDREZA KAREN DE OLIVEIRA SILVA', 'EXEMPLO@GMAIL.COM', 1779633, 4, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(208, 16, 'ENDSON JARMSOM BARBOSA LIMA', 'EXEMPLO@MAI.COM', 3685768, 13, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(209, 15, 'MARIA LETICIA FEITOZA PINHEIRO', 'EXEMPLO@GMAIL.COM', 1750710, 28, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(210, 14, 'MARCOS MOISES PEREIRA GONCALVES', 'exemplo@gmail.com', 1757769, 32, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(211, 12, 'CAMILA STEFANE QUEIROZ DE CARVALHO', 'EXEMPLO@GMAIL.COM', 3502492, 5, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(212, 14, 'MARIANNA NASCIMENTO SILVA', 'exemplo@gmail.com', 3874420, 33, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(213, 15, 'MARIA RAYANE NOGUEIRA PEREIRA', 'EXEMPLO@GMAIL.COM', 1776730, 29, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(214, 12, 'CARINE RICARDO DE SOUSA', 'EXEMPLO@GMAIL.COM', 1721490, 6, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(215, 16, 'FERNANDO RONDINELI DOS SANTOS RAMOS', 'EXEMPLO@MAI.COM', 1763644, 14, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(216, 15, 'MARIA SABRINA COSTA GOMES', 'EXEMPLO@GMAIL.COM', 1776753, 30, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(217, 14, 'MARIA VITORIA MAIA DOS SANTOS', 'exemplo@gmail.com', 1789105, 34, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(218, 15, 'MATHEUS SANTOS LIMA', 'EXEMPLO@GMAIL.COM', 1775463, 31, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(219, 16, 'FRANCISCO ALYSSON DA SILVA', 'EXEMPLO@MAI.COM', 1763648, 15, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(220, 14, 'MARIA VITORIA SANTOS DA SILVA', 'exemplo@gmail.com', 17612019, 35, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(221, 12, 'CESAR CLEVER DA DA SILVA RODRIGUES', 'EXEMPLO@GMAIL.COM', 1860964, 7, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(222, 15, 'MAYARA PEREIRA LIMA', 'EXEMPLO@GMAIL.COM', 1745738, 32, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(223, 14, 'MAYARA FREITAS LIMA', 'exemplo@gmail.com', 1766380, 36, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(224, 15, 'MILENA SOARES DIONISIO', 'EXEMPLO@GMAIL.COM', 1742880, 33, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(225, 12, 'CLAUDIELY MATOS MACIEL ', 'EXEMPLO@GMAIL.COM', 1687556, 8, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(226, 16, 'GABRIEL FRANCISCO RODRIGUES DA SILVA', 'EXEMPLO@MAI.COM', 1619733, 16, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(227, 15, 'PABLO WILLY SOUSA GOMES', 'EXEMPLO@GMAIL.COM', 2176375, 34, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(228, 16, 'HELLEN MARIA DE SOUSA ALVES', 'EXEMPLO@MAI.COM', 3689418, 17, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(229, 14, 'NARA RAQUELLY GOMES DA SILVA', 'exemplo@gmail.com', 1768749, 37, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(230, 12, 'DARLIANE BATISTA DE LIMA SILVA', 'EXEMPLO@GMAIL.COM', 3017309, 9, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(231, 15, 'RAYANE ARARIPE MENEZES', 'EXEMPLO@GMAIL.COM', 1790633, 35, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(232, 16, 'IASMIM DE OLIVEIRO SILVA', 'EXEMPLO@MAI.COM', 2148593, 18, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(233, 12, 'DAVI FERREIRA ALVES', 'EXEMPLO@GMAIL.COM', 3017374, 10, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(234, 14, 'NAYRIS VIEIRA DA COSTA', 'exemplo@gmail.com', 3874487, 38, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(235, 15, 'RAYSSA ALVES PEREIRA', 'EXEMPLO@GMAIL.COM', 1775527, 36, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(236, 16, 'JOABSON DA SILVA MATOS', 'EXEMPLO@MAI.COM', 1787492, 19, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(237, 15, 'SARAH NOGUEIRA DE ALMEIDA', 'EXEMPLO@GMAIL.COM', 3453139, 37, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(238, 14, 'REJANE DE SOUSA FONSECA', 'exemplo@gmail.com', 1833959, 39, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(239, 12, 'DAYANE DAMASCENO DA SILVA ', 'EXEMPLO@GMAIL.COM', 1949043, 11, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(240, 15, 'SUELY MARTINS BARBOSA', 'EXEMPLO@GMAIL.COM', 1763375, 38, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(241, 16, 'JOAO VICTOR LIMA TEIXEIRA', '2192711', 21927711, 20, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(242, 15, 'TAIS DA SILVA COSTA', 'EXEMPLO@GMAIL.COM', 1745926, 39, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(243, 14, 'SAMILLY PEREIRA SABINO DA SILVA', 'exemplo@gmail.com', 3874126, 40, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(244, 15, 'TAMIRES MIRANDA ALVES', 'EXEMPLO@GMAIL.COM', 1773638, 40, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(245, 12, 'DEYVISSON NATANAEL LIMA DA SILVA', 'EXEMPLO@GMAIL.COM', 326237, 12, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(246, 16, 'JOSE ISAC DE LIMA BEZERRA', 'EXEMPLO@MAI.COM', 1941949, 21, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(247, 14, 'TAISSA LOPES FIGUEREDO', 'exemplo@gmail.com', 1797426, 41, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(248, 15, 'THAIS KELLY INACIO DA SILVA', 'EXEMPLO@GMAIL.COM', 1745182, 41, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(249, 12, 'ELIANE DA SILVA COSTA ', 'EXEMPLO@GMAIL.COM', 1744952, 13, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(250, 16, 'JOSE LUCAS OLIVEIRA SILVA', 'EXEMPLO@MAI.COM', 1746971, 22, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(251, 15, 'TICIANE MARCIA COSTA MAIA', 'EXEMPLO@GMAIL.COM', 2514022, 42, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(252, 14, 'THAMIRES DA SILVA BARRETO', 'exemplo@gmail.com', 1700060, 42, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(253, 15, 'VANESSA BATISTA MAIA', 'EXEMPLO@GMAIL.COM', 3215146, 43, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(254, 12, 'EMILLY HELEN VASCONCELOS JUCA', 'EXEMPLO@GMAIL.COM', 1749656, 14, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(255, 16, 'JOSE RIAN LINS DA SILVA', 'EXEMPLO@MAI.COM', 1767023, 23, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(256, 14, 'VITORIA KETLYN FEITOSA PEREIRA', 'exemplo@gmail.com', 1926205, 43, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(257, 12, 'ERICA HELEN DA SILVA SANTOS', 'EXEMPLO@GMAIL.COM', 1772854, 15, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(258, 14, 'WANESSA DE CASTRO SOUSA', 'exemplo@gmail.com', 1867310, 44, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(259, 12, 'ESLEY MARQUES DA SILVA OLIVEIRA ', 'EXEMPLO@GMAIL.COM', 1733049, 16, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(260, 16, 'LAURA MARCELA CARVALHO DE QUEIROZ', 'EXEMPLO@MAI.COM', 1942245, 24, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(261, 14, 'WARLEM LOPES OLIVEIRA', 'exemplo@gmail.com', 2419134, 45, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(262, 12, 'EVALDO DANTAS DA SILVA', 'EXEMPLO@GMAIL.COM', 2569227, 17, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(263, 16, 'LUCAS ALVES RODRIGUES', 'EXEMPLO@MAI.COM', 2560303, 25, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(264, 16, 'LUIS EDUARDO FREITAS DA SILVA', 'EXEMPLO@MAI.COM', 3687377, 26, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(265, 17, 'AMANDA CRIZIA DUARTE DA SILVA', 'EXEMPLO@GMAIL.COM', 1745224, 1, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'AMANDA.jpg', 'aluno'),
(266, 12, 'FRANCISCA ATALYTA SILVA SOARES', 'EXEMPLO@GMAIL.COM', 1758577, 18, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(267, 16, 'LUIS GUILHERMA DA SILVA', 'EXEMPLO@MAI.COM', 1732494, 27, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(268, 17, 'ANA KEZIA FERREIRA SANTOS', 'EXEMPLO@GMAIL.COM', 3447521, 2, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'ANA KEZIA.jpg', 'aluno'),
(269, 16, 'MAIRA GOMES TELES', 'EXEMPLO@MAI.COM', 3685795, 28, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(270, 12, 'FRANCISCA GISELE DOS SANTOS NOGUEIRA', 'EXEMPLO@GMAIL.COM', 1762222, 19, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(271, 17, 'ANA MOSER CASTRO FERNANDES', 'EXEMPLO@GMAIL.COM', 1863145, 3, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'ANA MOSER.jpg', 'aluno'),
(272, 18, 'AIANE CRISTINA DE SOUSA OLIVEIRA', 'exemplo@gmail.com', 3240846, 1, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(273, 17, 'ANA VITORIA BRITO CASTELO', 'EXEMPLO@GMAIL.COM', 3455781, 4, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'ANA VITORIA.jpg', 'aluno'),
(274, 12, 'GRAZIELE MARTINS DA SILVA', 'EXEMPLO@GMAIL.COM', 2549117, 20, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(275, 16, 'MARCELO HENRIQUE DAMASCENO DE CASTRO', 'EXEMPLO@MAI.COM', 1750083, 29, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(276, 12, 'GUILHERME FERREIRA DE OLIVEIRA ', 'EXEMPLO@GMAIL.COM', 1759114, 21, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(277, 17, 'ANDREYCE VASCONCELOS DA SILVA', 'EXEMPLO@GMAIL.COM', 2178480, 5, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'ANDREYCE.jpg', 'aluno'),
(278, 16, 'MARIA ANDRESSA MENDES SOTERO', 'EXEMPLO@MAI.COM', 1732636, 30, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(279, 12, 'GUSTAVO MARTINS DA SILVA ', 'EXEMPLO@GMAIL.COM', 1785333, 22, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(280, 17, 'ARIANE FALCAO LEMOS', 'EXEMPLO@GMAIL.COM', 1754153, 6, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'ARIANE.jpg', 'aluno'),
(281, 16, 'MARIA EDUARDA DA SILVA SANTANA', 'EXEMPLO@MAI.COM', 1687712, 31, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(282, 12, 'IVINA CASTRO SILVA', 'EXEMPLO@GMAIL.COM', 1732308, 23, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(283, 17, 'ARYADNA LIVIA MENDES ARAUJO', 'EXEMPLO@GMAIL.COM', 1946813, 7, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'ARYADNA.jpg', 'aluno'),
(284, 16, 'MARIA ERICA DA SILVA BARRETO', 'EXEMPLO@MAI.COM', 1758825, 32, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(285, 12, 'JAMILE DA COSTA CASTELO BRANCO ', 'EXEMPLO@GMAIL.COM', 1739043, 24, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(463, 23, 'PEDRO HENRIQUE MAIA DOS SANTOS ', 'exemplo@email.com', 1775493, 31, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(287, 17, 'CAROLINA DE SOUSA DA COSTA', 'EXEMPLO@GMAIL.COM', 1754153, 8, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'CAROLINA.jpg', 'aluno'),
(288, 12, 'JANIELLY DE SOUSA SANTOS ', 'EXEMPLO@GMAIL.COM', 1770550, 25, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(289, 18, 'ANA BEATRIZ LOPES SILVA', 'exemplo@gmail.com', 1789153, 2, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(290, 16, 'MARILIA DIONISIA DA COSTA SANTOS', 'EXEMPLO@MAI.COM', 1785704, 34, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(291, 16, 'MATEUS PEREIRA DE SOUSA', 'EXEMPLO@MAI.COM', 1789116, 35, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(292, 12, 'JOAO VICTOR ALEXANDRIA DE FREITAS', 'EXEMPLO@GMAIL.COM', 2671401, 26, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(293, 16, 'MARIA VANESSA RODRIGUES DE SOUSA', 'EXEMPLO@MAI.COM', 2149235, 33, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(294, 12, 'JOAO VICTOR COSTA DA SILVA', 'EXEMPLO@GMAIL.COM', 3685344, 27, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(295, 16, 'MATHEUS FREITAS DE OLIVEIRA', 'EXEMPLO@MAI.COM', 3688769, 36, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(296, 12, 'JOSE OLIVEIRA DA COSTA NETO', 'EXEMPLO@GMAIL.COM', 1758613, 28, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(297, 16, 'NAHANNA VICTORIA NOBRE DA ROCHA', 'EXEMPLO@MAI.COM', 2163838, 37, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(298, 12, 'LUANA  SANTIAGO DA SILVA', 'EXEMPLO@GMAIL.COM', 964620, 29, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(299, 16, 'PATRICIO DA COSTA FONSECA', 'EXEMPLO@MAI.COM', 1812247, 38, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(300, 18, 'ANALIA AMELIA PONTES DE SOUSA', 'exemplo@gmail.com', 3009487, 3, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(301, 12, 'MARCIA MARICE DA SILVA BATISTA ', 'EXEMPLO@GMAIL.COM', 1758528, 30, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(302, 16, 'ROMULO LIMA FONSECA', 'EXEMPLO@MAI.COM', 3214228, 39, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(303, 18, 'ANTONIA MARIA PEREIRA DOS SANTOS', 'exemplo@gmail.com', 2182555, 4, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(304, 12, 'MARIA ISABEL SILVA AQUINO ', 'EXEMPLO@GMAIL.COM', 2151604, 31, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(305, 16, 'RUAMA MILENA MORENO DA SILVA', 'EXEMPLO@MAI.COM', 1687718, 40, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(306, 16, 'STHEFANI ANDRELINO DE QUEIROZ', 'EXEMPLO@MAI.COM', 1852362, 41, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(307, 12, 'MARIA LEIDIANE GADELHA DE OLIVEIRA ', 'EXEMPLO@GMAIL.COM', 1785661, 32, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(308, 16, 'THUANY SANTOS SILVA', 'EXEMPLO@MAI.COM', 1687725, 42, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(309, 16, 'VICTOR CELIO VIEIRA LOPES', 'EXEMPLO@MAI.COM', 3159808, 43, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(310, 12, 'MARIA LIRIELY BRANGA SILVA', 'EXEMPLO@GMAIL.COM', 3208008, 33, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(311, 16, 'WESLEY DA SILVA FERREIRA ', 'EXEMPLO@MAI.COM', 1612754, 44, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'perfil2.jpg', 'aluno'),
(312, 12, 'MARINA VIEIRA UCHOA ', 'EXEMPLO@GMAIL.COM', 2244410, 34, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(313, 12, 'NAGILA DE LIMA NASCIMENTO', 'EXEMPLO@GMAIL.COM', 1750159, 35, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(314, 12, 'PAULO HENRIQUE RICARDO SANTOS', 'EXEMPLO@GMAIL.COM', 1764023, 36, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(315, 12, 'PEDRO LUCAS VIEIRA BEZERRA', 'EXEMPLO@GMAIL.COM', 1882442, 37, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(316, 12, 'SAMARA DA SILVA BENTO ', 'EXEMPLO@GMAIL.COM', 1815780, 38, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(317, 12, 'VICTOR DA SILVA PEIXOTO ', 'EXEMPLO@GMAIL.COM', 1751630, 39, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(318, 12, 'VITORIA ELLEN AMORIM GONÇALVES ', 'EXEMPLO@GMAIL.COM', 3521238, 40, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(319, 12, 'VITORIA MARIA DA SILVA RODRIGUES ', 'EXEMPLO@GMAIL.COM', 1785526, 41, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(320, 12, 'YANN RODRIGUES SOARES', 'EXEMPLO@GMAIL.COM', 1758555, 42, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(321, 17, 'CYNTHIA SABINO DA SILVA', 'EXEMPLO@MAI.COM', 1868940, 9, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'CYNTHIA.jpg', 'aluno'),
(322, 17, 'DANYELLE FELIX DE OLIVEIRA', 'EXEMPLO@MAI.COM', 3441770, 10, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'DANYELLE.jpg', 'aluno'),
(323, 17, 'DEBORA THADIA CUNHA VIEIRA', 'EXEMPLO@MAI.COM', 1734275, 11, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'DEBORA.jpg', 'aluno'),
(324, 19, 'ALINE KERCIA DA SILVA BRAGA', 'EXEMPLO@GMAIL.COM', 1773635, 1, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(325, 18, 'ANTONIA RAQUEL BRITO DE SOUSA', 'exemplo@gmail.com', 1939508, 5, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(326, 17, 'ESTEFANY SILVA BATISTA', 'EXEMPLO@MAI.COM', 3465210, 12, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'ESTEFANY.jpg', 'aluno'),
(327, 19, 'ALLYSON FARIAS DE QUEIROZ ARAUJO', 'EXEMPLO@GMAIL.COM', 2138814, 2, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(328, 18, 'AYLANA KARINA SILVA DOS SANTOS', 'exemplo@gmail.com', 1759400, 6, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(329, 19, 'ALONSO FLORENCIO DE LIMA', 'EXEMPLO@GMAIL.COM', 2570477, 3, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(330, 17, 'FERNANDO HENRIQUE SOUSA CAMPOS', 'EXEMPLO@MAI.COM', 1755392, 13, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'FERNANDO.jpg', 'aluno'),
(331, 19, 'ANA KARINE NOBRE BEZERRA ', 'EXEMPLO@GMAIL.COM', 1766777, 4, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(332, 18, 'DEBORA MENEZES MAIA', 'exemplo@gmail.com', 1764001, 7, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(333, 17, 'FRANCISCA VITORIA NASCIMENTO SILVA', 'EXEMPLO@MAI.COM', 1872200, 14, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'FRANCISCA VITORIA.jpg', 'aluno'),
(334, 19, 'ANGELA CYNTHIA DUARTE DE BRITO', 'EXEMPLO@GMAIL.COM', 3267062, 5, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(335, 18, 'EVELLYNE VITORIA DOS SANTOS VIEIRA', 'exemplo@gmail.com', 1756492, 8, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(336, 17, 'FRANCISCO VITOR MONTEIRO NUNES', 'EXEMPLO@MAI.COM', 1787404, 15, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'FRANCISCO VICTOR.jpg', 'aluno'),
(337, 19, 'ANNE KAROLINE SANTOS ARAUJO', 'EXEMPLO@GMAIL.COM', 3733233, 6, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(338, 19, 'BEATRIZ DE SOUSA RIBEIRO ', 'EXEMPLO@GMAIL.COM', 3874660, 7, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(339, 17, 'GABRYELLE ANANIAS OLIVEIRA', 'EXEMPLO@MAI.COM', 1750564, 16, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'GABRYELLE.jpg', 'aluno'),
(340, 18, 'FRANCISCA GLEICIELLY DE SOUSA DA DILVA', 'exemplo@gmail.com', 1817537, 9, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(341, 19, 'BRENNO GOMES PEIXOTO', 'EXEMPLO@GMAIL.COM', 2356951, 8, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(342, 19, 'BRENO FREITAS PAIVA', 'EXEMPLO@GMAIL.COM', 3203214, 9, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(343, 19, 'BRUNA KELLY SOUSA DA SILVA', 'EXEMPLO@GMAIL.COM', 3877698, 10, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(344, 19, 'CAIO CESAR DE OLIVEIRA DO NASCIMENTO', 'EXEMPLO@GMAIL.COM', 3877650, 11, 'PAIS', '(00)00000-0000', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(345, 18, 'FRANCISCA LAIS DA SILVA SANTOS', 'exemplo@gmail.com', 2939481, 10, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(346, 17, 'ISABELLY REWLEY FERREIRA BARROS', 'EXEMPLO@MAI.COM', 3464037, 17, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'ISABELLY.jpg', 'aluno'),
(347, 19, 'CARLOS ANDRIEL BARBOSA SILVA ', 'EXEMPLO@GMAIL.COM', 1879025, 12, 'PAIS', '(00)00000-0000', '(00)00000-0000', '(00)0000-0000', 'perfil2.jpg', 'aluno'),
(348, 19, 'CARLOS EDUARDO SOUSA DE MOURA', 'EXEMPLO@GMAIL.COM', 1609360, 13, 'PAIS', '(00)00000-0000', '(00)00000-0000', '(00)0000-0000', 'perfil2.jpg', 'aluno'),
(349, 18, 'FRANCISCA PAULINA DA SILVA', 'exemplo@gmail.com', 1816928, 11, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(350, 19, 'DANILO VIEIRA DE SALES JUNIOR ', 'EXEMPLO@GMAIL.COM', 3099262, 14, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(351, 17, 'JOSE EUDES SANTOS DE OLIVEIRA', 'EXEMPLO@MAI.COM', 1746953, 18, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'JOSÃ‰ EUDES.jpg', 'aluno'),
(352, 18, 'FRANCISCA TAMARA NASCIMENTO SANTOS', 'exemplo@gmail.com', 1773544, 12, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(353, 19, 'DAVID STONER MATOS DE BARROS', 'EXEMPLO@GMAIL.COM', 3636881, 15, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(09)9999-9999', 'perfil2.jpg', 'aluno'),
(354, 17, 'LAYANE FERREIRA COTA', 'EXEMPLO@MAI.COM', 1744976, 19, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'LAYANE.jpg', 'aluno'),
(355, 19, 'ELYHUDE SOARES DA SILVA', 'EXEMPLO@GMAIL.COM', 1776220, 16, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(356, 17, 'LORENA DE FATIMA ALENCAR ROCHA', 'EXEMPLO@MAI.COM', 1959209, 20, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'LORENA.jpg', 'aluno'),
(357, 18, 'GIOVANNA FREIRES SANTOS', 'exemplo@gmail.com', 1793020, 13, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(358, 19, 'FAUSTINO PEREIRA DA SILVA NETO', 'EXEMPLO@GMAIL.COM', 3878525, 17, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(359, 18, 'GISELE ALMEIDA DE OLIVEIRA', 'exemplo@gmail.com', 3010480, 14, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(360, 19, 'FRANCISCA VITORIA PAZ DE OLIVEIRA', 'EXEMPLO@GMAIL.COM', 1758858, 18, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(361, 19, 'FRANCISCO EDUARDO ALVES DA PENHA', 'EXEMPLO@GMAIL.COM', 3874681, 19, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(362, 19, 'GABRIEL PINHEIRO LIMA', 'EXEMPLO@GMAIL.COM', 1758586, 20, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(363, 19, 'GABRIEL SOUSA RIBEIRO', 'EXEMPLO@GMAIL.COM', 1999695, 21, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(364, 19, 'GLEICIANE SILVA RIBEIRO', 'EXEMPLO@GMAIL.COM', 2148500, 22, 'PAIS', '(00)00000-0000', '(00)00000-0000', '(00)0000-0000', 'perfil2.jpg', 'aluno'),
(365, 19, 'GUILHERME FALCAO DE MELO', 'EXEMPLO@GMAIL.COM', 1890626, 23, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(366, 19, 'HELTON DE ARAUJO LIMA', 'EXEMPLO@GMAIL.COM', 2288859, 24, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(367, 19, 'IARA CATARINA SILVA E LIMA', 'EXEMPLO@GMAIL.COM', 1879343, 25, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(368, 17, 'LUANA BERNARDO BEZERRA DA SILVA', 'EXEMPLO@MAI.COM', 1948715, 21, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'LUANA BERNARDO.jpg', 'aluno'),
(369, 19, 'IARLEY FERREIRA SILVA', 'EXEMPLO@GMAIL.COM', 1756526, 26, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(370, 18, 'HELANO RIBEIRA FERREIRA', 'exemplo@gmail.com', 1784888, 15, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(371, 19, 'ICARO SOARES DE MENEZES ', 'EXEMPLO@GMAIL.COM', 3874705, 27, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(372, 17, 'LUANA CASTELO MATIAS', 'EXEMPLO@MAI.COM', 1768046, 22, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'LUANA CASTELO.jpg', 'aluno'),
(373, 19, 'IOHANNA DE OLIVEIRA MACIEL', 'EXEMPLO@GMAIL.COM', 3010787, 28, 'PAIS', '(00)00000-0000', '(00)00000-0000', '(00)0000-0000', 'perfil2.jpg', 'aluno'),
(374, 19, 'IRANILSON DA SILVA NASCIMENTO', 'EXEMPLO@GMAIL.COM', 1835999, 29, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(375, 18, 'HELEN CRISTINA DO NASCIMENTO OLIVEIRA', 'exemplo@gmail.com', 1771920, 16, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(376, 19, 'JOAO VICTOR NOGUEIRA BARBOSA', 'EXEMPLO@GMAIL.COM', 3877563, 30, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(377, 18, 'HEVELLYN HELLEN BEZERRA DE ALENCAR', 'exemplo@gmail.com', 3868191, 17, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(378, 19, 'JOAO VICTOR SOUZA CARNEIRO', 'EXEMPLO@GMAIL.COM', 3521761, 31, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(379, 19, 'JOSE DOUGLAS DO NASCIMENTO SILVA', 'EXEMPLO@GMAIL.COM', 3397083, 32, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(380, 19, 'JOYCE DOS SANTOS NUNES ', 'EXEMPLO@GMAIL.COM', 1758620, 33, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(381, 19, 'KAINA DE AZEVEDO MARTINS ', 'EXEMPLO@GMAIL.COM', 3010834, 34, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(382, 18, 'IARA FERREIRA SILVA', 'exemplo@gmail.com', 1758520, 18, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(383, 19, 'KARLA ANDREINA PESSOA DE SOUSA', 'EXEMPLO@GMAIL.COM', 1925072, 35, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno');
INSERT INTO `tb_aluno` (`idtb_aluno`, `tb_turma_idtb_turma`, `nome_aluno`, `email_aluno`, `matricula`, `diario`, `responsavel_aluno`, `tel_responsavel`, `cel_aluno`, `tel_aluno`, `foto_aluno`, `tipo_user`) VALUES
(384, 17, 'MADRALINE MITIELE VITOR DA SILVA', 'EXEMPLO@MAI.COM', 1779998, 23, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'MADRALINE.jpg', 'aluno'),
(385, 19, 'LAURO RODRIGUES DE SOUZA NETO', 'EXEMPLO@GMAIL.COM', 1948660, 36, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(09)9999-9999', 'perfil2.jpg', 'aluno'),
(386, 18, 'JANIELE DA SILVA SAMPAIO', 'exemplo@gmail.com', 1799794, 19, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(387, 19, 'MARIA BRUNA REIS DA SILVA ', 'EXEMPLO@GMAIL.COM', 1765170, 37, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(388, 17, 'MARIA ISABHELY ALMEIDA CAMURCA', 'EXEMPLO@MAI.COM', 1770065, 24, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'MARIA ISABHELY.jpg', 'aluno'),
(389, 19, 'MARIA  DE FATIMA CHAGAS DA SILVA', 'EXEMPLO@GMAIL.COM', 1765286, 38, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(390, 19, 'MATEUS DE SOUSA MACIEL', 'EXEMPLO@GMAIL.COM', 1757111, 39, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(391, 19, 'MATEUS SILVA RIBEIRO', 'EXEMPLO@GMAIL.COM', 1774498, 40, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(392, 17, 'MARIA NATHIELEN DA SILVA OLIVEIRA', 'EXEMPLO@MAI.COM', 1742858, 25, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'MARIA NATHIELEN.jpg', 'aluno'),
(393, 18, 'JOANA BEATRIZ GUERRA DE OLIVEIRA E SILVA', 'exemplo@gmail.com', 2442541, 20, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(394, 19, 'NOEMY ALVES DE SOUZA', 'EXEMPLO@GMAIL.COM', 1769196, 41, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(395, 17, 'MARIA VITORIA DOS SANTOS SENA', 'EXEMPLO@MAI.COM', 1875099, 26, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'MARIA VITORIA.jpg', 'aluno'),
(396, 23, 'ADRIAN DAVI DA SILVA FERREIRA', 'exemplo@email.com', 2736500, 1, 'Mae', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(397, 19, 'PAULO HENRIQUE DA SILVA OLIVEIRA', 'EXEMPLO@GMAIL.COM', 3877714, 42, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(398, 23, 'ADRIANO VALDEVINO COSTA JUNIOR', 'exemplo@email.com', 1744624, 2, 'Mae', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(399, 18, 'JOSUE BARBOSA ALENCAR', 'exemplo@gmail.com', 1756553, 21, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(400, 19, 'RENATO SILVA SOUSA', 'EXEMPLO@GMAIL.COM', 1764770, 43, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(401, 19, 'TAYNARA PINHEIRO DE LIMA', 'EXEMPLO@GMAIL.COM', 1925517, 44, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(402, 23, 'ANDRE SABINO DA SILVA', 'exemplo@email.com', 1784009, 3, 'Pais', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(403, 17, 'MICHELLE DE SOUZA MAIA', 'EXEMPLO@MAI.COM', 3469261, 27, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'MICHELE.jpg', 'aluno'),
(404, 19, 'VITTOR RAFAEL PINHO SALES', 'EXEMPLO@GMAIL.COM', 1860093, 45, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(405, 18, 'KAMILA VITORIA OLIVEIRA LINS', 'exemplo@gmail.com', 1771989, 22, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(406, 23, 'ANTONIO CELIO SOARES DA SILVA', '2508326', 2508326, 4, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(407, 17, 'NATALIA RODRIGUES DA SILVA', 'EXEMPLO@MAI.COM', 1748075, 28, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'NATALIA RODRIGUES.jpg', 'aluno'),
(408, 23, 'BIANCA FREITAS DE OLIVEIRA', 'exemplo@email.com', 3461852, 5, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(409, 17, 'NATHALIA GONCALVES SALDANHA SOUSA', 'EXEMPLO@MAI.COM', 1745814, 29, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'NATHALIA GONÃ‡ALVES.jpg', 'aluno'),
(410, 23, 'CARLOS FELIPE DE CARVALHO SANTIAGO', 'exemplo@email.com', 3459489, 6, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(411, 17, 'RAYANNE FERREIRA DE SOUSA', 'EXEMPLO@MAI.COM', 3463567, 30, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'RAYANE.jpg', 'aluno'),
(412, 18, 'KIMBERLY ROCHA DE OLIVEIRA', 'exemplo@gmail.com', 1623326, 23, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(413, 23, 'EGILEUDO DE LIMA FILHO', 'exemplo@email.com', 2177149, 7, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(414, 17, 'REBECA DE SOUZA LOPES', 'EXEMPLO@MAI.COM', 1742996, 31, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'REBECA.jpg', 'aluno'),
(415, 18, 'LARA RAQUEL SILVA CADEIA', 'exemplo@gmail.com', 2442690, 24, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(416, 17, 'VITORIA LOPES VARELO', 'EXEMPLO@MAI.COM', 1743134, 32, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'VITORIA LOPES.jpg', 'aluno'),
(417, 17, 'VITORIA MARIA BRITO DE FREITAS SANTOS', 'EXEMPLO@MAI.COM', 1743149, 33, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'VITORIA MARIA.jpg', 'aluno'),
(418, 18, 'LARICIA EVILA DE CARVALHO', 'exemplo@gmail.com', 1699963, 25, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(419, 23, 'EVERSON VIANA GAMA', 'exemplo@email.com', 3460394, 8, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(420, 17, 'YARITZA FABRINY MAIA DA SILVA', 'EXEMPLO@MAI.COM', 1682363, 34, 'PAIS', '(99)99999-9999', '(99)99999-9999', '', 'YARITZA.jpg', 'aluno'),
(421, 18, 'LARISSA DOS SANTOS SOUSA', 'exemplo@gmail.com', 1860374, 26, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(422, 23, 'FRANCISCO ERICK VIEIRA DE SOUSA', 'exemplo@email.com', 1768142, 9, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(423, 18, 'LARISSA SENA DA SILVA', 'exemplo@gmail.com', 3868155, 27, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(424, 23, 'FRANCISCO EVANDRO BARBOSA DAMASCENO JUNIOR', 'exemplo@email.com', 1950749, 10, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(425, 18, 'LINDEMBERG DIAS DE LIMA JUNIOR', 'exemplo@gmail.com', 3868165, 28, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(426, 23, 'FRANCISCO ITALO DO NASCIMENTO NORONHA', 'exemplo@email.com', 1690456, 11, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(427, 23, 'FRANCISCO JACKSON FREITAS DE ALENCAR ', 'exemplo@email.com', 1745454, 12, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(428, 18, 'LUANA INGRIDY PEIXOTO BARRETO', 'exemplo@gmail.com', 1583973, 29, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(429, 23, 'FRANCISCO WITNEY RODRIGUES MARTINS', 'exemplo@email.com', 1787438, 13, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(430, 23, 'GUILHERME NEPOMUCENO DE CARVALHO', 'exemplo@email.com', 1740409, 14, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(431, 18, 'MARIA DIONIZA DA COSTA TEIXEIRA ', 'exemplo@gmail.com', 1770056, 30, '0', '(00)00000-0000', '(00)00000-0000', '', 'perfil2.jpg', 'aluno'),
(432, 23, 'IAN LUCAS MOURA LOURENCO', 'exemplo@email.com', 3430045, 15, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(433, 18, 'MARIA EDUARDA BEZERRA DE OLIVEIRA', 'EXEMPLO@GMAIL.COM', 1925444, 31, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(434, 18, 'MARIA GEOVANA DA COSTA PINHEIRO', 'EXEMPLO@GMAIL.COM', 1770078, 32, 'PAIS', '(00)00000-0000', '(00)00000-0000', '(00)0000-0000', 'perfil2.jpg', 'aluno'),
(435, 23, 'ISAAN CORDEIRO MONTEIRO', 'exemplo@email.com', 3461982, 16, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(436, 18, 'MARIA LETICIA SANTIAGO MORAES', 'EXEMPLO@GMAIL.COM', 3868329, 33, 'PAIS', '(00)00000-0000', '(00)00000-0000', '(00)0000-0000', 'perfil2.jpg', 'aluno'),
(437, 23, 'ITALO DOS SANTOS FERREIRA', 'exemplo@email.com', 1750573, 17, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(438, 18, 'MARIANA BRITO CASTRO', 'EXEMPLO@GMAIL.COM', 3877598, 34, 'PAIS', '(00)00000-0000', '(00)00000-0000', '(00)0000-0000', 'perfil2.jpg', 'aluno'),
(439, 23, 'JACKSON DE OLIVEIRA SANTOS', 'exemplo@email.com', 1745505, 18, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(440, 18, 'MARILIA RODRIGUES GOMES', 'EXEMPLO@GMAIL.COM', 1772163, 35, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(441, 23, 'JEMERSON SANTOS DO MONTE', 'exemplo@email.com', 1612636, 19, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(442, 18, 'MATHEUS LAVOSIER SILVA SOUSA', 'EXEMPLO@GMAIL.COM', 3878119, 36, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(443, 23, 'JOAO VICTOR DA SILVA SIMAO', 'exemplo@email.com', 3459487, 20, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(444, 18, 'PALOMA OLIVEIRA DO NASCIMENTO ', 'EXEMPLO@GMAIL.COM', 1761232, 37, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(445, 18, 'RIKELLY ALVES DA SILVA', 'EXEMPLO@GMAIL.COM', 3868156, 38, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(446, 18, 'RUAN LUCAS LIMA NOGUEIRA', 'EXEMPLO@GMAIL.COM', 2872600, 39, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(447, 18, 'RUTE BARBOSA NASCIMENTO', 'EXEMPLO@GMAIL.COM', 2442971, 40, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(448, 23, 'JOHNNY WILDSON E SILVA PEREIRA', 'exemplo@email.com', 1744840, 21, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(449, 18, 'SABRINA KELLY DOS SANTOS SILVA ', 'EXEMPLO@GMAIL.COM', 1853710, 41, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(450, 23, 'JOSE EDMIS GAMOS NOGUEIRA', 'exemplo@email.com', 1734459, 22, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(451, 18, 'TYCIANE REBOUCAS RODRIGUES', 'EXEMPLO@GMAIL.COM', 3878519, 42, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(452, 23, 'JULIO SERGIO ALVES DOS SANTOS LIMA', 'exemplo@email.com', 1736456, 23, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(453, 18, 'VICTORIA KELLY DA COSTA', 'EXEMPLO@GMAIL.COM', 1921384, 43, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(454, 23, 'LAIZA ALMEIDA LOPES', 'exemplo@email.com', 3459483, 24, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(455, 23, 'LUANA SOARES PEREIRA', 'exemplo@email.com', 1754561, 25, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(456, 18, 'WELTON BARRETO CARDOSO SILVA', 'EXEMPLO@GMAIL.COM', 3008218, 44, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(457, 18, 'YASMIN GOMES SANTOS', 'EXEMPLO@GMAIL.COM', 3868362, 45, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(458, 23, 'LUENDA SANTOS CAMURCA', 'exemplo@email.com', 1872458, 26, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(459, 23, 'LUIZ HENRIQUE SOARES SILVA', 'exemplo@email.com', 3462396, 27, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(460, 23, 'MARIA BRUNA GOMES DE FREITAS ', 'exemplo@email.com', 1773168, 28, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(461, 23, 'MILENA NUNES FERREIRA', 'exemplo@email.com', 2492173, 29, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(462, 23, 'MOISES DE SOUZA GERMANO', 'exemplo@email.com', 1628090, 30, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(464, 14, 'BRUNA HELEN VITORINO DANTAS', 'exemplo@gmail.com', 2921191, 13, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(465, 23, 'ROGER CARVALHO VIEIRA', 'exemplo@email.com', 3462138, 32, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(466, 23, 'SARA MACIEL BRASIL', 'exemplo@email.com', 1240623, 33, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(467, 23, 'SARA SEVERIANO LOPES DOS SANTOS', 'exemplo@email.com', 1788294, 34, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(468, 23, 'SHIRLEY SILVA COSTA ', 'exemplo@email.com', 1773480, 35, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(469, 23, 'THAYNARA BENICIO DE SA', 'exemplo@email.com', 1773260, 36, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(470, 23, 'VITOR BARBOSA DOS SANTOS', 'exemplo@email.com', 1745953, 37, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(471, 23, 'WENNERJOHN SILVA BEZERRA', 'exemplo@email.com', 1775585, 38, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(472, 23, 'WLADIA DA CRUZ GOMES', 'exemplo@email.com', 1949666, 39, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno'),
(473, 23, 'YURI VICTOR DOS SANTOS', 'exemplo@email.com', 1691053, 40, 'PAIS', '(99)99999-9999', '(99)99999-9999', '(99)9999-9999', 'perfil2.jpg', 'aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atraso`
--

DROP TABLE IF EXISTS `tb_atraso`;
CREATE TABLE IF NOT EXISTS `tb_atraso` (
  `idtb_atraso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_aluno_idtb_aluno` int(10) UNSIGNED NOT NULL,
  `tb_turma_idtb_tr` int(11) NOT NULL,
  `tipo_atraso` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_atraso` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hora_atraso` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idtb_atraso`),
  KEY `tb_atraso_FKIndex1` (`tb_aluno_idtb_aluno`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_atraso`
--

INSERT INTO `tb_atraso` (`idtb_atraso`, `tb_aluno_idtb_aluno`, `tb_turma_idtb_tr`, `tipo_atraso`, `data_atraso`, `hora_atraso`, `data_reg`, `status_at`) VALUES
(39, 283, 17, 'Acordou tarde', '01/02/2017', '07:15 AM', '2017-02-01 10:16:56', 0),
(38, 280, 17, 'Acordou tarde', '01/02/2017', '07:15 AM', '2017-02-01 10:16:41', 0),
(35, 260, 16, 'SaÃºde', '31/01/2017', '12:00 PM', '2017-01-31 15:23:35', 0),
(33, 275, 16, 'SaÃºde', '31/01/2017', '09:10 AM', '2017-01-31 12:04:53', 0),
(34, 269, 16, 'Outro', '31/01/2017', '09:00 AM', '2017-01-31 12:13:22', 0),
(37, 264, 16, 'Transporte', '01/02/2017', '07:15 AM', '2017-02-01 10:15:24', 0),
(36, 454, 23, 'Acordou tarde', '01/02/2017', '07:15 AM', '2017-02-01 10:14:41', 0),
(32, 214, 12, 'Outro', '31/01/2017', '08:30 AM', '2017-01-31 11:36:12', 0),
(31, 255, 16, 'Acordou tarde', '31/01/2017', '07:40 AM', '2017-01-31 10:41:57', 0),
(30, 244, 15, 'Acordou tarde', '31/01/2017', '07:35 AM', '2017-01-31 10:34:20', 0),
(29, 167, 14, 'Outro', '30/01/2017', '12:00 PM', '2017-01-30 14:59:19', 0),
(40, 384, 17, 'Acordou tarde', '01/02/2017', '07:15 AM', '2017-02-01 10:17:17', 0),
(41, 153, 15, 'Transporte', '01/02/2017', '07:15 AM', '2017-02-01 10:18:13', 0),
(42, 216, 15, 'Outro', '01/02/2017', '08:45 AM', '2017-02-01 11:44:03', 0),
(43, 131, 22, 'SaÃºde', '01/02/2017', '11:00 AM', '2017-02-01 14:10:38', 0),
(44, 312, 12, 'SaÃºde', '01/02/2017', '12:30 PM', '2017-02-01 15:29:32', 0),
(45, 79, 22, 'Outro', '02/02/2017', '07:15 AM', '2017-02-02 10:14:37', 0),
(46, 304, 12, 'Outro', '02/02/2017', '07:15 AM', '2017-02-02 10:18:09', 0),
(47, 298, 12, 'Transporte', '02/02/2017', '07:20 AM', '2017-02-02 10:19:24', 0),
(48, 162, 16, 'Outro', '02/02/2017', '07:20 AM', '2017-02-02 10:19:59', 0),
(49, 232, 16, 'Outro', '02/02/2017', '07:20 AM', '2017-02-02 10:21:14', 0),
(50, 269, 16, 'Outro', '02/02/2017', '07:25 AM', '2017-02-02 10:23:20', 0),
(51, 398, 23, 'Saúde', '02/02/2017', '09:15 AM', '2017-02-02 12:12:15', 0),
(52, 250, 16, 'SaÃºde', '02/02/2017', '09:22 AM', '2017-02-02 12:20:38', 0),
(53, 260, 16, 'Acordou tarde', '03/02/2017', '07:20 AM', '2017-02-03 10:17:08', 0),
(54, 52, 7, 'SaÃºde', '03/02/2017', '09:40 AM', '2017-02-03 12:38:13', 0),
(55, 145, 15, 'Acordou tarde', '06/02/2017', '07:20 AM', '2017-02-06 10:19:36', 0),
(56, 262, 12, 'Acordou tarde', '06/02/2017', '07:20 AM', '2017-02-06 10:20:29', 0),
(57, 228, 16, 'Outro', '06/02/2017', '07:25 AM', '2017-02-06 10:23:12', 0),
(58, 272, 18, 'Outro', '06/02/2017', '07:25 AM', '2017-02-06 10:23:39', 0),
(59, 314, 12, 'Acordou tarde', '06/02/2017', '07:30 AM', '2017-02-06 10:27:09', 0),
(60, 398, 23, 'Saúde', '06/02/2017', '09:06 AM', '2017-02-06 12:05:32', 0),
(61, 50, 7, 'SaÃºde', '06/02/2017', '11:00 AM', '2017-02-06 14:01:28', 0),
(62, 273, 17, 'SaÃºde', '06/02/2017', '01:00 PM', '2017-02-06 16:00:19', 0),
(63, 417, 17, 'Acordou tarde', '06/02/2017', '01:00 PM', '2017-02-06 16:01:13', 0),
(64, 452, 23, 'Outro', '07/02/2017', '07:15 AM', '2017-02-07 10:16:38', 0),
(65, 272, 18, 'Outro', '07/02/2017', '07:21 AM', '2017-02-07 10:19:39', 0),
(66, 228, 16, 'Outro', '07/02/2017', '07:21 AM', '2017-02-07 10:20:01', 0),
(67, 255, 16, 'Acordou tarde', '07/02/2017', '07:26 AM', '2017-02-07 10:25:02', 0),
(68, 320, 12, 'Acordou tarde', '07/02/2017', '07:27 AM', '2017-02-07 10:25:54', 0),
(69, 443, 23, 'Outro', '07/02/2017', '07:45 AM', '2017-02-07 10:44:48', 0),
(70, 232, 16, 'SaÃºde', '07/02/2017', '08:45 AM', '2017-02-07 11:47:03', 0),
(71, 176, 16, 'Outro', '08/02/2017', '07:21 AM', '2017-02-08 10:20:20', 0),
(72, 333, 17, 'Acordou tarde', '08/02/2017', '08:00 AM', '2017-02-08 11:10:27', 0),
(73, 409, 17, 'Acordou tarde', '08/02/2017', '08:00 AM', '2017-02-08 11:11:12', 0),
(74, 356, 17, 'SaÃºde', '08/02/2017', '08:20 AM', '2017-02-08 11:23:41', 0),
(75, 435, 23, 'SaÃºde', '08/02/2017', '09:00 AM', '2017-02-08 12:02:37', 0),
(76, 322, 17, 'SaÃºde', '08/02/2017', '09:40 AM', '2017-02-08 13:30:18', 0),
(77, 447, 18, 'Outro', '', '12:15 PM', '2017-02-08 15:21:45', 0),
(78, 140, 15, 'Acordou tarde', '09/02/2017', '07:21 AM', '2017-02-09 10:19:40', 0),
(79, 275, 16, 'Acordou tarde', '09/02/2017', '07:21 AM', '2017-02-09 10:20:13', 0),
(80, 226, 16, 'Outro', '09/02/2017', '07:23 AM', '2017-02-09 10:21:55', 0),
(81, 378, 19, 'SaÃºde', '09/02/2017', '07:55 AM', '2017-02-09 10:54:06', 0),
(82, 416, 17, 'Outro', '09/02/2017', '09:15 AM', '2017-02-09 12:15:18', 0),
(83, 396, 23, 'Saúde', '21/02/2017', '06:15 PM', '2017-02-21 09:43:06', 0),
(84, 396, 23, 'Outro', '21/02/2017', '06:30 AM', '2017-02-21 21:46:05', 0),
(85, 396, 23, 'Saúde', '21/02/2017', '06:45 PM', '2017-02-21 21:53:03', 0),
(86, 398, 23, 'Saúde', '22/02/2017', '09:30 AM', '2017-02-22 13:10:18', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_coletiva`
--

DROP TABLE IF EXISTS `tb_coletiva`;
CREATE TABLE IF NOT EXISTS `tb_coletiva` (
  `idtb_coletiva` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_turma_idtb_tur` int(10) UNSIGNED NOT NULL,
  `tb_usuario_idtb_user` int(10) NOT NULL,
  `obs_coletiva` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_coletiva` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hora_coletiva` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_reg_col` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtb_coletiva`),
  KEY `tb_coletiva_FKIndex1` (`tb_turma_idtb_tur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cursos`
--

DROP TABLE IF EXISTS `tb_cursos`;
CREATE TABLE IF NOT EXISTS `tb_cursos` (
  `status_curso` int(11) NOT NULL DEFAULT '1',
  `idtb_cursos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_curso` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idtb_cursos`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_cursos`
--

INSERT INTO `tb_cursos` (`status_curso`, `idtb_cursos`, `nome_curso`) VALUES
(1, 1, 'INFORMATICA'),
(1, 8, 'SECRETARIA ESCOLAR'),
(1, 5, 'COMERCIO'),
(1, 9, 'ENFERMAGEM'),
(1, 7, 'ADMINISTRACAO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fardamento`
--

DROP TABLE IF EXISTS `tb_fardamento`;
CREATE TABLE IF NOT EXISTS `tb_fardamento` (
  `idtb_fardamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_aluno_idtb_aluno` int(10) UNSIGNED NOT NULL,
  `tb_turma_idtb_f` int(11) NOT NULL,
  `motivo_farda` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_farda` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obs_farda` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtb_fardamento`),
  KEY `tb_fardamento_FKIndex1` (`tb_aluno_idtb_aluno`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_fardamento`
--

INSERT INTO `tb_fardamento` (`idtb_fardamento`, `tb_aluno_idtb_aluno`, `tb_turma_idtb_f`, `motivo_farda`, `data_farda`, `obs_farda`, `data_reg`) VALUES
(10, 447, 18, 'calÃ§a', '08/02/2017', 'NÃ£o estÃ¡ com a saia na cor padrÃ£o, por necessidade especial.', '2017-02-08 15:23:17'),
(9, 413, 23, 'tÃªnis', '03/02/2017', 'bolha no pÃ© esquerdo', '2017-02-03 10:34:28'),
(11, 135, 14, '', '', '', '2017-02-09 14:14:50'),
(13, 396, 23, 'calça', '21/02/2017', 'aledknj', '2017-02-21 21:25:37'),
(14, 396, 23, 'meia', '21/02/2017', 'adljkcnçãáó', '2017-02-21 21:46:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ocorrencia`
--

DROP TABLE IF EXISTS `tb_ocorrencia`;
CREATE TABLE IF NOT EXISTS `tb_ocorrencia` (
  `idtb_ocorrencia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_aluno_idtb_aluno` int(10) UNSIGNED NOT NULL,
  `tb_turma_idtb_turma` int(11) NOT NULL,
  `tb_usuario_idtb_usuario` int(10) UNSIGNED NOT NULL,
  `motivo_ocorrencia` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `obs_ocorrencia` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_pdt` int(11) NOT NULL DEFAULT '0',
  `nivel_ocorrencia` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `data_ocorrencia` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hora_ocorrencia` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtb_ocorrencia`),
  KEY `tb_oco_sala_FKIndex1` (`tb_aluno_idtb_aluno`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_ocorrencia`
--

INSERT INTO `tb_ocorrencia` (`idtb_ocorrencia`, `tb_aluno_idtb_aluno`, `tb_turma_idtb_turma`, `tb_usuario_idtb_usuario`, `motivo_ocorrencia`, `obs_ocorrencia`, `status_pdt`, `nivel_ocorrencia`, `data_ocorrencia`, `hora_ocorrencia`, `data_reg`) VALUES
(37, 131, 22, 2, 'Outro', 'O aluno estava fora de sala conversando com um colega e perdeu a hora de voltar à sala.', 0, 'g', '07/02/2017', '04:15 PM', '2017-02-07 19:19:13'),
(36, 121, 22, 2, 'Outro', 'O aluno estava fora de sala conversando com um colega e perdeu a hora de retornar à sala de aula.', 0, 'g', '07/02/2017', '04:15 PM', '2017-02-07 19:14:20'),
(39, 396, 23, 29, 'Celular', 'akdjhkaljdnc', 0, 's', '21/02/2017', '12:45 PM', '2017-02-21 15:46:37'),
(40, 396, 23, 26, 'Celular', 'kajhdcbkhjdabk', 0, 'g', '21/02/2017', '12:45 PM', '2017-02-21 15:48:07'),
(41, 396, 23, 29, 'Celular', 'jgcvjhv', 0, 's', '21/02/2017', '07:00 PM', '2017-02-21 22:04:05'),
(42, 396, 23, 29, 'Celular', 'adkhjdabçãáó', 0, 's', '21/02/2017', '07:00 PM', '2017-02-21 22:04:50'),
(43, 396, 23, 26, 'Celular', 'adkfhbkçáóõ', 0, 'g', '21/02/2017', '07:00 PM', '2017-02-21 22:06:56'),
(44, 396, 23, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-22 13:06:53'),
(45, 396, 23, 27, 'Celular', 'adliskjnhfs', 0, 's', '22/02/2017', '10:15 AM', '2017-02-22 13:21:02'),
(46, 398, 23, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-22 23:58:45'),
(47, 398, 23, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-22 23:59:21'),
(48, 402, 23, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-22 23:59:52'),
(49, 402, 23, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-23 00:04:55'),
(50, 398, 23, 29, 'Celular', 'adkhjdabçãáó', 0, 's', '21/02/2017', '07:00 PM', '2017-02-23 00:53:17'),
(51, 406, 23, 29, 'Celular', 'adkhjdabçãáó', 0, 's', '21/02/2017', '07:00 PM', '2017-02-23 00:54:15'),
(52, 396, 23, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-23 09:29:58'),
(53, 396, 23, 29, 'Celular', 'adkhjdabçãáó', 0, 's', '21/02/2017', '07:00 PM', '2017-02-23 09:40:19'),
(54, 398, 23, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-23 09:40:38'),
(55, 398, 23, 29, 'Celular', 'adkhjdabçãáó', 0, 's', '21/02/2017', '07:00 PM', '2017-02-23 09:40:56'),
(56, 251, 15, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-23 10:01:58'),
(57, 406, 23, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-23 10:08:53'),
(58, 408, 23, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-23 10:09:15'),
(59, 410, 23, 29, 'Celular', 'adkhjdabçãáó', 0, 's', '21/02/2017', '07:00 PM', '2017-02-23 10:10:03'),
(60, 461, 23, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-23 10:29:37'),
(61, 398, 23, 2, 'Celular', 'adjklcbkhjda', 0, 'g', '22/02/2017', '10:00 AM', '2017-02-23 10:50:23'),
(62, 398, 23, 2, 'Outro', 'fora de sala em horário de aula sem autoriação', 0, 'g', '23/02/2017', '07:45 AM', '2017-02-23 10:52:54'),
(63, 396, 23, 2, 'Outro', 'fora de sala em horário de aula sem autoriação', 0, 'g', '23/02/2017', '07:45 AM', '2017-02-23 10:53:45'),
(64, 413, 23, 29, 'Celular', 'adkhjdabçãáó', 0, 's', '21/02/2017', '07:00 PM', '2017-02-23 12:36:57'),
(65, 265, 17, 2, 'Celular', 'as', 0, 'g', '21/03/2017', '03:45 PM', '2017-03-01 18:47:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_saida`
--

DROP TABLE IF EXISTS `tb_saida`;
CREATE TABLE IF NOT EXISTS `tb_saida` (
  `idtb_saida` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_aluno_idtb_aluno` int(10) UNSIGNED NOT NULL,
  `tb_turma_idtb_s` int(11) NOT NULL,
  `data_saida` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hora_saida` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsavel_saida` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_retorno` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `hora_retorno` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_reg` int(10) DEFAULT NULL,
  PRIMARY KEY (`idtb_saida`),
  KEY `tb_saida_FKIndex1` (`tb_aluno_idtb_aluno`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_saida`
--

INSERT INTO `tb_saida` (`idtb_saida`, `tb_aluno_idtb_aluno`, `tb_turma_idtb_s`, `data_saida`, `hora_saida`, `responsavel_saida`, `status_retorno`, `hora_retorno`, `data_reg`) VALUES
(19, 177, 15, '30/01/2017', '12:58 AM', 'Neide (MÃ£e)', 'NÃ£', '2017-01-30 17:02:31', 0),
(17, 42, 7, '30/01/2017', '12:00 PM', 'Sandro (pai)', 'NÃ£', '2017-01-30 14:56:59', 0),
(18, 346, 17, '30/01/2017', '12:21 PM', 'Regina (mÃ£e)', 'NÃ£', '2017-01-30 15:24:25', 0),
(16, 306, 16, '30/01/2017', '11:15 AM', 'Andrelina (mÃ£e)', 'NÃ£', '2017-01-30 14:11:24', 0),
(20, 309, 16, '31/01/2017', '08:20 AM', 'Maria CÃ©lia (avÃ³)', 'NÃ£', '2017-01-31 11:20:54', 0),
(21, 405, 18, '31/01/2017', '08:25 AM', 'Maria dos Anjos (mÃ£e)', 'NÃ£', '2017-01-31 11:25:53', 0),
(22, 163, 15, '31/01/2017', '09:05 AM', 'Antonieta (mÃ£e)', 'Sim', '2017-01-31 12:03:03', 0),
(23, 387, 19, '31/01/2017', '01:15 PM', 'Marizete (tia)', 'NÃ£', '2017-01-31 16:03:33', 0),
(24, 460, 23, '31/01/2017', '01:18 PM', 'Leandro (IrmÃ£o)', 'NÃ£', '2017-01-31 16:17:18', 0),
(25, 153, 15, '31/01/2017', '03:35 PM', '', 'NÃ£', '2017-01-31 18:37:00', 0),
(26, 153, 15, '31/01/2017', '03:30 PM', 'MÃ£e', 'NÃ£', '2017-01-31 18:43:20', 0),
(27, 333, 17, '31/01/2017', '04:05 PM', 'Pai', 'NÃ£', '2017-01-31 19:07:50', 0),
(28, 393, 18, '01/02/2017', '08:30 AM', 'Francisca (mÃ£e)', 'Sim', '2017-02-01 11:30:14', 0),
(29, 435, 23, '01/02/2017', '11:45 AM', 'Iara (MÃ£e)', 'NÃ£', '2017-02-01 14:47:32', 0),
(30, 232, 16, '01/02/2017', '02:55 PM', 'Ulisses (pai)', 'NÃ£', '2017-02-01 17:51:20', 0),
(31, 288, 12, '01/02/2017', '04:10 PM', 'Antonia Lucia (mÃ£e)', 'NÃ£', '2017-02-01 19:06:21', 0),
(32, 393, 18, '01/02/2017', '04:15 PM', 'Francisca Guerra (MÃ£e)', 'NÃ£', '2017-02-01 19:12:54', 0),
(33, 288, 12, '02/02/2017', '08:00 PM', 'Antonia Lucia (mÃ£e)', 'NÃ£', '2017-02-02 11:00:44', 0),
(34, 357, 18, '02/02/2017', '10:15 AM', 'Diana (mÃ£e)', 'Sim', '2017-02-02 13:12:13', 0),
(35, 224, 15, '02/02/2017', '11:45 AM', 'Carmelita (mÃ£e)', 'NÃ£', '2017-02-02 14:44:57', 0),
(36, 266, 12, '02/02/2017', '12:30 PM', 'Zairta (mÃ£e)', 'NÃ£', '2017-02-02 15:22:28', 0),
(37, 225, 12, '02/02/2017', '12:25 PM', 'Regileuda (mÃ£e)', 'Sim', '2017-02-02 15:24:56', 0),
(38, 207, 12, '02/02/2017', '12:25 PM', 'Terezinha (mÃ£e)', 'Sim', '2017-02-02 15:26:02', 0),
(39, 443, 23, '02/02/2017', '01:15 PM', 'Suely (mÃ£e)', 'NÃ£', '2017-02-02 16:12:32', 0),
(40, 209, 15, '02/02/2017', '03:50 PM', 'MÃƒE', 'NÃ£', '2017-02-02 18:47:17', 0),
(41, 464, 14, '03/02/2017', '09:30 AM', 'Helena', 'Sim', '2017-02-03 12:31:12', 0),
(42, 284, 16, '03/02/2017', '11:15 AM', 'EubÃªnia (mÃ£e)', 'Sim', '2017-02-03 14:15:04', 0),
(43, 207, 12, '03/02/2017', '11:45 AM', 'Dayane (cunhada)', 'Sim', '2017-02-03 14:47:30', 0),
(44, 384, 17, '03/02/2017', '12:00 PM', 'Ednalda (MÃ£e)', 'NÃ£', '2017-02-03 15:01:25', 0),
(45, 416, 17, '03/02/2017', '12:00 PM', 'Liduina MÃ£e)', 'NÃ£', '2017-02-03 15:02:23', 0),
(46, 239, 12, '03/02/2017', '02:05 PM', 'MÃ£e - VirgÃ­lia', 'NÃ£', '2017-02-03 17:07:31', 0),
(47, 316, 12, '03/02/2017', '02:30 PM', 'Maria Edilane (MÃ£e)', 'NÃ£', '2017-02-03 17:32:47', 0),
(48, 232, 16, '03/02/2017', '04:15 PM', 'Pai- ulisses', 'NÃ£', '2017-02-03 19:28:25', 0),
(49, 354, 17, '06/02/2017', '09:30 AM', 'BetÃ¢nia (mÃ£e)', 'Sim', '2017-02-06 12:30:08', 0),
(50, 326, 17, '06/02/2017', '09:30 AM', 'Nilde (mÃ£e)', 'Sim', '2017-02-06 12:33:06', 0),
(51, 242, 15, '06/02/2017', '11:00 AM', 'Raimudo Deoclesio', 'NÃ£', '2017-02-06 14:08:54', 0),
(52, 411, 17, '06/02/2017', '11:52 AM', 'Marilene (mÃ£e)', 'NÃ£', '2017-02-06 14:51:02', 0),
(53, 117, 22, '06/02/2017', '12:20 PM', 'Iracilda (tia)', 'NÃ£', '2017-02-06 15:18:16', 0),
(54, 230, 12, '06/02/2017', '12:45 PM', 'Francisco AntÃ´nio (Pai)', 'NÃ£', '2017-02-06 15:35:10', 0),
(55, 162, 16, '06/02/2017', '02:25 PM', 'Francisco (padrasto)', 'NÃ£', '2017-02-06 17:25:56', 0),
(56, 193, 14, '07/02/2017', '07:42 AM', 'Aparecida (mÃ£e)', 'Sim', '2017-02-07 10:40:57', 0),
(57, 339, 17, '07/02/2017', '09:07 AM', 'Raimundo (pai)', 'Sim', '2017-02-07 12:05:20', 0),
(58, 458, 23, '07/02/2017', '09:11 AM', 'Aurinete (mÃ£e)', 'Sim', '2017-02-07 12:09:50', 0),
(59, 66, 7, '08/02/2017', '09:30 AM', 'Adriana (mÃ£e)', 'NÃ£', '2017-02-08 12:25:15', 0),
(60, 169, 15, '08/02/2017', '09:35 AM', 'Socorro (mÃ£e)', 'NÃ£', '2017-02-08 12:34:41', 0),
(61, 395, 17, '08/02/2017', '11:45 AM', 'Maria CÃ©lia (mÃ£e)', 'Sim', '2017-02-08 14:45:23', 0),
(62, 467, 23, '08/02/2017', '12:15 PM', 'Rosa (avÃ³)', 'NÃ£', '2017-02-08 15:28:28', 0),
(63, 227, 15, '08/02/2017', '01:15 PM', 'Wilha (mÃ£e)', 'NÃ£', '2017-02-08 16:13:03', 0),
(64, 90, 22, '08/02/2017', '01:17 PM', 'JosÃ© (pai)', 'Sim', '2017-02-08 16:15:53', 0),
(65, 204, 15, '08/02/2017', '02:30 PM', 'Crisangela (mÃ£e)', 'NÃ£', '2017-02-08 17:29:42', 0),
(66, 277, 17, '08/02/2017', '03:15 PM', 'Eusileide (mÃ£e)', 'NÃ£', '2017-02-08 18:17:16', 0),
(67, 291, 16, '08/02/2017', '03:30 PM', 'Ana Lucia (mÃ£e)', 'NÃ£', '2017-02-08 18:21:54', 0),
(68, 167, 14, '09/02/2017', '12:30 PM', 'Marilene (mÃ£e)', 'Sim', '2017-02-09 15:30:17', 0),
(69, 218, 15, '09/02/2017', '01:00 PM', 'pai', 'Sim', '2017-02-09 15:59:08', 0),
(70, 218, 15, '09/02/2017', '01:15 PM', 'pai', 'Sim', '2017-02-09 16:15:44', 0),
(81, 396, 23, '23/02/2017', '07:15 AM', 'pai', 'Sim', '2017-02-23 10:28:16', 0),
(80, 396, 23, '22/02/2017', '10:45 AM', 'pai', 'Sim', '2017-02-22 13:58:31', 0),
(79, 396, 23, '22/02/2017', '10:15 AM', 'mãe', 'Sim', '2017-02-22 13:22:14', 0),
(78, 396, 23, '21/02/2017', '07:45 AM', 'pai', 'Sim', '2017-02-21 10:50:01', 0),
(82, 396, 23, '23/02/2017', '08:15 AM', 'pai', '', '2017-02-23 11:23:46', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_turma`
--

DROP TABLE IF EXISTS `tb_turma`;
CREATE TABLE IF NOT EXISTS `tb_turma` (
  `idtb_turma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_usuario_idtb_usuario` int(10) UNSIGNED NOT NULL,
  `tb_cursos_idtb_cursos` int(10) UNSIGNED NOT NULL,
  `serie` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ano` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idtb_turma`),
  KEY `tb_turma_FKIndex1` (`tb_cursos_idtb_cursos`),
  KEY `tb_turma_FKIndex2` (`tb_usuario_idtb_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_turma`
--

INSERT INTO `tb_turma` (`idtb_turma`, `tb_usuario_idtb_usuario`, `tb_cursos_idtb_cursos`, `serie`, `ano`) VALUES
(22, 35, 7, '2', 2016),
(7, 16, 5, '1', 2017),
(12, 18, 5, '2', 2016),
(14, 19, 8, '1', 2017),
(15, 20, 7, '3', 2015),
(16, 21, 1, '2', 2016),
(17, 22, 9, '3', 2015),
(18, 23, 9, '1', 2017),
(19, 36, 1, '1', 2017),
(23, 28, 1, '3', 2015);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `idtb_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `img_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_usuario` int(10) UNSIGNED DEFAULT '1',
  `pergunta` int(11) NOT NULL,
  `resposta` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idtb_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`idtb_usuario`, `img_usuario`, `nome_usuario`, `email_usuario`, `telefone_usuario`, `celular_usuario`, `senha_usuario`, `tipo_usuario`, `status_usuario`, `pergunta`, `resposta`) VALUES
(1, 'find_user.png', 'ADM', 'sisco@jmf', NULL, NULL, 'sisco2014', 'ADM', 1, 0, ''),
(2, 'avatar5.png', 'Edjafre Muniz Silva', 'Ed_2003.2@hotmail.com', '(85)9988-8900', '(85)98938-3882', 'ed2412', 'Coordenador', 1, 3, 'Tom'),
(26, 'perfil2.jpg', 'Werbson Falcão ', 'werbsonfalco@gmail.com', '', '(85)98831-9562', 'wf260183', 'Coordenador', 1, 2, '1300'),
(18, 'perfil2.jpg', 'COMERCIO-2-PDT', 'comercio-2-pdt@gmail.com', '', '(85)00000-0000', '123456', 'PDT', 1, 1, 'Eu'),
(17, 'perfil2.jpg', 'ADMISTRACAO-2-PDT', 'exemplo@gmail.com', '', '(85)00000-0000', '123456', 'PDT', 1, 1, 'Eu'),
(25, 'perfil2.jpg', 'INFORMÁTICA-3-PDT', 'infornatica3pdt@gmail.com', '(99)9999-9999', '(99)99999-9999', '123456', 'PDT', 1, 3, 'gato'),
(24, 'perfil2.jpg', 'INFORMÁTICA-1-PDT', 'infornatica1pdt@gmail.com', '(99)9999-9999', '(99)99999-9999', '123456', 'PDT', 1, 3, 'gato'),
(13, '01.png', 'Leandro Costa', 'leandrowdwm@gmail.com', '(85)3336-0000', '(85)99144-6498', 'qwe123##', 'Professor', 1, 3, 'gato'),
(16, 'perfil2.jpg', 'comercio pdt 1 ano', 'comerciopdt@gmail.com', '(99)9999-9999', '(99)99999-9999', '123456', 'PDT', 1, 3, 'gato'),
(19, 'perfil2.jpg', 'pdt secretaria escolar 1 ano', 'email@email.com', '(99)9999-9999', '(99)99999-9999', '123456', 'PDT', 1, 3, 'gato'),
(20, 'perfil2.jpg', 'pdt 3 administração', '3adm@gmail.com', '(99)9999-9999', '(99)99999-9999', '123456', 'PDT', 1, 3, 'gato'),
(21, 'perfil2.jpg', 'ptd 2 informatica', 'pdt2informatica@gmail.com', '(99)9999-9999', '(99)99999-9999', '123456', 'PDT', 1, 3, 'gato'),
(22, 'perfil2.jpg', 'pdt 3 enfermagem', 'EXEMPLO@GMAIL.COM', '', '(99)99999-9999', '123456', 'PDT', 1, 1, 'gato'),
(23, 'perfil2.jpg', 'ENFERMAGEM-1-PDT', 'enfer1pdt@gmail.com', '', '(00)00000-0000', '123456', 'PDT', 1, 1, 'Eu'),
(27, 'perfil2.jpg', 'saulo alves oliveira', 'sauloalvesmat@gmail.com', '', '(85)99146-8080', 'saulonadja', 'Professor', 1, 2, '1338'),
(28, 'perfil2.jpg', 'Mailson Rocha', 'mailsonrochabiologiapdt@gmail.com', '', '(85)99215-6184', 'biologia', 'PDT', 1, 2, 'gato'),
(29, 'perfil2.jpg', 'Mailson Rocha', 'mailsonrochabiologia@gmail.com', '', '(85)99215-6184', 'biologia', 'Professor', 1, 2, '6364'),
(30, 'perfil2.jpg', 'Roselena Fernandes', 'roselenafernandes@yahoo.com.br', '', '(85)99134-0548', 'RF2017', 'Coordenador', 1, 3, 'NINA'),
(31, 'perfil2.jpg', 'Francisco Walisson', 'walissondodo@hotmail.com', '', '(85)98714-0768', 'dodo17', 'Professor', 1, 2, '6374'),
(32, '1189cc7a609bac041557f0cf8a557c3d.jpg', 'Elis Ridan', 'elisridan@yahoo.com.br', '(85)3348-3740', '(85)98713-1701', 'jmf2017', 'Coordenador', 1, 2, '8463'),
(33, 'perfil2.jpg', 'vicente paula pereira', 'vicentepaulapereira@gmail.com', '', '(88)99925-6482', 'Vp180601', 'Coordenador', 1, 2, '4473'),
(34, 'perfil2.jpg', 'Douglas Cavalcante', 'doug_nsc@hotmail.com', '', '(85)98898-2307', 'doug7722', 'Professor', 1, 2, '2333'),
(35, 'perfil2.jpg', 'adriano anjos', 'adriano_sccp@hotmail.com', '', '(85)99185-7185', 'fiel1910', 'PDT', 1, 2, '9200'),
(36, 'perfil2.jpg', 'Tiago Batista Moreira', 'tiagol1.7@hotmail.com', '', '(85)99225-5412', 't1t2t3', 'PDT', 1, 2, '9340');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
