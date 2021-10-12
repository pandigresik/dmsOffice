-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: dmsoffice
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
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint unsigned DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint unsigned DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,'default','created','App\\Models\\Base\\City',6,'App\\Models\\Base\\User',1,'[]','2021-09-07 22:56:39','2021-09-07 22:56:39'),(2,'default','created','App\\Models\\Base\\City',7,'App\\Models\\Base\\User',1,'{\"attributes\": {\"name\": \"Lamongan\"}}','2021-09-07 23:08:57','2021-09-07 23:08:57'),(3,'default','updated','App\\Models\\Base\\Menus',27,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": \"cil-book\", \"name\": \"Chart Of Account\", \"route\": \"accounting/accountAccounts\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 2, \"description\": \"Chart Of Account\"}, \"attributes\": {\"icon\": \"cil-book\", \"name\": \"Chart Of Account\", \"route\": \"accounting/ifrsAccounts\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 1, \"description\": \"Chart Of Account\"}}','2021-09-11 07:23:14','2021-09-11 07:23:14'),(4,'default','deleted','App\\Models\\Base\\Menus',26,'App\\Models\\Base\\User',1,'{\"attributes\": {\"icon\": \"cil-book\", \"name\": \"Account Type\", \"route\": \"accounting/accountTypes\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 1, \"description\": \"Account Type\"}}','2021-09-11 07:23:36','2021-09-11 07:23:36'),(5,'default','updated','App\\Models\\Base\\Menus',15,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": \"cil-building\", \"name\": \"Company\", \"route\": \"base/companies\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 9, \"description\": \"Master perusahaan\"}, \"attributes\": {\"icon\": \"cil-building\", \"name\": \"Company\", \"route\": \"accounting/ifrsEntities\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 9, \"description\": \"Master perusahaan\"}}','2021-09-11 07:40:06','2021-09-11 07:40:06'),(6,'default','created','App\\Models\\Base\\Menus',31,'App\\Models\\Base\\User',1,'{\"attributes\": {\"icon\": \"cil-money\", \"name\": \"Currency\", \"route\": \"accounting/ifrsCurrencies\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 10, \"description\": \"Mata uang\"}}','2021-09-11 07:41:22','2021-09-11 07:41:22'),(7,'default','updated','App\\Models\\Base\\MenusTree',31,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-money\", \"name\": \"Currency\", \"route\": \"accounting/ifrsCurrencies\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 10, \"description\": \"Mata uang\"}}','2021-09-11 07:41:22','2021-09-11 07:41:22'),(8,'default','updated','App\\Models\\Base\\MenusTree',19,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-command\", \"name\": \"Product\", \"route\": \"base/products\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 12, \"description\": \"Product\"}}','2021-09-11 07:41:23','2021-09-11 07:41:23'),(9,'default','updated','App\\Models\\Base\\MenusTree',18,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-3d\", \"name\": \"UOM\", \"route\": \"base/uoms\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 11, \"description\": \"Unit of measure\"}}','2021-09-11 07:41:23','2021-09-11 07:41:23'),(10,'default','updated','App\\Models\\Base\\MenusTree',17,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-battery-alert\", \"name\": \"Uom Category\", \"route\": \"base/uomCategories\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 10, \"description\": \"Unit of measure category\"}}','2021-09-11 07:41:23','2021-09-11 07:41:23'),(11,'default','updated','App\\Models\\Base\\MenusTree',15,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-building\", \"name\": \"Company\", \"route\": \"accounting/ifrsEntities\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 9, \"description\": \"Master perusahaan\"}}','2021-09-11 07:41:24','2021-09-11 07:41:24'),(12,'default','updated','App\\Models\\Base\\MenusTree',12,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-cart\", \"name\": \"Vendor\", \"route\": \"base/vendorExpeditions\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 9, \"description\": \"Manage vendor\"}}','2021-09-11 07:41:24','2021-09-11 07:41:24'),(13,'default','updated','App\\Models\\Base\\MenusTree',11,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-transfer\", \"name\": \"Route Trip\", \"route\": \"base/routeTrips\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 8, \"description\": \"manage route trip\"}}','2021-09-11 07:41:25','2021-09-11 07:41:25'),(14,'default','updated','App\\Models\\Base\\MenusTree',10,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-building\", \"name\": \"City\", \"route\": \"base/cities\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 7, \"description\": \"Manage city\"}}','2021-09-11 07:41:25','2021-09-11 07:41:25'),(15,'default','updated','App\\Models\\Base\\MenusTree',8,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-truck\", \"name\": \"Vehicle Group\", \"route\": \"base/vehicleGroups\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 5, \"description\": \"Manage vehicle group\"}}','2021-09-11 07:41:26','2021-09-11 07:41:26'),(16,'default','updated','App\\Models\\Base\\MenusTree',4,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Menu\", \"route\": \"base/menus\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 1, \"description\": \"Manage menu\"}}','2021-09-11 07:41:26','2021-09-11 07:41:26'),(17,'default','updated','App\\Models\\Base\\MenusTree',5,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"User\", \"route\": \"base/users\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 2, \"description\": \"Manage users\"}}','2021-09-11 07:41:26','2021-09-11 07:41:26'),(18,'default','updated','App\\Models\\Base\\MenusTree',6,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Role\", \"route\": \"base/roles\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 3, \"description\": \"Manage role\"}}','2021-09-11 07:41:27','2021-09-11 07:41:27'),(19,'default','updated','App\\Models\\Base\\MenusTree',7,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 1, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Permission\", \"route\": \"base/permissions\", \"status\": \"1\", \"parent_id\": 1, \"seq_number\": 1, \"description\": \"Manage users\"}}','2021-09-11 07:41:27','2021-09-11 07:41:27'),(20,'default','updated','App\\Models\\Base\\MenusTree',1,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": null, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Master Data\", \"route\": null, \"status\": \"1\", \"parent_id\": null, \"seq_number\": 1, \"description\": \"Header menu master\"}}','2021-09-11 07:41:28','2021-09-11 07:41:28'),(21,'default','updated','App\\Models\\Base\\MenusTree',30,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-money\", \"name\": \"Journal Entry\", \"route\": \"accounting/accountMoves\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 5, \"description\": \"jurnal entri manual\"}}','2021-09-11 07:41:28','2021-09-11 07:41:28'),(22,'default','updated','App\\Models\\Base\\MenusTree',29,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-calendar-check\", \"name\": \"Invoice\", \"route\": \"accounting/accountInvoices\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 4, \"description\": \"Invoice\"}}','2021-09-11 07:41:28','2021-09-11 07:41:28'),(23,'default','updated','App\\Models\\Base\\MenusTree',28,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Journal\", \"route\": \"accounting/accountJournals\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 3, \"description\": \"master jurnal\"}}','2021-09-11 07:41:29','2021-09-11 07:41:29'),(24,'default','updated','App\\Models\\Base\\MenusTree',27,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-book\", \"name\": \"Chart Of Account\", \"route\": \"accounting/ifrsAccounts\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 1, \"description\": \"Chart Of Account\"}}','2021-09-11 07:41:29','2021-09-11 07:41:29'),(25,'default','updated','App\\Models\\Base\\MenusTree',2,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": null, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Accounting\", \"route\": null, \"status\": \"1\", \"parent_id\": null, \"seq_number\": 2, \"description\": \"Header menu accounting\"}}','2021-09-11 07:41:30','2021-09-11 07:41:30'),(26,'default','created','App\\Models\\Base\\Menus',32,'App\\Models\\Base\\User',1,'{\"attributes\": {\"icon\": \"cil-taxi\", \"name\": \"VAT\", \"route\": \"accounting/ifrsVats\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 2, \"description\": \"Value added tax (PPN)\"}}','2021-09-15 07:03:45','2021-09-15 07:03:45'),(27,'default','updated','App\\Models\\Base\\MenusTree',32,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-taxi\", \"name\": \"VAT\", \"route\": \"accounting/ifrsVats\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 2, \"description\": \"Value added tax (PPN)\"}}','2021-09-15 07:03:45','2021-09-15 07:03:45'),(28,'default','updated','App\\Models\\Base\\MenusTree',30,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-money\", \"name\": \"Journal Entry\", \"route\": \"accounting/accountMoves\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 5, \"description\": \"jurnal entri manual\"}}','2021-09-15 07:03:45','2021-09-15 07:03:45'),(29,'default','updated','App\\Models\\Base\\MenusTree',29,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-calendar-check\", \"name\": \"Invoice\", \"route\": \"accounting/accountInvoices\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 4, \"description\": \"Invoice\"}}','2021-09-15 07:03:46','2021-09-15 07:03:46'),(30,'default','updated','App\\Models\\Base\\MenusTree',28,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Journal\", \"route\": \"accounting/accountJournals\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 3, \"description\": \"master jurnal\"}}','2021-09-15 07:03:46','2021-09-15 07:03:46'),(31,'default','updated','App\\Models\\Base\\MenusTree',27,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-book\", \"name\": \"Chart Of Account\", \"route\": \"accounting/ifrsAccounts\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 1, \"description\": \"Chart Of Account\"}}','2021-09-15 07:03:46','2021-09-15 07:03:46'),(32,'default','updated','App\\Models\\Base\\MenusTree',2,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": null, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Accounting\", \"route\": null, \"status\": \"1\", \"parent_id\": null, \"seq_number\": 2, \"description\": \"Header menu accounting\"}}','2021-09-15 07:03:47','2021-09-15 07:03:47'),(33,'default','updated','App\\Models\\Base\\MenusTree',25,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-data-transfer-up\", \"name\": \"BKB Synchronize\", \"route\": \"inventory/synchronizeOutStockPickings\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 7, \"description\": \"BKB Synchronize\"}}','2021-09-15 07:03:47','2021-09-15 07:03:47'),(34,'default','updated','App\\Models\\Base\\MenusTree',24,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-data-transfer-down\", \"name\": \"BTB Synchronize\", \"route\": \"inventory/synchronizeInStockPickings\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 6, \"description\": \"Sinkronisasi BTB\"}}','2021-09-15 07:03:48','2021-09-15 07:03:48'),(35,'default','updated','App\\Models\\Base\\MenusTree',23,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-transfer\", \"name\": \"Picking Type\", \"route\": \"inventory/stockPickingTypes\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 5, \"description\": \"Picking type\"}}','2021-09-15 07:03:48','2021-09-15 07:03:48'),(36,'default','updated','App\\Models\\Base\\MenusTree',22,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-storage\", \"name\": \"Current Stock\", \"route\": \"inventory/stockQuants\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 4, \"description\": \"Current Stock\"}}','2021-09-15 07:03:48','2021-09-15 07:03:48'),(37,'default','updated','App\\Models\\Base\\MenusTree',21,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-move\", \"name\": \"Movement\", \"route\": \"inventory/stockPickings\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 3, \"description\": \"history movement\"}}','2021-09-15 07:03:49','2021-09-15 07:03:49'),(38,'default','updated','App\\Models\\Base\\MenusTree',20,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-storage\", \"name\": \"Adjustment Stock\", \"route\": \"inventory/stockInventories\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 2, \"description\": \"Stock opname\"}}','2021-09-15 07:03:49','2021-09-15 07:03:49'),(39,'default','updated','App\\Models\\Base\\MenusTree',16,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-library-building\", \"name\": \"Warehouse\", \"route\": \"inventory/warehouses\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 1, \"description\": \"Data Warehouse\"}}','2021-09-15 07:03:50','2021-09-15 07:03:50'),(40,'default','updated','App\\Models\\Base\\MenusTree',3,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": null, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Inventory\", \"route\": null, \"status\": \"1\", \"parent_id\": null, \"seq_number\": 3, \"description\": \"Header menu inventory\"}}','2021-09-15 07:03:50','2021-09-15 07:03:50'),(41,'default','created','App\\Models\\Base\\Menus',33,'App\\Models\\Base\\User',1,'{\"attributes\": {\"icon\": \"cil-object-group\", \"name\": \"Account Category\", \"route\": \"accounting/ifrsCategories\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 3, \"description\": \"Account Category to grouping account on report\"}}','2021-09-15 07:05:10','2021-09-15 07:05:10'),(42,'default','updated','App\\Models\\Base\\MenusTree',33,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-object-group\", \"name\": \"Account Category\", \"route\": \"accounting/ifrsCategories\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 3, \"description\": \"Account Category to grouping account on report\"}}','2021-09-15 07:05:10','2021-09-15 07:05:10'),(43,'default','updated','App\\Models\\Base\\MenusTree',32,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-taxi\", \"name\": \"VAT\", \"route\": \"accounting/ifrsVats\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 2, \"description\": \"Value added tax (PPN)\"}}','2021-09-15 07:05:11','2021-09-15 07:05:11'),(44,'default','updated','App\\Models\\Base\\MenusTree',30,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-money\", \"name\": \"Journal Entry\", \"route\": \"accounting/accountMoves\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 5, \"description\": \"jurnal entri manual\"}}','2021-09-15 07:05:11','2021-09-15 07:05:11'),(45,'default','updated','App\\Models\\Base\\MenusTree',29,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-calendar-check\", \"name\": \"Invoice\", \"route\": \"accounting/accountInvoices\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 4, \"description\": \"Invoice\"}}','2021-09-15 07:05:11','2021-09-15 07:05:11'),(46,'default','updated','App\\Models\\Base\\MenusTree',28,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Journal\", \"route\": \"accounting/accountJournals\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 3, \"description\": \"master jurnal\"}}','2021-09-15 07:05:12','2021-09-15 07:05:12'),(47,'default','updated','App\\Models\\Base\\MenusTree',27,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 2, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-book\", \"name\": \"Chart Of Account\", \"route\": \"accounting/ifrsAccounts\", \"status\": \"1\", \"parent_id\": 2, \"seq_number\": 1, \"description\": \"Chart Of Account\"}}','2021-09-15 07:05:12','2021-09-15 07:05:12'),(48,'default','updated','App\\Models\\Base\\MenusTree',2,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": null, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Accounting\", \"route\": null, \"status\": \"1\", \"parent_id\": null, \"seq_number\": 2, \"description\": \"Header menu accounting\"}}','2021-09-15 07:05:12','2021-09-15 07:05:12'),(49,'default','updated','App\\Models\\Base\\MenusTree',25,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-data-transfer-up\", \"name\": \"BKB Synchronize\", \"route\": \"inventory/synchronizeOutStockPickings\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 7, \"description\": \"BKB Synchronize\"}}','2021-09-15 07:05:13','2021-09-15 07:05:13'),(50,'default','updated','App\\Models\\Base\\MenusTree',24,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-data-transfer-down\", \"name\": \"BTB Synchronize\", \"route\": \"inventory/synchronizeInStockPickings\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 6, \"description\": \"Sinkronisasi BTB\"}}','2021-09-15 07:05:13','2021-09-15 07:05:13'),(51,'default','updated','App\\Models\\Base\\MenusTree',23,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-transfer\", \"name\": \"Picking Type\", \"route\": \"inventory/stockPickingTypes\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 5, \"description\": \"Picking type\"}}','2021-09-15 07:05:14','2021-09-15 07:05:14'),(52,'default','updated','App\\Models\\Base\\MenusTree',22,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-storage\", \"name\": \"Current Stock\", \"route\": \"inventory/stockQuants\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 4, \"description\": \"Current Stock\"}}','2021-09-15 07:05:14','2021-09-15 07:05:14'),(53,'default','updated','App\\Models\\Base\\MenusTree',21,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-move\", \"name\": \"Movement\", \"route\": \"inventory/stockPickings\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 3, \"description\": \"history movement\"}}','2021-09-15 07:05:14','2021-09-15 07:05:14'),(54,'default','updated','App\\Models\\Base\\MenusTree',20,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-storage\", \"name\": \"Adjustment Stock\", \"route\": \"inventory/stockInventories\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 2, \"description\": \"Stock opname\"}}','2021-09-15 07:05:15','2021-09-15 07:05:15'),(55,'default','updated','App\\Models\\Base\\MenusTree',16,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": 3, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-library-building\", \"name\": \"Warehouse\", \"route\": \"inventory/warehouses\", \"status\": \"1\", \"parent_id\": 3, \"seq_number\": 1, \"description\": \"Data Warehouse\"}}','2021-09-15 07:05:15','2021-09-15 07:05:15'),(56,'default','updated','App\\Models\\Base\\MenusTree',3,'App\\Models\\Base\\User',1,'{\"old\": {\"icon\": null, \"name\": null, \"route\": null, \"status\": null, \"parent_id\": null, \"seq_number\": null, \"description\": null}, \"attributes\": {\"icon\": \"cil-address-book\", \"name\": \"Inventory\", \"route\": null, \"status\": \"1\", \"parent_id\": null, \"seq_number\": 3, \"description\": \"Header menu inventory\"}}','2021-09-15 07:05:16','2021-09-15 07:05:16'),(57,'default','created','App\\Models\\Accounting\\IfrsCategories',1,'App\\Models\\Base\\User',1,'{\"attributes\": {\"name\": \"Bank Operasional\", \"entity_id\": 2, \"destroyed_at\": null, \"category_type\": \"BANK\"}}','2021-09-15 07:30:42','2021-09-15 07:30:42'),(58,'default','created','App\\Models\\Accounting\\IfrsCategories',2,'App\\Models\\Base\\User',1,'{\"attributes\": {\"name\": \"Cash\", \"entity_id\": 1, \"destroyed_at\": null, \"category_type\": \"BANK\"}}','2021-09-17 15:29:26','2021-09-17 15:29:26'),(59,'default','created','App\\Models\\Accounting\\IfrsCategories',3,'App\\Models\\Base\\User',1,'{\"attributes\": {\"name\": \"Penjualan Cash\", \"entity_id\": 1, \"destroyed_at\": null, \"category_type\": \"OPERATING_REVENUE\"}}','2021-09-17 15:30:45','2021-09-17 15:30:45'),(60,'default','created','App\\Models\\Accounting\\IfrsVats',1,'App\\Models\\Base\\User',1,'{\"attributes\": {\"code\": \"O\", \"name\": \"PPn Keluaran\", \"rate\": \"20.0000\", \"entity_id\": 1}}','2021-10-01 06:19:31','2021-10-01 06:19:31'),(61,'default','created','App\\Models\\Accounting\\IfrsVats',2,'App\\Models\\Base\\User',1,'{\"attributes\": {\"code\": \"I\", \"name\": \"PPn Masukan\", \"rate\": \"10.0000\", \"entity_id\": 1}}','2021-10-01 06:21:08','2021-10-01 06:21:08'),(62,'default','created','App\\Models\\Accounting\\IfrsVats',3,'App\\Models\\Base\\User',1,'{\"attributes\": {\"code\": \"Z\", \"name\": \"Tanpa PPn\", \"rate\": \"0.0000\", \"entity_id\": 1}}','2021-10-01 06:22:09','2021-10-01 06:22:09'),(63,'default','updated','App\\Models\\Accounting\\IfrsAccounts',5,'App\\Models\\Base\\User',1,'{\"old\": {\"code\": 5001, \"name\": \"Operations Expense Account\", \"entity_id\": 1, \"category_id\": null, \"currency_id\": 1, \"description\": null, \"account_type\": \"OPERATING_EXPENSE\"}, \"attributes\": {\"code\": 5001, \"name\": \"Operations Expense Account\", \"entity_id\": 1, \"category_id\": 17, \"currency_id\": 1, \"description\": null, \"account_type\": \"OPERATING_EXPENSE\"}}','2021-10-01 07:01:28','2021-10-01 07:01:28'),(64,'default','updated','App\\Models\\Accounting\\IfrsVats',1,'App\\Models\\Base\\User',1,'{\"old\": {\"code\": \"O\", \"name\": \"PPn Keluaran\", \"rate\": \"20.0000\", \"entity_id\": 1}, \"attributes\": {\"code\": \"O\", \"name\": \"PPn Keluaran Maju\", \"rate\": \"20.0000\", \"entity_id\": 1}}','2021-10-02 07:53:08','2021-10-02 07:53:08'),(65,'default','updated','App\\Models\\Accounting\\IfrsVats',1,'App\\Models\\Base\\User',1,'{\"old\": {\"code\": \"O\", \"name\": \"PPn Keluaran Maju\", \"rate\": \"20.0000\", \"entity_id\": 1, \"account_id\": null}, \"attributes\": {\"code\": \"O\", \"name\": \"PPn Keluaran\", \"rate\": \"20.0000\", \"entity_id\": 1, \"account_id\": null}}','2021-10-02 07:54:38','2021-10-02 07:54:38'),(66,'default','updated','App\\Models\\Accounting\\IfrsVats',1,'App\\Models\\Base\\User',1,'{\"old\": {\"code\": \"O\", \"name\": \"PPn Keluaran\", \"rate\": \"20.0000\", \"entity_id\": 1, \"account_id\": null}, \"attributes\": {\"code\": \"O\", \"name\": \"PPn Keluaran\", \"rate\": \"20.0000\", \"entity_id\": 1, \"account_id\": 7}}','2021-10-02 07:58:51','2021-10-02 07:58:51');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `btb_view`
--

DROP TABLE IF EXISTS `btb_view`;
/*!50001 DROP VIEW IF EXISTS `btb_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `btb_view` AS SELECT 
 1 AS `Tgl_BTB`,
 1 AS `No_BTB`,
 1 AS `ID_Vendor`,
 1 AS `Nama_Vendor`,
 1 AS `Nama_PT`,
 1 AS `No_CO`,
 1 AS `No_DN`,
 1 AS `Tgl_sjp`,
 1 AS `Depo`,
 1 AS `Nama_Produk`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `btb_view_tmp`
--

DROP TABLE IF EXISTS `btb_view_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `btb_view_tmp` (
  `Tgl_BTB` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `No_BTB` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ID_Vendor` bigint NOT NULL DEFAULT '0',
  `Nama_Vendor` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Nama_PT` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `No_CO` bigint NOT NULL DEFAULT '0',
  `No_DN` bigint NOT NULL DEFAULT '0',
  `Tgl_sjp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Depo` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Nama_Produk` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `btb_view_tmp`
--

LOCK TABLES `btb_view_tmp` WRITE;
/*!40000 ALTER TABLE `btb_view_tmp` DISABLE KEYS */;
INSERT INTO `btb_view_tmp` VALUES ('2021-10-01','079-0000076',116,'PT. TIV-Prod pandaan','LMS',9087878,67678687,'2021-09-24','Pasuruan','A.220'),('2021-10-02','079-0000076',116,'PT. TIV-Prod pandaan','LMS',9087878,67678687,'2021-09-24','Pasuruan','A.220'),('2021-10-03','079-0000076',116,'PT. TIV-Prod pandaan','LMS',9087878,67678687,'2021-09-24','Pasuruan','A.220'),('2021-10-04','079-0000076',116,'PT. TIV-Prod pandaan','LMS',9087878,67678687,'2021-09-24','Pasuruan','A.220'),('2021-10-05','079-0000076',116,'PT. TIV-Prod pandaan','LMS',9087878,67678687,'2021-09-24','Pasuruan','A.220'),('2021-10-06','079-0000076',116,'PT. TIV-Prod pandaan','LMS',9087878,67678687,'2021-09-24','Pasuruan','A.220');
/*!40000 ALTER TABLE `btb_view_tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `city_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Gresik',1,NULL,NULL,'2021-08-10 07:11:42','2021-08-10 07:11:42'),(2,'Pasuruan',1,NULL,NULL,'2021-08-10 07:11:59','2021-08-10 07:11:59'),(3,'Malang',1,NULL,NULL,'2021-08-10 07:12:13','2021-08-10 07:12:13'),(4,'Surabaya',1,NULL,NULL,'2021-08-10 07:12:22','2021-08-10 07:12:22'),(6,'Kediri',1,NULL,NULL,'2021-09-07 22:56:39','2021-09-07 22:56:39'),(7,'Lamongan',1,NULL,NULL,'2021-09-07 23:08:56','2021-09-07 23:08:56');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currency` (
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES ('Albania','Leke','ALL','Lek'),('America','Dollars','USD','$'),('Afghanistan','Afghanis','AFN','؋'),('Argentina','Pesos','ARS','$'),('Aruba','Guilders','AWG','ƒ'),('Australia','Dollars','AUD','$'),('Azerbaijan','New Manats','AZN','ман'),('Bahamas','Dollars','BSD','$'),('Barbados','Dollars','BBD','$'),('Belarus','Rubles','BYR','p.'),('Belgium','Euro','EUR','€'),('Beliz','Dollars','BZD','BZ$'),('Bermuda','Dollars','BMD','$'),('Bolivia','Bolivianos','BOB','$b'),('Bosnia and Herzegovina','Convertible Marka','BAM','KM'),('Botswana','Pula','BWP','P'),('Bulgaria','Leva','BGN','лв'),('Brazil','Reais','BRL','R$'),('Britain (United Kingdom)','Pounds','GBP','£'),('Brunei Darussalam','Dollars','BND','$'),('Cambodia','Riels','KHR','៛'),('Canada','Dollars','CAD','$'),('Cayman Islands','Dollars','KYD','$'),('Chile','Pesos','CLP','$'),('China','Yuan Renminbi','CNY','¥'),('Colombia','Pesos','COP','$'),('Costa Rica','Colón','CRC','₡'),('Croatia','Kuna','HRK','kn'),('Cuba','Pesos','CUP','₱'),('Cyprus','Euro','EUR','€'),('Czech Republic','Koruny','CZK','Kč'),('Denmark','Kroner','DKK','kr'),('Dominican Republic','Pesos','DOP ','RD$'),('East Caribbean','Dollars','XCD','$'),('Egypt','Pounds','EGP','£'),('El Salvador','Colones','SVC','$'),('England (United Kingdom)','Pounds','GBP','£'),('Euro','Euro','EUR','€'),('Falkland Islands','Pounds','FKP','£'),('Fiji','Dollars','FJD','$'),('France','Euro','EUR','€'),('Ghana','Cedis','GHC','¢'),('Gibraltar','Pounds','GIP','£'),('Greece','Euro','EUR','€'),('Guatemala','Quetzales','GTQ','Q'),('Guernsey','Pounds','GGP','£'),('Guyana','Dollars','GYD','$'),('Holland (Netherlands)','Euro','EUR','€'),('Honduras','Lempiras','HNL','L'),('Hong Kong','Dollars','HKD','$'),('Hungary','Forint','HUF','Ft'),('Iceland','Kronur','ISK','kr'),('India','Rupees','INR','Rp'),('Indonesia','Rupiahs','IDR','Rp'),('Iran','Rials','IRR','﷼'),('Ireland','Euro','EUR','€'),('Isle of Man','Pounds','IMP','£'),('Israel','New Shekels','ILS','₪'),('Italy','Euro','EUR','€'),('Jamaica','Dollars','JMD','J$'),('Japan','Yen','JPY','¥'),('Jersey','Pounds','JEP','£'),('Kazakhstan','Tenge','KZT','лв'),('Korea (North)','Won','KPW','₩'),('Korea (South)','Won','KRW','₩'),('Kyrgyzstan','Soms','KGS','лв'),('Laos','Kips','LAK','₭'),('Latvia','Lati','LVL','Ls'),('Lebanon','Pounds','LBP','£'),('Liberia','Dollars','LRD','$'),('Liechtenstein','Switzerland Francs','CHF','CHF'),('Lithuania','Litai','LTL','Lt'),('Luxembourg','Euro','EUR','€'),('Macedonia','Denars','MKD','ден'),('Malaysia','Ringgits','MYR','RM'),('Malta','Euro','EUR','€'),('Mauritius','Rupees','MUR','₨'),('Mexico','Pesos','MXN','$'),('Mongolia','Tugriks','MNT','₮'),('Mozambique','Meticais','MZN','MT'),('Namibia','Dollars','NAD','$'),('Nepal','Rupees','NPR','₨'),('Netherlands Antilles','Guilders','ANG','ƒ'),('Netherlands','Euro','EUR','€'),('New Zealand','Dollars','NZD','$'),('Nicaragua','Cordobas','NIO','C$'),('Nigeria','Nairas','NGN','₦'),('North Korea','Won','KPW','₩'),('Norway','Krone','NOK','kr'),('Oman','Rials','OMR','﷼'),('Pakistan','Rupees','PKR','₨'),('Panama','Balboa','PAB','B/.'),('Paraguay','Guarani','PYG','Gs'),('Peru','Nuevos Soles','PEN','S/.'),('Philippines','Pesos','PHP','Php'),('Poland','Zlotych','PLN','zł'),('Qatar','Rials','QAR','﷼'),('Romania','New Lei','RON','lei'),('Russia','Rubles','RUB','руб'),('Saint Helena','Pounds','SHP','£'),('Saudi Arabia','Riyals','SAR','﷼'),('Serbia','Dinars','RSD','Дин.'),('Seychelles','Rupees','SCR','₨'),('Singapore','Dollars','SGD','$'),('Slovenia','Euro','EUR','€'),('Solomon Islands','Dollars','SBD','$'),('Somalia','Shillings','SOS','S'),('South Africa','Rand','ZAR','R'),('South Korea','Won','KRW','₩'),('Spain','Euro','EUR','€'),('Sri Lanka','Rupees','LKR','₨'),('Sweden','Kronor','SEK','kr'),('Switzerland','Francs','CHF','CHF'),('Suriname','Dollars','SRD','$'),('Syria','Pounds','SYP','£'),('Taiwan','New Dollars','TWD','NT$'),('Thailand','Baht','THB','฿'),('Trinidad and Tobago','Dollars','TTD','TT$'),('Turkey','Lira','TRY','TL'),('Turkey','Liras','TRL','£'),('Tuvalu','Dollars','TVD','$'),('Ukraine','Hryvnia','UAH','₴'),('United Kingdom','Pounds','GBP','£'),('United States of America','Dollars','USD','$'),('Uruguay','Pesos','UYU','$U'),('Uzbekistan','Sums','UZS','лв'),('Vatican City','Euro','EUR','€'),('Venezuela','Bolivares Fuertes','VEF','Bs'),('Vietnam','Dong','VND','₫'),('Yemen','Rials','YER','﷼'),('Zimbabwe','Zimbabwe Dollars','ZWD','Z$'),('India','Rupees','INR','₹');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_accounts`
--

DROP TABLE IF EXISTS `ifrs_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_accounts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `currency_id` bigint unsigned NOT NULL,
  `code` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` enum('NON_CURRENT_ASSET','CONTRA_ASSET','INVENTORY','BANK','CURRENT_ASSET','RECEIVABLE','NON_CURRENT_LIABILITY','CONTROL','CURRENT_LIABILITY','PAYABLE','RECONCILIATION','EQUITY','OPERATING_REVENUE','OPERATING_EXPENSE','NON_OPERATING_REVENUE','DIRECT_EXPENSE','OVERHEAD_EXPENSE','OTHER_EXPENSE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ifrs_accounts_entity_id_foreign` (`entity_id`),
  KEY `ifrs_accounts_category_id_foreign` (`category_id`),
  KEY `ifrs_accounts_currency_id_foreign` (`currency_id`),
  CONSTRAINT `ifrs_accounts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ifrs_categories` (`id`),
  CONSTRAINT `ifrs_accounts_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `ifrs_currencies` (`id`),
  CONSTRAINT `ifrs_accounts_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_accounts`
--

LOCK TABLES `ifrs_accounts` WRITE;
/*!40000 ALTER TABLE `ifrs_accounts` DISABLE KEYS */;
INSERT INTO `ifrs_accounts` VALUES (1,1,NULL,1,301,'Bank Account',NULL,'BANK',NULL,NULL,'2021-10-01 06:37:47','2021-10-01 06:37:47'),(2,1,NULL,1,4001,'Sales Account',NULL,'OPERATING_REVENUE',NULL,NULL,'2021-10-01 06:43:07','2021-10-01 06:43:07'),(3,1,NULL,1,501,'Example Client Account',NULL,'RECEIVABLE',NULL,NULL,'2021-10-01 06:43:49','2021-10-01 06:43:49'),(4,1,NULL,1,2401,'Example Supplier Account',NULL,'PAYABLE',NULL,NULL,'2021-10-01 06:44:09','2021-10-01 06:44:09'),(5,1,17,1,5001,'Operations Expense Account',NULL,'OPERATING_EXPENSE',NULL,NULL,'2021-10-01 06:44:41','2021-10-01 07:01:27'),(6,1,NULL,1,1,'Office Equipment Account',NULL,'NON_CURRENT_ASSET',NULL,NULL,'2021-10-01 06:45:19','2021-10-01 06:45:19'),(7,1,NULL,1,2101,'Sales VAT Account',NULL,'CONTROL',NULL,NULL,'2021-10-01 06:46:27','2021-10-01 06:46:27'),(8,1,NULL,1,2102,'Input VAT Account',NULL,'CONTROL',NULL,NULL,'2021-10-01 06:46:43','2021-10-01 06:46:43');
/*!40000 ALTER TABLE `ifrs_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_assignments`
--

DROP TABLE IF EXISTS `ifrs_assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_assignments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `transaction_id` bigint unsigned NOT NULL,
  `forex_account_id` bigint unsigned DEFAULT NULL,
  `assignment_date` datetime NOT NULL,
  `cleared_id` bigint unsigned NOT NULL,
  `cleared_type` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(13,4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ifrs_assignments_entity_id_foreign` (`entity_id`),
  KEY `ifrs_assignments_transaction_id_foreign` (`transaction_id`),
  KEY `ifrs_assignments_forex_account_id_foreign` (`forex_account_id`),
  CONSTRAINT `ifrs_assignments_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`),
  CONSTRAINT `ifrs_assignments_forex_account_id_foreign` FOREIGN KEY (`forex_account_id`) REFERENCES `ifrs_accounts` (`id`),
  CONSTRAINT `ifrs_assignments_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `ifrs_transactions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_assignments`
--

LOCK TABLES `ifrs_assignments` WRITE;
/*!40000 ALTER TABLE `ifrs_assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `ifrs_assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_balances`
--

DROP TABLE IF EXISTS `ifrs_balances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_balances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `account_id` bigint unsigned NOT NULL,
  `currency_id` bigint unsigned NOT NULL,
  `exchange_rate_id` bigint unsigned NOT NULL,
  `reporting_period_id` bigint unsigned NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_type` enum('IN','BL','JN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'JN',
  `balance_type` enum('D','C') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'D',
  `balance` decimal(13,4) NOT NULL,
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ifrs_balances_entity_id_foreign` (`entity_id`),
  KEY `ifrs_balances_currency_id_foreign` (`currency_id`),
  KEY `ifrs_balances_exchange_rate_id_foreign` (`exchange_rate_id`),
  KEY `ifrs_balances_account_id_foreign` (`account_id`),
  KEY `ifrs_balances_reporting_period_id_foreign` (`reporting_period_id`),
  CONSTRAINT `ifrs_balances_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `ifrs_accounts` (`id`),
  CONSTRAINT `ifrs_balances_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `ifrs_currencies` (`id`),
  CONSTRAINT `ifrs_balances_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`),
  CONSTRAINT `ifrs_balances_exchange_rate_id_foreign` FOREIGN KEY (`exchange_rate_id`) REFERENCES `ifrs_exchange_rates` (`id`),
  CONSTRAINT `ifrs_balances_reporting_period_id_foreign` FOREIGN KEY (`reporting_period_id`) REFERENCES `ifrs_reporting_periods` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_balances`
--

LOCK TABLES `ifrs_balances` WRITE;
/*!40000 ALTER TABLE `ifrs_balances` DISABLE KEYS */;
/*!40000 ALTER TABLE `ifrs_balances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_categories`
--

DROP TABLE IF EXISTS `ifrs_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `category_type` enum('NON_CURRENT_ASSET','CONTRA_ASSET','INVENTORY','BANK','CURRENT_ASSET','RECEIVABLE','NON_CURRENT_LIABILITY','CONTROL','CURRENT_LIABILITY','PAYABLE','RECONCILIATION','EQUITY','OPERATING_REVENUE','OPERATING_EXPENSE','NON_OPERATING_REVENUE','DIRECT_EXPENSE','OVERHEAD_EXPENSE','OTHER_EXPENSE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ifrs_categories_entity_id_foreign` (`entity_id`),
  CONSTRAINT `ifrs_categories_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_categories`
--

LOCK TABLES `ifrs_categories` WRITE;
/*!40000 ALTER TABLE `ifrs_categories` DISABLE KEYS */;
INSERT INTO `ifrs_categories` VALUES (1,2,'BANK','Bank Operasional',NULL,NULL,'2021-09-15 07:30:42','2021-09-15 07:30:42'),(2,1,'BANK','Cash',NULL,NULL,'2021-09-17 15:29:26','2021-09-17 15:29:26'),(3,1,'OPERATING_REVENUE','Penjualan Cash',NULL,NULL,'2021-09-17 15:30:45','2021-09-17 15:30:45'),(4,1,'BANK','Bank Operasional',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(5,1,'NON_CURRENT_ASSET','Non Current Asset',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(6,1,'CONTRA_ASSET','Contra Asset',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(7,1,'INVENTORY','Inventory',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(8,1,'CURRENT_ASSET','Current Asset',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(9,1,'RECEIVABLE','Receivable',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(10,1,'NON_CURRENT_LIABILITY','Non Current Liability',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(11,1,'CONTROL','Control',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(12,1,'CURRENT_LIABILITY','Current Liability',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(13,1,'PAYABLE','Payable',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(14,1,'RECONCILIATION','Reconciliation',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(15,1,'EQUITY','Equity',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(16,1,'OPERATING_REVENUE','Operating Revenue',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(17,1,'OPERATING_EXPENSE','Operating Expense',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(18,1,'NON_OPERATING_REVENUE','Non Operating Revenue',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(19,1,'DIRECT_EXPENSE','Direct Expense',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(20,1,'OVERHEAD_EXPENSE','Overhead Expense',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36'),(21,1,'OTHER_EXPENSE','Other Expense',NULL,NULL,'2021-09-21 15:54:36','2021-09-21 15:54:36');
/*!40000 ALTER TABLE `ifrs_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_closing_rates`
--

DROP TABLE IF EXISTS `ifrs_closing_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_closing_rates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `reporting_period_id` bigint unsigned NOT NULL,
  `exchange_rate_id` bigint unsigned NOT NULL,
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ifrs_closing_rates_entity_id_foreign` (`entity_id`),
  KEY `ifrs_closing_rates_reporting_period_id_foreign` (`reporting_period_id`),
  KEY `ifrs_closing_rates_exchange_rate_id_foreign` (`exchange_rate_id`),
  CONSTRAINT `ifrs_closing_rates_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`),
  CONSTRAINT `ifrs_closing_rates_exchange_rate_id_foreign` FOREIGN KEY (`exchange_rate_id`) REFERENCES `ifrs_exchange_rates` (`id`),
  CONSTRAINT `ifrs_closing_rates_reporting_period_id_foreign` FOREIGN KEY (`reporting_period_id`) REFERENCES `ifrs_reporting_periods` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_closing_rates`
--

LOCK TABLES `ifrs_closing_rates` WRITE;
/*!40000 ALTER TABLE `ifrs_closing_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `ifrs_closing_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_closing_transactions`
--

DROP TABLE IF EXISTS `ifrs_closing_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_closing_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `reporting_period_id` bigint unsigned NOT NULL,
  `transaction_id` bigint unsigned NOT NULL,
  `currency_id` bigint unsigned NOT NULL,
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ifrs_closing_transactions_entity_id_foreign` (`entity_id`),
  KEY `ifrs_closing_transactions_reporting_period_id_foreign` (`reporting_period_id`),
  KEY `ifrs_closing_transactions_transaction_id_foreign` (`transaction_id`),
  KEY `ifrs_closing_transactions_currency_id_foreign` (`currency_id`),
  CONSTRAINT `ifrs_closing_transactions_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `ifrs_currencies` (`id`),
  CONSTRAINT `ifrs_closing_transactions_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`),
  CONSTRAINT `ifrs_closing_transactions_reporting_period_id_foreign` FOREIGN KEY (`reporting_period_id`) REFERENCES `ifrs_reporting_periods` (`id`),
  CONSTRAINT `ifrs_closing_transactions_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `ifrs_transactions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_closing_transactions`
--

LOCK TABLES `ifrs_closing_transactions` WRITE;
/*!40000 ALTER TABLE `ifrs_closing_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ifrs_closing_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_currencies`
--

DROP TABLE IF EXISTS `ifrs_currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_currencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ifrs_currencies_entity_id_foreign` (`entity_id`),
  CONSTRAINT `ifrs_currencies_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_currencies`
--

LOCK TABLES `ifrs_currencies` WRITE;
/*!40000 ALTER TABLE `ifrs_currencies` DISABLE KEYS */;
INSERT INTO `ifrs_currencies` VALUES (1,1,'Rupiah','IDR',NULL,NULL,'2021-09-11 08:30:20','2021-09-11 08:30:20');
/*!40000 ALTER TABLE `ifrs_currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_entities`
--

DROP TABLE IF EXISTS `ifrs_entities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_entities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `currency_id` bigint unsigned DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `multi_currency` tinyint(1) NOT NULL DEFAULT '0',
  `mid_year_balances` tinyint(1) NOT NULL DEFAULT '0',
  `year_start` int NOT NULL DEFAULT '1',
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'id_IDR',
  PRIMARY KEY (`id`),
  KEY `ifrs_entities_parent_id_foreign` (`parent_id`),
  CONSTRAINT `ifrs_entities_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `ifrs_entities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_entities`
--

LOCK TABLES `ifrs_entities` WRITE;
/*!40000 ALTER TABLE `ifrs_entities` DISABLE KEYS */;
INSERT INTO `ifrs_entities` VALUES (1,1,NULL,'Maju Bersama Berkarya',0,0,1,NULL,NULL,'2021-09-11 08:02:12','2021-09-11 08:02:12','id_IDR'),(2,NULL,NULL,'Makmur Sentosa',0,0,1,NULL,NULL,'2021-09-11 08:05:40','2021-09-15 05:53:09','id_ID'),(3,NULL,2,'Makmur Sejati',0,0,1,NULL,NULL,'2021-09-15 05:53:41','2021-09-15 05:53:41','id_ID');
/*!40000 ALTER TABLE `ifrs_entities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_exchange_rates`
--

DROP TABLE IF EXISTS `ifrs_exchange_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_exchange_rates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `currency_id` bigint unsigned NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime DEFAULT NULL,
  `rate` decimal(13,4) NOT NULL DEFAULT '1.0000',
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ifrs_exchange_rates_entity_id_foreign` (`entity_id`),
  KEY `ifrs_exchange_rates_currency_id_foreign` (`currency_id`),
  CONSTRAINT `ifrs_exchange_rates_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `ifrs_currencies` (`id`),
  CONSTRAINT `ifrs_exchange_rates_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_exchange_rates`
--

LOCK TABLES `ifrs_exchange_rates` WRITE;
/*!40000 ALTER TABLE `ifrs_exchange_rates` DISABLE KEYS */;
INSERT INTO `ifrs_exchange_rates` VALUES (1,1,1,'2021-10-02 01:52:36',NULL,1.0000,NULL,NULL,'2021-10-01 18:52:37','2021-10-01 18:52:37');
/*!40000 ALTER TABLE `ifrs_exchange_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_ledgers`
--

DROP TABLE IF EXISTS `ifrs_ledgers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_ledgers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `transaction_id` bigint unsigned NOT NULL,
  `vat_id` bigint unsigned DEFAULT NULL,
  `post_account` bigint unsigned NOT NULL,
  `folio_account` bigint unsigned NOT NULL,
  `line_item_id` bigint unsigned DEFAULT NULL,
  `currency_id` bigint unsigned NOT NULL,
  `posting_date` datetime NOT NULL,
  `entry_type` enum('D','C') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(13,4) NOT NULL,
  `hash` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rate` decimal(13,4) NOT NULL DEFAULT '1.0000',
  PRIMARY KEY (`id`),
  KEY `ifrs_ledgers_entity_id_foreign` (`entity_id`),
  KEY `ifrs_ledgers_currency_id_foreign` (`currency_id`),
  KEY `ifrs_ledgers_vat_id_foreign` (`vat_id`),
  KEY `ifrs_ledgers_transaction_id_foreign` (`transaction_id`),
  KEY `ifrs_ledgers_post_account_foreign` (`post_account`),
  KEY `ifrs_ledgers_folio_account_foreign` (`folio_account`),
  KEY `ifrs_ledgers_line_item_id_foreign` (`line_item_id`),
  CONSTRAINT `ifrs_ledgers_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `ifrs_currencies` (`id`),
  CONSTRAINT `ifrs_ledgers_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`),
  CONSTRAINT `ifrs_ledgers_folio_account_foreign` FOREIGN KEY (`folio_account`) REFERENCES `ifrs_accounts` (`id`),
  CONSTRAINT `ifrs_ledgers_line_item_id_foreign` FOREIGN KEY (`line_item_id`) REFERENCES `ifrs_line_items` (`id`),
  CONSTRAINT `ifrs_ledgers_post_account_foreign` FOREIGN KEY (`post_account`) REFERENCES `ifrs_accounts` (`id`),
  CONSTRAINT `ifrs_ledgers_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `ifrs_transactions` (`id`),
  CONSTRAINT `ifrs_ledgers_vat_id_foreign` FOREIGN KEY (`vat_id`) REFERENCES `ifrs_vats` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_ledgers`
--

LOCK TABLES `ifrs_ledgers` WRITE;
/*!40000 ALTER TABLE `ifrs_ledgers` DISABLE KEYS */;
INSERT INTO `ifrs_ledgers` VALUES (1,1,1,1,1,2,1,1,'2021-10-02 13:50:26','D',100.0000,'a9b1267743a10ec292b318443f370e66fcb87ec235dde08849bb552334e251a8',NULL,NULL,'2021-10-02 06:50:27','2021-10-02 06:50:28',1.0000),(2,1,1,1,2,1,1,1,'2021-10-02 13:50:26','C',100.0000,'40a2a7384412206fd87374c070b7746e5ba5b8d20d6a06b577fdddb4af384fbc',NULL,NULL,'2021-10-02 06:50:28','2021-10-02 06:50:28',1.0000),(3,1,2,1,1,2,2,1,'2021-10-02 13:51:57','D',100.0000,'ae153c987629885b169a7d6e286847c30129ee6ca12f1a1a20f389797a53b1dc',NULL,NULL,'2021-10-02 06:51:58','2021-10-02 06:51:58',1.0000),(4,1,2,1,2,1,2,1,'2021-10-02 13:51:57','C',100.0000,'1268377700e4c3f1474cb1a000fb95396b105e2a7d5be8bd578d8fb81723071c',NULL,NULL,'2021-10-02 06:51:58','2021-10-02 06:51:58',1.0000),(5,1,3,1,1,2,3,1,'2021-10-02 14:01:19','D',100.0000,'3875206f9ca48761adc99d508f030f308b5ac90ddc1cd34fffc9a4e1142b4259',NULL,NULL,'2021-10-02 07:01:19','2021-10-02 07:01:20',1.0000),(6,1,3,1,2,1,3,1,'2021-10-02 14:01:19','C',100.0000,'dd2139074ed8e41b6e19657e2c102607fa8c5a3b17afdbf8c29ea1ea1987b0e1',NULL,NULL,'2021-10-02 07:01:20','2021-10-02 07:01:20',1.0000),(7,1,4,1,1,2,4,1,'2021-10-02 14:02:54','D',100.0000,'b01e1fcb1f165dd32ccd88116d0948a36ae61dbe59d859c755c08f320546ac79',NULL,NULL,'2021-10-02 07:02:54','2021-10-02 07:02:55',1.0000),(8,1,4,1,2,1,4,1,'2021-10-02 14:02:54','C',100.0000,'1f8d8ac69af3531c982d98478a0204ac2c8f73bc5f2a8e69bfaf1c66f02ea9ee',NULL,NULL,'2021-10-02 07:02:55','2021-10-02 07:02:55',1.0000),(9,1,5,1,1,2,5,1,'2021-10-02 14:14:37','D',100.0000,'ee0e2c88d8d762ae9e3cd135acb4c15ec8af98990363ad8fab95d7dcf45dd790',NULL,NULL,'2021-10-02 07:14:38','2021-10-02 07:14:38',1.0000),(10,1,5,1,2,1,5,1,'2021-10-02 14:14:37','C',100.0000,'fe9b87afd96a3a0441a6c962f2a209629ac789ddbfd6654def12bc9372702dc9',NULL,NULL,'2021-10-02 07:14:38','2021-10-02 07:14:38',1.0000),(11,1,6,1,1,2,6,1,'2021-10-02 14:44:03','D',100.0000,'f4e565981e0818ac4d79411f072af8ae44952c3785ad43797aaa3fba15d7a6be',NULL,NULL,'2021-10-02 07:44:03','2021-10-02 07:44:04',1.0000),(12,1,6,1,2,1,6,1,'2021-10-02 14:44:03','C',100.0000,'ded5f642f1a147d6c65044c607e956d5f725bb833b2cc87842b8e59abf88c5f3',NULL,NULL,'2021-10-02 07:44:04','2021-10-02 07:44:04',1.0000),(13,1,7,1,1,2,7,1,'2021-10-02 14:59:37','D',100.0000,'1ba478c01b412620f76066ac5f30e2013f021deef4f330ea1b946ccf3c4319de',NULL,NULL,'2021-10-02 07:59:38','2021-10-02 07:59:38',1.0000),(14,1,7,1,2,1,7,1,'2021-10-02 14:59:37','C',100.0000,'3721c306e43794966c203ab1d076ebb57fd6e3a49d24856bea9d7d948205d316',NULL,NULL,'2021-10-02 07:59:38','2021-10-02 07:59:38',1.0000),(15,1,7,1,1,7,7,1,'2021-10-02 14:59:37','D',20.0000,'3c336166477acfa565de8ff7db029c958a2f488a3a2118eac5113fc91e0d51ed',NULL,NULL,'2021-10-02 07:59:39','2021-10-02 07:59:39',1.0000),(16,1,7,1,7,1,7,1,'2021-10-02 14:59:37','C',20.0000,'11a2628f0e0a0d27d2a2ea5e81dd0add6a501eefe8f9d95e3b9712b38558a611',NULL,NULL,'2021-10-02 07:59:39','2021-10-02 07:59:39',1.0000);
/*!40000 ALTER TABLE `ifrs_ledgers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_line_items`
--

DROP TABLE IF EXISTS `ifrs_line_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_line_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `account_id` bigint unsigned NOT NULL,
  `transaction_id` bigint unsigned DEFAULT NULL,
  `vat_id` bigint unsigned NOT NULL,
  `narration` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(13,4) NOT NULL,
  `quantity` decimal(13,4) NOT NULL DEFAULT '1.0000',
  `vat_inclusive` tinyint(1) NOT NULL DEFAULT '0',
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `credited` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ifrs_line_items_entity_id_foreign` (`entity_id`),
  KEY `ifrs_line_items_account_id_foreign` (`account_id`),
  KEY `ifrs_line_items_transaction_id_foreign` (`transaction_id`),
  KEY `ifrs_line_items_vat_id_foreign` (`vat_id`),
  CONSTRAINT `ifrs_line_items_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `ifrs_accounts` (`id`),
  CONSTRAINT `ifrs_line_items_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`),
  CONSTRAINT `ifrs_line_items_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `ifrs_transactions` (`id`),
  CONSTRAINT `ifrs_line_items_vat_id_foreign` FOREIGN KEY (`vat_id`) REFERENCES `ifrs_vats` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_line_items`
--

LOCK TABLES `ifrs_line_items` WRITE;
/*!40000 ALTER TABLE `ifrs_line_items` DISABLE KEYS */;
INSERT INTO `ifrs_line_items` VALUES (1,1,2,1,1,'Example Cash Sale Line Item',100.0000,1.0000,0,NULL,NULL,'2021-10-02 06:50:27','2021-10-02 06:50:27',1),(2,1,2,2,1,'Example Cash Sale Line Item',100.0000,1.0000,0,NULL,NULL,'2021-10-02 06:51:57','2021-10-02 06:51:57',1),(3,1,2,3,1,'Example Cash Sale Line Item',100.0000,1.0000,0,NULL,NULL,'2021-10-02 07:01:19','2021-10-02 07:01:19',1),(4,1,2,4,1,'Example Cash Sale Line Item',100.0000,1.0000,0,NULL,NULL,'2021-10-02 07:02:54','2021-10-02 07:02:54',1),(5,1,2,5,1,'Example Cash Sale Line Item',100.0000,1.0000,0,NULL,NULL,'2021-10-02 07:14:37','2021-10-02 07:14:37',1),(6,1,2,6,1,'Example Cash Sale Line Item',100.0000,1.0000,0,NULL,NULL,'2021-10-02 07:44:03','2021-10-02 07:44:03',1),(7,1,2,7,1,'Example Cash Sale Line Item',100.0000,1.0000,0,NULL,NULL,'2021-10-02 07:59:37','2021-10-02 07:59:38',1);
/*!40000 ALTER TABLE `ifrs_line_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_recycled_objects`
--

DROP TABLE IF EXISTS `ifrs_recycled_objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_recycled_objects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `recyclable_id` bigint NOT NULL,
  `recyclable_type` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ifrs_recycled_objects_entity_id_foreign` (`entity_id`),
  KEY `ifrs_recycled_objects_user_id_foreign` (`user_id`),
  CONSTRAINT `ifrs_recycled_objects_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`),
  CONSTRAINT `ifrs_recycled_objects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_recycled_objects`
--

LOCK TABLES `ifrs_recycled_objects` WRITE;
/*!40000 ALTER TABLE `ifrs_recycled_objects` DISABLE KEYS */;
/*!40000 ALTER TABLE `ifrs_recycled_objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_reporting_periods`
--

DROP TABLE IF EXISTS `ifrs_reporting_periods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_reporting_periods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `period_count` int NOT NULL,
  `status` enum('OPEN','CLOSED','ADJUSTING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OPEN',
  `calendar_year` year NOT NULL,
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `closing_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ifrs_reporting_periods_entity_id_foreign` (`entity_id`),
  CONSTRAINT `ifrs_reporting_periods_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_reporting_periods`
--

LOCK TABLES `ifrs_reporting_periods` WRITE;
/*!40000 ALTER TABLE `ifrs_reporting_periods` DISABLE KEYS */;
INSERT INTO `ifrs_reporting_periods` VALUES (4,1,1,'OPEN',2021,NULL,NULL,'2021-10-02 06:51:56','2021-10-02 06:51:56',NULL);
/*!40000 ALTER TABLE `ifrs_reporting_periods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_transactions`
--

DROP TABLE IF EXISTS `ifrs_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `account_id` bigint unsigned NOT NULL,
  `currency_id` bigint unsigned NOT NULL,
  `exchange_rate_id` bigint unsigned NOT NULL,
  `transaction_date` datetime NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_type` enum('CS','IN','CN','RC','CP','BL','DN','PY','CE','JN') COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credited` tinyint(1) NOT NULL DEFAULT '1',
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `main_account_amount` decimal(13,4) NOT NULL DEFAULT '0.0000',
  `compound` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ifrs_transactions_entity_id_foreign` (`entity_id`),
  KEY `ifrs_transactions_currency_id_foreign` (`currency_id`),
  KEY `ifrs_transactions_exchange_rate_id_foreign` (`exchange_rate_id`),
  KEY `ifrs_transactions_account_id_foreign` (`account_id`),
  CONSTRAINT `ifrs_transactions_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `ifrs_accounts` (`id`),
  CONSTRAINT `ifrs_transactions_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `ifrs_currencies` (`id`),
  CONSTRAINT `ifrs_transactions_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`),
  CONSTRAINT `ifrs_transactions_exchange_rate_id_foreign` FOREIGN KEY (`exchange_rate_id`) REFERENCES `ifrs_exchange_rates` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_transactions`
--

LOCK TABLES `ifrs_transactions` WRITE;
/*!40000 ALTER TABLE `ifrs_transactions` DISABLE KEYS */;
INSERT INTO `ifrs_transactions` VALUES (1,1,1,1,1,'2021-10-02 13:50:26',NULL,'CS01/0001','CS','Example Cash Sale',0,NULL,NULL,'2021-10-02 06:50:27','2021-10-02 06:50:27',0.0000,0),(2,1,1,1,1,'2021-10-02 13:51:57',NULL,'CS01/0002','CS','Example Cash Sale',0,NULL,NULL,'2021-10-02 06:51:57','2021-10-02 06:51:57',0.0000,0),(3,1,1,1,1,'2021-10-02 14:01:19',NULL,'CS01/0003','CS','Example Cash Sale',0,NULL,NULL,'2021-10-02 07:01:19','2021-10-02 07:01:19',0.0000,0),(4,1,1,1,1,'2021-10-02 14:02:54',NULL,'CS01/0004','CS','Example Cash Sale',0,NULL,NULL,'2021-10-02 07:02:54','2021-10-02 07:02:54',0.0000,0),(5,1,1,1,1,'2021-10-02 14:14:37',NULL,'CS01/0005','CS','Example Cash Sale',0,NULL,NULL,'2021-10-02 07:14:37','2021-10-02 07:14:37',0.0000,0),(6,1,1,1,1,'2021-10-02 14:44:03',NULL,'CS01/0006','CS','Example Cash Sale',0,NULL,NULL,'2021-10-02 07:44:03','2021-10-02 07:44:03',0.0000,0),(7,1,1,1,1,'2021-10-02 14:59:37',NULL,'CS01/0007','CS','Example Cash Sale',0,NULL,NULL,'2021-10-02 07:59:37','2021-10-02 07:59:37',0.0000,0);
/*!40000 ALTER TABLE `ifrs_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifrs_vats`
--

DROP TABLE IF EXISTS `ifrs_vats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifrs_vats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` bigint unsigned NOT NULL,
  `account_id` bigint unsigned DEFAULT NULL,
  `code` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(13,4) NOT NULL,
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ifrs_vats_entity_id_foreign` (`entity_id`),
  KEY `ifrs_vats_account_id_foreign` (`account_id`),
  CONSTRAINT `ifrs_vats_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `ifrs_accounts` (`id`),
  CONSTRAINT `ifrs_vats_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `ifrs_entities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifrs_vats`
--

LOCK TABLES `ifrs_vats` WRITE;
/*!40000 ALTER TABLE `ifrs_vats` DISABLE KEYS */;
INSERT INTO `ifrs_vats` VALUES (1,1,7,'O','PPn Keluaran',20.0000,NULL,NULL,'2021-10-01 06:19:30','2021-10-02 07:58:51'),(2,1,NULL,'I','PPn Masukan',10.0000,NULL,NULL,'2021-10-01 06:21:08','2021-10-01 06:21:08'),(3,1,NULL,'Z','Tanpa PPn',0.0000,NULL,NULL,'2021-10-01 06:22:08','2021-10-01 06:22:08');
/*!40000 ALTER TABLE `ifrs_vats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_permissions`
--

DROP TABLE IF EXISTS `menu_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_permissions` (
  `menu_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`menu_id`,`permission_id`),
  KEY `fk_menu_permission_permissions` (`permission_id`),
  CONSTRAINT `fk_menu_permission_menus` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  CONSTRAINT `fk_menu_permission_permissions` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_permissions`
--

LOCK TABLES `menu_permissions` WRITE;
/*!40000 ALTER TABLE `menu_permissions` DISABLE KEYS */;
INSERT INTO `menu_permissions` VALUES (4,1,'1'),(4,2,'1'),(5,5,'1'),(5,6,'1'),(5,13,'1'),(5,14,'1'),(6,9,'1'),(6,10,'1'),(8,21,'1'),(10,17,'1'),(11,29,'1'),(12,25,'1'),(15,110,'1'),(16,61,'1'),(17,45,'1'),(18,49,'1'),(19,57,'1'),(20,69,'1'),(21,77,'1'),(22,65,'1'),(23,73,'1'),(24,77,'1'),(25,77,'1'),(27,102,'1'),(28,89,'1'),(29,93,'1'),(30,97,'1'),(31,114,'1'),(32,125,'1'),(33,105,'1');
/*!40000 ALTER TABLE `menu_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `_lft` int unsigned DEFAULT NULL,
  `_rgt` int unsigned DEFAULT NULL,
  `seq_number` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Master Data','Header menu master','1','2021-08-09 08:10:07','2021-09-11 14:41:27','cil-address-book',NULL,NULL,5,32,1),(2,'Accounting','Header menu accounting','1','2021-08-09 08:10:07','2021-09-15 14:05:12','cil-address-book',NULL,NULL,33,46,2),(3,'Inventory','Header menu inventory','1','2021-08-09 08:10:07','2021-09-15 14:05:16','cil-address-book',NULL,NULL,47,62,3),(4,'Menu','Manage menu','1','2021-08-09 08:10:07','2021-09-11 14:41:26','cil-address-book','base/menus',1,24,25,1),(5,'User','Manage users','1','2021-08-09 08:10:07','2021-09-11 14:41:26','cil-address-book','base/users',1,26,27,2),(6,'Role','Manage role','1','2021-08-09 08:10:07','2021-09-11 14:41:27','cil-address-book','base/roles',1,28,29,3),(7,'Permission','Manage users','1','2021-08-09 08:10:07','2021-09-11 14:41:27','cil-address-book','base/permissions',1,30,31,1),(8,'Vehicle Group','Manage vehicle group','1','2021-08-10 13:44:02','2021-09-11 14:41:25','cil-truck','base/vehicleGroups',1,22,23,5),(10,'City','Manage city','1','2021-08-10 13:48:39','2021-09-11 14:41:25','cil-building','base/cities',1,20,21,7),(11,'Route Trip','manage route trip','1','2021-08-10 13:50:15','2021-09-11 14:41:24','cil-transfer','base/routeTrips',1,18,19,8),(12,'Vendor','Manage vendor','1','2021-08-10 13:52:37','2021-09-11 14:41:24','cil-cart','base/vendorExpeditions',1,16,17,9),(13,'Purchase','purchasing','1','2021-08-12 14:21:01','2021-08-12 14:22:07','cil-baby-carriage',NULL,NULL,3,4,4),(14,'Finance','keuangan','1','2021-08-12 14:22:07','2021-08-12 14:22:07','cil-money',NULL,NULL,1,2,5),(15,'Company','Master perusahaan','1','2021-08-15 15:30:18','2021-09-11 14:41:24','cil-building','accounting/ifrsEntities',1,14,15,9),(16,'Warehouse','Data Warehouse','1','2021-08-15 15:32:14','2021-09-15 14:05:15','cil-library-building','inventory/warehouses',3,60,61,1),(17,'Uom Category','Unit of measure category','1','2021-08-16 07:23:57','2021-09-11 14:41:23','cil-battery-alert','base/uomCategories',1,12,13,10),(18,'UOM','Unit of measure','1','2021-08-16 07:25:08','2021-09-11 14:41:23','cil-3d','base/uoms',1,10,11,11),(19,'Product','Product','1','2021-08-16 07:26:24','2021-09-11 14:41:22','cil-command','base/products',1,8,9,12),(20,'Adjustment Stock','Stock opname','1','2021-08-16 07:28:48','2021-09-15 14:05:15','cil-storage','inventory/stockInventories',3,58,59,2),(21,'Movement','history movement','1','2021-08-16 07:30:08','2021-09-15 14:05:14','cil-move','inventory/stockPickings',3,56,57,3),(22,'Current Stock','Current Stock','1','2021-08-16 07:31:10','2021-09-15 14:05:14','cil-storage','inventory/stockQuants',3,54,55,4),(23,'Picking Type','Picking type','1','2021-08-17 14:03:03','2021-09-15 14:05:13','cil-transfer','inventory/stockPickingTypes',3,52,53,5),(24,'BTB Synchronize','Sinkronisasi BTB','1','2021-08-17 15:18:23','2021-09-15 14:05:13','cil-data-transfer-down','inventory/synchronizeInStockPickings',3,50,51,6),(25,'BKB Synchronize','BKB Synchronize','1','2021-08-17 15:19:20','2021-09-15 14:05:13','cil-data-transfer-up','inventory/synchronizeOutStockPickings',3,48,49,7),(27,'Chart Of Account','Chart Of Account','1','2021-08-17 22:37:51','2021-09-15 14:05:12','cil-book','accounting/ifrsAccounts',2,44,45,1),(28,'Journal','master jurnal','1','2021-08-21 14:27:01','2021-09-15 14:05:11','cil-address-book','accounting/accountJournals',2,42,43,3),(29,'Invoice','Invoice','1','2021-08-21 14:30:12','2021-09-15 14:05:11','cil-calendar-check','accounting/accountInvoices',2,40,41,4),(30,'Journal Entry','jurnal entri manual','1','2021-08-21 14:31:20','2021-09-15 14:05:11','cil-money','accounting/accountMoves',2,38,39,5),(31,'Currency','Mata uang','1','2021-09-11 14:41:21','2021-09-11 14:41:22','cil-money','accounting/ifrsCurrencies',1,6,7,10),(32,'VAT','Value added tax (PPN)','1','2021-09-15 14:03:44','2021-09-15 14:05:10','cil-taxi','accounting/ifrsVats',2,36,37,2),(33,'Account Category','Account Category to grouping account on report','1','2021-09-15 14:05:09','2021-09-15 14:05:10','cil-object-group','accounting/ifrsCategories',2,34,35,3);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (62,'2014_10_12_000000_create_users_table',1),(63,'2014_10_12_100000_create_password_resets_table',1),(64,'2019_08_19_000000_create_failed_jobs_table',1),(65,'2021_07_07_080836_create_permission_tables',1),(66,'2021_08_06_225424_create_menus_table',1),(67,'2021_08_06_225434_create_menu_permissions_table',1),(68,'2021_08_07_141959_create_table_vehicle_group',1),(69,'2021_08_08_221410_create_vendor_expedition',1),(70,'2021_08_08_221613_create_city',1),(71,'2021_08_08_221712_create_route_trip',1),(72,'2021_08_08_221756_create_vendor_expedition_trip',1),(73,'2021_08_08_232800_create_vehicle',1),(74,'2021_08_12_044822_alter_vendor_expedition_trip',2),(75,'2021_08_15_140404_add_is_expedition_is_supplier_is_customer',3),(76,'2021_08_15_140840_create_company_table',3),(77,'2021_08_15_140842_create_uom_category_table',3),(78,'2021_08_15_140844_create_uom_table',3),(79,'2021_08_15_140849_create_setting_table',3),(80,'2021_08_15_141205_create_product_table',3),(81,'2021_08_15_141928_create_stock_warehouse_table',3),(82,'2021_08_15_142009_create_stock_quant_table',4),(83,'2021_08_15_142111_create_stock_inventory_table',4),(84,'2021_08_15_142128_create_stock_inventory_line_table',4),(85,'2021_08_15_142522_create_stock_picking_type_table',4),(86,'2021_08_15_142538_create_stock_picking_table',4),(87,'2021_08_16_082344_add_column_product_table',5),(88,'2021_08_17_152401_create_account_type_table',6),(89,'2021_08_17_152551_create_account_account_table',6),(90,'2021_08_19_150326_alter_stock_picking',7),(91,'2021_08_20_221659_create_account_journal_table',8),(92,'2021_08_20_222115_create_account_invoice_table',8),(93,'2021_08_20_222117_create_account_invoice_line_table',8),(94,'2021_08_20_222920_create_account_move_table',8),(95,'2021_08_20_223132_create_account_move_line_table',8),(96,'2021_09_08_054823_create_activity_log_table',9),(97,'2014_10_12_000000_ifrs_create_or_update_users_table',10),(98,'2020_01_09_200440_create_ifrs_entities_table',10),(99,'2020_01_09_212616_create_ifrs_currencies_table',10),(100,'2020_01_10_182721_create_ifrs_exchange_rates_table',10),(101,'2020_01_10_204541_create_ifrs_reporting_periods_table',10),(102,'2020_01_10_213405_create_ifrs_recycled_objects_table',10),(103,'2020_01_16_152746_create_ifrs_categories_table',10),(104,'2020_01_16_215416_create_ifrs_accounts_table',10),(105,'2020_01_17_113024_create_ifrs_vats_table',10),(106,'2020_01_21_202744_create_ifrs_balances_table',10),(107,'2020_01_22_115407_create_ifrs_transactions_table',10),(108,'2020_01_22_201904_create_ifrs_assignments_table',10),(109,'2020_02_09_131007_create_ifrs_line_items_table',10),(110,'2020_02_09_131135_create_ifrs_ledgers_table',10),(111,'2021_03_04_194118_add_entity_locale',10),(112,'2021_04_30_183324_rename_amount_column',10),(113,'2021_04_30_200319_add_rate_column',10),(114,'2021_06_04_155845_create_closing_rates_table',10),(115,'2021_06_11_202626_add_closing_rate_column',10),(116,'2021_06_12_211003_create_closing_transactions_table',10),(117,'2021_08_25_191550_add_compound_transaction_columns',10),(118,'2021_08_25_192141_add_line_item_entry_column',10),(119,'2021_09_09_152314_alter_user_add_deleted_at',11),(120,'2021_10_05_214653_remove_company_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\Base\\User',1),(2,'App\\Models\\Base\\User',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'menu-index','web',NULL,NULL),(2,'menu-create','web',NULL,NULL),(3,'menu-update','web',NULL,NULL),(4,'menu-delete','web',NULL,NULL),(5,'user-index','web',NULL,NULL),(6,'user-create','web',NULL,NULL),(7,'user-update','web',NULL,NULL),(8,'user-delete','web',NULL,NULL),(9,'role-index','web',NULL,NULL),(10,'role-create','web',NULL,NULL),(11,'role-update','web',NULL,NULL),(12,'role-delete','web',NULL,NULL),(13,'permission-index','web',NULL,NULL),(14,'permission-create','web',NULL,NULL),(15,'permission-update','web',NULL,NULL),(16,'permission-delete','web',NULL,NULL),(17,'city-index','web','2021-08-10 06:38:08','2021-08-10 06:38:08'),(18,'city-create','web','2021-08-10 06:38:09','2021-08-10 06:38:09'),(19,'city-update','web','2021-08-10 06:38:09','2021-08-10 06:38:09'),(20,'city-delete','web','2021-08-10 06:38:09','2021-08-10 06:38:09'),(21,'vehicle_group-index','web','2021-08-10 06:38:12','2021-08-10 06:38:12'),(22,'vehicle_group-create','web','2021-08-10 06:38:12','2021-08-10 06:38:12'),(23,'vehicle_group-update','web','2021-08-10 06:38:12','2021-08-10 06:38:12'),(24,'vehicle_group-delete','web','2021-08-10 06:38:13','2021-08-10 06:38:13'),(25,'vendor_expedition-index','web','2021-08-10 06:39:40','2021-08-10 06:39:40'),(26,'vendor_expedition-create','web','2021-08-10 06:39:40','2021-08-10 06:39:40'),(27,'vendor_expedition-update','web','2021-08-10 06:39:41','2021-08-10 06:39:41'),(28,'vendor_expedition-delete','web','2021-08-10 06:39:41','2021-08-10 06:39:41'),(29,'route_trip-index','web','2021-08-10 06:39:43','2021-08-10 06:39:43'),(30,'route_trip-create','web','2021-08-10 06:39:43','2021-08-10 06:39:43'),(31,'route_trip-update','web','2021-08-10 06:39:43','2021-08-10 06:39:43'),(32,'route_trip-delete','web','2021-08-10 06:39:43','2021-08-10 06:39:43'),(33,'vendor_expedition_trip-index','web','2021-08-10 06:39:44','2021-08-10 06:39:44'),(34,'vendor_expedition_trip-create','web','2021-08-10 06:39:44','2021-08-10 06:39:44'),(35,'vendor_expedition_trip-update','web','2021-08-10 06:39:44','2021-08-10 06:39:44'),(36,'vendor_expedition_trip-delete','web','2021-08-10 06:39:45','2021-08-10 06:39:45'),(37,'vehicle-index','web','2021-08-10 06:39:48','2021-08-10 06:39:48'),(38,'vehicle-create','web','2021-08-10 06:39:48','2021-08-10 06:39:48'),(39,'vehicle-update','web','2021-08-10 06:39:48','2021-08-10 06:39:48'),(40,'vehicle-delete','web','2021-08-10 06:39:48','2021-08-10 06:39:48'),(41,'company-index','web','2021-08-15 08:20:27','2021-08-15 08:20:27'),(42,'company-create','web','2021-08-15 08:20:27','2021-08-15 08:20:27'),(43,'company-update','web','2021-08-15 08:20:27','2021-08-15 08:20:27'),(44,'company-delete','web','2021-08-15 08:20:27','2021-08-15 08:20:27'),(45,'uom_category-index','web','2021-08-15 08:20:28','2021-08-15 08:20:28'),(46,'uom_category-create','web','2021-08-15 08:20:28','2021-08-15 08:20:28'),(47,'uom_category-update','web','2021-08-15 08:20:28','2021-08-15 08:20:28'),(48,'uom_category-delete','web','2021-08-15 08:20:29','2021-08-15 08:20:29'),(49,'uom-index','web','2021-08-15 08:20:30','2021-08-15 08:20:30'),(50,'uom-create','web','2021-08-15 08:20:30','2021-08-15 08:20:30'),(51,'uom-update','web','2021-08-15 08:20:30','2021-08-15 08:20:30'),(52,'uom-delete','web','2021-08-15 08:20:30','2021-08-15 08:20:30'),(53,'setting-index','web','2021-08-15 08:20:31','2021-08-15 08:20:31'),(54,'setting-create','web','2021-08-15 08:20:31','2021-08-15 08:20:31'),(55,'setting-update','web','2021-08-15 08:20:31','2021-08-15 08:20:31'),(56,'setting-delete','web','2021-08-15 08:20:31','2021-08-15 08:20:31'),(57,'product-index','web','2021-08-15 08:20:32','2021-08-15 08:20:32'),(58,'product-create','web','2021-08-15 08:20:32','2021-08-15 08:20:32'),(59,'product-update','web','2021-08-15 08:20:32','2021-08-15 08:20:32'),(60,'product-delete','web','2021-08-15 08:20:32','2021-08-15 08:20:32'),(61,'warehouse-index','web','2021-08-15 08:21:55','2021-08-15 08:21:55'),(62,'warehouse-create','web','2021-08-15 08:21:55','2021-08-15 08:21:55'),(63,'warehouse-update','web','2021-08-15 08:21:55','2021-08-15 08:21:55'),(64,'warehouse-delete','web','2021-08-15 08:21:55','2021-08-15 08:21:55'),(65,'stock_quant-index','web','2021-08-15 08:22:16','2021-08-15 08:22:16'),(66,'stock_quant-create','web','2021-08-15 08:22:16','2021-08-15 08:22:16'),(67,'stock_quant-update','web','2021-08-15 08:22:16','2021-08-15 08:22:16'),(68,'stock_quant-delete','web','2021-08-15 08:22:16','2021-08-15 08:22:16'),(69,'stock_inventory-index','web','2021-08-15 08:22:17','2021-08-15 08:22:17'),(70,'stock_inventory-create','web','2021-08-15 08:22:17','2021-08-15 08:22:17'),(71,'stock_inventory-update','web','2021-08-15 08:22:17','2021-08-15 08:22:17'),(72,'stock_inventory-delete','web','2021-08-15 08:22:17','2021-08-15 08:22:17'),(73,'stock_picking_type-index','web','2021-08-15 08:22:18','2021-08-15 08:22:18'),(74,'stock_picking_type-create','web','2021-08-15 08:22:18','2021-08-15 08:22:18'),(75,'stock_picking_type-update','web','2021-08-15 08:22:18','2021-08-15 08:22:18'),(76,'stock_picking_type-delete','web','2021-08-15 08:22:19','2021-08-15 08:22:19'),(77,'stock_picking-index','web','2021-08-15 08:22:19','2021-08-15 08:22:19'),(78,'stock_picking-create','web','2021-08-15 08:22:19','2021-08-15 08:22:19'),(79,'stock_picking-update','web','2021-08-15 08:22:20','2021-08-15 08:22:20'),(80,'stock_picking-delete','web','2021-08-15 08:22:20','2021-08-15 08:22:20'),(81,'account_account-index','web','2021-08-17 15:30:27','2021-08-17 15:30:27'),(82,'account_account-create','web','2021-08-17 15:30:27','2021-08-17 15:30:27'),(83,'account_account-update','web','2021-08-17 15:30:28','2021-08-17 15:30:28'),(84,'account_account-delete','web','2021-08-17 15:30:28','2021-08-17 15:30:28'),(85,'account_type-index','web','2021-08-17 15:30:30','2021-08-17 15:30:30'),(86,'account_type-create','web','2021-08-17 15:30:30','2021-08-17 15:30:30'),(87,'account_type-update','web','2021-08-17 15:30:30','2021-08-17 15:30:30'),(88,'account_type-delete','web','2021-08-17 15:30:30','2021-08-17 15:30:30'),(89,'account_journal-index','web','2021-08-21 07:10:57','2021-08-21 07:10:57'),(90,'account_journal-create','web','2021-08-21 07:10:58','2021-08-21 07:10:58'),(91,'account_journal-update','web','2021-08-21 07:10:58','2021-08-21 07:10:58'),(92,'account_journal-delete','web','2021-08-21 07:10:58','2021-08-21 07:10:58'),(93,'account_invoice-index','web','2021-08-21 07:11:00','2021-08-21 07:11:00'),(94,'account_invoice-create','web','2021-08-21 07:11:00','2021-08-21 07:11:00'),(95,'account_invoice-update','web','2021-08-21 07:11:00','2021-08-21 07:11:00'),(96,'account_invoice-delete','web','2021-08-21 07:11:00','2021-08-21 07:11:00'),(97,'account_move-index','web','2021-08-21 07:11:02','2021-08-21 07:11:02'),(98,'account_move-create','web','2021-08-21 07:11:02','2021-08-21 07:11:02'),(99,'account_move-update','web','2021-08-21 07:11:02','2021-08-21 07:11:02'),(100,'account_move-delete','web','2021-08-21 07:11:03','2021-08-21 07:11:03'),(101,'ifrs_accounts-index','web','2021-09-11 07:08:01','2021-09-11 07:08:01'),(102,'ifrs_accounts-create','web','2021-09-11 07:08:01','2021-09-11 07:08:01'),(103,'ifrs_accounts-update','web','2021-09-11 07:08:01','2021-09-11 07:08:01'),(104,'ifrs_accounts-delete','web','2021-09-11 07:08:01','2021-09-11 07:08:01'),(105,'ifrs_categories-index','web','2021-09-11 07:08:03','2021-09-11 07:08:03'),(106,'ifrs_categories-create','web','2021-09-11 07:08:04','2021-09-11 07:08:04'),(107,'ifrs_categories-update','web','2021-09-11 07:08:04','2021-09-11 07:08:04'),(108,'ifrs_categories-delete','web','2021-09-11 07:08:04','2021-09-11 07:08:04'),(109,'ifrs_entities-index','web','2021-09-11 07:08:05','2021-09-11 07:08:05'),(110,'ifrs_entities-create','web','2021-09-11 07:08:05','2021-09-11 07:08:05'),(111,'ifrs_entities-update','web','2021-09-11 07:08:06','2021-09-11 07:08:06'),(112,'ifrs_entities-delete','web','2021-09-11 07:08:06','2021-09-11 07:08:06'),(113,'ifrs_currencies-index','web','2021-09-11 07:08:07','2021-09-11 07:08:07'),(114,'ifrs_currencies-create','web','2021-09-11 07:08:07','2021-09-11 07:08:07'),(115,'ifrs_currencies-update','web','2021-09-11 07:08:07','2021-09-11 07:08:07'),(116,'ifrs_currencies-delete','web','2021-09-11 07:08:07','2021-09-11 07:08:07'),(117,'ifrs_exchange_rates-index','web','2021-09-11 07:08:09','2021-09-11 07:08:09'),(118,'ifrs_exchange_rates-create','web','2021-09-11 07:08:09','2021-09-11 07:08:09'),(119,'ifrs_exchange_rates-update','web','2021-09-11 07:08:09','2021-09-11 07:08:09'),(120,'ifrs_exchange_rates-delete','web','2021-09-11 07:08:09','2021-09-11 07:08:09'),(121,'ifrs_reporting_periods-index','web','2021-09-11 07:08:10','2021-09-11 07:08:10'),(122,'ifrs_reporting_periods-create','web','2021-09-11 07:08:10','2021-09-11 07:08:10'),(123,'ifrs_reporting_periods-update','web','2021-09-11 07:08:10','2021-09-11 07:08:10'),(124,'ifrs_reporting_periods-delete','web','2021-09-11 07:08:11','2021-09-11 07:08:11'),(125,'ifrs_vats-index','web','2021-09-11 07:08:12','2021-09-11 07:08:12'),(126,'ifrs_vats-create','web','2021-09-11 07:08:12','2021-09-11 07:08:12'),(127,'ifrs_vats-update','web','2021-09-11 07:08:12','2021-09-11 07:08:12'),(128,'ifrs_vats-delete','web','2021-09-11 07:08:12','2021-09-11 07:08:12'),(129,'btb_view_tmp-index','web','2021-10-03 07:24:54','2021-10-03 07:24:54'),(130,'btb_view_tmp-create','web','2021-10-03 07:24:55','2021-10-03 07:24:55'),(131,'btb_view_tmp-update','web','2021-10-03 07:24:56','2021-10-03 07:24:56'),(132,'btb_view_tmp-delete','web','2021-10-03 07:24:56','2021-10-03 07:24:56');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uom_id` bigint unsigned NOT NULL,
  `saleable` tinyint(1) DEFAULT NULL,
  `storeable` tinyint(1) DEFAULT NULL,
  `consumeable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_name_unique` (`name`),
  KEY `fk_product_uom` (`uom_id`),
  CONSTRAINT `fk_product_uom` FOREIGN KEY (`uom_id`) REFERENCES `uom` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Galon LNH','LNH',1,NULL,NULL,'2021-08-16 00:41:56','2021-08-16 00:41:56',1,NULL,NULL,NULL),(2,'Aqua 300 ml','AQ300',1,NULL,NULL,'2021-08-16 01:43:52','2021-08-16 01:43:52',1,1,NULL,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(115,1),(116,1),(117,1),(118,1),(119,1),(120,1),(121,1),(122,1),(123,1),(124,1),(125,1),(126,1),(127,1),(128,1),(29,2),(30,2),(31,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrator','web','2021-08-08 18:10:04','2021-08-08 18:10:04'),(2,'kasir','web','2021-08-12 07:05:26','2021-08-12 07:05:26'),(3,'gudang','web','2021-09-08 15:47:33','2021-09-08 15:47:33'),(4,'produksi','web','2021-09-08 15:47:33','2021-09-08 15:47:33'),(7,'sales','web','2021-09-08 15:55:54','2021-09-08 15:55:54'),(8,'helper','web','2021-09-08 15:55:54','2021-09-08 15:55:54');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `route_trip`
--

DROP TABLE IF EXISTS `route_trip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `route_trip` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_group_id` bigint unsigned NOT NULL,
  `origin` bigint unsigned NOT NULL,
  `destination` bigint unsigned NOT NULL,
  `price` decimal(12,2) unsigned NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `route_trip_vehicle_group_id_origin_destination_unique` (`vehicle_group_id`,`origin`,`destination`),
  KEY `fk_route_trip_origin` (`origin`),
  KEY `fk_route_trip_destination` (`destination`),
  CONSTRAINT `fk_route_trip_destination` FOREIGN KEY (`destination`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_route_trip_origin` FOREIGN KEY (`origin`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_route_trip_vehicle_group` FOREIGN KEY (`vehicle_group_id`) REFERENCES `vehicle_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `route_trip`
--

LOCK TABLES `route_trip` WRITE;
/*!40000 ALTER TABLE `route_trip` DISABLE KEYS */;
INSERT INTO `route_trip` VALUES (1,'Pasuruan - Malang','ok',1,2,3,986.00,1,NULL,NULL,'2021-08-10 08:02:57','2021-08-10 08:02:57'),(2,'Pasuruan - Malang 5000','lanjut',2,2,3,1990.34,1,1,NULL,'2021-08-11 20:09:49','2021-08-11 21:12:39'),(3,'Pasuruan - Surabaya 5000','lanjutkan',2,3,4,1850.50,1,NULL,NULL,'2021-08-11 21:15:39','2021-08-11 21:15:39');
/*!40000 ALTER TABLE `route_trip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_inventory`
--

DROP TABLE IF EXISTS `stock_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_inventory` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` bigint unsigned NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stock_inventory_warehouse` (`warehouse_id`),
  CONSTRAINT `fk_stock_inventory_warehouse` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_inventory`
--

LOCK TABLES `stock_inventory` WRITE;
/*!40000 ALTER TABLE `stock_inventory` DISABLE KEYS */;
INSERT INTO `stock_inventory` VALUES (1,'Starting Stock',1,1,NULL,'2021-08-16 01:12:53','2021-08-16 01:03:40','2021-08-16 01:12:53'),(2,'Opening Stock',1,1,NULL,NULL,'2021-08-16 08:18:52','2021-08-16 08:18:52'),(8,'Buka stock',1,1,NULL,NULL,'2021-08-17 07:36:06','2021-08-17 07:36:06'),(9,'Update stock',1,1,NULL,NULL,'2021-08-17 07:41:02','2021-08-17 07:41:02'),(10,'ok',1,1,NULL,NULL,'2021-08-17 07:42:58','2021-08-17 07:42:58'),(12,'Stock Opname 2021-08',1,1,NULL,NULL,'2021-08-19 08:12:49','2021-08-19 08:12:49');
/*!40000 ALTER TABLE `stock_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_inventory_line`
--

DROP TABLE IF EXISTS `stock_inventory_line`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_inventory_line` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stock_inventory_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `uom_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stock_inventory_line_inventory` (`stock_inventory_id`),
  KEY `fk_stock_inventory_line_product` (`product_id`),
  KEY `fk_stock_inventory_line_uom` (`uom_id`),
  CONSTRAINT `fk_stock_inventory_line_inventory` FOREIGN KEY (`stock_inventory_id`) REFERENCES `stock_inventory` (`id`),
  CONSTRAINT `fk_stock_inventory_line_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_stock_inventory_line_uom` FOREIGN KEY (`uom_id`) REFERENCES `uom` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_inventory_line`
--

LOCK TABLES `stock_inventory_line` WRITE;
/*!40000 ALTER TABLE `stock_inventory_line` DISABLE KEYS */;
INSERT INTO `stock_inventory_line` VALUES (1,8,2,1,0,NULL,'2021-08-17 07:36:06','2021-08-17 07:36:06'),(2,8,1,1,37,NULL,'2021-08-17 07:36:08','2021-08-17 07:36:08'),(3,9,2,1,0,NULL,'2021-08-17 07:41:02','2021-08-17 07:41:02'),(4,9,1,1,35,NULL,'2021-08-17 07:41:02','2021-08-17 07:41:02'),(5,10,2,1,27,NULL,'2021-08-17 07:42:59','2021-08-17 07:42:59'),(6,10,1,1,12,NULL,'2021-08-17 07:42:59','2021-08-17 07:42:59'),(7,12,2,1,12,NULL,'2021-08-19 08:12:50','2021-08-19 08:12:50'),(8,12,1,1,15,NULL,'2021-08-19 08:12:50','2021-08-19 08:12:50');
/*!40000 ALTER TABLE `stock_inventory_line` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_picking`
--

DROP TABLE IF EXISTS `stock_picking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_picking` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `warehouse_id` bigint unsigned NOT NULL,
  `stock_picking_type_id` bigint unsigned NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `state` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_references` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` bigint unsigned DEFAULT NULL,
  `note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint unsigned NOT NULL,
  `table_references` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stock_picking_warehouse` (`warehouse_id`),
  KEY `fk_stock_picking_stock_picking_type` (`stock_picking_type_id`),
  KEY `fk_stock_picking_product` (`product_id`),
  CONSTRAINT `fk_stock_picking_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_stock_picking_stock_picking_type` FOREIGN KEY (`stock_picking_type_id`) REFERENCES `stock_picking_type` (`id`),
  CONSTRAINT `fk_stock_picking_warehouse` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_picking`
--

LOCK TABLES `stock_picking` WRITE;
/*!40000 ALTER TABLE `stock_picking` DISABLE KEYS */;
INSERT INTO `stock_picking` VALUES (2,1,1,'Adjustment Stock',37,'completed','8',NULL,'Buka stock',1,NULL,NULL,'2021-08-17 07:36:06','2021-08-17 07:36:06',2,NULL),(3,1,1,'Adjustment Stock',35,'completed','9',NULL,'Update stock',1,NULL,NULL,'2021-08-17 07:41:02','2021-08-17 07:41:02',2,NULL),(4,1,1,'Adjustment Stock',27,'completed','10',NULL,'ok',1,NULL,NULL,'2021-08-17 07:42:58','2021-08-17 07:42:58',2,NULL),(5,1,1,'Adjustment Stock',12,'completed','10',NULL,'ok',1,NULL,NULL,'2021-08-17 07:42:59','2021-08-17 07:42:59',2,NULL),(6,1,1,'Stock Opname 2021-08',-15,'completed','12',NULL,'Adjustment Stock',1,NULL,NULL,'2021-08-19 08:12:49','2021-08-19 08:12:49',2,'stock_inventory'),(7,1,1,'Stock Opname 2021-08',3,'completed','12',NULL,'Adjustment Stock',1,NULL,NULL,'2021-08-19 08:12:50','2021-08-19 08:12:50',1,'stock_inventory');
/*!40000 ALTER TABLE `stock_picking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_picking_type`
--

DROP TABLE IF EXISTS `stock_picking_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_picking_type` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_picking_type`
--

LOCK TABLES `stock_picking_type` WRITE;
/*!40000 ALTER TABLE `stock_picking_type` DISABLE KEYS */;
INSERT INTO `stock_picking_type` VALUES (1,'Adjustment','internal',1,1,NULL,'2021-08-17 07:14:41','2021-08-19 07:58:50'),(2,'Receipts','incoming',NULL,NULL,NULL,NULL,NULL),(3,'PoS Orders','outgoing',NULL,NULL,NULL,NULL,NULL),(4,'Pick','internal',NULL,NULL,NULL,NULL,NULL),(5,'Pack','internal',NULL,NULL,NULL,NULL,NULL),(6,'Internal Transfers','internal',NULL,NULL,NULL,NULL,NULL),(7,'Delivery Orders','outgoing',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `stock_picking_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_quant`
--

DROP TABLE IF EXISTS `stock_quant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_quant` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `warehouse_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `uom_id` bigint unsigned NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stock_quant_product` (`product_id`),
  KEY `fk_stock_quant_warehouse` (`warehouse_id`),
  KEY `fk_stock_quant_uom` (`uom_id`),
  CONSTRAINT `fk_stock_quant_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_stock_quant_uom` FOREIGN KEY (`uom_id`) REFERENCES `uom` (`id`),
  CONSTRAINT `fk_stock_quant_warehouse` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_quant`
--

LOCK TABLES `stock_quant` WRITE;
/*!40000 ALTER TABLE `stock_quant` DISABLE KEYS */;
INSERT INTO `stock_quant` VALUES (1,2,1,12,1,1,1,NULL,'2021-08-16 01:43:52','2021-08-19 08:12:49'),(2,1,1,15,1,1,1,NULL,'2021-08-16 08:51:03','2021-08-19 08:12:50');
/*!40000 ALTER TABLE `stock_quant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uom`
--

DROP TABLE IF EXISTS `uom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uom` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom_category_id` bigint unsigned NOT NULL,
  `factor` decimal(8,2) NOT NULL DEFAULT '1.00',
  `uom_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'reference',
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_uom_uom_category` (`uom_category_id`),
  CONSTRAINT `fk_uom_uom_category` FOREIGN KEY (`uom_category_id`) REFERENCES `uom_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uom`
--

LOCK TABLES `uom` WRITE;
/*!40000 ALTER TABLE `uom` DISABLE KEYS */;
INSERT INTO `uom` VALUES (1,'Buah',2,1.00,'references',1,NULL,NULL,'2021-08-16 00:33:29','2021-08-16 00:33:29'),(2,'Kg',4,1.00,'references',1,NULL,NULL,'2021-08-16 00:35:46','2021-08-16 00:35:46');
/*!40000 ALTER TABLE `uom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uom_category`
--

DROP TABLE IF EXISTS `uom_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uom_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uom_category`
--

LOCK TABLES `uom_category` WRITE;
/*!40000 ALTER TABLE `uom_category` DISABLE KEYS */;
INSERT INTO `uom_category` VALUES (1,'Volume',1,NULL,NULL,'2021-08-16 00:31:52','2021-08-16 00:31:52'),(2,'Satuan',1,NULL,NULL,'2021-08-16 00:32:18','2021-08-16 00:32:18'),(3,'Luas',1,NULL,NULL,'2021-08-16 00:32:32','2021-08-16 00:32:32'),(4,'Berat',1,NULL,NULL,'2021-08-16 00:32:45','2021-08-16 00:32:45');
/*!40000 ALTER TABLE `uom_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `entity_id` bigint unsigned DEFAULT NULL,
  `destroyed_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin@admin.com',NULL,'$2y$10$yGWW/yAt1VV4Ryt8w/DMle4ezzAImhf1AeJimxeApqFrh/3ewuIj.',NULL,'2021-08-08 18:10:03','2021-08-08 18:10:03',NULL,NULL,NULL),(2,'Kasir','cashier@admin.com',NULL,'kasir',NULL,'2021-08-12 07:03:43','2021-08-12 07:03:43',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `number_registration` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nopol',
  `number_identity` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'stnk',
  `vehicle_group_id` bigint unsigned NOT NULL,
  `vendor_expedition_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vehicle_vehicle_group` (`vehicle_group_id`),
  KEY `fk_vehicle_vendor_expedition` (`vendor_expedition_id`),
  CONSTRAINT `fk_vehicle_vehicle_group` FOREIGN KEY (`vehicle_group_id`) REFERENCES `vehicle_group` (`id`),
  CONSTRAINT `fk_vehicle_vendor_expedition` FOREIGN KEY (`vendor_expedition_id`) REFERENCES `vendor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (1,'JK3245KL','JTM-8976-908990',1,2,NULL,1,1,'2021-08-10 07:34:08','2021-08-10 07:45:17'),(2,'HU8976KL','90876HJYT8989KLJN',2,1,NULL,1,NULL,'2021-08-10 07:48:01','2021-08-10 07:48:01'),(3,'UY7865TY','JKHG67543RTE',2,2,NULL,1,NULL,'2021-08-10 09:00:54','2021-08-10 09:00:54'),(4,'UY7865LJ','JKHG67543RTE',2,2,NULL,1,NULL,'2021-08-10 09:02:33','2021-08-10 09:02:33');
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_group`
--

DROP TABLE IF EXISTS `vehicle_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_group` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL,
  `uom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'liter',
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicle_group_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_group`
--

LOCK TABLES `vehicle_group` WRITE;
/*!40000 ALTER TABLE `vehicle_group` DISABLE KEYS */;
INSERT INTO `vehicle_group` VALUES (1,'Kapasitas 2000 botol',2000,'botol','2000',NULL,1,1,'2021-08-10 07:04:20','2021-08-10 07:10:37'),(2,'Kapasitas 5000 botol',5000,'botol','5000',NULL,1,NULL,'2021-08-10 07:11:16','2021-08-10 07:11:16');
/*!40000 ALTER TABLE `vehicle_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_supplier` tinyint(1) DEFAULT NULL,
  `is_customer` tinyint(1) DEFAULT NULL,
  `is_expedition` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vendor_expedition_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor`
--

LOCK TABLES `vendor` WRITE;
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
INSERT INTO `vendor` VALUES (1,'PT. Berkah Jaya Logistik','Jln. Mawar 43','bkj@admin.com',NULL,1,NULL,'2021-08-10 07:13:17','2021-08-12 01:50:40',NULL,NULL,NULL),(2,'CV. Lestari Jalan','Jln. Melati 211','melati@admin.com',1,NULL,NULL,'2021-08-10 07:13:48','2021-08-10 07:13:48',NULL,NULL,NULL),(3,'CV. Kaji Jaya','Manukan kulon 89','kj@admon.com',NULL,1,NULL,'2021-08-12 01:15:11','2021-08-12 01:51:14',NULL,NULL,NULL),(5,'CV Donny Wijaya','manuka','ok@ghafda.com',NULL,1,NULL,'2021-08-12 01:52:18','2021-08-16 01:00:24',NULL,1,NULL);
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_expedition_trip`
--

DROP TABLE IF EXISTS `vendor_expedition_trip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendor_expedition_trip` (
  `vendor_expedition_id` bigint unsigned NOT NULL,
  `route_trip_id` bigint unsigned NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `fk_vendor_expedition_trip_vendor_1` (`vendor_expedition_id`),
  KEY `fk_vendor_expedition_trip_trip_2` (`route_trip_id`),
  CONSTRAINT `fk_vendor_expedition_trip_trip_2` FOREIGN KEY (`route_trip_id`) REFERENCES `route_trip` (`id`),
  CONSTRAINT `fk_vendor_expedition_trip_vendor` FOREIGN KEY (`vendor_expedition_id`) REFERENCES `vendor` (`id`),
  CONSTRAINT `fk_vendor_expedition_trip_vendor_1` FOREIGN KEY (`vendor_expedition_id`) REFERENCES `vendor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_expedition_trip`
--

LOCK TABLES `vendor_expedition_trip` WRITE;
/*!40000 ALTER TABLE `vendor_expedition_trip` DISABLE KEYS */;
INSERT INTO `vendor_expedition_trip` VALUES (1,3,NULL,NULL,NULL,NULL),(1,1,NULL,NULL,NULL,NULL),(3,2,NULL,NULL,NULL,NULL),(5,1,NULL,NULL,NULL,NULL),(5,2,NULL,NULL,NULL,NULL),(5,3,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `vendor_expedition_trip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `warehouse` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint unsigned NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `warehouse_internal_code_unique` (`internal_code`),
  KEY `fk_warehouse_company` (`company_id`),
  CONSTRAINT `fk_warehouse_company` FOREIGN KEY (`company_id`) REFERENCES `ifrs_entities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse`
--

LOCK TABLES `warehouse` WRITE;
/*!40000 ALTER TABLE `warehouse` DISABLE KEYS */;
INSERT INTO `warehouse` VALUES (1,'Gudang LMS','WHLMS',1,1,NULL,NULL,'2021-08-15 08:35:27','2021-08-15 08:35:27');
/*!40000 ALTER TABLE `warehouse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dmsoffice'
--

--
-- Final view structure for view `btb_view`
--

/*!50001 DROP VIEW IF EXISTS `btb_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ahmad`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `btb_view` AS select '2021-10-01' AS `Tgl_BTB`,'079-0000076' AS `No_BTB`,116 AS `ID_Vendor`,'PT. TIV-Prod pandaan' AS `Nama_Vendor`,'LMS' AS `Nama_PT`,9087878 AS `No_CO`,67678687 AS `No_DN`,'2021-09-24' AS `Tgl_sjp`,'Pasuruan' AS `Depo`,'A.220' AS `Nama_Produk` union select '2021-10-02' AS `Tgl_BTB`,'079-0000076' AS `No_BTB`,116 AS `ID_Vendor`,'PT. TIV-Prod pandaan' AS `Nama_Vendor`,'LMS' AS `Nama_PT`,9087878 AS `No_CO`,67678687 AS `No_DN`,'2021-09-24' AS `Tgl_sjp`,'Pasuruan' AS `Depo`,'A.220' AS `Nama_Produk` union select '2021-10-03' AS `Tgl_BTB`,'079-0000076' AS `No_BTB`,116 AS `ID_Vendor`,'PT. TIV-Prod pandaan' AS `Nama_Vendor`,'LMS' AS `Nama_PT`,9087878 AS `No_CO`,67678687 AS `No_DN`,'2021-09-24' AS `Tgl_sjp`,'Pasuruan' AS `Depo`,'A.220' AS `Nama_Produk` union select '2021-10-04' AS `Tgl_BTB`,'079-0000076' AS `No_BTB`,116 AS `ID_Vendor`,'PT. TIV-Prod pandaan' AS `Nama_Vendor`,'LMS' AS `Nama_PT`,9087878 AS `No_CO`,67678687 AS `No_DN`,'2021-09-24' AS `Tgl_sjp`,'Pasuruan' AS `Depo`,'A.220' AS `Nama_Produk` union select '2021-10-05' AS `Tgl_BTB`,'079-0000076' AS `No_BTB`,116 AS `ID_Vendor`,'PT. TIV-Prod pandaan' AS `Nama_Vendor`,'LMS' AS `Nama_PT`,9087878 AS `No_CO`,67678687 AS `No_DN`,'2021-09-24' AS `Tgl_sjp`,'Pasuruan' AS `Depo`,'A.220' AS `Nama_Produk` union select '2021-10-06' AS `Tgl_BTB`,'079-0000076' AS `No_BTB`,116 AS `ID_Vendor`,'PT. TIV-Prod pandaan' AS `Nama_Vendor`,'LMS' AS `Nama_PT`,9087878 AS `No_CO`,67678687 AS `No_DN`,'2021-09-24' AS `Tgl_sjp`,'Pasuruan' AS `Depo`,'A.220' AS `Nama_Produk` union select '2021-10-06' AS `Tgl_BTB`,'079-0000076' AS `No_BTB`,116 AS `ID_Vendor`,'PT. TIV-Prod pandaan' AS `Nama_Vendor`,'LMS' AS `Nama_PT`,9087878 AS `No_CO`,67678687 AS `No_DN`,'2021-09-24' AS `Tgl_sjp`,'Pasuruan' AS `Depo`,'A.220' AS `Nama_Produk` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-06  5:43:27
