
-- --------------------------------------------------------
-- 							DATABASE 
-- --------------------------------------------------------

CREATE DATABASE eventosasser_v2;
USE eventosasser_v2;

-- --------------------------------------------------------
-- 							TABELAS 
-- --------------------------------------------------------

CREATE TABLE `tipo_atividade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `semestre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `curso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `evento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_semestre` int ,
  `titulo_evento` varchar(500) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table `trabalho`(
	`id` int NOT NULL AUTO_INCREMENT,
    `titulo` varchar(2000) NOT NULL,
    `resumo` varchar(7000) NOT NULL,
    `palavras_chave` varchar(2000) NOT NULL,
    `status_r` char(1), 		-- o campo status tambem poderia ser uma tabela auxiliar, com todos os estados
    `comentarios` varchar(3000),
    `id_curso` int,
    `id_tipo_atividade` int,
    `id_evento` int,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`),
    FOREIGN KEY (`id_tipo_atividade`) REFERENCES `tipo_atividade` (`id`),
    FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `participante`(
	`id` int NOT NULL AUTO_INCREMENT,
    `nome` varchar(500) NOT NULL,
    `email` varchar(500) NOT NULL,
    `senha` varchar(500) NOT NULL,
    `ouvinte` bool,
    `autor_principal` bool,
    `co_autor` bool,
    `id_trabalho` int,
    `id_curso` int,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`),
    FOREIGN KEY (`id_trabalho`) REFERENCES `trabalho` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `palestrante`(
	`id` int NOT NULL AUTO_INCREMENT,
    `nome` varchar(500) NOT NULL,
    `autor_principal` bool,
    `co_autor` bool,
    `id_trabalho` int,
    `id_curso` int,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`),
    FOREIGN KEY (`id_trabalho`) REFERENCES `trabalho` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table `inscricao`(
	`id` int NOT NULL AUTO_INCREMENT,
    `data_inscricao` date,
    `pago` bool,
    `data_pagamento` date,
    `valor` double,
    `id_participante` int,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------
-- 							INSERTS 
-- --------------------------------------------------------
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE `eventosasser_v2`.`curso`;

INSERT INTO `eventosasser_v2`.`curso`(`id`, `nome`) VALUES (1,"BACHARELADO EM ARQUITETURA E URBANISMO");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("BACHARELADO EM ENGENHARIA DE PRODUÇÃO");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("BACHARELADO EM EDUCAÇÃO FÍSICA");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("BACHARELADO EM ADMINISTRAÇÃO");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("LICENCIATURA EM PEDAGOGIA");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("BACHARELADO EM ENGENHARIA CIVIL");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("BACHARELADO EM SISTEMAS DE INFORMAÇÃO");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("LICENCIATURA EM EDUCAÇÃO FÍSICA");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("BACHARELADO EM FISIOTERAPIA");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("BACHARELADO EM NUTRIÇÃO");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("BACHARELADO EM FARMÁCIA");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("TECNÓLOGO EM DESIGN DE INTERIORES");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("TECNÓLOGO EM GESTÃO FINANCEIRA");
INSERT INTO `eventosasser_v2`.`curso`(`nome`) VALUES ("TECNÓLOGO EM GESTÃO DA PRODUÇÃO INDUSTRIAL");

SET FOREIGN_KEY_CHECKS = 1;



INSERT INTO `eventosasser_v2`.`tipo_atividade` (`id`, `descricao`) VALUES (1, "PALESTRA");
INSERT INTO `eventosasser_v2`.`tipo_atividade` (`descricao`) VALUES ("RESUMO");
INSERT INTO `eventosasser_v2`.`tipo_atividade` (`descricao`) VALUES ("ARTIGO COMPLETO");
INSERT INTO `eventosasser_v2`.`tipo_atividade` (`descricao`) VALUES ("ARTIGO EXTENDIDO");
INSERT INTO `eventosasser_v2`.`tipo_atividade` (`descricao`) VALUES ("SEMINÁRIO");



