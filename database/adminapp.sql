-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2016 at 05:50 PM
-- Server version: 5.5.41-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE IF NOT EXISTS `tbl_address` (
  `address_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `doc_type` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_address_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_address_profile` (
  `address_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_advisor`
--

CREATE TABLE IF NOT EXISTS `tbl_advisor` (
  `advisor_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advisor_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_advisor_profile` (
  `advisor_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_budget`
--

CREATE TABLE IF NOT EXISTS `tbl_budget` (
  `budget_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `budget_number` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_budget_company`
--

CREATE TABLE IF NOT EXISTS `tbl_budget_company` (
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `document_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_budget_company_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_budget_company_profile` (
  `company_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_budget_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_budget_profile` (
  `budget_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_buditem`
--

CREATE TABLE IF NOT EXISTS `tbl_buditem` (
  `item_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `document_type` varchar(32) DEFAULT NULL,
  `document_id` varchar(32) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Table structure for table `tbl_buditem_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_buditem_profile` (
  `item_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_cashaccount`
--

CREATE TABLE IF NOT EXISTS `tbl_cashaccount` (
  `cash_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_cashaccount_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_cashaccount_profile` (
  `cash_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- Table structure for table `tbl_cashexpense`
--

CREATE TABLE IF NOT EXISTS `tbl_cashexpense` (
  `cash_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `expense_number` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_cashexpense_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_cashexpense_profile` (
  `cash_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_cashflow`
--

CREATE TABLE IF NOT EXISTS `tbl_cashflow` (
  `cash_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `invoice_number` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_cashflow_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_cashflow_profile` (
  `cash_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_ccompany`
--

CREATE TABLE IF NOT EXISTS `tbl_ccompany` (
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `contact_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comp_doc_type` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_ccompany_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_ccompany_profile` (
  `company_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_client`
--

CREATE TABLE IF NOT EXISTS `tbl_client` (
  `client_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_client_profile` (
  `client_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE IF NOT EXISTS `tbl_company` (
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `thecompany` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `commercial` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identification` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_company_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_company_profile` (
  `company_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `contact_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_contact_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_profile` (
  `contact_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_custom`
--

CREATE TABLE IF NOT EXISTS `tbl_custom` (
  `custom_id` bigint(20) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ts_created` date NOT NULL,
  `ts_last_login` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_custom_profile` (
  `custom_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE IF NOT EXISTS `tbl_expense` (
  `expense_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `expense_number` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_expense_company`
--

CREATE TABLE IF NOT EXISTS `tbl_expense_company` (
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `document_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `tbl_expense_company_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_expense_company_profile` (
  `company_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_expense_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_expense_profile` (
  `expense_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_expitem`
--

CREATE TABLE IF NOT EXISTS `tbl_expitem` (
  `item_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `document_type` varchar(32) DEFAULT NULL,
  `document_id` varchar(32) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Table structure for table `tbl_expitem_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_expitem_profile` (
  `item_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE IF NOT EXISTS `tbl_invoice` (
  `invoice_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `invoice_number` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_invoice_company`
--

CREATE TABLE IF NOT EXISTS `tbl_invoice_company` (
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `document_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_invoice_company_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_invoice_company_profile` (
  `company_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_invoice_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_invoice_profile` (
  `invoice_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_item`
--

CREATE TABLE IF NOT EXISTS `tbl_item` (
  `item_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `document_type` varchar(32) DEFAULT NULL,
  `document_id` varchar(32) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8;

--
-- Table structure for table `tbl_item_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_item_profile` (
  `item_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_iva`
--

CREATE TABLE IF NOT EXISTS `tbl_iva` (
  `iva_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `invoice_ids` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expense_ids` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_iva_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_iva_profile` (
  `iva_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `message_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_message_profile` (
  `message_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ts_created` date NOT NULL,
  `company` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_product_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_product_profile` (
  `product_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_proforma`
--

CREATE TABLE IF NOT EXISTS `tbl_proforma` (
  `proforma_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `proforma_number` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proforma_company`
--

CREATE TABLE IF NOT EXISTS `tbl_proforma_company` (
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `document_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proforma_company_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_proforma_company_profile` (
  `company_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proforma_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_proforma_profile` (
  `proforma_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proitem`
--

CREATE TABLE IF NOT EXISTS `tbl_proitem` (
  `item_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `document_type` varchar(32) DEFAULT NULL,
  `document_id` varchar(32) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proitem_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_proitem_profile` (
  `item_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE IF NOT EXISTS `tbl_project` (
  `project_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `project_title` text COLLATE utf8_unicode_ci NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_project_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_project_profile` (
  `project_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase` (
  `purchase_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `purchase_number` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_company`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase_company` (
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `document_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_company_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase_company_profile` (
  `company_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase_profile` (
  `purchase_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_puritem`
--

CREATE TABLE IF NOT EXISTS `tbl_puritem` (
  `item_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `document_type` varchar(32) DEFAULT NULL,
  `document_id` varchar(32) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_puritem_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_puritem_profile` (
  `item_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_tax`
--

CREATE TABLE IF NOT EXISTS `tbl_sale_tax` (
  `sale_tax_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `document_id` bigint(20) NOT NULL,
  `document_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` bigint(100) NOT NULL,
  `document_date` date NOT NULL,
  `charged` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_socialnetwork`
--

CREATE TABLE IF NOT EXISTS `tbl_socialnetwork` (
  `user_id` bigint(20) NOT NULL,
  `follow` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE IF NOT EXISTS `tbl_task` (
  `task_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_task_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_task_profile` (
  `task_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_time`
--

CREATE TABLE IF NOT EXISTS `tbl_time` (
  `time_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `ts_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `tbl_time_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_time_profile` (
  `time_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ts_created` date NOT NULL,
  `ts_last_login` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `tbl_user_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_user_profile` (
  `user_id` bigint(20) NOT NULL,
  `profile_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`address_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_address_profile`
--
ALTER TABLE `tbl_address_profile`
  ADD PRIMARY KEY (`address_id`,`profile_key`);

--
-- Indexes for table `tbl_advisor`
--
ALTER TABLE `tbl_advisor`
  ADD PRIMARY KEY (`advisor_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_advisor_profile`
--
ALTER TABLE `tbl_advisor_profile`
  ADD PRIMARY KEY (`advisor_id`,`profile_key`);

--
-- Indexes for table `tbl_budget`
--
ALTER TABLE `tbl_budget`
  ADD PRIMARY KEY (`budget_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_budget_company`
--
ALTER TABLE `tbl_budget_company`
  ADD PRIMARY KEY (`company_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_budget_company_profile`
--
ALTER TABLE `tbl_budget_company_profile`
  ADD PRIMARY KEY (`company_id`,`profile_key`);

--
-- Indexes for table `tbl_budget_profile`
--
ALTER TABLE `tbl_budget_profile`
  ADD PRIMARY KEY (`budget_id`,`profile_key`);

--
-- Indexes for table `tbl_buditem`
--
ALTER TABLE `tbl_buditem`
  ADD PRIMARY KEY (`item_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_buditem_profile`
--
ALTER TABLE `tbl_buditem_profile`
  ADD PRIMARY KEY (`item_id`,`profile_key`);

--
-- Indexes for table `tbl_cashaccount`
--
ALTER TABLE `tbl_cashaccount`
  ADD PRIMARY KEY (`cash_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_cashaccount_profile`
--
ALTER TABLE `tbl_cashaccount_profile`
  ADD PRIMARY KEY (`cash_id`,`profile_key`);

--
-- Indexes for table `tbl_cashexpense`
--
ALTER TABLE `tbl_cashexpense`
  ADD PRIMARY KEY (`cash_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_cashexpense_profile`
--
ALTER TABLE `tbl_cashexpense_profile`
  ADD PRIMARY KEY (`cash_id`,`profile_key`);

--
-- Indexes for table `tbl_cashflow`
--
ALTER TABLE `tbl_cashflow`
  ADD PRIMARY KEY (`cash_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_cashflow_profile`
--
ALTER TABLE `tbl_cashflow_profile`
  ADD PRIMARY KEY (`cash_id`,`profile_key`);

--
-- Indexes for table `tbl_ccompany`
--
ALTER TABLE `tbl_ccompany`
  ADD PRIMARY KEY (`company_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_ccompany_profile`
--
ALTER TABLE `tbl_ccompany_profile`
  ADD PRIMARY KEY (`company_id`,`profile_key`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`client_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_client_profile`
--
ALTER TABLE `tbl_client_profile`
  ADD PRIMARY KEY (`client_id`,`profile_key`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_company_profile`
--
ALTER TABLE `tbl_company_profile`
  ADD PRIMARY KEY (`company_id`,`profile_key`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_contact_profile`
--
ALTER TABLE `tbl_contact_profile`
  ADD PRIMARY KEY (`contact_id`,`profile_key`);

--
-- Indexes for table `tbl_custom`
--
ALTER TABLE `tbl_custom`
  ADD PRIMARY KEY (`custom_id`,`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_custom_profile`
--
ALTER TABLE `tbl_custom_profile`
  ADD PRIMARY KEY (`custom_id`,`profile_key`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`expense_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_expense_company`
--
ALTER TABLE `tbl_expense_company`
  ADD PRIMARY KEY (`company_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_expense_company_profile`
--
ALTER TABLE `tbl_expense_company_profile`
  ADD PRIMARY KEY (`company_id`,`profile_key`);

--
-- Indexes for table `tbl_expense_profile`
--
ALTER TABLE `tbl_expense_profile`
  ADD PRIMARY KEY (`expense_id`,`profile_key`);

--
-- Indexes for table `tbl_expitem`
--
ALTER TABLE `tbl_expitem`
  ADD PRIMARY KEY (`item_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_expitem_profile`
--
ALTER TABLE `tbl_expitem_profile`
  ADD PRIMARY KEY (`item_id`,`profile_key`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoice_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_invoice_company`
--
ALTER TABLE `tbl_invoice_company`
  ADD PRIMARY KEY (`company_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_invoice_company_profile`
--
ALTER TABLE `tbl_invoice_company_profile`
  ADD PRIMARY KEY (`company_id`,`profile_key`);

--
-- Indexes for table `tbl_invoice_profile`
--
ALTER TABLE `tbl_invoice_profile`
  ADD PRIMARY KEY (`invoice_id`,`profile_key`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_item_profile`
--
ALTER TABLE `tbl_item_profile`
  ADD PRIMARY KEY (`item_id`,`profile_key`);

--
-- Indexes for table `tbl_iva`
--
ALTER TABLE `tbl_iva`
  ADD PRIMARY KEY (`iva_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_iva_profile`
--
ALTER TABLE `tbl_iva_profile`
  ADD PRIMARY KEY (`iva_id`,`profile_key`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`message_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_message_profile`
--
ALTER TABLE `tbl_message_profile`
  ADD PRIMARY KEY (`message_id`,`profile_key`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`,`user_id`,`company`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`company`);

--
-- Indexes for table `tbl_product_profile`
--
ALTER TABLE `tbl_product_profile`
  ADD PRIMARY KEY (`product_id`,`profile_key`);

--
-- Indexes for table `tbl_proforma`
--
ALTER TABLE `tbl_proforma`
  ADD PRIMARY KEY (`proforma_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_proforma_company`
--
ALTER TABLE `tbl_proforma_company`
  ADD PRIMARY KEY (`company_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_proforma_company_profile`
--
ALTER TABLE `tbl_proforma_company_profile`
  ADD PRIMARY KEY (`company_id`,`profile_key`);

--
-- Indexes for table `tbl_proforma_profile`
--
ALTER TABLE `tbl_proforma_profile`
  ADD PRIMARY KEY (`proforma_id`,`profile_key`);

--
-- Indexes for table `tbl_proitem`
--
ALTER TABLE `tbl_proitem`
  ADD PRIMARY KEY (`item_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_proitem_profile`
--
ALTER TABLE `tbl_proitem_profile`
  ADD PRIMARY KEY (`item_id`,`profile_key`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`project_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_project_profile`
--
ALTER TABLE `tbl_project_profile`
  ADD PRIMARY KEY (`project_id`,`profile_key`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`purchase_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_purchase_company`
--
ALTER TABLE `tbl_purchase_company`
  ADD PRIMARY KEY (`company_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_purchase_company_profile`
--
ALTER TABLE `tbl_purchase_company_profile`
  ADD PRIMARY KEY (`company_id`,`profile_key`);

--
-- Indexes for table `tbl_purchase_profile`
--
ALTER TABLE `tbl_purchase_profile`
  ADD PRIMARY KEY (`purchase_id`,`profile_key`);

--
-- Indexes for table `tbl_puritem`
--
ALTER TABLE `tbl_puritem`
  ADD PRIMARY KEY (`item_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_puritem_profile`
--
ALTER TABLE `tbl_puritem_profile`
  ADD PRIMARY KEY (`item_id`,`profile_key`);

--
-- Indexes for table `tbl_sale_tax`
--
ALTER TABLE `tbl_sale_tax`
  ADD PRIMARY KEY (`sale_tax_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `tbl_socialnetwork`
--
ALTER TABLE `tbl_socialnetwork`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`task_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_task_profile`
--
ALTER TABLE `tbl_task_profile`
  ADD PRIMARY KEY (`task_id`,`profile_key`);

--
-- Indexes for table `tbl_time`
--
ALTER TABLE `tbl_time`
  ADD PRIMARY KEY (`time_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_time_profile`
--
ALTER TABLE `tbl_time_profile`
  ADD PRIMARY KEY (`time_id`,`profile_key`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`,`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD PRIMARY KEY (`user_id`,`profile_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `address_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `tbl_advisor`
--
ALTER TABLE `tbl_advisor`
  MODIFY `advisor_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_budget`
--
ALTER TABLE `tbl_budget`
  MODIFY `budget_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_budget_company`
--
ALTER TABLE `tbl_budget_company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_buditem`
--
ALTER TABLE `tbl_buditem`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_cashaccount`
--
ALTER TABLE `tbl_cashaccount`
  MODIFY `cash_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_cashexpense`
--
ALTER TABLE `tbl_cashexpense`
  MODIFY `cash_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_cashflow`
--
ALTER TABLE `tbl_cashflow`
  MODIFY `cash_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_ccompany`
--
ALTER TABLE `tbl_ccompany`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `client_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `tbl_custom`
--
ALTER TABLE `tbl_custom`
  MODIFY `custom_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `expense_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_expense_company`
--
ALTER TABLE `tbl_expense_company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tbl_expitem`
--
ALTER TABLE `tbl_expitem`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoice_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `tbl_invoice_company`
--
ALTER TABLE `tbl_invoice_company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT for table `tbl_iva`
--
ALTER TABLE `tbl_iva`
  MODIFY `iva_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `tbl_proforma`
--
ALTER TABLE `tbl_proforma`
  MODIFY `proforma_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_proforma_company`
--
ALTER TABLE `tbl_proforma_company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_proitem`
--
ALTER TABLE `tbl_proitem`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `project_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `purchase_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_purchase_company`
--
ALTER TABLE `tbl_purchase_company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_puritem`
--
ALTER TABLE `tbl_puritem`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sale_tax`
--
ALTER TABLE `tbl_sale_tax`
  MODIFY `sale_tax_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `task_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_time`
--
ALTER TABLE `tbl_time`
  MODIFY `time_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=170;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD CONSTRAINT `tbl_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_address_profile`
--
ALTER TABLE `tbl_address_profile`
  ADD CONSTRAINT `tbl_address_profile_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `tbl_address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_advisor_profile`
--
ALTER TABLE `tbl_advisor_profile`
  ADD CONSTRAINT `tbl_advisor_profile_ibfk_1` FOREIGN KEY (`advisor_id`) REFERENCES `tbl_advisor` (`advisor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_ccompany_profile`
--
ALTER TABLE `tbl_ccompany_profile`
  ADD CONSTRAINT `tbl_ccompany_profile_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `tbl_ccompany` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_client_profile`
--
ALTER TABLE `tbl_client_profile`
  ADD CONSTRAINT `tbl_client_profile_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD CONSTRAINT `tbl_company_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_company_profile`
--
ALTER TABLE `tbl_company_profile`
  ADD CONSTRAINT `tbl_company_profile_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `tbl_company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_contact_profile`
--
ALTER TABLE `tbl_contact_profile`
  ADD CONSTRAINT `tbl_contact_profile_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `tbl_contact` (`contact_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_custom_profile`
--
ALTER TABLE `tbl_custom_profile`
  ADD CONSTRAINT `tbl_custom_profile_ibfk_1` FOREIGN KEY (`custom_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `tbl_invoice_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `tbl_company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_invoice_profile`
--
ALTER TABLE `tbl_invoice_profile`
  ADD CONSTRAINT `tbl_invoice_profile_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `tbl_invoice` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD CONSTRAINT `tbl_item_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_item_profile`
--
ALTER TABLE `tbl_item_profile`
  ADD CONSTRAINT `tbl_item_profile_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tbl_item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD CONSTRAINT `tbl_message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_message_profile`
--
ALTER TABLE `tbl_message_profile`
  ADD CONSTRAINT `tbl_message_profile_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `tbl_message` (`message_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_product_ibfk_3` FOREIGN KEY (`company`) REFERENCES `tbl_company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_product_profile`
--
ALTER TABLE `tbl_product_profile`
  ADD CONSTRAINT `tbl_product_profile_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD CONSTRAINT `tbl_project_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_project_profile`
--
ALTER TABLE `tbl_project_profile`
  ADD CONSTRAINT `tbl_project_profile_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_sale_tax`
--
ALTER TABLE `tbl_sale_tax`
  ADD CONSTRAINT `tbl_sale_tax_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `tbl_company_profile` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_socialnetwork`
--
ALTER TABLE `tbl_socialnetwork`
  ADD CONSTRAINT `tbl_socialnetwork_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD CONSTRAINT `tbl_task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_task_profile`
--
ALTER TABLE `tbl_task_profile`
  ADD CONSTRAINT `tbl_task_profile_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tbl_task` (`task_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD CONSTRAINT `tbl_user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
