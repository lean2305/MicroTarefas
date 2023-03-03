-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Mar-2023 às 13:51
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
  `usuario` varchar(150) NOT NULL,
  `amigo` varchar(150) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `amigos`
--

INSERT INTO `amigos` (`id_amigo`, `usuario`, `amigo`, `estado`) VALUES
(67, 'admin', 'JonaSilva', ''),
(68, 'admin', 'aaaaaa', ''),
(69, 'admin', 'sdfsdsads', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `id` int(11) NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `nome` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`id`, `usuario`, `nome`) VALUES
(31, 'leandro', 'download.png'),
(46, 'sdfsdsads', 'download.png'),
(49, 'JonaSilva', 'download.png'),
(50, 'aaaaaa', '26.png'),
(52, 'admin', 'download.png'),
(53, 'dssd', 'download.png');

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
(1, 'Website');

-- --------------------------------------------------------

--
-- Estrutura da tabela `form`
--

CREATE TABLE `form` (
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `saldo` float NOT NULL,
  `arquivo` varchar(150) NOT NULL,
  `avaliacao` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `form`
--

INSERT INTO `form` (`nome`, `sobrenome`, `usuario`, `password`, `saldo`, `arquivo`, `avaliacao`) VALUES
('Lean', 'oliv', '23', '23', 5.55, '', 0),
('aaaa', 'aaaaaa', 'aaaaaa', 'aaaaaa', 0, '', 0),
('admin', 'admin', 'admin', 'admin', 11.75, '', 0),
('oliveira', 'sdds', 'dssd', 'sdsd', 3.9, '', 1.125),
('João', 'Silva', 'JonaSilva', 'Jonecas', 0, '', 0),
('Leansdas', 'sdfsdas', 'sdfsdsads', 'sasds', 0, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_tarefa`
--

CREATE TABLE `historico_tarefa` (
  `id` int(11) NOT NULL,
  `empregador` varchar(220) NOT NULL,
  `trabalhador` varchar(220) NOT NULL,
  `prova` varchar(220) NOT NULL,
  `valor` float NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `historico_tarefa`
--

INSERT INTO `historico_tarefa` (`id`, `empregador`, `trabalhador`, `prova`, `valor`, `estado`) VALUES
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
(1, 'Olá, tudo bem contigo?Queria te perguntar uma coisa se fosse possivel?', 'admin', 'aaaaaa', 68),
(2, 'ola tudo otimo e contigo???', 'aaaaaa', 'admin', 68);

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
  `empregador` varchar(50) NOT NULL,
  `provas` varchar(200) NOT NULL,
  `trabalhador` varchar(50) NOT NULL,
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
  `id_historico` int(100) NOT NULL,
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
  `usuario` varchar(50) DEFAULT NULL,
  `categoria` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `trabalho`
--

INSERT INTO `trabalho` (`id_trabalho`, `assunto`, `descricao`, `valor`, `usuario`, `categoria`) VALUES
(76, 'Seguir no instagram', 'Seguir minha conta instagram @leandro._.18', 0.05, 'leandro', 'Website'),
(82, 'Curtir facebook', 'Curtir pagina facebook\r\nhttps://www.facebook.com/', 0.02, 'jorge', 'Website'),
(97, 'Youtubes', 'Ver este video: https://www.youtube.com/watch?v=fb-uvasxfwo&ab_channel=BernardoAlmeida   e enviar print usando o lightshot as estatisticas nerd', 0.5, 'dssd', 'Website'),
(106, 'Video', 'dsfdsf', 0.5, 'admin', 'Website');

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
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `form`
--
ALTER TABLE `form`
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices para tabela `historico_tarefa`
--
ALTER TABLE `historico_tarefa`
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
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id_amigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `historico_tarefa`
--
ALTER TABLE `historico_tarefa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `menssagem`
--
ALTER TABLE `menssagem`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_trabalho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `dssdadmin` ON SCHEDULE AT '2023-02-11 16:52:37' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE form SET saldo = saldo + 0.5 WHERE usuario='dssd'$$

CREATE DEFINER=`root`@`localhost` EVENT `admindssdadmin` ON SCHEDULE AT '2023-02-11 16:52:37' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM provas WHERE trabalhador='dssd'$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
