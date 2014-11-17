-- MySQL dump 10.14  Distrib 5.5.39-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: meritt
-- ------------------------------------------------------
-- Server version	5.5.39-MariaDB

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
-- Table structure for table `Alternative`
--

DROP TABLE IF EXISTS `Alternative`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alternative` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alternativeText` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isCorrect` tinyint(1) DEFAULT NULL,
  `alternativeLabel` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8863D22D1E27F6BF` (`question_id`),
  CONSTRAINT `FK_8863D22D1E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `Question` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alternative`
--

LOCK TABLES `Alternative` WRITE;
/*!40000 ALTER TABLE `Alternative` DISABLE KEYS */;
INSERT INTO `Alternative` VALUES (1,'11',1,'A',1),(2,'13',0,'B',1),(3,'10',0,'C',1),(4,'12',0,'D',1),(5,'NDA',0,'E',1),(6,'Somente através do arquivo php.ini',0,'A',2),(7,'Nunca pela configuração do web server',0,'B',2),(8,'Através do arquivo php.ini, função ini_set() ou nos arquivos de configuração do web server',1,'C',2),(9,'Apenas com a função ini_set()',0,'D',2),(10,'NDA',0,'E',2),(11,'\'10bananas20laranjas\'',0,'A',3),(12,'\'\'',0,'B',3),(13,'0',0,'C',3),(14,'30',1,'D',3),(15,'NDA',0,'E',3),(16,'Single responsabilitu principle, Open/closed principle, Liskov substitution principle, interface segragation principle and Data fixture Principle',0,'A',4),(17,'Single responsability Principle, Open/close principle, liskov substitution principle segragation princile and Dependency Inversion principle',1,'B',4),(18,'Single responsabilitu principle, Open/closed principle, lean substitution principle, interface segragation principle and Dependency Inversion Principle',0,'C',4),(19,'Singleton responsabilitu principle, Open/closed principle, Liskov substitution principle, interface segragation principle and Dependency Principle',0,'D',4),(20,'NDA',0,'E',4);
/*!40000 ALTER TABLE `Alternative` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Evaluation`
--

DROP TABLE IF EXISTS `Evaluation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `alternative_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5C7EA6A5578D5E91` (`exam_id`),
  KEY `IDX_5C7EA6A5CB944F1A` (`student_id`),
  KEY `IDX_5C7EA6A5FC05FFAC` (`alternative_id`),
  KEY `IDX_5C7EA6A51E27F6BF` (`question_id`),
  CONSTRAINT `FK_5C7EA6A51E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `Question` (`id`),
  CONSTRAINT `FK_5C7EA6A5578D5E91` FOREIGN KEY (`exam_id`) REFERENCES `Exam` (`id`),
  CONSTRAINT `FK_5C7EA6A5CB944F1A` FOREIGN KEY (`student_id`) REFERENCES `Student` (`id`),
  CONSTRAINT `FK_5C7EA6A5FC05FFAC` FOREIGN KEY (`alternative_id`) REFERENCES `Alternative` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Evaluation`
--

LOCK TABLES `Evaluation` WRITE;
/*!40000 ALTER TABLE `Evaluation` DISABLE KEYS */;
INSERT INTO `Evaluation` VALUES (1,1,1,1,1),(2,1,1,8,2),(3,1,1,14,3),(4,1,1,17,4),(5,1,2,2,1),(6,1,2,8,2),(7,1,2,11,3),(8,1,2,20,4),(9,1,3,5,1),(10,1,3,6,2),(11,1,3,12,3),(12,1,3,20,4),(13,1,4,1,1),(14,1,4,8,2),(15,1,4,15,3),(16,1,4,20,4),(17,1,5,5,1),(18,1,5,7,2),(19,1,5,14,3),(20,1,5,17,4);
/*!40000 ALTER TABLE `Evaluation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Exam`
--

DROP TABLE IF EXISTS `Exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `applicationDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Exam`
--

LOCK TABLES `Exam` WRITE;
/*!40000 ALTER TABLE `Exam` DISABLE KEYS */;
INSERT INTO `Exam` VALUES (1,'Prova 1','2013-10-25');
/*!40000 ALTER TABLE `Exam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ExamExecution`
--

DROP TABLE IF EXISTS `ExamExecution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ExamExecution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ExamExecution`
--

LOCK TABLES `ExamExecution` WRITE;
/*!40000 ALTER TABLE `ExamExecution` DISABLE KEYS */;
/*!40000 ALTER TABLE `ExamExecution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Question`
--

DROP TABLE IF EXISTS `Question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionText` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Question`
--

LOCK TABLES `Question` WRITE;
/*!40000 ALTER TABLE `Question` DISABLE KEYS */;
INSERT INTO `Question` VALUES (1,'Em php, qual o resultado da execução do código \"echo 1 + 012;\"?\"',100),(2,'Como é possível realizar alterações de diretivas no PHP?',200),(3,'Em php qual o resultado da execução do código \" echo \'10 bananas\' + \'20 laranjas\';\"?',150),(4,'Quais são os 5 pricípios S.O.L.I.D.',300);
/*!40000 ALTER TABLE `Question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Student`
--

LOCK TABLES `Student` WRITE;
/*!40000 ALTER TABLE `Student` DISABLE KEYS */;
INSERT INTO `Student` VALUES (1,'Kent Beck','beck.kent@meritt.com.br','SC'),(2,'Eric Evans','evans.eric@meritt.com.br','DF'),(3,'Martin Fowler','fowler.martin@meritt.com.br','SP'),(4,'Alan kay','kay.alan@meritt.com.br','SC'),(5,'Robert C. Martin','martin.robert@meritt.com.br','RS');
/*!40000 ALTER TABLE `Student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_question`
--

DROP TABLE IF EXISTS `exam_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_question` (
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`exam_id`,`question_id`),
  KEY `IDX_F593067D578D5E91` (`exam_id`),
  KEY `IDX_F593067D1E27F6BF` (`question_id`),
  CONSTRAINT `FK_F593067D1E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `Question` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_F593067D578D5E91` FOREIGN KEY (`exam_id`) REFERENCES `Exam` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_question`
--

LOCK TABLES `exam_question` WRITE;
/*!40000 ALTER TABLE `exam_question` DISABLE KEYS */;
INSERT INTO `exam_question` VALUES (1,1),(1,2),(1,3),(1,4);
/*!40000 ALTER TABLE `exam_question` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-16 23:22:53
