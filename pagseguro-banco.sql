# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.23)
# Database: loja
# Generation Time: 2015-07-17 02:12:25 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tb_categorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_categorias`;

CREATE TABLE `tb_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_categorias_nome` varchar(85) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tb_categorias` WRITE;
/*!40000 ALTER TABLE `tb_categorias` DISABLE KEYS */;

INSERT INTO `tb_categorias` (`id`, `tb_categorias_nome`)
VALUES
	(20,'Framework'),
	(21,'Micro Framework'),
	(22,'Javascript'),
	(23,'PHP');

/*!40000 ALTER TABLE `tb_categorias` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_pedidos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_pedidos`;

CREATE TABLE `tb_pedidos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tb_pedidos_cliente` int(11) DEFAULT NULL,
  `tb_pedidos_id_pagseguro` varchar(150) DEFAULT NULL,
  `tb_pedidos_data` date DEFAULT NULL,
  `tb_pedidos_total` int(11) DEFAULT NULL,
  `tb_pedidos_frete` decimal(10,2) DEFAULT NULL,
  `tb_pedidos_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tb_pedidos_produto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_pedidos_produto`;

CREATE TABLE `tb_pedidos_produto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tb_pedidos_produto_cliente` int(11) DEFAULT NULL,
  `tb_pedidos_produto_id_pagseguro` varchar(150) DEFAULT NULL,
  `tb_pedidos_produto_quantidade` int(11) DEFAULT NULL,
  `tb_pedidos_produto_subtotal` decimal(10,2) DEFAULT NULL,
  `tb_pedidos_produto_id` int(11) DEFAULT NULL,
  `tb_pedidos_produto_data` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tb_produtos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_produtos`;

CREATE TABLE `tb_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_produtos_nome` varchar(100) DEFAULT '',
  `tb_produtos_subcategoria` int(11) DEFAULT NULL,
  `tb_produtos_preco` double(10,2) DEFAULT NULL,
  `tb_produtos_destaque` char(3) DEFAULT '',
  `tb_produtos_foto` varchar(100) DEFAULT '',
  `tb_produtos_slug` varchar(100) DEFAULT '',
  `tb_produtos_descricao` text,
  `tb_produtos_peso` double(10,2) DEFAULT NULL,
  `tb_produtos_estoque` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tb_produtos` WRITE;
/*!40000 ALTER TABLE `tb_produtos` DISABLE KEYS */;

INSERT INTO `tb_produtos` (`id`, `tb_produtos_nome`, `tb_produtos_subcategoria`, `tb_produtos_preco`, `tb_produtos_destaque`, `tb_produtos_foto`, `tb_produtos_slug`, `tb_produtos_descricao`, `tb_produtos_peso`, `tb_produtos_estoque`)
VALUES
	(1,'Curso de Codeigniter',1,69.90,'sim','codeigniter.png','curso-codeigniter','Bem vindo ao curso de codeigniter, aqui voce ira aprender codeigniter de verdade.',0.50,1),
	(2,'Curso de PHPOO',1,100.00,'sim','phpoo.png','curso-phpoo','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas sit amet quam non luctus. Nulla facilisi. Vestibulum quis pretium metus, quis egestas est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas et velit sed ante vehicula vehicula. Nullam aliquam non tortor sit amet luctus. Proin felis lacus, scelerisque vel tempus at, vestibulum quis nunc. Praesent eget hendrerit turpis. Cras et tellus quam. Cras ornare iaculis feugiat. In lobortis scelerisque bibendum. Nam cursus tellus justo, sit amet fringilla enim scelerisque eu. Morbi imperdiet congue aliquet. In posuere odio non volutpat viverra. Proin sollicitudin aliquet tempor.',0.50,5),
	(3,'Curso de MVC',3,150.00,'nao','mvc.png','curso-mvc','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas sit amet quam non luctus. Nulla facilisi. Vestibulum quis pretium metus, quis egestas est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas et velit sed ante vehicula vehicula. Nullam aliquam non tortor sit amet luctus. Proin felis lacus, scelerisque vel tempus at, vestibulum quis nunc. Praesent eget hendrerit turpis. Cras et tellus quam. Cras ornare iaculis feugiat. In lobortis scelerisque bibendum. Nam cursus tellus justo, sit amet fringilla enim scelerisque eu. Morbi imperdiet congue aliquet. In posuere odio non volutpat viverra. Proin sollicitudin aliquet tempor.',0.50,4),
	(4,'Curso de Slim',3,98.00,'sim','slim.png','curso-slim','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas sit amet quam non luctus. Nulla facilisi. Vestibulum quis pretium metus, quis egestas est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas et velit sed ante vehicula vehicula. Nullam aliquam non tortor sit amet luctus. Proin felis lacus, scelerisque vel tempus at, vestibulum quis nunc. Praesent eget hendrerit turpis. Cras et tellus quam. Cras ornare iaculis feugiat. In lobortis scelerisque bibendum. Nam cursus tellus justo, sit amet fringilla enim scelerisque eu. Morbi imperdiet congue aliquet. In posuere odio non volutpat viverra. Proin sollicitudin aliquet tempor.',0.50,3),
	(5,'Curso de Javascript',5,95.00,'nao','javascript.png','curso-javascript','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas sit amet quam non luctus. Nulla facilisi. Vestibulum quis pretium metus, quis egestas est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas et velit sed ante vehicula vehicula. Nullam aliquam non tortor sit amet luctus. Proin felis lacus, scelerisque vel tempus at, vestibulum quis nunc. Praesent eget hendrerit turpis. Cras et tellus quam. Cras ornare iaculis feugiat. In lobortis scelerisque bibendum. Nam cursus tellus justo, sit amet fringilla enim scelerisque eu. Morbi imperdiet congue aliquet. In posuere odio non volutpat viverra. Proin sollicitudin aliquet tempor.',0.50,0),
	(6,'Curso de Laravel',5,200.00,'sim','laravel.png','curso-laravel','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas sit amet quam non luctus. Nulla facilisi. Vestibulum quis pretium metus, quis egestas est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas et velit sed ante vehicula vehicula. Nullam aliquam non tortor sit amet luctus. Proin felis lacus, scelerisque vel tempus at, vestibulum quis nunc. Praesent eget hendrerit turpis. Cras et tellus quam. Cras ornare iaculis feugiat. In lobortis scelerisque bibendum. Nam cursus tellus justo, sit amet fringilla enim scelerisque eu. Morbi imperdiet congue aliquet. In posuere odio non volutpat viverra. Proin sollicitudin aliquet tempor.',0.50,17);

/*!40000 ALTER TABLE `tb_produtos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_subcategorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_subcategorias`;

CREATE TABLE `tb_subcategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_subcategorias_nome` varchar(85) DEFAULT NULL,
  `tb_subcategorias_categoria` int(11) DEFAULT NULL,
  `tb_subcategorias_slug` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tb_subcategorias` WRITE;
/*!40000 ALTER TABLE `tb_subcategorias` DISABLE KEYS */;

INSERT INTO `tb_subcategorias` (`id`, `tb_subcategorias_nome`, `tb_subcategorias_categoria`, `tb_subcategorias_slug`)
VALUES
	(1,'Laravel',20,'laravel'),
	(2,'Codeingiter',20,'codeigniter'),
	(3,'Slim',21,'slim'),
	(4,'Javascript',22,'javascript'),
	(7,'PHP OO',23,'phpoo');

/*!40000 ALTER TABLE `tb_subcategorias` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_visitas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_visitas`;

CREATE TABLE `tb_visitas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tb_visitas` int(11) DEFAULT NULL,
  `tb_visitas_produto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
