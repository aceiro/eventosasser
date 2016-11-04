
USE eventosa_v1;  

--
-- Tabela tipoatividade 
CREATE TABLE `tipoatividade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `eventosa_v1`.`tipoatividade` (`id`, `descricao`) VALUES (1, "PROFESSOR AVALIADOR");
INSERT INTO `eventosa_v1`.`tipoatividade` (`descricao`) VALUES ("SECRETARIA");
INSERT INTO `eventosa_v1`.`tipoatividade` (`descricao`) VALUES ("ADMINISTRATIVO");


--
-- Tabela usuario 
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `id_tipoatividade` int,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_tipoatividade`) REFERENCES `tipoatividade` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `eventosa_v1`.`usuario` (`id`, `nome`, `senha`, `id_tipoatividade`) VALUES (1, "PROFESSOR", "12345", 1);
INSERT INTO `eventosa_v1`.`usuario` (`id`, `nome`, `senha`, `id_tipoatividade`) VALUES (2, "SECRETARIA", "12345", 2);
INSERT INTO `eventosa_v1`.`usuario` (`id`, `nome`, `senha`, `id_tipoatividade`) VALUES (3, "ADM", "12345", 3);