-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 13-Mar-2019 às 17:14
-- Versão do servidor: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bloco`
--

CREATE TABLE `bloco` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bloco`
--

INSERT INTO `bloco` (`id`, `descricao`) VALUES
(1, 'Bloco Administrativo '),
(2, 'Bloco 1 - Química'),
(3, 'Bloco 2 - Mecânica '),
(4, 'Bloco 3 - Computação'),
(5, 'Biblioteca '),
(6, 'Ginásio'),
(7, 'Auditório'),
(8, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncia`
--

CREATE TABLE `denuncia` (
  `id` int(11) NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `descricao` varchar(3000) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `qual_descricao` varchar(25) DEFAULT NULL,
  `id_bloco` int(11) DEFAULT NULL,
  `id_denuncia_oque` int(11) DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `denuncia`
--

INSERT INTO `denuncia` (`id`, `data`, `descricao`, `id_usuario`, `imagem`, `qual_descricao`, `id_bloco`, `id_denuncia_oque`, `data_atualizacao`) VALUES
(66, '2019-03-08 20:45:29', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 63, 'padrao.jpg', '02', 2, 1, '2019-03-08 20:45:29'),
(67, '2019-03-13 16:56:15', 'isabela', 63, 'padrao.jpg', '78', 1, 1, '2019-03-13 16:56:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncia_oque`
--

CREATE TABLE `denuncia_oque` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `denuncia_oque`
--

INSERT INTO `denuncia_oque` (`id`, `descricao`) VALUES
(1, 'Sala'),
(2, 'Banheiro'),
(3, 'Laboratório'),
(4, 'Coordenação'),
(5, 'Gabinete'),
(6, 'Telecom'),
(7, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(12) NOT NULL,
  `sobrenome` varchar(12) NOT NULL,
  `feedback_descricao` varchar(3000) NOT NULL,
  `imagem` varchar(20) DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `feedback`
--

INSERT INTO `feedback` (`id`, `data`, `nome`, `sobrenome`, `feedback_descricao`, `imagem`, `data_atualizacao`) VALUES
(1, '2018-10-26 13:48:36', 'ghfhf', 'fhfgh', 'fhfghf', '', '2019-03-13 15:03:29'),
(2, '2018-10-26 14:07:52', 'Isabela', 'Marques', 'Netflix comeÃ§ou como uma empresa de locaÃ§Ã£o de DVDs. ConheÃ§a a histÃ³ria. A Netflix foi fundada em 1997 pelos empreendedores Reed Hastings e Marc Randolph como um serviÃ§o online de locaÃ§Ã£o de filmes. ... O grande negÃ³cio da Netflix chegou ao mercado em 2007, com o lanÃ§amento do serviÃ§o de streaming.', 'ar.jpg', '2019-03-13 15:03:29'),
(3, '2018-10-26 14:08:36', 'Paulo', 'Silva', 'Netflix comeÃ§ou como uma empresa de locaÃ§Ã£o de DVDs. ConheÃ§a a histÃ³ria. A Netflix foi fundada em 1997 pelos empreendedores Reed Hastings e Marc Randolph como um serviÃ§o online de locaÃ§Ã£o de filmes. ... O grande negÃ³cio da Netflix chegou ao mercado em 2007, com o lanÃ§amento do serviÃ§o de streaming.', 'logo.png', '2019-03-13 15:03:29'),
(4, '2019-03-13 18:50:17', 'Isabela', 'Sofia', 'To get started, let\'s create an Eloquent model. Models typically live in the app directory, but you are free to place them anywhere that can be auto-loaded according to your  composer.json file. All Eloquent models extend Illuminate\\Database\\Eloquent\\Model class.\r\n\r\nThe easiest way to create a model instance is using the make:model Artisan command:', '1552503017.jpg', '2019-03-13 18:50:17'),
(5, '2019-03-13 19:07:39', 'Isabela', 'Marques', 'FALA GALERA DO YT', 'padrao.jpg', '2019-03-13 19:07:39'),
(6, '2019-03-13 15:53:33', 'asdasdsa', 'asdasdasd', 'asdasdasdas', 'padrao.jpg', '2019-03-13 15:53:33'),
(7, '2019-03-13 16:54:02', 'asdasda', 'dasdasd', 'asdasdas', 'padrao.jpg', '2019-03-13 16:54:02'),
(8, '2019-03-13 16:54:37', 'Paulo', 'Vitor', 'FAla aiaiaiaiaiaiia', '1552506877.jpg', '2019-03-13 16:54:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta_denuncia`
--

CREATE TABLE `resposta_denuncia` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descricao_resposta` varchar(5000) NOT NULL,
  `imagem` varchar(20) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `resposta_denuncia`
--

INSERT INTO `resposta_denuncia` (`id`, `data`, `descricao_resposta`, `imagem`, `id_usuario`, `data_atualizacao`) VALUES
(10, '2019-03-12 20:45:29', '88888887878787878787987897987897897897897456454654513213212', 'padrao.jpg', 63, '2019-03-12 20:45:29'),
(11, '2019-03-12 20:45:34', '74', 'padrao.jpg', 63, '2019-03-12 20:45:34'),
(12, '2019-03-12 20:47:11', 'aa', 'padrao.jpg', 63, '2019-03-12 20:47:11'),
(13, '2019-03-12 20:47:26', '123456', 'padrao.jpg', 63, '2019-03-12 20:47:26'),
(14, '2019-03-12 20:49:53', 'we', 'padrao.jpg', 63, '2019-03-12 20:49:53'),
(15, '2019-03-12 20:51:17', 'asdasdas', 'padrao.jpg', 63, '2019-03-12 20:51:17'),
(16, '2019-03-12 20:52:17', 'aaaaaaa', '1552423937.jpg', 63, '2019-03-12 20:52:17'),
(17, '2019-03-13 16:59:20', '1234567890', 'padrao.jpg', 63, '2019-03-13 16:59:20'),
(18, '2019-03-13 16:59:33', '1 2 3 4 5 6', 'padrao.jpg', 63, '2019-03-13 16:59:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `sobrenome` varchar(15) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `aluno` int(11) DEFAULT '1',
  `moderador` int(11) DEFAULT '0',
  `tec_adm` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `matricula`, `email`, `senha`, `aluno`, `moderador`, `tec_adm`) VALUES
(63, 'Paulo ', 'VÃ­tor', '20171042310061', 'paulovitor-100-@outlook.com', 'q1w2e3', 1, 0, 0),
(105, 'Paulo', 'Vitor', '1010', 'paulo@gmail.com', '2017', 1, 0, 0),
(106, 'Paulo', '10', 'paulo', 'Paulov@gmail.com', '504060', 1, 0, 0),
(107, 'Paulo', 'Vitor', '147', 'paulovitor-100-@outlo.com', '1596', 1, 0, 0),
(108, 'KAKA', 'KAKA', '10105', '545@gmail.com', '159', 1, 0, 0),
(109, 'Paulo', 'KAKA', '145', 'pae@gmail.com', '157', 1, 0, 0),
(110, 'Paulo', 'Vitor', 'paulo5', 'pai@gmail.com', '158', 1, 0, 0),
(111, 'Paulo', 'Vitor', '101012', 'paulovi@gmail.com', '1574', 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloco`
--
ALTER TABLE `bloco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_id_bloco` (`id_bloco`),
  ADD KEY `fk_id_denuncia_oque` (`id_denuncia_oque`),
  ADD KEY `fk_id_usuario_idx` (`id_usuario`);

--
-- Indexes for table `denuncia_oque`
--
ALTER TABLE `denuncia_oque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resposta_denuncia`
--
ALTER TABLE `resposta_denuncia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resposta_denuncia_idx` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloco`
--
ALTER TABLE `bloco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `denuncia`
--
ALTER TABLE `denuncia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `denuncia_oque`
--
ALTER TABLE `denuncia_oque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `resposta_denuncia`
--
ALTER TABLE `resposta_denuncia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `fk_id_bloco` FOREIGN KEY (`id_bloco`) REFERENCES `bloco` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_denuncia_oque` FOREIGN KEY (`id_denuncia_oque`) REFERENCES `denuncia_oque` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `resposta_denuncia`
--
ALTER TABLE `resposta_denuncia`
  ADD CONSTRAINT `fk_resposta_denuncia` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
