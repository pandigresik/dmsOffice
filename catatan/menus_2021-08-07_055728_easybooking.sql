-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: easybooking
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.10.1

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
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(50) DEFAULT NULL,
  `route` varchar(100) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `seq_number` tinyint DEFAULT '1',
  `_lft` int unsigned DEFAULT NULL,
  `_rgt` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Master','Top menu','1','2021-07-27 03:12:03','2021-07-28 05:17:27','cil-address-book',NULL,NULL,1,1,10),(2,'Customer','Master customer','1','2021-07-27 04:10:41','2021-07-29 02:43:33','cil-menu','customers',1,2,2,3),(3,'Roles','Master Role','1','2021-07-27 07:26:34','2021-07-29 08:12:18','cil-baseball','roles',1,1,4,5),(4,'Resources','Master Resources','1','2021-07-28 05:18:53','2021-07-28 05:18:53','cil-image-plus','resources',1,2,6,7),(5,'Menu','percobaan','1','2021-07-28 14:28:00','2021-07-28 14:28:00','cil-menu','menus',1,3,8,9),(6,'Report','reporting','1','2021-07-28 14:29:01','2021-07-29 04:46:19','cil-4k',NULL,NULL,2,11,16),(7,'Transaksi','Transaksi','1','2021-07-28 14:35:20','2021-07-29 04:46:19','cil-transfer',NULL,NULL,3,17,20),(8,'Dashboard','fdsfa','1','2021-07-28 14:37:45','2021-07-29 04:46:20','cil-transfer',NULL,NULL,4,21,24),(9,'Laporan','fsdf','1','2021-07-28 14:41:41','2021-07-29 04:46:20','cil-address-book',NULL,NULL,NULL,25,26),(10,'Laba rugi','laporan','1','2021-07-29 04:36:34','2021-07-29 04:46:19','cil-graph',NULL,6,1,12,15),(11,'SubTransaksi','transaksi','1','2021-07-29 04:40:45','2021-07-29 04:46:19','cil-money','register',7,1,18,19),(12,'Widget','widget','1','2021-07-29 04:42:27','2021-07-29 04:46:19','cil-address-book','widget',8,1,22,23),(13,'Bulanan','laba rugi bulanan','1','2021-07-29 04:46:17','2021-07-29 04:46:18','cil-calendar-check','roles/create',10,1,13,14);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-07  5:57:49
