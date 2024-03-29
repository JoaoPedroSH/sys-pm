-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: db_pm
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `armas_gto`
--

DROP TABLE IF EXISTS `armas_gto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `armas_gto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  `marca` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `modelo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `n_serie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `patrimonio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `localizacao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `situacao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cautela` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `data_inspecao` varchar(255) NOT NULL,
  `obs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `armas_gto`
--

LOCK TABLES `armas_gto` WRITE;
/*!40000 ALTER TABLE `armas_gto` DISABLE KEYS */;
/*!40000 ALTER TABLE `armas_gto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `armas_ord`
--

DROP TABLE IF EXISTS `armas_ord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `armas_ord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  `marca` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `modelo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `n_serie` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `patrimonio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `localizacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `situacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `cautela` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `data_inspecao` varchar(255) NOT NULL,
  `obs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=369 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `armas_ord`
--

LOCK TABLES `armas_ord` WRITE;
/*!40000 ALTER TABLE `armas_ord` DISABLE KEYS */;
/*!40000 ALTER TABLE `armas_ord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cautela_do_epi`
--

DROP TABLE IF EXISTS `cautela_do_epi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cautela_do_epi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_geracao` varchar(255) NOT NULL,
  `oficial` varchar(255) NOT NULL,
  `documento` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cautela_do_epi`
--

LOCK TABLES `cautela_do_epi` WRITE;
/*!40000 ALTER TABLE `cautela_do_epi` DISABLE KEYS */;
/*!40000 ALTER TABLE `cautela_do_epi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equip_gto`
--

DROP TABLE IF EXISTS `equip_gto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equip_gto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` text,
  `marca` text,
  `modelo` text,
  `n_serie` text,
  `patrimonio` text,
  `localizacao` text,
  `situacao` text,
  `cautela` text,
  `validade` text,
  `nivel` text,
  `tamanho` text,
  `fabricacao` text,
  `obs` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equip_gto`
--

LOCK TABLES `equip_gto` WRITE;
/*!40000 ALTER TABLE `equip_gto` DISABLE KEYS */;
/*!40000 ALTER TABLE `equip_gto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equip_ord`
--

DROP TABLE IF EXISTS `equip_ord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equip_ord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` text,
  `marca` text,
  `modelo` text,
  `n_serie` text,
  `patrimonio` text,
  `localizacao` text,
  `situacao` text,
  `cautela` text,
  `validade` text,
  `nivel` text,
  `tamanho` text,
  `fabricacao` text,
  `obs` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equip_ord`
--

LOCK TABLES `equip_ord` WRITE;
/*!40000 ALTER TABLE `equip_ord` DISABLE KEYS */;
/*!40000 ALTER TABLE `equip_ord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_acesso`
--

DROP TABLE IF EXISTS `historico_acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historico_acesso` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo_user` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_entrada` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hora_entrada` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hora_saida` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_acesso`
--

LOCK TABLES `historico_acesso` WRITE;
/*!40000 ALTER TABLE `historico_acesso` DISABLE KEYS */;
INSERT INTO `historico_acesso` VALUES (197,'teste','adm','13/04/2023','03:37:07','');
/*!40000 ALTER TABLE `historico_acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historico_armas`
--

DROP TABLE IF EXISTS `historico_armas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historico_armas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_serie` varchar(255) NOT NULL,
  `cautela` varchar(255) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `data_atual` varchar(255) NOT NULL,
  `tipo_inventario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_armas`
--

LOCK TABLES `historico_armas` WRITE;
/*!40000 ALTER TABLE `historico_armas` DISABLE KEYS */;
/*!40000 ALTER TABLE `historico_armas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municao_gto`
--

DROP TABLE IF EXISTS `municao_gto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municao_gto` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `validade` varchar(200) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `obs` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `tipo` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=armscii8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municao_gto`
--

LOCK TABLES `municao_gto` WRITE;
/*!40000 ALTER TABLE `municao_gto` DISABLE KEYS */;
/*!40000 ALTER TABLE `municao_gto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municao_ord`
--

DROP TABLE IF EXISTS `municao_ord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municao_ord` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `marca` varchar(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `validade` varchar(20) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=armscii8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municao_ord`
--

LOCK TABLES `municao_ord` WRITE;
/*!40000 ALTER TABLE `municao_ord` DISABLE KEYS */;
/*!40000 ALTER TABLE `municao_ord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int(100) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo_user` varchar(12) NOT NULL,
  `assinatura` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='Sistema de Login do site ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (36,'joao','123','adm','b654d747dcec331f3f1e3cc3529e44e2_assinatura.jpeg');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-13  3:39:30
