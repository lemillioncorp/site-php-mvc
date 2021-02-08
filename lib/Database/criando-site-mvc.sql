# Host: localhost  (Version 8.0.18)
# Date: 2021-02-07 16:16:46
# Generator: MySQL-Front 6.0  (Build 1.154)


#
# Structure for table "comentario"
#

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `mensagem` text,
  `id_postagem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "comentario"
#


#
# Structure for table "postagem"
#

DROP TABLE IF EXISTS `postagem`;
CREATE TABLE `postagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) DEFAULT NULL,
  `conteudo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "postagem"
#

