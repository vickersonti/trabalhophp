-- Apagar a database caso ela exista
DROP DATABASE IF EXISTS `loja`;

-- Cria a database
CREATE DATABASE `loja` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Usa (Inicia) a Database
USE `loja`;

CREATE TABLE `cliente` (
  `id`          int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `dtNascimento` date,
  `nome`        varchar(255) NOT NULL,
  `email`       varchar(255) NOT NULL,
  `telefone`    varchar(255) NOT NULL,
  `cpf`         varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `vendedor` (
  `id`          int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `dtCriacao`   TIMESTAMP,
  `login`       varchar(255) NOT NULL,
  `senha`       varchar(255) NOT NULL,
  `matricula`       int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



