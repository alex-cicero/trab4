-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Dez-2018 às 04:32
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `nome` varchar(255) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `dataNasc` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `celular` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`nome`, `matricula`, `dataNasc`, `email`, `telefone`, `celular`) VALUES
('daaaaaaaaaaaaa', '11111', '0000-00-00', 'fafaga@gm.com', '(66)56565656', NULL),
('Mateus', '216463545', '0000-00-00', 'mateusbispo@gmail.com', '(16)57465546', NULL),
('testando', '222222', '0000-00-00', 'teste@testando.com', '(55)55555555', NULL),
('sasa', '6666666', '0000-00-00', 'dada@gmail.com', '(66)66666666', '(66)666666666'),
('dsda', '66666666', '0000-00-00', 'sasa@gmail.com', '(66)66666666', NULL),
('ijdia', '6666666666', '0000-00-00', 'siaj@gmail.com', '(66)66666666', NULL),
('dada', '9999999999', '0000-00-00', 'adad@gmail.com', '(21)99999999', '(21)999999999'),
('KEVIN', 'DADJA', '0000-00-00', 'sasff@gmail.com', '(99)99999999', NULL),
('teste', 'teste', '0000-00-00', 'teste@teste.com', '(21)22222222', NULL),
('11616', 'wwq', '0000-00-00', 'sadfart@', '(33)33333333', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `matricula` varchar(20) NOT NULL,
  `isbn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `nome` varchar(255) NOT NULL,
  `matricula` varchar(30) NOT NULL,
  `dataNasc` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `isbn` varchar(20) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `dataEmprestimo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`genero`) VALUES
('Acadêmico'),
('Biografia'),
('dada'),
('Drama'),
('Ficção'),
('Infanto-Juvenil'),
('Romance'),
('Terror'),
('Thriller'),
('Young Adult');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `isbn` varchar(20) NOT NULL,
  `genero` varchar(30) DEFAULT NULL,
  `subgenero` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`titulo`, `autor`, `isbn`, `genero`, `subgenero`) VALUES
(NULL, NULL, '0102030306', 'Acadêmico', 'Linguagem SQL'),
(NULL, NULL, '0102263065', 'Acadêmico', 'Linguagem C'),
(NULL, NULL, '0120510590', 'Acadêmico', 'Física'),
(NULL, NULL, '0365865989', 'Acadêmico', 'POO'),
(NULL, NULL, '09080796756', 'Thriller', NULL),
(NULL, NULL, '1254638656', 'Acadêmico', 'POO'),
(NULL, NULL, '1414558251158', 'Infanto-Juvenil', NULL),
(NULL, NULL, '1447582693', 'Ficção', 'Fantástica'),
(NULL, NULL, '1645946269', 'Acadêmico', 'Administração'),
('1746', 'Ouvidoria', '1746', 'Acadêmico', 'Administração'),
(NULL, NULL, '26331269441', 'Ficção', 'Científica'),
(NULL, NULL, '3652414636', 'Acadêmico', 'Inglês'),
(NULL, NULL, '3695524654', 'Ficção', 'Fantástica'),
(NULL, NULL, '4656522659', 'Ficção', 'Científica'),
(NULL, NULL, '5232562325', 'Acadêmico', 'POO'),
(NULL, NULL, '5352352525', 'Ficção', 'Histórica'),
(NULL, NULL, '9858745265', 'Acadêmico', 'Física');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subgeneros`
--

CREATE TABLE `subgeneros` (
  `generos` varchar(50) NOT NULL,
  `subg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subgeneros`
--

INSERT INTO `subgeneros` (`generos`, `subg`) VALUES
('Acadêmico', 'Administração'),
('Acadêmico', 'Física'),
('Acadêmico', 'Francês'),
('Acadêmico', 'Inglês'),
('Acadêmico', 'Linguagem C'),
('Acadêmico', 'Linguagem PHP'),
('Acadêmico', 'Linguagem SQL'),
('Acadêmico', 'POO'),
('Ficção', 'Científica'),
('Ficção', 'Fantástica'),
('Ficção', 'Histórica');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`matricula`,`isbn`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`genero`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `subgeneros`
--
ALTER TABLE `subgeneros`
  ADD PRIMARY KEY (`generos`,`subg`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `subgeneros`
--
ALTER TABLE `subgeneros`
  ADD CONSTRAINT `subgeneros_ibfk_1` FOREIGN KEY (`generos`) REFERENCES `generos` (`genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
