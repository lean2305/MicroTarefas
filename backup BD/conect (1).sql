-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Abr-2023 às 13:05
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `conect`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigos`
--

CREATE TABLE `amigos` (
  `id_amigo` int(11) NOT NULL,
  `utilizador` varchar(150) NOT NULL,
  `amigo` varchar(150) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `amigos`
--

INSERT INTO `amigos` (`id_amigo`, `utilizador`, `amigo`, `estado`) VALUES
(67, 'admin', 'JonaSilva', ''),
(69, 'admin', 'sdfsdsads', ''),
(90, 'aaaaaa', 'admin', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `id` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `utilizador` varchar(50) NOT NULL,
  `nome` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`id`, `id_utilizador`, `utilizador`, `nome`) VALUES
(31, 0, 'leandro', 'download.png'),
(46, 0, 'sdfsdsads', 'download.png'),
(49, 0, 'JonaSilva', 'download.png'),
(50, 0, 'aaaaaa', '26.png'),
(52, 0, 'admin', 'download.png'),
(53, 0, 'dssd', 'download.png'),
(54, 0, 'adminsd', 'download.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(2, 'website'),
(3, 'Youtube'),
(4, 'Facebook'),
(5, 'Aplicação\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_trabalho`
--

CREATE TABLE `historico_trabalho` (
  `id` int(11) NOT NULL,
  `empregador` varchar(220) NOT NULL,
  `trabalhador` varchar(220) NOT NULL,
  `prova` varchar(220) NOT NULL,
  `valor` float NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `historico_trabalho`
--

INSERT INTO `historico_trabalho` (`id`, `empregador`, `trabalhador`, `prova`, `valor`, `estado`) VALUES
(1, 'admin', '23', '', 0.5, ''),
(2, 'admin', '23', '', 0.5, 'pago'),
(3, 'admin', '23', 'sfddf', 0.5, 'pago'),
(4, 'admin', '23', 'sfddf', 0.5, 'pago'),
(5, 'admin', 'dssd', 'sdf', 0.25, 'recusado'),
(6, 'dssd', 'admin', 'sfsdfsdf', 0.5, 'pago'),
(7, 'dssd', 'admin', 'sadasd', 0.5, 'pago'),
(8, 'dssd', 'admin', 'dfs', 0.05, 'pago'),
(9, 'dssd', 'admin', 'sdsda', 0.5, 'pago'),
(10, 'admin', 'sdsd', 'Ja ta feito', 0.05, 'pago'),
(14, '', '', '', 0, 'pago'),
(15, 'admin', 'leandro', 'seguido por @onflk', 0.05, 'recusado'),
(16, 'admin', 'dssd', 'chanfra', 0.5, 'recusado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menssagem`
--

CREATE TABLE `menssagem` (
  `id_msg` int(11) NOT NULL,
  `texto` varchar(300) NOT NULL,
  `user1` varchar(50) NOT NULL,
  `user2` varchar(50) NOT NULL,
  `id_amigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `menssagem`
--

INSERT INTO `menssagem` (`id_msg`, `texto`, `user1`, `user2`, `id_amigo`) VALUES
(86, 'admin', 'admin', 'aaaaaa', 90),
(87, 'admin', 'admin', 'aaaaaa', 90),
(88, 'aaaaaa', 'aaaaaa', 'admin', 90),
(89, 'aaaaa', 'aaaaaa', 'admin', 90),
(90, 'sou o admin', 'admin', 'aaaaaa', 90),
(91, 'sou novamente o admin a escrever este texto para testar se o chat funciona corretamente', 'admin', 'aaaaaa', 90),
(92, 'admin', 'admin', 'aaaaaa', 90),
(93, 'admin do aço', 'admin', 'aaaaaa', 90),
(94, 'oi  sou admin', 'admin', 'aaaaaa', 90),
(95, 'ewradmin', 'admin', 'aaaaaa', 90),
(97, 'admin', 'admin', 'aaaaaa', 90),
(98, 'opahcrlh', 'admin', 'aaaaaa', 90),
(99, 'asas', 'admin', 'aaaaaa', 90),
(101, 'aeeeee', 'admin', 'aaaaaa', 90),
(106, 'aaaaaaaa', 'admin', 'aaaaaa', 90),
(109, 'aaq', 'admin', 'aaaaaa', 90),
(110, 'ai', 'admin', 'aaaaaa', 90),
(111, 'ww', 'admin', 'aaaaaa', 90),
(112, 'ooo', 'admin', 'aaaaaa', 90),
(115, 'aaaaa', 'aaaaaa', 'admin', 90),
(116, 'adminn', 'admin', 'aaaaaa', 90),
(118, 'asssa', 'admin', 'JonaSilva', 67);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id` int(11) NOT NULL,
  `assunto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`id`, `assunto`) VALUES
(2, 'Bem vindo'),
(3, 'Olá, venho por este meio informar que o site ainda se encontrar em fase incial algum erro por favor nos diga');

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas`
--

CREATE TABLE `provas` (
  `id_prova` int(11) NOT NULL,
  `empregador` varchar(220) NOT NULL,
  `provas` varchar(200) NOT NULL,
  `trabalhador` varchar(220) NOT NULL,
  `valor` float NOT NULL,
  `estado` varchar(50) NOT NULL,
  `print` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `provas`
--

INSERT INTO `provas` (`id_prova`, `empregador`, `provas`, `trabalhador`, `valor`, `estado`, `print`) VALUES
(142, 'admin', 'Link:http://localhost/microTarefas/verprova.php?id=142', 'leandro', 0.05, 'pendente', 'd733345e4f11231904e7634a04439e21.gif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `id_historico` int(11) NOT NULL,
  `justificacao` varchar(250) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `report`
--

INSERT INTO `report` (`id`, `id_historico`, `justificacao`, `estado`) VALUES
(2, 6, 'cONCLUIDO', 'pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalho`
--

CREATE TABLE `trabalho` (
  `id_trabalho` int(11) NOT NULL,
  `assunto` varchar(35) NOT NULL,
  `descricao` varchar(350) NOT NULL,
  `valor` float NOT NULL,
  `utilizador` varchar(50) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `trabalho`
--

INSERT INTO `trabalho` (`id_trabalho`, `assunto`, `descricao`, `valor`, `utilizador`, `id_categoria`) VALUES
(111, 'ideee', 'dffd', 0.5, 'admin', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id_utilizador` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(20) NOT NULL,
  `utilizador` varchar(20) NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `saldo` float NOT NULL,
  `arquivo` varchar(150) NOT NULL,
  `avaliacao` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_utilizador`, `nome`, `sobrenome`, `utilizador`, `password`, `saldo`, `arquivo`, `avaliacao`) VALUES
(1, 'Lean', 'oliv', '23', '23', 5.55, '', 0),
(2, 'aaaa', 'aaaaaa', 'aaaaaa', 'aaaaaa', 0, '', 0),
(3, 'admin', 'admin', 'admin', 'admin', 11.75, '', 0),
(4, 'oliveira', 'sdds', 'dssd', 'sdsd', 3.9, '', 4.7539),
(5, 'João', 'Silva', 'JonaSilva', 'Jonecas', 0, '', 0),
(6, 'Leansdas', 'sdfsdas', 'sdfsdsads', 'sasds', 0, '', 0),
(8, 'admin', 'admin', 'adminsd', 'admin', 0, '', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id_amigo`);

--
-- Índices para tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilizador` (`utilizador`),
  ADD UNIQUE KEY `utilizador_2` (`utilizador`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `historico_trabalho`
--
ALTER TABLE `historico_trabalho`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menssagem`
--
ALTER TABLE `menssagem`
  ADD PRIMARY KEY (`id_msg`);

--
-- Índices para tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `provas`
--
ALTER TABLE `provas`
  ADD PRIMARY KEY (`id_prova`);

--
-- Índices para tabela `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `trabalho`
--
ALTER TABLE `trabalho`
  ADD PRIMARY KEY (`id_trabalho`),
  ADD UNIQUE KEY `id_trabalho` (`id_trabalho`),
  ADD UNIQUE KEY `usuario` (`utilizador`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `utilizador` (`utilizador`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id_utilizador`),
  ADD UNIQUE KEY `usuario` (`utilizador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id_amigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de tabela `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `historico_trabalho`
--
ALTER TABLE `historico_trabalho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `menssagem`
--
ALTER TABLE `menssagem`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `provas`
--
ALTER TABLE `provas`
  MODIFY `id_prova` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de tabela `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `trabalho`
--
ALTER TABLE `trabalho`
  MODIFY `id_trabalho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `trabalho`
--
ALTER TABLE `trabalho`
  ADD CONSTRAINT `trabalho_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
