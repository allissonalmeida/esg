-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 25, 2022 at 01:40 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `esg`
--

-- --------------------------------------------------------

--
-- Table structure for table `bancos`
--

CREATE TABLE `bancos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bancos`
--

INSERT INTO `bancos` (`id`, `nome`) VALUES
(1, 'Bradesco'),
(2, 'Itaú'),
(3, 'Banco do Brasil'),
(4, 'Santander'),
(5, 'Caixa Econômica'),
(6, 'Nubank');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `pessoa` varchar(15) NOT NULL,
  `doc` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `ativo` varchar(5) NOT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `banco` varchar(40) DEFAULT NULL,
  `agencia` varchar(10) DEFAULT NULL,
  `conta` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `pessoa`, `doc`, `telefone`, `endereco`, `ativo`, `obs`, `data`, `banco`, `agencia`, `conta`, `email`) VALUES
(1, 'Diversos', 'Física', '000.000.000-50', '', NULL, 'Sim', NULL, '2021-05-10', NULL, NULL, NULL, 'cliente@cliente.com'),
(2, 'Marcos Freitas', 'Física', '485.555.555-55', '(59) 22522-2222', 'Rua C', 'Não', '', '2021-04-13', '', '', '', 'marcos@hotmail.com'),
(3, 'Empresa A', 'Jurídica', '44.455.555/5555-52', '(55) 88888-8888', 'Rua D', 'Sim', 'Nenhuma', '2021-04-13', 'Nubank', '0125-7', '55889-7', 'empresax@hotmail.com'),
(5, 'Marina Silva', 'Física', '454.885.555-57', '(58) 65555-5555', 'Rua C', 'Sim', 'Rua C', '2021-04-19', '', '', '', 'marina@hotmail.com'),
(6, 'Karolina Souza', 'Física', '648.525.555-55', '(54) 55555-55', 'Rua D', 'Sim', '', '2021-04-19', '', '', '', 'karol@hotmail.com'),
(7, 'Empresa BC', 'Jurídica', '55.415.555/5555-75', '(84) 55555-5555', 'Rua D', 'Sim', '', '2021-04-19', '', '', '', 'empresabc@hotmail.com'),
(8, 'Marlone Silva', 'Física', '548.555.444-55', '(64) 55555-5555', 'Rua D', 'Sim', '', '2021-04-19', '', '', '', 'marlone'),
(9, 'Paula Campos', 'Física', '458.555.555-55', '(45) 55555-5555', 'Rua A', 'Sim', 'Nenhuma', '2021-04-13', 'Banco do Brasil', '', '', 'paula@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `distribuidores`
--

CREATE TABLE `distribuidores` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distribuidores`
--

INSERT INTO `distribuidores` (`id`, `descricao`) VALUES
(1, 'Equatorial Maranhão'),
(2, 'Equatorial Pará'),
(3, 'Equatorial Alagoas'),
(4, 'Equatorial Piauí'),
(6, 'CEEE Equatorial');

-- --------------------------------------------------------

--
-- Table structure for table `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `pessoa` varchar(15) NOT NULL,
  `doc` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `ativo` varchar(5) NOT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `banco` varchar(40) DEFAULT NULL,
  `agencia` varchar(10) DEFAULT NULL,
  `conta` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `pessoa`, `doc`, `telefone`, `endereco`, `ativo`, `obs`, `data`, `banco`, `agencia`, `conta`, `email`) VALUES
(1, 'DAIMON ', 'Jurídica', '000.000.000-60', '', '', 'Sim', '', '2022-06-05', '', '', '', 'DAIMON @DAIMON .com'),
(2, 'AVSYSTEMGEO', 'Jurídica', '66.455.555/5555-55', '(15) 54555-5555', 'Rua 6', 'Sim', '', '2022-06-05', '', '', '', 'AVSYSTEMGEO@hotmail.com'),
(3, 'CESAR CENTRO DE ESTUDOS E SISTEMAS', 'Jurídica', '151.555.555-55', '(15) 45555-5555', 'Rua A', 'Sim', '', '2022-06-05', '', '', '', 'cesar@hotmail.com'),
(4, 'NEPEN', 'Jurídica', '', '', '', 'Sim', '', '2022-06-05', '', '', '', ''),
(5, 'INSTITUTO SAPIENTIA', 'Jurídica', '', '', '', 'Sim', '', '2022-06-05', '', '', '', ''),
(6, 'FUNDACAO CERTI', 'Jurídica', '45.555.555/555', '(48) 81222-2222', 'Rua DDDDD', 'Sim', 'Nenhuma', '2022-06-05', 'Caixa Econômica', '0554', '12222-6', 'fundacao@hotmail.com'),
(7, '3E Engenharia', 'Física', '', '', '', 'Sim', '', '2022-08-09', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `indicadores`
--

CREATE TABLE `indicadores` (
  `id` int(11) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `id_plataforma` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indicadores`
--

INSERT INTO `indicadores` (`id`, `descricao`, `valor`, `id_plataforma`) VALUES
(4, 'Alunos capacitados', '', 2),
(23, 'Famílias Impactadas', '', 6),
(24, 'Energia Economizada', '', 6),
(25, 'CO2 evitado', '', 6),
(26, 'Famílias Impactadas', '', 8),
(27, 'Energia Economizada', '', 8),
(28, 'CO2 evitado', '', 8),
(30, 'CO2 evitado', '', 9),
(31, 'Energia Economizada', '', 9),
(32, 'Árvores', '', 9),
(33, 'CO2 evitado', '', 10),
(35, 'Pessoas alcançadas', '', 5),
(36, 'Energia Economizada', '', 10),
(37, 'Água economizada', 'metros cúbicos', 9);

-- --------------------------------------------------------

--
-- Table structure for table `indicadores_controle`
--

CREATE TABLE `indicadores_controle` (
  `id` int(11) NOT NULL,
  `id_plataforma` int(1) DEFAULT NULL,
  `id_projeto` int(1) DEFAULT NULL,
  `id_indicador` int(1) DEFAULT NULL,
  `id_distribuidor` int(1) DEFAULT NULL,
  `id_fornecedor` int(1) DEFAULT NULL,
  `contrato` varchar(30) DEFAULT NULL,
  `jan_meta` int(10) DEFAULT NULL,
  `fev_meta` int(10) DEFAULT NULL,
  `mar_meta` int(10) DEFAULT NULL,
  `abr_meta` int(10) DEFAULT NULL,
  `mai_meta` int(10) DEFAULT NULL,
  `jun_meta` int(10) DEFAULT NULL,
  `jul_meta` int(10) DEFAULT NULL,
  `ago_meta` int(10) DEFAULT NULL,
  `set_meta` int(10) DEFAULT NULL,
  `out_meta` int(10) DEFAULT NULL,
  `nov_meta` int(10) DEFAULT NULL,
  `dez_meta` int(10) DEFAULT NULL,
  `jan_realizado` int(10) DEFAULT NULL,
  `fev_realizado` int(10) DEFAULT NULL,
  `mar_realizado` int(10) DEFAULT NULL,
  `abr_realizado` int(10) DEFAULT NULL,
  `mai_realizado` int(10) DEFAULT NULL,
  `jun_realizado` int(10) DEFAULT NULL,
  `jul_realizado` int(10) DEFAULT NULL,
  `ago_realizado` int(10) DEFAULT NULL,
  `set_realizado` int(10) DEFAULT NULL,
  `out_realizado` int(10) DEFAULT NULL,
  `nov_realizado` int(10) DEFAULT NULL,
  `dez_realizado` int(10) DEFAULT NULL,
  `ano` varchar(4) DEFAULT NULL,
  `valor` int(12) DEFAULT NULL,
  `usu_cadastro` varchar(100) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `usu_update` varchar(100) DEFAULT NULL,
  `data_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indicadores_controle`
--

INSERT INTO `indicadores_controle` (`id`, `id_plataforma`, `id_projeto`, `id_indicador`, `id_distribuidor`, `id_fornecedor`, `contrato`, `jan_meta`, `fev_meta`, `mar_meta`, `abr_meta`, `mai_meta`, `jun_meta`, `jul_meta`, `ago_meta`, `set_meta`, `out_meta`, `nov_meta`, `dez_meta`, `jan_realizado`, `fev_realizado`, `mar_realizado`, `abr_realizado`, `mai_realizado`, `jun_realizado`, `jul_realizado`, `ago_realizado`, `set_realizado`, `out_realizado`, `nov_realizado`, `dez_realizado`, `ano`, `valor`, `usu_cadastro`, `data_cadastro`, `usu_update`, `data_update`) VALUES
(56, 5, 12, 30, 1, 4, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022', NULL, NULL, NULL, NULL, NULL),
(58, 9, 1, 37, 3, 1, NULL, 100, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 150, 200, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indicadores_tipo`
--

CREATE TABLE `indicadores_tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indicadores_tipo`
--

INSERT INTO `indicadores_tipo` (`id`, `nome`) VALUES
(1, 'Indicador'),
(2, 'Meta');

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` int(1) NOT NULL,
  `descricao` varchar(300) DEFAULT NULL,
  `valor` int(1) DEFAULT NULL,
  `id_plataforma` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `descricao`, `valor`, `id_plataforma`) VALUES
(1, 'Quantidade de geladeiras', 0, 6),
(2, 'Quantidade de lâmpadas', 0, 8),
(3, 'Quantidade de Capacitações', 0, 2),
(4, 'Quantidade de Palestras', 0, 5),
(5, 'Toneladas', 0, 9),
(6, 'Quantidade de Projetos', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `niveis`
--

CREATE TABLE `niveis` (
  `id` int(11) NOT NULL,
  `nivel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `niveis`
--

INSERT INTO `niveis` (`id`, `nivel`) VALUES
(1, 'Administrador'),
(2, 'Comum');

-- --------------------------------------------------------

--
-- Table structure for table `plataformas`
--

CREATE TABLE `plataformas` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plataformas`
--

INSERT INTO `plataformas` (`id`, `nome`) VALUES
(2, 'E+ PROFISSIONAL'),
(5, 'E+ EDUCAÇÃO'),
(6, 'E+ GELADEIRA NOVA'),
(8, 'E+ TROCA DE LÂMPADAS'),
(9, 'E+ RECICLAGEM'),
(10, 'E+ ENERGIA DO BEM'),
(11, 'E+ LUZES NA CIDADE\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `estoque` int(11) NOT NULL,
  `valor_compra` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `ativo` varchar(5) NOT NULL,
  `lucro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `codigo`, `nome`, `descricao`, `estoque`, `valor_compra`, `valor_venda`, `fornecedor`, `categoria`, `foto`, `ativo`, `lucro`) VALUES
(6, '123', 'Bermuda Jeans', 'Bermuda xxxxxxxx', 0, '0.00', '69.99', 0, 2, '14-04-2021-13-19-01-bermuda.jpg', 'Sim', NULL),
(7, '12345', 'Sapato Social', 'Sapato Social de Couro', 14, '100.00', '150.00', 3, 1, '14-04-2021-13-19-18-cat-6.jpg', 'Sim', 50),
(10, '0236', 'Camisa Polo', 'Camisa Polo Diversos Tamanhos', 125, '25.00', '49.99', 1, 8, '14-04-2021-13-20-29-camisa-masc.jpg', 'Sim', NULL),
(11, '589222', 'Calça Masculina', 'Calça Masculina Jeans', 33, '120.00', '192.00', 3, 3, '14-04-2021-13-21-06-calca-masc.jpg', 'Sim', 60),
(12, '4586223', 'Camisa Feminina', 'Camisa Feminina ', 40, '89.99', '134.99', 3, 8, '14-04-2021-13-24-18-camisa-femin.jpg', 'Sim', 50),
(13, '58555', 'Regata Masculina', 'Camiseta Regata Masculina', 27, '5.00', '50.00', 1, 9, '14-04-2021-13-27-09-regata-masculina.jpg', 'Sim', NULL),
(14, '5855589', 'Regata Feminina', 'Camiseta Feminina', 33, '50.00', '75.00', 1, 9, '14-04-2021-13-28-27-regata-feminina.jpg', 'Sim', 50),
(15, '688955566', 'Sapato Feminino', 'Sapato', 112, '50.00', '210.00', 4, 1, '14-04-2021-13-29-25-sapato-feminino.jpg', 'Sim', 40);

-- --------------------------------------------------------

--
-- Table structure for table `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(300) DEFAULT NULL,
  `contrato` varchar(20) DEFAULT NULL,
  `id_tipo_projeto` int(1) DEFAULT NULL,
  `chamado` varchar(50) DEFAULT NULL,
  `observacao` varchar(300) DEFAULT NULL,
  `id_fornecedor` int(3) DEFAULT NULL,
  `id_distribuidor` int(3) DEFAULT NULL,
  `id_plataforma` int(1) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `valor_utilizado` decimal(10,2) DEFAULT NULL,
  `id_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projetos`
--

INSERT INTO `projetos` (`id`, `descricao`, `contrato`, `id_tipo_projeto`, `chamado`, `observacao`, `id_fornecedor`, `id_distribuidor`, `id_plataforma`, `data_inicio`, `data_final`, `valor_total`, `valor_utilizado`, `id_status`) VALUES
(1, 'Blockchain', '4600011197', 1, 'SUP0050645', 'Aditivo prorrogado para 31/05', 1, 3, 9, '2022-06-01', '2022-06-06', '1113100.00', '885405.00', 3),
(9, 'Blockchain', '4600011198', 1, 'SUP0050645', 'teste', 1, 3, 9, '2019-01-01', '2022-05-31', '1143105.08', '1103021.44', 1),
(10, 'Equatorial Pará', '4600011199', 1, 'SUP0050645', 'Teste', 1, 1, 11, '2022-06-20', '2022-06-30', '2000.00', '1500.00', 1),
(11, 'DES555', 'CONT5555', 3, 'CHA555', 'Teste de Dados', 5, 1, 2, '2022-08-01', '2022-08-29', '200.00', '100.00', 1),
(12, '77777', '77777', 1, '777777', 'Teste de Allisson Almeida', 4, 1, 5, '2022-08-10', '2022-08-25', '200.00', '100.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `projetos_tipo`
--

CREATE TABLE `projetos_tipo` (
  `id` int(1) NOT NULL,
  `descricao` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projetos_tipo`
--

INSERT INTO `projetos_tipo` (`id`, `descricao`) VALUES
(1, 'P&D'),
(2, 'PEE'),
(3, 'TD');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel`) VALUES
(1, 'ALLISSON JORGE SILVA ALMEIDA', 'allisson.almeida@equatorialenergia.com.br', '123', 'Administrador'),
(2, 'JANES VALDO RODRIGUES LIMA', 'janes.lima@equatorialenergia.com.br', '123', 'Administrador'),
(3, 'USUARIO TESTE', 'usuario.teste@equatorialenergia.com.br', '123', 'Administrador'),
(5, 'LUIS EMILIO SOUSA EUGENIO FIGUEIREDO', 'emilio.filho@equatorialenergia.com.br', '123', 'Administrador'),
(6, 'JULIO CESAR MENDES', 'julio.mendes@equatorialenergia.com.br', '123', 'Administrador'),
(7, 'DAYANE DE MATOS PEREIRA', 'dayane.pereira@equatorialenergia.com.br', '123', 'Administrador'),
(8, 'EDMILSON DE LIMA SANTOS', 'edmilson.santos@equatorialenergia.com.br', '123', 'Administrador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distribuidores`
--
ALTER TABLE `distribuidores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicadores`
--
ALTER TABLE `indicadores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicadores_controle`
--
ALTER TABLE `indicadores_controle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicadores_tipo`
--
ALTER TABLE `indicadores_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projetos_tipo`
--
ALTER TABLE `projetos_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distribuidores`
--
ALTER TABLE `distribuidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `indicadores`
--
ALTER TABLE `indicadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `indicadores_controle`
--
ALTER TABLE `indicadores_controle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `indicadores_tipo`
--
ALTER TABLE `indicadores_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `projetos_tipo`
--
ALTER TABLE `projetos_tipo`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;