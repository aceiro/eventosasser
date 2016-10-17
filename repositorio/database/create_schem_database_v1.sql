
-- --------------------------------------------------------
-- 							DATABASE 
-- --------------------------------------------------------
DROP DATABASE eventosasser_v2;
CREATE DATABASE eventosasser_v2;
USE eventosasser_v2;

-- --------------------------------------------------------
-- 							TABELAS 
-- --------------------------------------------------------

CREATE TABLE `tipoatividade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `eventosasser_v2`.`tipoatividade` (`id`, `descricao`) VALUES (1, "PALESTRA");
INSERT INTO `eventosasser_v2`.`tipoatividade` (`descricao`) VALUES ("RESUMO");
INSERT INTO `eventosasser_v2`.`tipoatividade` (`descricao`) VALUES ("ARTIGO COMPLETO");
INSERT INTO `eventosasser_v2`.`tipoatividade` (`descricao`) VALUES ("ARTIGO EXTENDIDO");
INSERT INTO `eventosasser_v2`.`tipoatividade` (`descricao`) VALUES ("SEMINÁRIO");


CREATE TABLE `semestre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `eventosasser_v2`.`semestre` (`id`, `descricao`) VALUES (1, "PRIMEIRO SEMESTRE");
INSERT INTO `eventosasser_v2`.`semestre` (`descricao`) VALUES ("SEGUNDO SEMESTRE");


CREATE TABLE `curso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `eventosasser_v2`.`curso`(`id`, `nome`) VALUES (1, "BACHARELADO EM ARQUITETURA E URBANISMO");
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


CREATE TABLE `evento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_semestre` int ,
  `titulo_evento` varchar(500) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `eventosasser_v2`.`evento` (`id`, `id_semestre`, `titulo_evento`, `data_inicio`, `data_fim`) VALUES (1, 2, 'Mostra de iniciação científica e conhecimento','2016-10-24', '2016-11-25');


create table `trabalho`(
	`id` int NOT NULL AUTO_INCREMENT,
    `titulo` varchar(2000) NOT NULL,
    `resumo` varchar(7000) NOT NULL,
    `palavras_chave` varchar(2000) NOT NULL,
    `status_r` char(1), 		-- o campo status tambem poderia ser uma tabela auxiliar, com todos os estados
    `comentarios` varchar(3000),
    `id_curso` int,
    `id_tipoatividade` int,
    `id_evento` int,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`),
    FOREIGN KEY (`id_tipoatividade`) REFERENCES `tipoatividade` (`id`),
    FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `participante`(
	`id` int NOT NULL AUTO_INCREMENT,
    `nome` varchar(500) NOT NULL,
    `email` varchar(500) NOT NULL,
    `senha` varchar(500) NOT NULL,
    `id_curso` int,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `participantextrabalho`(
	`id` int NOT NULL AUTO_INCREMENT,
    `id_participante` int,
    `id_trabalho` int,
    `ouvinte` bool,
    `autor_principal` bool,
    `co_autor` bool,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_trabalho`) REFERENCES `trabalho` (`id`),
    FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id`)
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

