-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.69-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema lojavirtual
--

CREATE DATABASE IF NOT EXISTS lojavirtual;
USE lojavirtual;

--
-- Definition of table `tbl_comentario`
--

DROP TABLE IF EXISTS `tbl_comentario`;
CREATE TABLE `tbl_comentario` (
  `id_comentario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comentario` varchar(45) NOT NULL,
  `id_produto` varchar(45) NOT NULL,
  `id_usuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comentario`
--

/*!40000 ALTER TABLE `tbl_comentario` DISABLE KEYS */;
INSERT INTO `tbl_comentario` (`id_comentario`,`comentario`,`id_produto`,`id_usuario`) VALUES 
 (3,'aaaaaaaa','11',NULL),
 (4,'aaa','11',NULL),
 (5,'aaa','11',NULL),
 (6,'aaa','11',NULL),
 (7,'aaa','11',NULL),
 (8,'aaa','11',NULL),
 (9,'aaa','11',NULL),
 (10,'aaa','11','.'),
 (11,'gostei','11','1'),
 (12,'mais um anonimo','11','.'),
 (13,'comentario de teste','11','1'),
 (14,'111111111111','11','2');
/*!40000 ALTER TABLE `tbl_comentario` ENABLE KEYS */;


--
-- Definition of table `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
CREATE TABLE `tbl_produto` (
  `id_produto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `foto` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `preco` varchar(45) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produto`
--

/*!40000 ALTER TABLE `tbl_produto` DISABLE KEYS */;
INSERT INTO `tbl_produto` (`id_produto`,`nome`,`foto`,`descricao`,`preco`) VALUES 
 (5,'CAPITÃ“LIO','0af2aca6c0011204dc5cefd18613d399.jpg','VIAGEM PARA O DIA 13/12','350'),
 (12,'ARRAIAL DO CABO','d977b71962df0a5a3b7647e377d7f3fe.jpg','Viagem para o dia 15/12/2020\r\n','500');
/*!40000 ALTER TABLE `tbl_produto` ENABLE KEYS */;


--
-- Definition of table `tbl_usuario_cliente`
--

DROP TABLE IF EXISTS `tbl_usuario_cliente`;
CREATE TABLE `tbl_usuario_cliente` (
  `id_usuario_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(855) NOT NULL,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`id_usuario_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usuario_cliente`
--

/*!40000 ALTER TABLE `tbl_usuario_cliente` DISABLE KEYS */;
INSERT INTO `tbl_usuario_cliente` (`id_usuario_cliente`,`nome`,`email`,`senha`,`tipo`) VALUES 
 (1,'teste','teste','$2y$10$0dj5l2HhjCvC2PIRxhDguOJt74Q3v4BS.1pfSYte.cd2KrFn/sj76','C'),
 (2,'1','1','$2y$10$tIDV7QT48e/4ky/u0iGTMe3P6otUdApetnj8.oa7KEg.4YvkO1v0S','C');
/*!40000 ALTER TABLE `tbl_usuario_cliente` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
