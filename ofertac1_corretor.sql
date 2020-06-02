-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 15/05/2020 às 02:53
-- Versão do servidor: 5.7.26
-- Versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ofertac1_corretor`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Marca 1'),
(3, 'Marca 2'),
(4, 'Marca 3'),
(5, 'Marca 4'),
(6, 'Marca 5');

-- --------------------------------------------------------

--
-- Estrutura para tabela `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name_catalog` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `catalog`
--

INSERT INTO `catalog` (`id`, `name_catalog`) VALUES
(1, 'Geral');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(4, 'Padrão'),
(5, 'Combinados'),
(6, 'Bebidas'),
(7, 'Hot Sushi'),
(8, 'Sobremesas'),
(9, 'Sashimis'),
(10, 'Sashimis Especiais'),
(11, 'Temakis'),
(12, 'Niguiris'),
(13, 'Niguiris Especiais'),
(14, 'Gunkan'),
(15, 'Uramakis Especiais'),
(16, 'Entradas'),
(17, 'Hossomakis'),
(18, 'Uramakis'),
(19, 'Entradas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias_plano`
--

CREATE TABLE `categorias_plano` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `categorias_plano`
--

INSERT INTO `categorias_plano` (`id`, `nome`) VALUES
(1, 'Saída'),
(2, 'Entrada'),
(3, 'Investimento');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `sub` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `categories`
--

INSERT INTO `categories` (`id`, `sub`, `name`) VALUES
(14, NULL, 'Despesas'),
(25, 14, 'Fixas'),
(26, 14, 'Variáveis'),
(27, 25, 'Luz'),
(28, 27, 'Loja');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cheques`
--

CREATE TABLE `cheques` (
  `id` int(11) NOT NULL,
  `id_conta_banco` varchar(50) DEFAULT NULL,
  `id_conta_numero` varchar(150) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `valor` varchar(20) DEFAULT NULL,
  `id_fornecedor` varchar(150) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `historico` varchar(500) DEFAULT NULL,
  `status_cheque` tinyint(1) DEFAULT '0',
  `data_baixa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cheques`
--

INSERT INTO `cheques` (`id`, `id_conta_banco`, `id_conta_numero`, `numero`, `valor`, `id_fornecedor`, `data_emissao`, `data_vencimento`, `historico`, `status_cheque`, `data_baixa`) VALUES
(57, '1                                        ', '1                                        ', 142536, '1.900,00', '1                                        ', '2020-10-10', '2020-12-10', '', 1, '2020-10-10'),
(58, '1                                        ', '1                                        ', 123456789, '1.234.567,89', '1                                        ', '2021-10-10', '2022-01-01', '', 1, '2020-10-10'),
(59, '2', '2', 21321, '3,21', '1', '2020-10-10', '4412-10-10', '', 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `data_nasc` varchar(10) DEFAULT NULL,
  `nome_pai` varchar(80) DEFAULT NULL,
  `nome_mae` varchar(80) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cidade` varchar(80) DEFAULT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero_end` varchar(10) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(80) NOT NULL,
  `telefone_fixo` varchar(14) DEFAULT NULL,
  `telefone_celular_1` varchar(15) NOT NULL,
  `telefone_celular_2` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `rg`, `data_nasc`, `nome_pai`, `nome_mae`, `cep`, `estado`, `cidade`, `endereco`, `numero_end`, `complemento`, `bairro`, `telefone_fixo`, `telefone_celular_1`, `telefone_celular_2`, `email`) VALUES
(40, 'Cristiano', '061.215.959-06', '4704007', '1987-11-17', 'Valter', 'Inês', '89870-000', 'SC', 'Pinhalzinho', 'Rua São Salvador', '2525', 'Sala 02', 'Centro', '', '(49) 99945-8874', '', ''),
(43, 'Volmir Eleandro Ceccon', '017.250.449-00', '', '', '', '', '89873-000', 'SC', 'Bom Jesus do Oeste', 'Rua Carolina', '420', '', 'Centro', '', '(49) 98416-7680', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `valortotal` float NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alterado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas`
--

CREATE TABLE `contas` (
  `id` int(11) NOT NULL,
  `banco` varchar(150) NOT NULL,
  `agencia` varchar(150) NOT NULL,
  `operacao` varchar(20) NOT NULL,
  `numero` varchar(150) NOT NULL,
  `status_conta` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `contas`
--

INSERT INTO `contas` (`id`, `banco`, `agencia`, `operacao`, `numero`, `status_conta`) VALUES
(1, 'Sicredi', '0230', '', '14584-8', 'Ativa'),
(2, 'Sicoob', '3036', '', '26475-0', 'Ativa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cores`
--

CREATE TABLE `cores` (
  `id` int(11) NOT NULL,
  `name` varchar(70) CHARACTER SET utf8 NOT NULL,
  `cod_exa` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cores`
--

INSERT INTO `cores` (`id`, `name`, `cod_exa`) VALUES
(1, 'Laranja', '#ea7409'),
(2, 'Vermelho', '#ed2f2f'),
(3, 'Azul', '#0049ff'),
(4, 'Amarelo', '#f2d90a'),
(5, 'Rosa', '#ff00f6'),
(6, 'Lilás', '#8b2fea'),
(7, 'Preto', '#000000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `coupon_type` int(11) NOT NULL,
  `coupon_value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `customer_address`
--

CREATE TABLE `customer_address` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL COMMENT 'Id do usuário',
  `status` varchar(10) NOT NULL,
  `priority` varchar(5) DEFAULT NULL,
  `recipient` varchar(300) NOT NULL COMMENT 'Destinatario',
  `name_address` varchar(300) NOT NULL COMMENT 'Nome do endereço',
  `cell_phone` varchar(50) NOT NULL COMMENT 'Celular',
  `address` varchar(300) NOT NULL COMMENT 'Endereço',
  `number` varchar(100) NOT NULL COMMENT 'Numero',
  `complement` varchar(200) NOT NULL COMMENT 'Complemento',
  `neighborhood` varchar(300) NOT NULL COMMENT 'Bairro',
  `postal_code` varchar(80) NOT NULL COMMENT 'Cep',
  `city` varchar(300) NOT NULL COMMENT 'Cidade',
  `uf` varchar(10) NOT NULL,
  `location_reference` mediumtext COMMENT 'Referência de localização'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `customer_address`
--

INSERT INTO `customer_address` (`id`, `id_user`, `status`, `priority`, `recipient`, `name_address`, `cell_phone`, `address`, `number`, `complement`, `neighborhood`, `postal_code`, `city`, `uf`, `location_reference`) VALUES
(3, 1, 'ATIVO', NULL, 'Diego Baron Gonzalez', 'Endereço de Pinhalzinho', '(49)99819-0834', 'Rua São Salvador', '2525', 'Sal 02', 'Centro', '89870000', 'PINHALZINHO', 'SC', ''),
(4, 1, 'INATIVO', NULL, 'Lorena Begnini', 'Endereço Modelo', '(49)99819-0834', 'Rua XV de Novembro', '774', 'Casa', 'Laranjeiras', '89872000', 'MODELO', 'SC', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `razaosocial` varchar(255) DEFAULT NULL,
  `fantasia` varchar(150) NOT NULL,
  `inscricao` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `celular` varchar(14) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id`, `cnpj`, `razaosocial`, `fantasia`, `inscricao`, `email`, `telefone`, `celular`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`) VALUES
(1, '00.000.000/0000-00', 'Daashi Sushi', 'Daashi Sushi', '123456987', 'daashi@ofertacobrasil.com.br', '(49) 99822-56', '(49) 99822-566', '898740000', 'R. José Bonifácio', '375', 'Sala', 'Centro', 'Maravilha', 'SC');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fluxo`
--

CREATE TABLE `fluxo` (
  `id` int(11) NOT NULL,
  `datalancamento` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `descricao` varchar(200) NOT NULL,
  `valorentrada` int(20) DEFAULT NULL,
  `valorsaida` int(20) DEFAULT NULL,
  `saldo` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `fluxo`
--

INSERT INTO `fluxo` (`id`, `datalancamento`, `descricao`, `valorentrada`, `valorsaida`, `saldo`) VALUES
(44, '2020-03-28 16:16:11', 'Teste', 10, NULL, 11),
(45, '2020-03-28 16:18:56', '2', 2, NULL, 4),
(46, '2020-03-28 16:19:39', '9', 9, NULL, NULL),
(47, '2020-03-28 16:21:51', 'Sdflkjç', 60, NULL, 40),
(48, '2020-03-28 16:22:20', '100', 50, NULL, 100),
(49, '2020-03-28 16:22:36', 'Po', 55, NULL, 55),
(50, '2020-03-28 16:22:45', 'Fdsasdf', 55, NULL, 120),
(51, '2020-03-28 17:25:08', 'Fsadfsd', 45454, NULL, 45454),
(52, '2020-03-28 17:27:44', 'Sadfsa', 1232, NULL, NULL),
(53, '2020-03-28 17:31:37', 'Asdf', 40, NULL, 42),
(54, '2020-03-28 17:38:37', 'Asdfas', 60, NULL, 10),
(55, '2020-03-28 17:39:06', 'Asdfasd', 20, NULL, 40),
(56, '2020-03-28 17:56:27', 'Fdasf', 123, NULL, 246),
(57, '2020-03-28 18:48:02', 'Teste', 100, NULL, 200),
(58, '2020-03-28 18:48:08', 'Teste', NULL, 200, -100),
(59, '2020-03-28 18:53:47', '100', 100, NULL, 100),
(60, '2020-03-28 18:59:40', 'EWGDF', 123, NULL, 123),
(61, '2020-03-28 18:59:54', 'ASDFSAD', 123, NULL, 123);

-- --------------------------------------------------------

--
-- Estrutura para tabela `formas_pagamentos`
--

CREATE TABLE `formas_pagamentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `formas_pagamentos`
--

INSERT INTO `formas_pagamentos` (`id`, `nome`) VALUES
(1, 'À Prazo'),
(2, 'À Vista');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `razaosocial` varchar(255) NOT NULL,
  `fantasia` varchar(150) NOT NULL,
  `inscricao` varchar(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `celular` varchar(14) DEFAULT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `cnpj`, `razaosocial`, `fantasia`, `inscricao`, `email`, `telefone`, `celular`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`) VALUES
(1, '28796453000195', 'Cristiano Rafael Ceccon Me', 'Digital Antenas', '252252252', 'digitalantenaspzo@gmail.com', '4998035086', '49999458874', '89870000', 'Rua São Salvador', '2525', 'Sala 02', 'Centro', 'Pinhalzinho', 'SC'),
(3, '16.577.358/0001-11', 'Cristiano Rafael Ceccon Mei', 'Atualizar Informática', '', 'email@email.com', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `nome_pai` varchar(80) DEFAULT NULL,
  `nome_mae` varchar(80) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `estado` char(2) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero_end` varchar(10) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(80) NOT NULL,
  `telefone_fixo` varchar(14) DEFAULT NULL,
  `telefone_celular_1` varchar(15) NOT NULL,
  `telefone_celular_2` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `rg`, `data_nasc`, `nome_pai`, `nome_mae`, `cep`, `estado`, `cidade`, `endereco`, `numero_end`, `complemento`, `bairro`, `telefone_fixo`, `telefone_celular_1`, `telefone_celular_2`, `email`) VALUES
(1, 'Tiago Paulus', '123.132.132-13', '465465465', '1231-11-01', 'Fhsdkajhflkj', 'Fjhsdkjfhkjh', '13515-135', 'SC', 'Pinhalzinho', 'FLKSJAFÇLKJA', '3543654', 'HJSDAFJHKAJ', 'KJFSAHLKDJF', '(16) 4646-4646', '(44) 64646-4646', '(64) 54352-1325', 'Email@email.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL,
  `id_cliente` varchar(100) DEFAULT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `id_categoria` varchar(100) DEFAULT NULL,
  `descricao` varchar(21000) DEFAULT NULL,
  `exclusividade` varchar(11) DEFAULT NULL,
  `valor` varchar(50) DEFAULT NULL,
  `porcentagem` varchar(100) DEFAULT NULL,
  `data_inicial` date DEFAULT NULL,
  `data_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `id_cliente`, `matricula`, `id_categoria`, `descricao`, `exclusividade`, `valor`, `porcentagem`, `data_inicial`, `data_final`) VALUES
(4, NULL, '456', '4', NULL, 'sdf', '6.546.546.54', '6', '2020-10-10', '2020-12-10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `items_group`
--

CREATE TABLE `items_group` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `items_group`
--

INSERT INTO `items_group` (`id`, `name`) VALUES
(1, 'Categorias'),
(2, 'Produtos'),
(3, 'Marcas'),
(4, 'Kit'),
(5, 'Permissões'),
(6, 'Páginas'),
(7, 'Slides'),
(8, 'Pedidos'),
(9, 'Usuários'),
(10, 'Relatórios'),
(11, 'Dashboard');

-- --------------------------------------------------------

--
-- Estrutura para tabela `kits`
--

CREATE TABLE `kits` (
  `id` int(11) NOT NULL,
  `reference` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `url` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `amount` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8 NOT NULL,
  `catalog` int(11) NOT NULL,
  `rating` float NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `sale` tinyint(1) NOT NULL,
  `bestseller` tinyint(1) NOT NULL,
  `new_kit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `kits`
--

INSERT INTO `kits` (`id`, `reference`, `name`, `url`, `amount`, `status`, `description`, `catalog`, `rating`, `featured`, `sale`, `bestseller`, `new_kit`) VALUES
(1, '005622', 'Kit Bebê - Arthur Vinícius 11pç', '', 0, 1, '', 0, 0, 0, 0, 0, 0),
(2, '005615', 'Kit Bebê - Maria Antônia 11pç', '', 0, 1, '', 0, 0, 0, 0, 0, 0),
(3, '0056156', 'Teste', '', 0, 1, '', 0, 0, 0, 0, 0, 0),
(4, '0056154', 'Teste 2', '', 0, 1, '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `kit_products`
--

CREATE TABLE `kit_products` (
  `id` int(11) NOT NULL,
  `id_kit` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'Cristiano Ceccon', 'cristiano', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `options`
--

INSERT INTO `options` (`id`, `name`) VALUES
(1, 'Tamanho'),
(2, 'Cor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordens`
--

CREATE TABLE `ordens` (
  `id` int(11) NOT NULL,
  `id_cliente` varchar(150) DEFAULT NULL,
  `id_endereco` varchar(150) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `data_execucao` date DEFAULT NULL,
  `hora_execucao` time DEFAULT NULL,
  `data_fechamento` date DEFAULT NULL,
  `hora_fechamento` time DEFAULT NULL,
  `valor` varchar(15) DEFAULT NULL,
  `status_orden` varchar(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `ordens`
--

INSERT INTO `ordens` (`id`, `id_cliente`, `id_endereco`, `descricao`, `data_execucao`, `hora_execucao`, `data_fechamento`, `hora_fechamento`, `valor`, `status_orden`) VALUES
(31, '38                                        ', NULL, NULL, NULL, NULL, '2020-04-25', '10:10:00', '59,80', '1'),
(32, '40                                        ', NULL, NULL, NULL, NULL, '2020-04-21', '10:20:00', '3,21', '1'),
(33, '39                                        ', NULL, NULL, NULL, NULL, '2020-04-21', '10:20:00', '321.321,32', '1'),
(34, '40                                        ', NULL, NULL, NULL, NULL, '1200-11-10', '11:11:00', '321,32', '1'),
(35, '41                                        ', NULL, NULL, NULL, NULL, '2020-10-10', '12:12:00', '1.234,56', '1'),
(36, '38                                        ', NULL, NULL, NULL, NULL, '2020-12-12', '12:21:00', '213,21', '1'),
(37, '39', NULL, '\'21321', '2020-12-12', '12:01:00', NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `date_transaction` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Histoórico de pedidos';

--
-- Despejando dados para a tabela `order_history`
--

INSERT INTO `order_history` (`id`, `id_purchase`, `payment_status`, `date_transaction`) VALUES
(11, 9, 2, '2019-11-01'),
(10, 9, 1, '2019-11-01'),
(8, 7, 6, '2019-10-31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tag_panel` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `order_status`
--

INSERT INTO `order_status` (`id`, `code`, `name`, `tag_panel`) VALUES
(1, 1, 'Aguardando pagamento', '<i class=\"fa fa-fw fa-usd\"></i>'),
(5, 6, 'Reprovado', '<i class=\"fa fa-fw fa-thumbs-o-down\"></i>'),
(3, 3, 'Pagamento aprovado', '<i class=\"fa fa-fw fa-thumbs-o-up\"></i>'),
(4, 5, 'Em disputa', '<i class=\"fa fa-fw fa-thumbs-o-down\"></i>'),
(6, 7, 'Cancelado', '<i class=\"fa fa-fw fa-thumbs-o-down\"></i>'),
(7, 8, 'Debitado', '<i class=\"fa fa-fw fa-thumbs-o-down\"></i>'),
(8, 9, 'Retenção temporaria', '<i class=\"fa fa-fw fa-thumbs-o-down\"></i>'),
(9, 100, 'Em produção', '<i class=\"fa fa-fw fa-cogs\"></i>'),
(10, 101, 'Pronto para entrega', '<i class=\"fa fa-fw fa-thumbs-o-up\"></i>'),
(11, 102, 'Pedido enviado', '<i class=\"fa fa-fw fa-send-o\"></i>'),
(12, 103, 'Pedido entregue', '<i class=\"fa fa-fw fa-thumbs-o-up\"></i>');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `valor_total` float DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alterado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `venc_parc` date DEFAULT NULL,
  `forma_pagamento_id` int(11) NOT NULL,
  `plano_id` int(11) NOT NULL,
  `qtd_parc` int(11) DEFAULT NULL,
  `tipo_pagamento_id` int(11) NOT NULL,
  `valor_entrada` float DEFAULT NULL,
  `valor_parcela` float DEFAULT NULL,
  `id_status_pedido` int(11) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `user_id`, `valor_total`, `criado_em`, `alterado_em`, `venc_parc`, `forma_pagamento_id`, `plano_id`, `qtd_parc`, `tipo_pagamento_id`, `valor_entrada`, `valor_parcela`, `id_status_pedido`, `ativo`) VALUES
(27, 39, 75.05, '2020-05-07 01:58:23', '2020-05-07 02:44:13', NULL, 1, 3, 1, 3, 0, 0, 1, 1),
(28, 39, 108.28, '2020-05-07 02:23:13', '2020-05-07 02:43:32', NULL, 2, 3, 1, 1, 0, 0, 1, 1),
(29, 39, 75.05, '2020-05-07 02:48:26', '2020-05-07 02:49:14', NULL, 1, 3, 1, 3, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`) VALUES
(1, 'Super Administrador'),
(2, 'Administrador'),
(3, 'Gerente'),
(5, 'Vendedor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `permission_items`
--

CREATE TABLE `permission_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `id_items_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `permission_items`
--

INSERT INTO `permission_items` (`id`, `name`, `slug`, `id_items_group`) VALUES
(1, 'Categorias', 'ver_categorias', 1),
(2, 'Produtos', 'ver_produtos', 2),
(3, 'Marcas', 'ver_marcas', 3),
(4, 'Kits', 'ver_kit', 4),
(5, 'Permissões', 'ver_permissoes', 5),
(6, 'Páginas', 'ver_paginas', 6),
(7, 'Slide', 'ver_slide', 7),
(8, 'Pedidos', 'ver_pedidos', 8),
(9, 'Usuários', 'ver_usuarios', 9),
(10, 'Adicionar Usuários', 'add_usuarios', 9),
(11, 'Editar Usuários', 'editar_usuarios', 9),
(12, 'Gerenciar Pedidos', 'gerenciar_pedidos', 8),
(13, 'Alterar status do pedido', 'alterar_status_pedido', 8),
(14, '	Relatórios', 'ver_relatorios', 10),
(15, 'Relatório de Pedidos', 'relatorio_pedidos', 10),
(16, 'Ver entradas', 'ver_entradas', 10),
(17, 'Ver Fluxo Entradas', 'ver_fluxoentradas', 3),
(18, 'Ver Clientes', 'ver_clientes', 1),
(19, 'Ver fornecedores', 'ver_fornecedores', 1),
(20, 'Ver empresa', 'ver_empresa', 1),
(21, 'Ver funcionários', 'ver_funcionarios', 1),
(22, 'Ver pedidos', 'ver_pedidos', 1),
(23, 'Plano de Contas', 'ver_planodecontas', 1),
(24, 'Ver compras', 'ver_compras', 1),
(25, 'Ver financeiro', 'ver_financeiro', 1),
(26, 'Ver ordens', 'ver_ordens', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `permission_links`
--

CREATE TABLE `permission_links` (
  `id` int(11) NOT NULL,
  `id_permission_group` int(11) NOT NULL,
  `id_permission_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `permission_links`
--

INSERT INTO `permission_links` (`id`, `id_permission_group`, `id_permission_item`) VALUES
(412, 1, 1),
(413, 1, 18),
(414, 1, 19),
(415, 1, 20),
(416, 1, 21),
(417, 1, 22),
(418, 1, 23),
(419, 1, 24),
(420, 1, 25),
(421, 1, 26),
(422, 1, 2),
(423, 1, 3),
(424, 1, 4),
(425, 1, 5),
(426, 1, 6),
(427, 1, 7),
(428, 1, 8),
(429, 1, 12),
(430, 1, 13),
(431, 1, 9),
(432, 1, 10),
(433, 1, 11),
(434, 1, 14),
(435, 1, 15),
(440, 5, 18),
(441, 5, 22),
(442, 5, 26);

-- --------------------------------------------------------

--
-- Estrutura para tabela `planodecontas`
--

CREATE TABLE `planodecontas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria_plano_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `planodecontas`
--

INSERT INTO `planodecontas` (`id`, `nome`, `categoria_plano_id`) VALUES
(2, 'Despesas Variáveis - Impostos', 1),
(3, 'Despesas Variáveis - Mercadorias', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos`
--

CREATE TABLE `planos` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_grupo_principal` int(11) DEFAULT NULL,
  `id_grupo_secundario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `planos`
--

INSERT INTO `planos` (`id`, `nome`, `id_categoria`, `id_grupo_principal`, `id_grupo_secundario`) VALUES
(3, 'Padrão', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `planoscategoria`
--

CREATE TABLE `planoscategoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `planoscategoria`
--

INSERT INTO `planoscategoria` (`id`, `nome`) VALUES
(1, 'Entradas'),
(2, 'Saídas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planosgrupoprincipal`
--

CREATE TABLE `planosgrupoprincipal` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `planosgrupoprincipal`
--

INSERT INTO `planosgrupoprincipal` (`id`, `nome`) VALUES
(1, 'Recebimento');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planosgruposecundario`
--

CREATE TABLE `planosgruposecundario` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `planosgruposecundario`
--

INSERT INTO `planosgruposecundario` (`id`, `nome`) VALUES
(1, 'Á vista'),
(2, 'Á prazo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_kit` int(11) DEFAULT NULL,
  `reference` varchar(150) DEFAULT NULL,
  `catalog` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `description` text,
  `stock` int(11) NOT NULL,
  `price_sale` float(20,2) NOT NULL COMMENT 'Preço de venda',
  `price_promotion` float(20,2) DEFAULT NULL COMMENT 'Preço de promoção',
  `price_cost` float(20,2) NOT NULL COMMENT 'Preço de custo',
  `rating` float NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `sale` tinyint(1) NOT NULL,
  `bestseller` tinyint(1) NOT NULL,
  `new_product` tinyint(1) NOT NULL,
  `options` varchar(200) DEFAULT NULL,
  `cores` varchar(100) DEFAULT NULL,
  `weight` float NOT NULL COMMENT 'Peso',
  `width` float NOT NULL COMMENT 'Largura',
  `height` float NOT NULL COMMENT 'Altura',
  `length` float NOT NULL COMMENT 'Comprimento',
  `diameter` float NOT NULL COMMENT 'Diametro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `id_category`, `id_brand`, `id_kit`, `reference`, `catalog`, `name`, `description`, `stock`, `price_sale`, `price_promotion`, `price_cost`, `rating`, `featured`, `sale`, `bestseller`, `new_product`, `options`, `cores`, `weight`, `width`, `height`, `length`, `diameter`) VALUES
(9, 7, 1, 0, '001', 1, 'Caneca Personalizada 001', '<p>Frase ..... Frase....</p>', 10, 30.00, 0.00, 15.00, 0, 1, 1, 1, 1, '', '2,7', 0.3, 10, 10, 10, 10),
(10, 7, 1, 0, '002', 1, 'Caneca 02', '<p>Teste de caneca</p>', 20, 2.00, 0.00, 1.00, 0, 0, 0, 0, 0, '', '3', 10, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `products_colors`
--

CREATE TABLE `products_colors` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `value` varchar(70) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `products_colors`
--

INSERT INTO `products_colors` (`id`, `id_product`, `id_color`, `value`) VALUES
(16, 1, 1, 'Laranja'),
(17, 1, 5, 'Rosa'),
(20, 2, 5, 'Rosa'),
(61, 5, 2, 'Vermelho'),
(62, 5, 5, 'Rosa'),
(69, 5, 2, 'Vermelho'),
(70, 5, 5, 'Rosa'),
(71, 2, 5, 'Rosa'),
(73, 2, 5, 'Rosa'),
(74, 1, 1, 'Laranja'),
(75, 1, 2, 'Vermelho'),
(76, 1, 3, 'Azul'),
(77, 1, 4, 'Amarelo'),
(78, 1, 5, 'Rosa'),
(79, 1, 6, 'Lilás'),
(80, 1, 7, 'Preto'),
(81, 6, 1, 'Laranja'),
(82, 7, 1, 'Laranja'),
(83, 9, 2, 'Vermelho'),
(84, 9, 7, 'Preto'),
(85, 10, 3, 'Azul');

-- --------------------------------------------------------

--
-- Estrutura para tabela `products_images`
--

CREATE TABLE `products_images` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `url` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `products_images`
--

INSERT INTO `products_images` (`id`, `id_product`, `url`) VALUES
(18, 9, '3793c8cc0ab1f0930cb9d42b20f80893.jpg'),
(19, 10, '120dc38588984fdf61fad42178699dc3.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `products_options`
--

CREATE TABLE `products_options` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_option` int(11) NOT NULL,
  `p_value` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `products_options`
--

INSERT INTO `products_options` (`id`, `id_product`, `id_option`, `p_value`) VALUES
(31, 1, 1, ' '),
(32, 1, 2, 'Rosa'),
(33, 2, 1, '0,35cm x 0,35cm'),
(34, 2, 2, 'Branco'),
(37, 2, 1, '0,35cm x 0,35cm'),
(38, 2, 2, 'Branco'),
(41, 2, 1, '0,50 X0,070 cm'),
(42, 2, 2, 'Rosa'),
(43, 1, 2, 'Rosa'),
(44, 6, 1, '454'),
(45, 6, 2, 'asdfsd'),
(46, 7, 1, 'hikjhg'),
(47, 7, 2, 'ghjhg'),
(48, 8, 1, '544'),
(49, 8, 2, 'SFSADF');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `id_categoria` int(100) NOT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `custo` double DEFAULT NULL,
  `venda` double DEFAULT NULL,
  `estoque` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `id_categoria`, `descricao`, `quantidade`, `custo`, `venda`, `estoque`) VALUES
(57, 'Pizza Salgada grande', 5, 'Massa, Queijo e outros', NULL, 6.06, 65.55, NULL),
(58, 'Feijão', 12, '123', NULL, 60, 33.23, 5),
(59, 'Abacate', 10, '', NULL, 6, 9.5, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos_pedidos`
--

CREATE TABLE `produtos_pedidos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `produtos_pedidos`
--

INSERT INTO `produtos_pedidos` (`id`, `pedido_id`, `produto_id`, `qtd`, `valor`) VALUES
(27, 8, 53, 1, 3),
(28, 8, 54, 1, 50),
(29, 0, 54, 1, 50),
(30, 0, 54, 1, 50),
(31, 0, 54, 1, 50),
(32, 0, 54, 1, 50),
(33, 0, 54, 1, 50),
(34, 0, 54, 1, 50),
(35, 0, 54, 1, 50),
(36, 0, 54, 1, 50),
(37, 0, 54, 1, 50),
(38, 9, 53, 1, 3),
(39, 10, 53, 3, 3),
(40, 11, 54, 1, 50),
(41, 12, 53, 1, 3),
(42, 12, 54, 1, 50),
(43, 13, 53, 1, 3),
(44, 13, 57, 1, 65.55),
(45, 13, 58, 1, 33.23),
(46, 14, 57, 1, 65.55),
(47, 15, 59, 1, 9.5),
(48, 16, 59, 1, 9.5),
(49, 17, 59, 1, 9.5),
(50, 18, 58, 1, 33.23),
(51, 19, 59, 1, 9.5),
(52, 20, 59, 1, 9.5),
(53, 21, 57, 1, 65.55),
(54, 22, 59, 1, 9.5),
(55, 23, 58, 1, 33.23),
(56, 24, 59, 1, 9.5),
(57, 25, 57, 1, 65.55),
(58, 26, 58, 1, 33.23),
(59, 26, 57, 1, 65.55),
(60, 27, 57, 1, 65.55),
(61, 27, 59, 1, 9.5),
(62, 28, 57, 1, 65.55),
(63, 28, 58, 1, 33.23),
(64, 28, 59, 1, 9.5),
(65, 29, 57, 1, 65.55),
(66, 29, 59, 1, 9.5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_coupon` int(11) DEFAULT NULL,
  `id_address` int(11) DEFAULT NULL,
  `total_amount` float NOT NULL,
  `total_salesman` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `payment_type` varchar(150) DEFAULT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_link` text,
  `shipping_method` varchar(100) NOT NULL,
  `shipping_price` float DEFAULT NULL,
  `installments` int(11) DEFAULT NULL,
  `date_added` date NOT NULL,
  `obs` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `purchases`
--

INSERT INTO `purchases` (`id`, `id_user`, `id_coupon`, `id_address`, `total_amount`, `total_salesman`, `discount`, `payment_type`, `payment_status`, `payment_link`, `shipping_method`, `shipping_price`, `installments`, `date_added`, `obs`) VALUES
(7, 1, NULL, NULL, 44.31, NULL, NULL, '0', 6, NULL, 'Correios PAC', NULL, NULL, '2019-10-31', NULL),
(9, 1, NULL, NULL, 44.31, NULL, NULL, '0', 2, NULL, 'Correios PAC', NULL, NULL, '2019-11-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `purchases_products`
--

CREATE TABLE `purchases_products` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_kit` int(11) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `price_salesman` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `purchases_products`
--

INSERT INTO `purchases_products` (`id`, `id_purchase`, `id_product`, `id_kit`, `id_color`, `quantity`, `product_price`, `price_salesman`) VALUES
(7, 7, 5, NULL, 2, 1, 20, NULL),
(9, 9, 5, NULL, 2, 1, 20, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `purchase_transactions`
--

CREATE TABLE `purchase_transactions` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `amount` float NOT NULL,
  `transaction_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rates`
--

CREATE TABLE `rates` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `name_user` varchar(150) NOT NULL,
  `date_rated` datetime NOT NULL,
  `points` int(11) NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `rates`
--

INSERT INTO `rates` (`id`, `id_user`, `id_product`, `name_user`, `date_rated`, `points`, `comment`) VALUES
(1, NULL, 5, 'Usuário teste', '2019-11-04 10:28:26', 5, 'Produto muito bom, recomendo!'),
(2, NULL, 5, 'Usuário teste 2', '2019-11-04 10:40:41', 4, 'Produto ótimo!');

-- --------------------------------------------------------

--
-- Estrutura para tabela `seller_payment`
--

CREATE TABLE `seller_payment` (
  `id` int(11) NOT NULL,
  `id_payment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `installments` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `seller_payment_types`
--

CREATE TABLE `seller_payment_types` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `seller_payment_types`
--

INSERT INTO `seller_payment_types` (`id`, `payment_type`) VALUES
(1, 'Cartão de crédito'),
(2, 'Boleto'),
(3, 'Cheque');

-- --------------------------------------------------------

--
-- Estrutura para tabela `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` int(11) NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `recipient` varchar(300) NOT NULL COMMENT 'Destinatario',
  `name_address` varchar(300) NOT NULL COMMENT 'Nome do endereço',
  `cell_phone` varchar(50) NOT NULL COMMENT 'Celular',
  `address` varchar(300) NOT NULL COMMENT 'Endereço',
  `number` varchar(100) NOT NULL COMMENT 'Numero',
  `complement` varchar(200) NOT NULL COMMENT 'Complemento',
  `neighborhood` varchar(300) NOT NULL COMMENT 'Bairro',
  `postal_code` varchar(80) NOT NULL COMMENT 'Cep',
  `city` varchar(300) NOT NULL COMMENT 'Cidade',
  `uf` varchar(10) NOT NULL,
  `location_reference` mediumtext COMMENT 'Referência de localização'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL DEFAULT '0',
  `url` varchar(50) CHARACTER SET utf8 NOT NULL,
  `link` varchar(150) CHARACTER SET utf8 NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `locality` int(11) NOT NULL COMMENT '1 = Página Inicial Topo, 2 = Pagina Inicial Rodape, 3 = Pagina Categorias'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `sliders`
--

INSERT INTO `sliders` (`id`, `id_category`, `url`, `link`, `status`, `locality`) VALUES
(35, 0, '5afa3854484f6491eb9f7e42b2c572aa.png', '', 'ATIVO', 1),
(36, 0, 'b06776bd89bca720f0d2f067a4ae8dad.png', '', 'ATIVO', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_pedido`
--

CREATE TABLE `status_pedido` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `status_pedido`
--

INSERT INTO `status_pedido` (`id`, `nome`) VALUES
(1, 'Aberto'),
(2, 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipos_pagamentos`
--

CREATE TABLE `tipos_pagamentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `meio_pagamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tipos_pagamentos`
--

INSERT INTO `tipos_pagamentos` (`id`, `nome`, `meio_pagamento_id`) VALUES
(1, 'Dinheiro', 2),
(3, 'Cartão de crédito', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `token_users`
--

CREATE TABLE `token_users` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL,
  `person_type` varchar(15) DEFAULT NULL,
  `register` varchar(60) NOT NULL COMMENT 'Cpf ou cnpj',
  `corporate_name` varchar(250) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL COMMENT '	se for 1 é um usuário do painel administrativo, se for 2 é um usuario do site',
  `salesman` varchar(5) NOT NULL COMMENT '	verifica se o usuario é vendedor ou não',
  `data_nasc` date NOT NULL,
  `token` varchar(32) DEFAULT NULL,
  `id_permission` int(11) NOT NULL,
  `catalog` int(20) NOT NULL COMMENT 'Se for 1000 usuario tem acesso a todos os catalogos',
  `notices` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `status`, `email`, `password`, `name`, `person_type`, `register`, `corporate_name`, `admin`, `salesman`, `data_nasc`, `token`, `id_permission`, `catalog`, `notices`) VALUES
(3, 'ATIVO', 'contato@ofertacobrasil.com.br', '72aae65d62c92be38021a1db636270be', 'Cristiano Rafael Ceccon', 'FÍSICA', '123456789', '', 2, 'NAO', '1987-11-17', 'a61f1eb36af11db332f6043e689aeb09', 999, 1000, 'NAO'),
(4, 'ATIVO', 'daashi@ofertacobrasil.com.br', 'e10adc3949ba59abbe56e057f20f883e', 'Daounda Niang', 'FÍSICA', '87004577015', NULL, 1, 'SIM', '1992-03-12', 'f863b500eaf2c90a8af266018f411138', 1, 1000, 'NAO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `senha` int(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES
(1, 'cristiano', 123);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_venda` datetime NOT NULL,
  `preco_total` float NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas_produtos`
--

CREATE TABLE `vendas_produtos` (
  `id` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `preco_venda` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categorias_plano`
--
ALTER TABLE `categorias_plano`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cheques`
--
ALTER TABLE `cheques`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fluxo`
--
ALTER TABLE `fluxo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `items_group`
--
ALTER TABLE `items_group`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `kits`
--
ALTER TABLE `kits`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `kit_products`
--
ALTER TABLE `kit_products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ordens`
--
ALTER TABLE `ordens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `permission_items`
--
ALTER TABLE `permission_items`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `permission_links`
--
ALTER TABLE `permission_links`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `planodecontas`
--
ALTER TABLE `planodecontas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `planoscategoria`
--
ALTER TABLE `planoscategoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `planosgrupoprincipal`
--
ALTER TABLE `planosgrupoprincipal`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `planosgruposecundario`
--
ALTER TABLE `planosgruposecundario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `products_colors`
--
ALTER TABLE `products_colors`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `products_options`
--
ALTER TABLE `products_options`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`,`nome`);

--
-- Índices de tabela `produtos_pedidos`
--
ALTER TABLE `produtos_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `purchases_products`
--
ALTER TABLE `purchases_products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `purchase_transactions`
--
ALTER TABLE `purchase_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `seller_payment`
--
ALTER TABLE `seller_payment`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `seller_payment_types`
--
ALTER TABLE `seller_payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `status_pedido`
--
ALTER TABLE `status_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tipos_pagamentos`
--
ALTER TABLE `tipos_pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `token_users`
--
ALTER TABLE `token_users`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas_produtos`
--
ALTER TABLE `vendas_produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `categorias_plano`
--
ALTER TABLE `categorias_plano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `cheques`
--
ALTER TABLE `cheques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cores`
--
ALTER TABLE `cores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fluxo`
--
ALTER TABLE `fluxo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `items_group`
--
ALTER TABLE `items_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `kits`
--
ALTER TABLE `kits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `kit_products`
--
ALTER TABLE `kit_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ordens`
--
ALTER TABLE `ordens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `permission_items`
--
ALTER TABLE `permission_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `permission_links`
--
ALTER TABLE `permission_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT de tabela `planodecontas`
--
ALTER TABLE `planodecontas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `planoscategoria`
--
ALTER TABLE `planoscategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `planosgrupoprincipal`
--
ALTER TABLE `planosgrupoprincipal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `planosgruposecundario`
--
ALTER TABLE `planosgruposecundario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `products_colors`
--
ALTER TABLE `products_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `products_options`
--
ALTER TABLE `products_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `produtos_pedidos`
--
ALTER TABLE `produtos_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de tabela `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `purchases_products`
--
ALTER TABLE `purchases_products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `purchase_transactions`
--
ALTER TABLE `purchase_transactions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `seller_payment`
--
ALTER TABLE `seller_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `seller_payment_types`
--
ALTER TABLE `seller_payment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `status_pedido`
--
ALTER TABLE `status_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipos_pagamentos`
--
ALTER TABLE `tipos_pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `token_users`
--
ALTER TABLE `token_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendas_produtos`
--
ALTER TABLE `vendas_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
