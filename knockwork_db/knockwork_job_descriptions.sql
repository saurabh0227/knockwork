-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: knockwork
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `job_descriptions`
--

DROP TABLE IF EXISTS `job_descriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `job_descriptions` (
  `jd_id` int(10) NOT NULL AUTO_INCREMENT,
  `jd_title` varchar(250) DEFAULT NULL,
  `jd_description` varchar(500) DEFAULT NULL,
  `jd_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jd_updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jd_duration` varchar(25) DEFAULT NULL,
  `jd_budget` varchar(20) DEFAULT NULL,
  `c_id` int(10) DEFAULT NULL,
  `categories_id` int(10) DEFAULT NULL,
  `pt_id` int(10) DEFAULT NULL,
  `jt_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`jd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_descriptions`
--

LOCK TABLES `job_descriptions` WRITE;
/*!40000 ALTER TABLE `job_descriptions` DISABLE KEYS */;
INSERT INTO `job_descriptions` VALUES (1,'Application Developer','Need a android app developer','2018-10-03 04:34:54','2018-10-09 10:49:36','2 months','5k to 10k',1,1,1,1),(2,'Android Developer','Need a android app developer','2017-10-03 04:34:54','2018-10-09 10:49:36','2 months','5k to 10k',1,1,2,2),(3,'web Developer','Need a angular developer','2017-10-03 04:34:54','2018-10-09 10:49:36','4 months','5k to 10k',1,1,3,3),(4,'backend Developer','Need a nodejs developer','2017-10-03 04:34:54','2018-10-09 10:49:36','3 months','15k to 20k',1,1,1,1),(5,'graphics designer','Need a nodejs developer','2018-08-03 04:34:54','2018-10-09 10:49:36','1 months','2k to 5k',1,1,2,2),(6,'web designer','Need a nodejs developer','2018-08-03 04:34:54','2018-10-09 10:49:36','1 months','2k to 5k',1,1,3,3),(7,'ruby developer','Need a nodejs developer','2018-08-03 07:34:54','2018-10-09 10:49:36','1 months','2k to 5k',1,1,1,1),(8,'xamarian developer','Need a nodejs developer','2018-08-03 07:34:54','2018-10-09 10:49:36','1 months','2k to 5k',1,1,2,2),(9,'ios developer12','Need a ios developer','2018-08-03 07:34:54','2018-10-09 10:49:36','1 months','2k to 5k',2,1,3,3),(10,'php developer','Need a php developer','2018-08-03 07:34:54','2018-10-09 10:51:39','1 months','2k to 5k',3,1,1,1),(12,'react developer','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',2,1,2,1),(15,'backend developer','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',4,1,3,1),(16,'backend developer','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',5,1,1,2),(17,'front end developer','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',6,1,2,3),(18,'front developer','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',7,1,3,1),(19,'front ','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',2,1,1,2),(20,'front ','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',3,1,2,3),(21,'front ','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',4,1,3,1),(22,'front ','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',5,1,1,2),(23,'front ','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',6,1,2,3),(24,'front ','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',7,1,3,1),(25,'front ','Need a ionic developer','2018-09-03 07:34:54','2018-10-09 10:51:39','2 months','4k to 10k',2,1,1,2),(26,'frontend','angular','2018-10-09 07:10:06','2018-10-09 10:51:39','3 months','3k to 7k',3,1,2,3),(27,'frontend','angular','2018-10-09 07:10:31','2018-10-09 10:51:39','3 months','3k to 7k',4,1,3,1),(28,'frontend','angular','2018-10-09 07:10:32','2018-10-09 10:51:39','3 months','3k to 7k',5,1,1,1),(29,'frontend','angular','2018-10-09 07:10:32','2018-10-09 10:51:39','3 months','3k to 7k',6,1,2,1),(30,'frontend','angular','2018-10-09 07:10:33','2018-10-09 10:51:39','3 months','3k to 7k',7,1,3,1),(31,'frontend','angular','2018-10-09 07:10:33','2018-10-09 10:51:39','3 months','3k to 7k',2,1,1,1),(32,'frontend','angular','2018-10-09 07:10:33','2018-10-09 10:51:39','3 months','3k to 7k',3,1,2,2),(33,'frontend','angular','2018-10-09 07:10:34','2018-10-09 10:51:39','3 months','3k to 7k',4,1,3,2),(34,'frontend','angular','2018-10-09 07:10:34','2018-10-09 10:51:39','3 months','3k to 7k',5,1,1,2),(35,'frontend','angular','2018-10-09 07:10:34','2018-10-09 10:51:39','3 months','3k to 7k',6,1,2,2),(36,'frontend','angular','2018-10-09 07:10:34','2018-10-09 10:51:39','3 months','3k to 7k',7,1,3,2),(37,'frontend','angular','2018-10-09 07:10:35','2018-10-09 10:51:39','3 months','3k to 7k',2,1,1,2),(38,'frontend','angular','2018-10-09 07:10:35','2018-10-09 10:51:39','3 months','3k to 7k',3,1,2,2),(39,'frontend','angular','2018-10-09 07:10:35','2018-10-09 10:51:39','3 months','3k to 7k',4,1,3,2),(40,'frontend','angular','2018-10-09 07:10:35','2018-10-09 10:51:39','3 months','3k to 7k',5,1,1,2),(41,'frontend','angular','2018-10-09 07:10:36','2018-10-09 10:51:39','3 months','3k to 7k',6,1,2,2),(42,'frontend','angular','2018-10-09 07:10:36','2018-10-09 10:51:39','3 months','3k to 7k',7,1,3,2),(43,'frontend','angular','2018-10-09 07:10:36','2018-10-09 10:51:39','3 months','3k to 7k',2,1,1,2),(44,'frontend','angular','2018-10-09 07:10:39','2018-10-09 10:51:39','3 months','3k to 7k',3,1,2,2),(45,'frontend','angular','2018-10-09 07:10:39','2018-10-09 10:51:39','3 months','3k to 7k',4,1,3,2),(46,'frontend','angular','2018-10-09 07:10:39','2018-10-09 10:51:39','3 months','3k to 7k',5,1,1,2),(47,'frontend','angular','2018-10-09 07:10:40','2018-10-09 10:52:42','3 months','3k to 7k',6,1,2,2),(48,'frontend','angular','2018-10-09 07:10:40','2018-10-09 10:52:42','3 months','3k to 7k',7,1,3,2),(49,'frontend','angular','2018-10-09 07:10:40','2018-10-09 10:52:42','3 months','3k to 7k',2,1,1,2),(50,'frontend','angular','2018-10-09 07:10:40','2018-10-09 10:52:42','3 months','3k to 7k',3,1,2,2),(51,'frontend','angular','2018-10-09 07:10:40','2018-10-09 11:14:36','3 months','3k to 7k',4,2,3,2),(52,'frontend','angular','2018-10-09 07:10:41','2018-10-09 11:14:36','3 months','3k to 7k',5,2,1,2),(53,'frontend','angular','2018-10-09 07:10:41','2018-10-09 11:14:36','3 months','3k to 7k',6,2,2,3),(54,'frontend','angular','2018-10-09 07:10:41','2018-10-09 11:14:36','3 months','3k to 7k',7,2,3,3),(55,'frontend123','angular','2018-10-09 07:10:41','2018-10-09 12:21:56','3 months','3k to 7k',2,2,1,3),(56,'frontend22','angular','2018-10-09 07:10:42','2018-10-09 12:22:56','3 months','3k to 7k',3,2,2,3),(57,'frontend','angular','2018-10-09 07:10:42','2018-10-09 11:14:36','3 months','3k to 7k',4,2,3,2),(58,'frontend','angular','2018-10-09 07:10:42','2018-10-09 11:14:36','3 months','3k to 7k',5,2,1,1),(59,'frontend','angular','2018-10-09 07:10:42','2018-10-09 11:14:36','3 months','3k to 7k',6,2,2,1),(60,'frontend','angular','2018-10-09 07:10:42','2018-10-09 11:14:36','3 months','3k to 7k',7,2,3,2),(61,'frontend','angular','2018-10-09 07:10:43','2018-10-09 11:14:36','3 months','3k to 7k',1,2,1,2),(62,'frontend','angular','2018-10-09 07:10:43','2018-10-09 11:14:36','3 months','3k to 7k',2,2,2,2),(63,'frontend','angular','2018-10-09 07:10:43','2018-10-09 11:14:36','3 months','3k to 7k',3,2,3,1),(64,'frontend','angular','2018-10-09 07:10:43','2018-10-09 11:14:36','3 months','3k to 7k',4,2,1,1),(65,'frontend','angular','2018-10-09 07:10:43','2018-10-09 11:14:36','3 months','3k to 7k',5,2,2,1),(66,'frontend','angular','2018-10-09 07:10:44','2018-10-09 11:14:36','3 months','3k to 7k',6,2,3,3),(67,'frontend','angular','2018-10-09 07:10:44','2018-10-09 11:14:36','3 months','3k to 7k',7,2,1,3),(68,'frontend','angular','2018-10-09 07:10:44','2018-10-09 11:14:36','3 months','3k to 7k',2,2,2,3),(69,'frontend','angular','2018-10-09 07:10:44','2018-10-09 11:14:36','3 months','3k to 7k',3,2,3,1),(70,'frontend','angular','2018-10-09 07:10:45','2018-10-09 11:14:36','3 months','3k to 7k',4,2,1,3),(71,'frontend','angular','2018-10-09 07:10:46','2018-10-09 10:51:39','3 months','3k to 7k',5,NULL,2,1),(72,'frontend','angular','2018-10-09 07:10:46','2018-10-09 10:51:39','3 months','3k to 7k',6,NULL,3,2),(73,'frontend','angular','2018-10-09 07:10:46','2018-10-09 10:51:39','3 months','3k to 7k',7,NULL,1,2),(74,'frontend','angular','2018-10-09 07:10:46','2018-10-09 10:51:39','3 months','3k to 7k',1,NULL,2,1),(75,'frontend','angular','2018-10-09 07:10:47','2018-10-09 10:51:39','3 months','3k to 7k',2,NULL,3,1),(76,'frontend','angular','2018-10-09 07:10:47','2018-10-09 10:51:39','3 months','3k to 7k',3,NULL,1,3),(77,'frontend','angular','2018-10-09 07:10:47','2018-10-09 10:51:39','3 months','3k to 7k',4,NULL,2,2),(78,'frontend','angular','2018-10-09 07:10:47','2018-10-09 10:51:39','3 months','3k to 7k',5,NULL,3,3),(79,'frontend','angular','2018-10-09 07:10:48','2018-10-09 10:51:39','3 months','3k to 7k',6,NULL,1,1),(80,'frontend','angular','2018-10-09 07:10:48','2018-10-09 10:51:39','3 months','3k to 7k',7,NULL,2,2),(81,'frontend','angular','2018-10-09 07:10:48','2018-10-09 10:51:39','3 months','3k to 7k',1,NULL,3,1),(82,'frontend','angular','2018-10-09 07:10:48','2018-10-09 10:51:39','3 months','3k to 7k',2,NULL,1,3),(83,'frontend','angular','2018-10-09 07:10:49','2018-10-09 10:51:39','3 months','3k to 7k',3,NULL,2,1),(84,'frontend','angular','2018-10-09 07:10:49','2018-10-09 10:51:39','3 months','3k to 7k',4,NULL,3,2),(85,'frontend','angular','2018-10-09 07:10:49','2018-10-09 10:51:39','3 months','3k to 7k',5,NULL,1,3),(86,'frontend','angular','2018-10-09 07:10:49','2018-10-09 10:51:39','3 months','3k to 7k',6,NULL,2,1),(87,'frontend','angular','2018-10-09 07:10:50','2018-10-09 10:51:39','3 months','3k to 7k',7,NULL,3,2),(88,'frontend','angular','2018-10-09 07:10:50','2018-10-09 10:51:39','3 months','3k to 7k',1,NULL,1,3),(89,'frontend','angular','2018-10-09 07:10:50','2018-10-09 10:51:39','3 months','3k to 7k',2,NULL,2,1),(90,'frontend','angular','2018-10-09 07:10:51','2018-10-09 10:51:39','3 months','3k to 7k',3,NULL,3,2),(91,'frontend','angular','2018-10-09 07:10:52','2018-10-09 10:51:39','3 months','3k to 7k',4,NULL,1,3);
/*!40000 ALTER TABLE `job_descriptions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-11 16:55:46
