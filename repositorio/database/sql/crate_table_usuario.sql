CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `id_tipoatividade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`nome`, `senha`) VALUES ('professor',  'professor#asser2016');
INSERT INTO `usuario` (`nome`, `senha`) VALUES ('secretaria', 'secretaria#asser2016');

