SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-03:00";

CREATE DATABASE IF NOT EXISTS PodraoShrek CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE PodraoShrek;

CREATE TABLE `cidades` (
  `cod_cidade` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `clientes` (
  `cod_cliente` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100),
  `numero` varchar(10),
  `bairro` varchar(50),
  `cod_cidade` int(11),
  `celular` varchar(15),
  FOREIGN KEY (`cod_cidade`) REFERENCES `cidades`(`cod_cidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `fornecedores` (
  `cod_fornecedor` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome_social` varchar(100) NOT NULL,
  `celular` varchar(15)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `ingredientes` (
  `cod_ingrediente` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao` varchar(100),
  `quantidade_estoque` int(11) DEFAULT 0,
  `valor_unitario` decimal(10,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `compras` (
  `cod_compra` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `data` date,
  `valor_total` decimal(10,2) DEFAULT 0,
  `cod_fornecedor` int(11),
  FOREIGN KEY (`cod_fornecedor`) REFERENCES `fornecedores`(`cod_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `itens_compra` (
  `cod_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cod_ingrediente` int(11),
  `cod_compra` int(11),
  `quantidade` int(11),
  `valor_unitario` decimal(10,2),
  FOREIGN KEY (`cod_ingrediente`) REFERENCES `ingredientes`(`cod_ingrediente`),
  FOREIGN KEY (`cod_compra`) REFERENCES `compras`(`cod_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pratos` (
  `cod_prato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `taxa_prato` decimal(10,2) DEFAULT 0,
  `descricao` varchar(100),
  `valor_unitario` decimal(10,2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `composicao` (
  `cod_prato` int(11) NOT NULL,
  `cod_ingrediente` int(11) NOT NULL,
  PRIMARY KEY (`cod_prato`, `cod_ingrediente`),
  FOREIGN KEY (`cod_prato`) REFERENCES `pratos`(`cod_prato`),
  FOREIGN KEY (`cod_ingrediente`) REFERENCES `ingredientes`(`cod_ingrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pedidos` (
  `cod_pedido` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `datahora` datetime,
  `cod_cliente` int(11),
  `tipo_pedido` smallint(6) NOT NULL,
  `encerrado` tinyint(1) DEFAULT 0,
  `valor_pago` decimal(10,2) DEFAULT 0,
  FOREIGN KEY (`cod_cliente`) REFERENCES `clientes`(`cod_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `itens_pedido` (
  `cod_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cod_pedido` int(11),
  `cod_prato` int(11),
  `quantidade` int(11),
  `valor_unitario` decimal(10,2),
  `data_hora` datetime,
  FOREIGN KEY (`cod_pedido`) REFERENCES `pedidos`(`cod_pedido`),
  FOREIGN KEY (`cod_prato`) REFERENCES `pratos`(`cod_prato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cidades`(`nome`, `uf`) VALUES("Adamantina", "SP"),("Dracena", "SP");

INSERT INTO `fornecedores`(`nome_social`, `celular`) VALUES ("Jorge", "(18)XXXX-XXXX"),("Mario", "(18)XXXX-XXXX");

INSERT INTO `clientes`
            (`nome`, `endereco`, `numero`, `bairro`, `cod_cidade`, `celular`)
            VALUES ("Victor","RuaSeilá",2,"Centro","1","(18)XXXX-XXXX"),
                    ("Maria","RuaSeilá",3,"Centro","2","(18)XXXX-XXXX");

INSERT INTO `ingredientes` (`descricao`, `valor_unitario`)
             values ("Tomate","3"),
                    ("Queijo","2"),
                    ("Carne","20"),
                    ("Alface","3,50"),
                    ("Pão","13");



COMMIT;