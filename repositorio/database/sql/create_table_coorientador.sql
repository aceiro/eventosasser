--
--      basic create table
--
CREATE TABLE `co_orientador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
--
ALTER TABLE `trabalho`
ADD COLUMN `id_coorientador` INT(11) NULL DEFAULT NULL AFTER `id_tipo_atividade`;

--
--
ALTER TABLE `trabalho`
ADD CONSTRAINT `trabalho_ibfk_5` FOREIGN KEY (`id_coorientador`)
REFERENCES `co_orientador`(`id`);

--
--
INSERT INTO co_orientador (nome)
SELECT nome FROM orientador
WHERE nome is not null;
