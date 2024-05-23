-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/05/2024 às 19:15
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
--


create database `bd_autoria`;
use `bd_autoria`;
-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `codautor` int(11) NOT NULL,
  `nomeautor` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `nascimento` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`codautor`, `nomeautor`, `sobrenome`, `email`, `nascimento`) VALUES
(1, 'George', 'Orwell', 'george.orwell@example.com', '1903-06-25'),
(2, 'Machado', 'de Assis', 'machado.assis@example.com', '1839-06-21'),
(3, 'Harper', 'Lee', 'harper.lee@example.com', '1926-04-28'),
(4, 'Antoine', 'de Saint-Exupéry', 'antoine.stexupery@example.com', '1900-06-29'),
(5, 'Jane', 'Austen', 'jane.austen@example.com', '1775-12-16'),
(6, 'J.K.', 'Rowling', 'jk.rowling@example.com', '1965-07-31'),
(7, 'Gabriel', 'García Márquez', 'gabriel.garcia.marquez@example.com', '1927-03-06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `autoria`
--

CREATE TABLE `autoria` (
  `codautor` int(11) NOT NULL,
  `codlivro` int(11) NOT NULL,
  `datalancamento` date NOT NULL,
  `editora` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autoria`
--

INSERT INTO `autoria` (`codautor`, `codlivro`, `datalancamento`, `editora`) VALUES
(1, 1, '1949-06-08', 'Secker & Warburg'),
(2, 2, '1899-01-01', 'Garnier'),
(3, 3, '1960-07-11', 'J.B. Lippincott & Co.'),
(4, 4, '1943-04-06', 'Reynal & Hitchcock'),
(5, 5, '1813-01-28', 'T. Egerton'),
(6, 1, '1997-06-26', 'Bloomsbury'),
(7, 5, '1985-10-03', 'Random House'),
(1, 5, '1950-01-01', 'Modern Library');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `codlivro` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `isbn` varchar(15) NOT NULL,
  `idioma` varchar(30) NOT NULL,
  `qtdepag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`codlivro`, `titulo`, `categoria`, `isbn`, `idioma`, `qtdepag`) VALUES
(1, '1984', 'Ficção', '9780451524935', 'Inglês', 328),
(2, 'Dom Casmurro', 'Romance', '9780195106817', 'Português', 288),
(3, 'To Kill a Mockingbird', 'Ficção', '9780061120084', 'Inglês', 336),
(4, 'O Pequeno Príncipe', 'Infantil', '9782070612758', 'Francês', 96),
(5, 'Pride and Prejudice', 'Romance', '9780141040349', 'Inglês', 480);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`codautor`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`codlivro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `codautor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `codlivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
