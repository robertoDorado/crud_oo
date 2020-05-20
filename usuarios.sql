-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Maio-2020 às 02:16
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projeto_crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `telefone`) VALUES
(1, 'Roberto Dorado', 'robertodorado7@gmail.com', 980322264),
(2, 'Rafaela Fernandes', 'rafaela@gmail.com', 956478854),
(3, 'Priscila Fernandes', 'priscila@gmail.com', 974555587),
(4, 'Camila Tessaro', 'camila@gmail.com', 965422278),
(5, 'Fabiola Carvalho', 'fabiola@gmail.com', 956445252),
(6, 'Bernadete', 'bernadete@gmail.com', 954662587),
(7, 'Gabriel Lacerda', 'gabriel@gmail.com', 975454412),
(8, 'Sandra Moura', 'sandra@hotmail.com', 956477751),
(9, 'Vanessa Camargo', 'vanessa@gmail.com', 956332562),
(10, 'Vagner MourÃ£o', 'vagner@gmail.com', 965233364),
(11, 'Dorado Dorado', 'dorado@gmail.com', 977855564),
(12, 'Maria Cristina', 'maria@gmail.com', 965233365),
(13, 'JoÃ£o Ramon', 'joao@gmail.com', 945622232),
(14, 'Fernanda Torres', 'fernanda@gmail.com', 966523321),
(15, 'Arthur Azevedo', 'arthur@gmail.com', 966322254);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
