CREATE DATABASE  IF NOT EXISTS `libreria` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `libreria`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: libreria
-- ------------------------------------------------------
-- Server version	5.7.10-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administradores`
--

DROP TABLE IF EXISTS `administradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administradores` (
  `email` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administradores`
--

LOCK TABLES `administradores` WRITE;
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` VALUES ('eli-g@gmail.com','eli','1234');
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `ApellidoP` varchar(45) NOT NULL,
  `ApellidoM` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAutor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'Pearl','S.','Buck'),(2,'Ana','Frank',' '),(3,'Oscar','Wilde',' '),(4,'John','Boyne',' '),(5,'Franz','Kafka',' '),(6,'Paula','Hawkins',' '),(7,'Mario','Benedetti',' ');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idGenero`,`Nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Romance'),(2,'Novela'),(3,'Drama'),(4,'Filosofía');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial`
--

DROP TABLE IF EXISTS `historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial` (
  `Usuarios_email` varchar(100) NOT NULL,
  `Libros_ISBN` varchar(15) NOT NULL,
  `Libros_idAutor` int(11) NOT NULL,
  `Libros_idGenero` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  PRIMARY KEY (`Usuarios_email`,`Libros_ISBN`,`Libros_idAutor`,`Libros_idGenero`),
  KEY `fk_Usuarios_has_Libros_Libros1_idx` (`Libros_ISBN`,`Libros_idAutor`,`Libros_idGenero`),
  KEY `fk_Usuarios_has_Libros_Usuarios1_idx` (`Usuarios_email`),
  CONSTRAINT `fk_Usuarios_has_Libros_Libros1` FOREIGN KEY (`Libros_ISBN`, `Libros_idAutor`, `Libros_idGenero`) REFERENCES `libros` (`ISBN`, `idAutor`, `idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuarios_has_Libros_Usuarios1` FOREIGN KEY (`Usuarios_email`) REFERENCES `usuarios` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial`
--

LOCK TABLES `historial` WRITE;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` VALUES ('eli@eli.com','001-10-01090',5,4,'2018-07-10 00:00:00'),('eli@eli.com','006-16-01090',3,2,'2018-07-11 00:00:00'),('eli@eli.com','111-10-01090',7,1,'2018-07-11 00:00:00'),('eli@eli.com','111111',1,1,'2018-07-07 00:00:00'),('eli@eli.com','222222',1,1,'2018-07-07 00:00:00'),('eutimio@gmail.com','001-10-01090',5,4,'2018-07-11 00:00:00'),('eutimio@gmail.com','006-16-01090',3,2,'2018-07-11 00:00:00'),('eutimio@gmail.com','111111',1,1,'2018-07-07 00:00:00'),('eutimio@gmail.com','222222',1,1,'2018-07-07 00:00:00'),('eutimio@gmail.com','956-16-01090',3,2,'2018-07-11 00:00:00'),('gm@gmail.com','111111',1,1,'2018-07-07 00:00:00'),('gm@gmail.com','222222',1,1,'2018-07-07 00:00:00'),('paco@paco.com','001-10-01090',5,4,'2018-07-11 00:00:00'),('paco@paco.com','111-10-01090',7,1,'2018-07-11 00:00:00'),('paco@paco.com','111111',1,1,'2018-07-11 00:00:00');
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros`
--

DROP TABLE IF EXISTS `libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libros` (
  `ISBN` varchar(15) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `idioma` varchar(45) NOT NULL,
  `anio` varchar(45) NOT NULL,
  `Editorial` varchar(45) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `idGenero` int(11) NOT NULL,
  `Link` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  PRIMARY KEY (`ISBN`,`idAutor`,`idGenero`),
  KEY `fk_Libros_Autor_idx` (`idAutor`),
  KEY `fk_Libros_Genero1_idx` (`idGenero`),
  CONSTRAINT `fk_Libros_Autor` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Libros_Genero1` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros`
--

LOCK TABLES `libros` WRITE;
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
INSERT INTO `libros` VALUES ('001-10-01090','La condena','Español','1913','Alianza editorial',5,4,'../pdf/Franz Kafka - La Condena.pdf','../img/LaCondena.jpg'),('006-16-01090','El retrato de Dorian Grey','Español','1890','Austral',3,2,'../pdf/ElRetratoDeDorianGrey.pdf','../img/retratoDorian.jpg'),('111-10-01090','La tregua','Español','1959','SUDAMERICANA',7,1,'../pdf/LaTregua.pdf','../img/la-tregua.jpg'),('111111','peonia','Español','2004','DEBOLSILLO',1,1,'../pdf/peonia.pdf','../img/peonia.jpg'),('222222','viento del Este, viento del Oeste','Español','2005','DEBOLSILLO',1,1,'../pdf/viento.pdf','../img/viento.jpg'),('956-16-01087','El diario de Ana Frank','Español','1984','Pehuén',2,2,'../pdf/ElDiarioDeAnaFrank.pdf','../img/diario.jpg'),('956-16-01090','El fantasma de Canterville','Español','1940','Salamandra',3,2,'../pdf/ElFantasmaDeCanterville.pdf','../img/Fantasma.jpg'),('956-16-11111','La metamorfosis','Español','1920','Alianza editorial',5,4,'../pdf/La metamorfosis.pdf','../img/metamorfosis.jpg'),('956-16-22222','La chica del tren','Español','2015','Planeta',6,3,'../pdf/La_chica_del_tren.pdf','../img/chicaTren.jpg'),('978-84-9838-079','El niño con la pijama de rayas','Español','2006','Salamandra',4,3,'../pdf/ElNiñoConElPijamaDeRayas.pdf','../img/PijamaRayas.jpg');
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `email` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('eli@eli.com','Eli :D','root'),('eli@eli1.com','Eli :v','jkjk'),('elif@gmail.com','Elif Paniagua','1234'),('eutimio@gmail.com','Eutimio Hnz','1234'),('g@gmail.com','Gato','123'),('gm@gmail.com','Gilberto Macorra','1234'),('ibr@gmail.com','Ibrahim  Francisco Paniagua','1234'),('joaquina@gmail.com','Joaquina Guzman','1234'),('juanp@gmail.com','Juan Parra','1234'),('julia@gmail.com','Julia del Corral','1234'),('marcela@gmail.com','Marce M.','1234'),('nuevo@gmail.com','Nuevo','1234'),('paco@paco.com','Paco','root'),('petronila@gmail.com','Petronila Ilina','1234'),('rufis@gmail.com','Rufina Estela','1234'),('u2@gmail.com','usuario2','1010');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'libreria'
--

--
-- Dumping routines for database 'libreria'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-12 17:09:50
