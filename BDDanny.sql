CREATE DATABASE  IF NOT EXISTS `examen_1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `examen_1`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: examen_1
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_cliente` varchar(35) NOT NULL,
  `id_usuario_ci` int NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `id_usuario_ci` (`id_usuario_ci`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_usuario_ci`) REFERENCES `usuario` (`id_usuario_ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES ('cliente_2',2145784),('cliente_3',9876543),('cliente_1',9908645);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta_bancaria`
--

DROP TABLE IF EXISTS `cuenta_bancaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuenta_bancaria` (
  `id_cuenta_bancaria` varchar(35) NOT NULL,
  `id_cliente` varchar(35) NOT NULL,
  `tipo` varchar(35) NOT NULL,
  `saldo` double NOT NULL,
  PRIMARY KEY (`id_cuenta_bancaria`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `cuenta_bancaria_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta_bancaria`
--

LOCK TABLES `cuenta_bancaria` WRITE;
/*!40000 ALTER TABLE `cuenta_bancaria` DISABLE KEYS */;
INSERT INTO `cuenta_bancaria` VALUES ('cuenta_1','cliente_1','Cuenta de ahorros',2400.54),('cuenta_2','cliente_1','Cuenta corriente',1500),('cuenta_3','cliente_2','Cuenta de inversión',45200),('cuenta_4','cliente_3','Cuenta de ahorros',350.25),('cuenta_5','cliente_3','Cuenta corriente',18000);
/*!40000 ALTER TABLE `cuenta_bancaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamento` (
  `id_departamento` varchar(35) NOT NULL,
  `id_director_bancario` varchar(35) NOT NULL,
  `tipo` varchar(35) NOT NULL,
  `monto` double NOT NULL,
  PRIMARY KEY (`id_departamento`),
  KEY `id_director_bancario` (`id_director_bancario`),
  CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`id_director_bancario`) REFERENCES `director_bancario` (`id_director_bancario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES ('dpto_1','dirBanc_1','Departamento de Operaciones',54000.54),('dpto_2','dirBanc_1','Departamento de Crédito y Préstamos',7000050),('dpto_3','dirBanc_2','Departamento de Crédito y Préstamos',50000);
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `director_bancario`
--

DROP TABLE IF EXISTS `director_bancario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `director_bancario` (
  `id_director_bancario` varchar(35) NOT NULL,
  `id_usuario_ci` int NOT NULL,
  PRIMARY KEY (`id_director_bancario`),
  KEY `id_usuario_ci` (`id_usuario_ci`),
  CONSTRAINT `director_bancario_ibfk_1` FOREIGN KEY (`id_usuario_ci`) REFERENCES `usuario` (`id_usuario_ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `director_bancario`
--

LOCK TABLES `director_bancario` WRITE;
/*!40000 ALTER TABLE `director_bancario` DISABLE KEYS */;
INSERT INTO `director_bancario` VALUES ('dirBanc_1',1234567),('dirBanc_2',7778889);
/*!40000 ALTER TABLE `director_bancario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario_ci` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido_pat` varchar(45) DEFAULT NULL,
  `apellido_mat` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario_ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1234567,'María','González','Pérez','1990-12-15','123456'),(2145784,'Armandño','Paredes','Feliz','2002-01-08','123456'),(7778889,'Pedro','Santana','García','1995-09-28','123456'),(9876543,'Ana','López','Ramírez','2000-03-10','123456'),(9908645,'Yeferzon','Gutierritos','Feliz','1998-05-04','123456');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'examen_1'
--

--
-- Dumping routines for database 'examen_1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-06  1:22:53
