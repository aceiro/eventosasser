CREATE TABLE `eventosa_v1_Final_20170317`.`atividades` (
  `id` INT NOT NULL,
  `id_participante` INT NULL,
  `id_atividade_option` INT NULL,
  `active` INT NULL,
  PRIMARY KEY (`id`));
  
ALTER TABLE `eventosa_v1_Final_20170317`.`atividades` 
CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT ;
