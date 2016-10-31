
-- --------------------------------------------------------
-- 							DATABASE 
-- --------------------------------------------------------
USE eventosa_v1;

-- --------------------------------------------------------
-- 							TABELAS 
-- --------------------------------------------------------

CREATE TABLE `tipoatividade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `eventosa_v1`.`tipoatividade` (`id`, `descricao`) VALUES (1, "PALESTRA");
INSERT INTO `eventosa_v1`.`tipoatividade` (`descricao`) VALUES ("RESUMO");
INSERT INTO `eventosa_v1`.`tipoatividade` (`descricao`) VALUES ("ARTIGO COMPLETO");
INSERT INTO `eventosa_v1`.`tipoatividade` (`descricao`) VALUES ("ARTIGO EXTENDIDO");
INSERT INTO `eventosa_v1`.`tipoatividade` (`descricao`) VALUES ("SEMINÁRIO");


CREATE TABLE `semestre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `eventosa_v1`.`semestre` (`id`, `descricao`) VALUES (1, "PRIMEIRO SEMESTRE");
INSERT INTO `eventosa_v1`.`semestre` (`descricao`) VALUES ("SEGUNDO SEMESTRE");


CREATE TABLE `curso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `eventosa_v1`.`curso`(`id`, `nome`) VALUES (1, "BACHARELADO EM ARQUITETURA E URBANISMO");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("BACHARELADO EM ENGENHARIA DE PRODUÇÃO");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("BACHARELADO EM EDUCAÇÃO FÍSICA");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("BACHARELADO EM ADMINISTRAÇÃO");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("LICENCIATURA EM PEDAGOGIA");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("BACHARELADO EM ENGENHARIA CIVIL");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("BACHARELADO EM SISTEMAS DE INFORMAÇÃO");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("LICENCIATURA EM EDUCAÇÃO FÍSICA");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("BACHARELADO EM FISIOTERAPIA");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("BACHARELADO EM NUTRIÇÃO");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("BACHARELADO EM FARMÁCIA");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("TECNÓLOGO EM DESIGN DE INTERIORES");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("TECNÓLOGO EM GESTÃO FINANCEIRA");
INSERT INTO `eventosa_v1`.`curso`(`nome`) VALUES ("TECNÓLOGO EM GESTÃO DA PRODUÇÃO INDUSTRIAL");


CREATE TABLE `evento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_semestre` int ,
  `titulo_evento` varchar(500) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `eventosa_v1`.`evento` (`id`, `id_semestre`, `titulo_evento`, `data_inicio`, `data_fim`) VALUES (1, 2, 'Mostra de iniciação científica e conhecimento','2016-10-24', '2016-11-25');


create table `trabalho`(
	`id` int NOT NULL AUTO_INCREMENT,
    `titulo` varchar(2000) NOT NULL,
    `resumo` varchar(7000) NOT NULL,
    `palavras_chave` varchar(2000) NOT NULL,
    `status_r` char(1), 		-- o campo status tambem poderia ser uma tabela auxiliar, com todos os estados
    `comentarios` varchar(3000),
     `status_atualizacao` varchar(1),
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

ALTER TABLE `eventosa_v1`.`participante` 
ADD UNIQUE INDEX `email_UNIQUE` (`email` ASC),
ADD UNIQUE INDEX `id_UNIQUE` (`id` ASC);


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


CREATE TABLE `log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(5000) NOT NULL,
  `id_participante` int,
  `email` varchar(5000),
  `data_log` date,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tabela de Orientador 


CREATE TABLE `titulacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricacao` varchar(50) NOT NULL,
  `abreviacao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `eventosa_v1`.`titulacao` (`id`, `descricacao`, `abreviacao`) VALUES ('1', 'Especialista', 'Esp.');
INSERT INTO `eventosa_v1`.`titulacao` (`id`, `descricacao`, `abreviacao`) VALUES ('2', 'Mestre', 'Ms.');
INSERT INTO `eventosa_v1`.`titulacao` (`id`, `descricacao`, `abreviacao`) VALUES ('3', 'Mestra', 'Ma.');
INSERT INTO `eventosa_v1`.`titulacao` (`id`, `descricacao`, `abreviacao`) VALUES ('4', 'Doutor', 'Dr.');
INSERT INTO `eventosa_v1`.`titulacao` (`id`, `descricacao`, `abreviacao`) VALUES ('5', 'Doutora', 'Dra.');

CREATE TABLE `orientador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) NOT NULL,
  `id_titulacao` int,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_titulacao`) REFERENCES `titulacao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `eventosa_v1`.`trabalho` 
ADD COLUMN `id_orientador` INT(11) NULL DEFAULT NULL AFTER `id_evento`,
ADD INDEX `trabalho_ibfk_4_idx` (`id_orientador` ASC);
ALTER TABLE `eventosa_v1`.`trabalho` 
ADD CONSTRAINT `trabalho_ibfk_4`
  FOREIGN KEY (`id_orientador`)
  REFERENCES `eventosa_v1`.`orientador` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  

