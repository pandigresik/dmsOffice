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
-- Table structure for table `account_account`
--

DROP TABLE IF EXISTS `account_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_account` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint unsigned NOT NULL,
  `is_off_balance` tinyint(1) DEFAULT NULL,
  `reconcile` tinyint(1) DEFAULT NULL,
  `internal_type` enum('receivable','payable','other','liquidity') COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_group` enum('asset','liability','equity','income','expense','off_balance') COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_account_code_unique` (`code`),
  KEY `fk_account_account_company` (`company_id`),
  CONSTRAINT `fk_account_account_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account_invoice`
--

DROP TABLE IF EXISTS `account_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_invoice` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_total` decimal(15,2) NOT NULL,
  `company_id` bigint unsigned NOT NULL,
  `vendor_id` bigint unsigned NOT NULL,
  `account_journal_id` bigint unsigned NOT NULL,
  `type` enum('out','in') COLLATE utf8mb4_unicode_ci NOT NULL,
  `references` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `state` enum('draft','cancel','validate','open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `date_invoice` date NOT NULL,
  `date_due` date NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_account_invoice_company` (`company_id`),
  KEY `fk_account_invoice_vendor` (`vendor_id`),
  KEY `fk_account_invoice_account_journal` (`account_journal_id`),
  CONSTRAINT `fk_account_invoice_account_journal` FOREIGN KEY (`account_journal_id`) REFERENCES `account_journal` (`id`),
  CONSTRAINT `fk_account_invoice_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `fk_account_invoice_vendor` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account_invoice_line`
--

DROP TABLE IF EXISTS `account_invoice_line`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_invoice_line` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `company_id` bigint unsigned NOT NULL,
  `vendor_id` bigint unsigned NOT NULL,
  `account_invoice_id` bigint unsigned NOT NULL,
  `account_account_id` bigint unsigned NOT NULL,
  `account_journal_id` bigint unsigned NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `price_unit` decimal(12,2) NOT NULL,
  `price_total` decimal(15,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `amount_total` decimal(15,2) NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_account_invoice_line_product` (`product_id`),
  KEY `fk_account_invoice_line_company` (`company_id`),
  KEY `fk_account_invoice_line_vendor` (`vendor_id`),
  KEY `fk_account_invoice_line_account_invoice` (`account_invoice_id`),
  KEY `fk_account_invoice_line_account_account` (`account_account_id`),
  KEY `fk_account_invoice_line_account_journal` (`account_journal_id`),
  CONSTRAINT `fk_account_invoice_line_account_account` FOREIGN KEY (`account_account_id`) REFERENCES `account_account` (`id`),
  CONSTRAINT `fk_account_invoice_line_account_invoice` FOREIGN KEY (`account_invoice_id`) REFERENCES `account_invoice` (`id`),
  CONSTRAINT `fk_account_invoice_line_account_journal` FOREIGN KEY (`account_journal_id`) REFERENCES `account_journal` (`id`),
  CONSTRAINT `fk_account_invoice_line_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `fk_account_invoice_line_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_account_invoice_line_vendor` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account_journal`
--

DROP TABLE IF EXISTS `account_journal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_journal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint unsigned NOT NULL,
  `default_debit_account_id` bigint unsigned DEFAULT NULL,
  `default_credit_account_id` bigint unsigned DEFAULT NULL,
  `type` enum('sale','purchase','general','bank','cash') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_account_journal_company` (`company_id`),
  KEY `fk_account_journal_default_debit_account` (`default_debit_account_id`),
  KEY `fk_account_journal_default_credit_account` (`default_credit_account_id`),
  CONSTRAINT `fk_account_journal_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `fk_account_journal_default_credit_account` FOREIGN KEY (`default_credit_account_id`) REFERENCES `account_account` (`id`),
  CONSTRAINT `fk_account_journal_default_debit_account` FOREIGN KEY (`default_debit_account_id`) REFERENCES `account_account` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account_move`
--

DROP TABLE IF EXISTS `account_move`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_move` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint unsigned NOT NULL,
  `account_journal_id` bigint unsigned NOT NULL,
  `ref` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `state` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `move_type` enum('move_in','move_out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` text COLLATE utf8mb4_unicode_ci,
  `stock_picking_id` bigint unsigned DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_account_move_company` (`company_id`),
  KEY `fk_account_move_account_journal` (`account_journal_id`),
  KEY `fk_account_move_stock_picking` (`stock_picking_id`),
  CONSTRAINT `fk_account_move_account_journal` FOREIGN KEY (`account_journal_id`) REFERENCES `account_journal` (`id`),
  CONSTRAINT `fk_account_move_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `fk_account_move_stock_picking` FOREIGN KEY (`stock_picking_id`) REFERENCES `stock_picking` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account_move_line`
--

DROP TABLE IF EXISTS `account_move_line`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_move_line` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `account_move_id` bigint unsigned NOT NULL,
  `company_id` bigint unsigned NOT NULL,
  `account_journal_id` bigint unsigned NOT NULL,
  `account_invoice_id` bigint unsigned DEFAULT NULL,
  `debit` decimal(15,2) NOT NULL,
  `credit` decimal(15,2) NOT NULL,
  `balance` decimal(15,2) unsigned NOT NULL,
  `quantity` decimal(8,2) DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_account_move_line_product` (`product_id`),
  KEY `fk_account_move_line_account_move` (`account_move_id`),
  KEY `fk_account_move_line_company` (`company_id`),
  KEY `fk_account_move_line_account_journal` (`account_journal_id`),
  KEY `fk_account_move_line_account_invoice` (`account_invoice_id`),
  CONSTRAINT `fk_account_move_line_account_invoice` FOREIGN KEY (`account_invoice_id`) REFERENCES `account_invoice` (`id`),
  CONSTRAINT `fk_account_move_line_account_journal` FOREIGN KEY (`account_journal_id`) REFERENCES `account_journal` (`id`),
  CONSTRAINT `fk_account_move_line_account_move` FOREIGN KEY (`account_move_id`) REFERENCES `account_move` (`id`),
  CONSTRAINT `fk_account_move_line_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `fk_account_move_line_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account_type`
--

DROP TABLE IF EXISTS `account_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_type` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `include_initial_balance` tinyint(1) DEFAULT NULL,
  `type` enum('receivable','payable','other','liquidity') COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_group` enum('asset','liability','equity','income','expense','off_balance') COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `company_internal_code_unique` (`internal_code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `fk_warehouse_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-11 20:58:20
