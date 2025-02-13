-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: pdp
-- ------------------------------------------------------
-- Server version	5.7.37-log

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
-- Table structure for table `abz_mapping`
--

DROP TABLE IF EXISTS `abz_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abz_mapping` (
  `abz_mode` varchar(35) NOT NULL,
  `abz_code` varchar(45) NOT NULL,
  `abz_description` varchar(45) DEFAULT NULL,
  `abz_seq` int(11) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`abz_mode`,`abz_code`),
  KEY `IND01` (`abz_mode`,`abz_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `abz_mapping_info`
--

DROP TABLE IF EXISTS `abz_mapping_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abz_mapping_info` (
  `abz_mapping_mode` varchar(100) NOT NULL,
  `abz_mapping_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`abz_mapping_mode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL AUTO_INCREMENT,
  `agentcode` varchar(20) DEFAULT NULL,
  `agentno` varchar(20) DEFAULT NULL,
  `agentname` varchar(256) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `is_active` char(1) DEFAULT 'Y',
  PRIMARY KEY (`agent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=346 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `allergy_drug`
--

DROP TABLE IF EXISTS `allergy_drug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `allergy_drug` (
  `allergy_drug_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `medicine_id` int(11) DEFAULT NULL,
  `allergy_remark` text,
  PRIMARY KEY (`allergy_drug_id`),
  KEY `IND01` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `allergy_other`
--

DROP TABLE IF EXISTS `allergy_other`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `allergy_other` (
  `allergy_other_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `allergy` varchar(215) DEFAULT NULL,
  `allergy_remark` text,
  PRIMARY KEY (`allergy_other_id`),
  KEY `IND01` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `appgroup`
--

DROP TABLE IF EXISTS `appgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appgroup` (
  `appgroup_id` int(11) NOT NULL AUTO_INCREMENT,
  `appgroup_name` varchar(50) DEFAULT NULL,
  `appgroup_remark` varchar(200) DEFAULT NULL,
  `appgroup_privileges` text,
  `is_superuser` char(1) DEFAULT 'N',
  `clinic_list` text,
  `ward_list` text,
  `quippe_permission` varchar(45) DEFAULT NULL COMMENT 'Admin,QuippeLibraryManager,Quippe,ReadOnly',
  `quippe_template_list` text,
  PRIMARY KEY (`appgroup_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `timetable_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `appointment_type_id` int(11) DEFAULT NULL,
  `is_new_patient` char(1) DEFAULT 'Y',
  `appointment_remark` text,
  `doctor_id` int(11) DEFAULT NULL,
  `postpone_count` int(11) DEFAULT '0',
  `postpone_reason_id` int(11) DEFAULT NULL,
  `appointment_type` varchar(45) DEFAULT NULL,
  `appointmentno` varchar(45) DEFAULT NULL,
  `makedatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `appointmentdatetime` datetime DEFAULT NULL,
  `confirmstatustype` int(11) DEFAULT '0' COMMENT '0=none,6=cancel,7=confirm',
  `msgforpatientmemo` text,
  `procedurememo` text,
  `remarksmemo` text,
  `department_id` int(11) DEFAULT NULL,
  `procedure_template_id` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `is_cancel` char(1) NOT NULL DEFAULT 'N',
  `week_tolerance` int(11) DEFAULT NULL,
  `first_date` date DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  `is_no_doctor` varchar(1) NOT NULL DEFAULT 'N',
  `is_unconfirm` varchar(1) NOT NULL DEFAULT 'N',
  `has_document` varchar(1) NOT NULL DEFAULT 'N',
  `calculation_info` text,
  `postpone_doctor_id` int(11) DEFAULT NULL,
  `postpone_from_txt` text,
  `is_walkin` varchar(1) DEFAULT 'N',
  `complaintmemo` text,
  `vn_reg` varchar(45) DEFAULT NULL,
  `appointmentdatetime_end` datetime DEFAULT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `IND01` (`is_new_patient`),
  KEY `IND02` (`timetable_id`),
  KEY `IND03` (`patient_id`),
  KEY `IND_appointmentno` (`appointmentno`),
  KEY `IND04` (`appointmentdatetime`),
  KEY `IND05` (`postpone_doctor_id`),
  KEY `IND_doctor_id` (`doctor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=349 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `appointment_book`
--

DROP TABLE IF EXISTS `appointment_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment_book` (
  `appointment_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `timetable_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `appointment_type_id` int(11) DEFAULT NULL,
  `is_new_patient` char(1) DEFAULT NULL,
  `appointment_remark` text,
  `doctor_id` int(11) DEFAULT NULL,
  `appointment_type` varchar(45) DEFAULT NULL,
  `makedatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `appointmentdatetime` datetime DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `complaintmemo` text,
  `book_status` varchar(45) DEFAULT NULL,
  `status_remark` text,
  `source_type` varchar(45) DEFAULT NULL COMMENT 'MOBILE, DR',
  `dr_first_name` varchar(128) DEFAULT NULL,
  `dr_last_name` varchar(128) DEFAULT NULL,
  `action_by` int(11) DEFAULT NULL,
  `postpone_reason_id` int(11) DEFAULT NULL,
  `appointment_id_old` int(11) DEFAULT NULL,
  `book_for` varchar(45) DEFAULT NULL,
  `symptom_list` varchar(255) DEFAULT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `create_appointment_id` int(11) DEFAULT NULL,
  `is_finish` char(1) DEFAULT NULL,
  `hold_msg` text,
  PRIMARY KEY (`appointment_book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=405 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `appointment_book_status_history`
--

DROP TABLE IF EXISTS `appointment_book_status_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment_book_status_history` (
  `appointment_book_status_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_book` varchar(45) DEFAULT NULL,
  `remark` text,
  `appointment_book_id` int(11) DEFAULT NULL,
  `action_by` int(11) DEFAULT NULL,
  `datetime_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`appointment_book_status_history_id`)
) ENGINE=MyISAM AUTO_INCREMENT=414 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `appointment_confirm`
--

DROP TABLE IF EXISTS `appointment_confirm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment_confirm` (
  `appointment_confirm_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) DEFAULT NULL,
  `confirm_type` varchar(45) NOT NULL COMMENT 'MOBILE',
  `confirm_datetime` datetime NOT NULL,
  PRIMARY KEY (`appointment_confirm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `appointment_procedure`
--

DROP TABLE IF EXISTS `appointment_procedure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment_procedure` (
  `appointment_procedure_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) NOT NULL,
  `procedure_item_id` int(11) NOT NULL,
  `procedure_remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`appointment_procedure_id`),
  KEY `IND01` (`appointment_id`),
  KEY `IND02` (`procedure_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=650 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `appointment_remark`
--

DROP TABLE IF EXISTS `appointment_remark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment_remark` (
  `appointment_remark_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) DEFAULT NULL,
  `remark_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `remark_by` int(11) DEFAULT NULL,
  `appointment_remark` text,
  PRIMARY KEY (`appointment_remark_id`),
  KEY `IND01` (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=281 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `appointment_sub`
--

DROP TABLE IF EXISTS `appointment_sub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment_sub` (
  `appointment_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_datetime` datetime DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `procedure_item_id` int(11) DEFAULT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`appointment_sub_id`),
  KEY `IND01` (`appointment_id`),
  KEY `IND02` (`procedure_item_id`),
  KEY `IND03` (`timetable_id`),
  KEY `IND04` (`appointment_datetime`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `appointment_type`
--

DROP TABLE IF EXISTS `appointment_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment_type` (
  `appointment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_type` varchar(200) DEFAULT NULL,
  `is_calculate` char(1) DEFAULT 'Y',
  `can_insert` char(1) NOT NULL DEFAULT 'N',
  `icon_type` varchar(45) DEFAULT NULL,
  `slot_ratio` int(11) DEFAULT NULL,
  PRIMARY KEY (`appointment_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `appuser`
--

DROP TABLE IF EXISTS `appuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appuser` (
  `appuser_id` int(11) NOT NULL AUTO_INCREMENT,
  `appuser_name` varchar(50) DEFAULT NULL,
  `appuser_lname` varchar(50) DEFAULT NULL,
  `appuser_username` varchar(50) DEFAULT NULL,
  `appuser_password` varchar(50) DEFAULT NULL,
  `appgroup_id` int(11) DEFAULT NULL,
  `is_enable` char(1) DEFAULT 'N',
  PRIMARY KEY (`appuser_id`),
  KEY `IND01` (`appgroup_id`)
) ENGINE=MyISAM AUTO_INCREMENT=370 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chief_complaint`
--

DROP TABLE IF EXISTS `chief_complaint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chief_complaint` (
  `chief_complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `eye_code` varchar(5) DEFAULT NULL,
  `symptom_list` text,
  `symptom_site_list` text,
  `cf_year` int(11) DEFAULT NULL,
  `cf_month` int(11) DEFAULT NULL,
  `cf_week` int(11) DEFAULT NULL,
  `cf_day` int(11) DEFAULT NULL,
  `complaintmemo` text,
  `is_today` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`chief_complaint_id`),
  KEY `IND01` (`vn_id`),
  KEY `IND02` (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chief_complaint_old`
--

DROP TABLE IF EXISTS `chief_complaint_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chief_complaint_old` (
  `chief_complaint_old_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn` varchar(20) DEFAULT NULL,
  `visitdate` date DEFAULT NULL,
  `hn` varchar(50) DEFAULT NULL,
  `memo` text,
  PRIMARY KEY (`chief_complaint_old_id`),
  KEY `IND01` (`hn`,`visitdate`,`vn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chief_complaint_qa`
--

DROP TABLE IF EXISTS `chief_complaint_qa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chief_complaint_qa` (
  `chief_complaint_qa_id` int(11) NOT NULL AUTO_INCREMENT,
  `chief_complaint_id` int(11) DEFAULT NULL,
  `msc_question_id` int(11) DEFAULT NULL,
  `msc_answer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`chief_complaint_qa_id`),
  KEY `IND01` (`chief_complaint_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chief_med`
--

DROP TABLE IF EXISTS `chief_med`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chief_med` (
  `chief_med_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn_id` int(11) DEFAULT NULL,
  `medicine_id` int(11) DEFAULT NULL,
  `eye_code` varchar(5) DEFAULT NULL,
  `dosage` text,
  `createdatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`chief_med_id`),
  KEY `IND01` (`vn_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `clinic_location`
--

DROP TABLE IF EXISTS `clinic_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clinic_location` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `clinic` varchar(30) NOT NULL,
  `floorthai` varchar(30) NOT NULL,
  `flooreng` varchar(50) DEFAULT NULL,
  `floor` varchar(3) DEFAULT NULL,
  `location` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cmd_queue`
--

DROP TABLE IF EXISTS `cmd_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cmd_queue` (
  `cmd_queue_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `cmd` varchar(128) DEFAULT NULL,
  `sent_date` datetime DEFAULT NULL,
  PRIMARY KEY (`cmd_queue_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contact_lens`
--

DROP TABLE IF EXISTS `contact_lens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_lens` (
  `contact_lens_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `contact_lens_type_id` int(11) DEFAULT NULL,
  `power_re` varchar(255) DEFAULT NULL,
  `power_le` varchar(255) DEFAULT NULL,
  `bc_re` varchar(255) DEFAULT NULL,
  `bc_le` varchar(255) DEFAULT NULL,
  `brand_list_re` text,
  `brand_list_le` text,
  `contact_lens_remark` text,
  `cl_today` varchar(1) DEFAULT NULL,
  `cl_recent` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`contact_lens_id`),
  KEY `IND01` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3413 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contact_lens_brand`
--

DROP TABLE IF EXISTS `contact_lens_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_lens_brand` (
  `contact_lens_brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_lens_brand_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`contact_lens_brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contact_lens_old`
--

DROP TABLE IF EXISTS `contact_lens_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_lens_old` (
  `HN` text,
  `running` text,
  `Yes_Nill_PatNoSure` text,
  `nameTypeContaclens` text,
  `ContaclensQuestion` text,
  `ContaclensAnswer` text,
  `ContaclensRemark` text,
  `RE_Power` text,
  `RE_BC` text,
  `RE_Brand` text,
  `LE_Power` text,
  `LE_BC` text,
  `LE_Brand` text,
  `Remark` text,
  `datecreate` text,
  `contact_lens_type_id` int(11) DEFAULT NULL,
  `contact_lens_brand_id` int(11) DEFAULT NULL,
  `msc_question_id` int(11) DEFAULT NULL,
  `msc_answer_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contact_lens_old_bak`
--

DROP TABLE IF EXISTS `contact_lens_old_bak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_lens_old_bak` (
  `HN` text,
  `running` text,
  `Yes_Nill_PatNoSure` text,
  `nameTypeContaclens` text,
  `ContaclensQuestion` text,
  `ContaclensAnswer` text,
  `ContaclensRemark` text,
  `RE_Power` text,
  `RE_BC` text,
  `RE_Brand` text,
  `LE_Power` text,
  `LE_BC` text,
  `LE_Brand` text,
  `Remark` text,
  `datecreate` text,
  `contact_lens_type_id` int(11) DEFAULT NULL,
  `contact_lens_brand_id` int(11) DEFAULT NULL,
  `msc_question_id` int(11) DEFAULT NULL,
  `msc_answer_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contact_lens_qa`
--

DROP TABLE IF EXISTS `contact_lens_qa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_lens_qa` (
  `contact_lens_qa_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `msc_question_id` int(11) DEFAULT NULL,
  `msc_answer_id` int(11) DEFAULT NULL,
  `answer_remark` text,
  PRIMARY KEY (`contact_lens_qa_id`),
  KEY `IND01` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10205 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contact_lens_type`
--

DROP TABLE IF EXISTS `contact_lens_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_lens_type` (
  `contact_lens_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_lens_type_name` varchar(215) DEFAULT NULL,
  PRIMARY KEY (`contact_lens_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  `ssb_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=266 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `day_off`
--

DROP TABLE IF EXISTS `day_off`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `day_off` (
  `day_off_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `off_date` date DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `off_reason` text,
  PRIMARY KEY (`day_off_id`),
  KEY `IND01` (`doctor_id`,`off_date`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) DEFAULT NULL,
  `department_name_english` varchar(255) DEFAULT NULL,
  `department_code` varchar(45) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(128) DEFAULT NULL,
  `doctor_name_english` varchar(128) DEFAULT NULL,
  `doctor_code` varchar(45) DEFAULT NULL,
  `is_enable` char(1) DEFAULT 'Y',
  `slot_new` int(11) DEFAULT '1',
  `slot_old` int(11) DEFAULT '4',
  `slot_new_unspecify` int(11) DEFAULT '1',
  `doctor_remark` text,
  `new_patient_timestamp` datetime DEFAULT '2000-01-01 00:00:00',
  `old_patient_timestamp` datetime DEFAULT '2000-01-01 00:00:00',
  `department_id` int(11) DEFAULT NULL,
  `procedure_item_id` int(11) NOT NULL DEFAULT '-1',
  `load_factor` double NOT NULL DEFAULT '1',
  `doctor_img` varchar(200) DEFAULT NULL,
  `certifypublicno` varchar(45) DEFAULT NULL,
  `doctornameoriginal` varchar(255) DEFAULT NULL,
  `h_slot_new` int(11) DEFAULT NULL,
  `h_slot_old` int(11) DEFAULT NULL,
  `h_slot_new_unspecify` int(11) DEFAULT NULL,
  `timetable_print` text,
  `timetable_print_en` text,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `doctor_card_print` text,
  `doctor_card_print_en` text,
  `lock_slot_h3` varchar(45) DEFAULT NULL,
  `lock_slot_h2` varchar(45) DEFAULT NULL,
  `lock_slot_h1` varchar(45) DEFAULT NULL,
  `enable_mobile` char(1) DEFAULT 'N',
  `schedule_w1` varchar(45) DEFAULT NULL,
  `schedule_w2` varchar(45) DEFAULT NULL,
  `schedule_w3` varchar(45) DEFAULT NULL,
  `schedule_w4` varchar(45) DEFAULT NULL,
  `schedule_w5` varchar(45) DEFAULT NULL,
  `schedule_w6` varchar(45) DEFAULT NULL,
  `schedule_w7` varchar(45) DEFAULT NULL,
  `schedule_w1_en` varchar(45) DEFAULT NULL,
  `schedule_w2_en` varchar(45) DEFAULT NULL,
  `schedule_w3_en` varchar(45) DEFAULT NULL,
  `schedule_w4_en` varchar(45) DEFAULT NULL,
  `schedule_w5_en` varchar(45) DEFAULT NULL,
  `schedule_w6_en` varchar(45) DEFAULT NULL,
  `schedule_w7_en` varchar(45) DEFAULT NULL,
  `working_type` varchar(45) DEFAULT NULL COMMENT 'FULLTIME,PARTTIME',
  PRIMARY KEY (`doctor_id`),
  KEY `IND01` (`department_id`),
  KEY `IND_doctor_code` (`doctor_code`),
  KEY `IND02` (`procedure_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2061 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `doctor_checktime`
--

DROP TABLE IF EXISTS `doctor_checktime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor_checktime` (
  `doctor_checktime_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `check_date` date DEFAULT NULL,
  `start_work` datetime DEFAULT NULL,
  `last_case` datetime DEFAULT NULL,
  `stop_work` datetime DEFAULT NULL,
  PRIMARY KEY (`doctor_checktime_id`),
  KEY `IND01` (`doctor_id`,`check_date`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `doctor_day`
--

DROP TABLE IF EXISTS `doctor_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor_day` (
  `doctor_day_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `doctor_date` date DEFAULT NULL,
  `doctor_day_remark` text,
  PRIMARY KEY (`doctor_day_id`),
  KEY `IND01` (`doctor_id`,`doctor_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `doctor_limit`
--

DROP TABLE IF EXISTS `doctor_limit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor_limit` (
  `doctor_limit_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `appointment_type_id` int(11) DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  PRIMARY KEY (`doctor_limit_id`),
  KEY `IND01` (`doctor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `doctor_specialty`
--

DROP TABLE IF EXISTS `doctor_specialty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor_specialty` (
  `doctor_id` int(11) NOT NULL,
  `specialty_id` int(11) NOT NULL,
  PRIMARY KEY (`doctor_id`,`specialty_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `document_check`
--

DROP TABLE IF EXISTS `document_check`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `document_check` (
  `document_check_id` int(11) NOT NULL AUTO_INCREMENT,
  `check_date` date DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`document_check_id`),
  KEY `IND01` (`patient_id`,`check_date`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `eye_glasses_old`
--

DROP TABLE IF EXISTS `eye_glasses_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eye_glasses_old` (
  `HN` text,
  `running` int(11) DEFAULT NULL,
  `Yes_Nill_PatNoSure` text,
  `GlassesQuestion` varchar(255) DEFAULT NULL,
  `GlassesAnswer` text,
  `GlassRemark` text,
  `datecreate` text,
  KEY `IND01` (`GlassesQuestion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `eye_glasses_old_bak`
--

DROP TABLE IF EXISTS `eye_glasses_old_bak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eye_glasses_old_bak` (
  `HN` text,
  `running` int(11) DEFAULT NULL,
  `Yes_Nill_PatNoSure` text,
  `GlassesQuestion` varchar(255) DEFAULT NULL,
  `GlassesAnswer` text,
  `GlassRemark` text,
  `datecreate` text,
  KEY `IND01` (`GlassesQuestion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `eye_glasses_qa`
--

DROP TABLE IF EXISTS `eye_glasses_qa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eye_glasses_qa` (
  `eye_glasses_qa_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `msc_question_id` int(11) DEFAULT NULL,
  `msc_answer_id` int(11) DEFAULT NULL,
  `answer_remark` text,
  PRIMARY KEY (`eye_glasses_qa_id`),
  KEY `IND01` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=65545 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `eye_history`
--

DROP TABLE IF EXISTS `eye_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eye_history` (
  `eye_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `past_treatment_id` int(11) DEFAULT NULL,
  `eye_code` varchar(5) DEFAULT NULL,
  `approx_date` date DEFAULT NULL,
  `eye_history_remark` text,
  `modify_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eye_history_id`),
  KEY `IND01` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gps_center`
--

DROP TABLE IF EXISTS `gps_center`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gps_center` (
  `gps_center_id` int(11) NOT NULL AUTO_INCREMENT,
  `gps_center_code` varchar(45) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gps_center_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gps_center_user`
--

DROP TABLE IF EXISTS `gps_center_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gps_center_user` (
  `gps_center_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `gps_center_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gc_last_update` datetime DEFAULT NULL,
  `gc_seq` int(11) DEFAULT NULL,
  PRIMARY KEY (`gps_center_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hn_check`
--

DROP TABLE IF EXISTS `hn_check`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hn_check` (
  `hn_check_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(45) DEFAULT NULL,
  `is_require` char(1) DEFAULT NULL,
  `revise_time` int(11) DEFAULT NULL,
  `require_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`hn_check_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hn_check_bak`
--

DROP TABLE IF EXISTS `hn_check_bak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hn_check_bak` (
  `hn_check_id` int(11) NOT NULL DEFAULT '0',
  `field_name` varchar(45) DEFAULT NULL,
  `is_require` char(1) DEFAULT NULL,
  `revise_time` int(11) DEFAULT NULL,
  `require_type` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `holiday`
--

DROP TABLE IF EXISTS `holiday`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `holiday` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `holiday_name` varchar(200) DEFAULT NULL,
  `holiday_date` date DEFAULT NULL,
  PRIMARY KEY (`holiday_id`),
  KEY `IND01` (`holiday_date`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `holy_day`
--

DROP TABLE IF EXISTS `holy_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `holy_day` (
  `holy_day_id` int(11) NOT NULL AUTO_INCREMENT,
  `holy_day_date` date DEFAULT NULL,
  `holy_day_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`holy_day_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hyperlink`
--

DROP TABLE IF EXISTS `hyperlink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hyperlink` (
  `hyperlink_id` int(11) NOT NULL AUTO_INCREMENT,
  `hyperlink_code` varchar(45) DEFAULT NULL,
  `hyperlink_name` varchar(45) DEFAULT NULL,
  `hyperlink_link` text,
  `hyperlink_show` char(1) DEFAULT 'Y',
  `hyperlink_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`hyperlink_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_code` varchar(45) DEFAULT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `login_log`
--

DROP TABLE IF EXISTS `login_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_log` (
  `login_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `appuser_id` int(11) DEFAULT NULL,
  `login_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`login_log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=410 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `medical_action`
--

DROP TABLE IF EXISTS `medical_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medical_action` (
  `medical_action_id` int(11) NOT NULL AUTO_INCREMENT,
  `medical_action_code` varchar(45) DEFAULT NULL,
  `medical_action` varchar(215) DEFAULT NULL,
  PRIMARY KEY (`medical_action_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `medical_history`
--

DROP TABLE IF EXISTS `medical_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medical_history` (
  `medical_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `medical_history_type_id` int(11) DEFAULT NULL,
  `approx_date` date DEFAULT NULL,
  `medical_history_remark` text,
  `medical_action_done` text,
  `modify_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `old_remark` text,
  PRIMARY KEY (`medical_history_id`),
  KEY `IND01` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `medical_history_type`
--

DROP TABLE IF EXISTS `medical_history_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medical_history_type` (
  `medical_history_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `medical_history_name` varchar(256) DEFAULT NULL,
  `icdcode` varchar(45) DEFAULT NULL,
  `icdcmcode` varchar(45) DEFAULT NULL,
  `medical_action_list` text,
  `seq` int(11) DEFAULT NULL,
  `hide_name` char(1) DEFAULT NULL,
  `confident` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`medical_history_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(150) DEFAULT NULL,
  `medicine_code` varchar(45) DEFAULT NULL,
  `pharmacoindex` varchar(45) DEFAULT NULL,
  `pharmacoindex_subclass` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`medicine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migrate`
--

DROP TABLE IF EXISTS `migrate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrate` (
  `migrate_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointmentno` varchar(45) DEFAULT NULL,
  `hn` varchar(45) DEFAULT NULL,
  `doctor_code` varchar(45) DEFAULT NULL,
  `clinic_code` varchar(45) DEFAULT NULL,
  `makedatetime` datetime DEFAULT NULL,
  `appointment_datetime` datetime DEFAULT NULL,
  `is_new_patient` varchar(45) DEFAULT NULL,
  `is_specify_doctor` varchar(45) DEFAULT NULL,
  `appointment_remark` varchar(45) DEFAULT NULL,
  `procedure1` varchar(45) DEFAULT NULL,
  `procedure2` varchar(45) DEFAULT NULL,
  `procedure3` varchar(45) DEFAULT NULL,
  `procedure4` varchar(45) DEFAULT NULL,
  `procedure5` varchar(45) DEFAULT NULL,
  `appointment_status` int(11) DEFAULT NULL,
  `migrate_status` varchar(45) DEFAULT 'NEW',
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `timetable_id` int(11) DEFAULT NULL,
  `appointment_seq` int(11) DEFAULT NULL,
  `p1_id` int(11) DEFAULT NULL,
  `p2_id` int(11) DEFAULT NULL,
  `p3_id` int(11) DEFAULT NULL,
  `p4_id` int(11) DEFAULT NULL,
  `p5_id` int(11) DEFAULT NULL,
  `prepatient_name` varchar(255) DEFAULT NULL,
  `error_procedure_list` text,
  `remarksmemo` text,
  `procedure_with_slot` varchar(45) DEFAULT NULL,
  `procedure_with_slot_timetable` int(11) DEFAULT NULL,
  `procedure_with_slot_id` int(11) DEFAULT NULL,
  `appointment_type_id` int(11) DEFAULT NULL,
  `waitinglist` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`migrate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migrate_procedure_mapping`
--

DROP TABLE IF EXISTS `migrate_procedure_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrate_procedure_mapping` (
  `migrate_procedure_mapping_id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_procedure_code` varchar(45) DEFAULT NULL,
  `new_procedure_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`migrate_procedure_mapping_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msc_answer`
--

DROP TABLE IF EXISTS `msc_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `msc_answer` (
  `msc_answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `msc_question_id` int(11) DEFAULT NULL,
  `answer` varchar(256) DEFAULT NULL,
  `answer_seq` int(11) DEFAULT NULL,
  PRIMARY KEY (`msc_answer_id`),
  KEY `IND01` (`msc_question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msc_modify`
--

DROP TABLE IF EXISTS `msc_modify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `msc_modify` (
  `msc_modify_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `modify_contact_lens` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_eye_glasses` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`msc_modify_id`),
  KEY `IND01` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msc_print_log`
--

DROP TABLE IF EXISTS `msc_print_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `msc_print_log` (
  `msc_print_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `print_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `print_msg` text,
  `print_by` int(11) DEFAULT NULL,
  `print_no` int(11) DEFAULT NULL,
  `vn_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`msc_print_log_id`),
  KEY `IND01` (`vn_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msc_question`
--

DROP TABLE IF EXISTS `msc_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `msc_question` (
  `msc_question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_mode` varchar(45) DEFAULT NULL,
  `question` varchar(256) DEFAULT NULL,
  `question_seq` int(11) DEFAULT NULL,
  PRIMARY KEY (`msc_question_id`),
  KEY `IND01` (`question_mode`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `msc_status_history`
--

DROP TABLE IF EXISTS `msc_status_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `msc_status_history` (
  `msc_status_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn_id` int(11) DEFAULT NULL,
  `action_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `action_status` varchar(45) DEFAULT NULL,
  `action_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`msc_status_history_id`),
  KEY `IND01` (`vn_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1403 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `name_title`
--

DROP TABLE IF EXISTS `name_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `name_title` (
  `name_title_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_code` varchar(45) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`name_title_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nationality`
--

DROP TABLE IF EXISTS `nationality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nationality` (
  `nationality_id` int(11) NOT NULL AUTO_INCREMENT,
  `nationality_code` varchar(45) DEFAULT NULL,
  `nationalityname` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`nationality_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nh_lab`
--

DROP TABLE IF EXISTS `nh_lab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nh_lab` (
  `nh_lab_id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_code` varchar(45) DEFAULT NULL,
  `lab_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`nh_lab_id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nh_lab_result`
--

DROP TABLE IF EXISTS `nh_lab_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nh_lab_result` (
  `nh_lab_result_id` int(11) NOT NULL AUTO_INCREMENT,
  `nh_order_id` int(11) DEFAULT NULL,
  `resultNo` int(11) DEFAULT NULL,
  `serviceCode` varchar(45) DEFAULT NULL,
  `serviceName` varchar(45) DEFAULT NULL,
  `resultType` varchar(45) DEFAULT NULL,
  `normalRange` varchar(45) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `resultValue` varchar(45) DEFAULT NULL,
  `resultDate` datetime DEFAULT NULL,
  PRIMARY KEY (`nh_lab_result_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nh_order`
--

DROP TABLE IF EXISTS `nh_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nh_order` (
  `nh_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(45) DEFAULT NULL,
  `hn` varchar(45) DEFAULT NULL,
  `vn` varchar(45) DEFAULT NULL,
  `visitdate` date DEFAULT NULL,
  `doctor_code` varchar(45) DEFAULT NULL,
  `nh_lab_code` varchar(45) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `status_code` varchar(20) DEFAULT NULL,
  `status_name` varchar(45) DEFAULT NULL,
  `verify_date` datetime DEFAULT NULL,
  `verify_by` varchar(128) DEFAULT NULL,
  `authorise_date` datetime DEFAULT NULL,
  `authorise_by` varchar(128) DEFAULT NULL,
  `receive_date` datetime DEFAULT NULL,
  `r_status` varchar(45) DEFAULT NULL COMMENT 'NEW,WAIT,RESULTED,ACCEPTED',
  PRIMARY KEY (`nh_order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `otp_code`
--

DROP TABLE IF EXISTS `otp_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `otp_code` (
  `otp_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_type` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `otp_ref` varchar(45) DEFAULT NULL,
  `otp` varchar(45) DEFAULT NULL,
  `sent_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `register_hn` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`otp_code_id`),
  KEY `IND01` (`login_type`,`username`,`sent_datetime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `past_treatment`
--

DROP TABLE IF EXISTS `past_treatment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `past_treatment` (
  `past_treatment_id` int(11) NOT NULL AUTO_INCREMENT,
  `past_treatment_name` varchar(215) DEFAULT NULL,
  PRIMARY KEY (`past_treatment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `hn` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `idcard` varchar(13) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `right_code` varchar(45) DEFAULT NULL,
  `right` varchar(200) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `picturefilename` varchar(100) DEFAULT NULL,
  `mobilephoneno` varchar(45) DEFAULT NULL,
  `filedeleted` int(11) DEFAULT NULL,
  `patient_remark` text,
  `patient_remark2` text,
  `tel` varchar(45) DEFAULT NULL,
  `nationalityname` varchar(128) DEFAULT NULL,
  `vip` varchar(45) DEFAULT NULL,
  `address` text,
  `email` text,
  `is_new_patient` varchar(10) DEFAULT NULL,
  `title_en` varchar(50) DEFAULT NULL,
  `first_name_en` varchar(100) DEFAULT NULL,
  `last_name_en` varchar(100) DEFAULT NULL,
  `nick_name` varchar(256) DEFAULT NULL,
  `patient_type` varchar(20) DEFAULT NULL,
  `special_care` varchar(256) DEFAULT NULL,
  `sync_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `hn_rg` varchar(45) DEFAULT NULL,
  `middle_name` varchar(128) DEFAULT NULL,
  `middle_name_en` varchar(128) DEFAULT NULL,
  `maritalstatus` varchar(20) DEFAULT NULL,
  `religion_code` varchar(20) DEFAULT NULL,
  `race_code` varchar(20) DEFAULT NULL,
  `nationality_code` varchar(20) DEFAULT NULL,
  `passport` varchar(45) DEFAULT NULL,
  `title_code` varchar(20) DEFAULT NULL,
  `notification_type` varchar(45) DEFAULT NULL COMMENT '3D,7D,30D,NONE',
  PRIMARY KEY (`patient_id`),
  KEY `IND01` (`hn`),
  KEY `IND_firstname` (`first_name`),
  KEY `IND_idcard` (`idcard`),
  KEY `IND_lastname` (`last_name`)
) ENGINE=MyISAM AUTO_INCREMENT=39371 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient2`
--

DROP TABLE IF EXISTS `patient2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient2` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `hn` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `idcard` varchar(13) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `right_code` varchar(45) DEFAULT NULL,
  `right` varchar(200) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `picturefilename` varchar(100) DEFAULT NULL,
  `mobilephoneno` varchar(45) DEFAULT NULL,
  `filedeleted` int(11) DEFAULT NULL,
  `patient_remark` text,
  `patient_remark2` text,
  `tel` varchar(45) DEFAULT NULL,
  `nationalityname` varchar(128) DEFAULT NULL,
  `vip` varchar(45) DEFAULT NULL,
  `address` text,
  `email` text,
  `is_new_patient` varchar(10) DEFAULT NULL,
  `title_en` varchar(50) DEFAULT NULL,
  `first_name_en` varchar(100) DEFAULT NULL,
  `last_name_en` varchar(100) DEFAULT NULL,
  `nick_name` varchar(256) DEFAULT NULL,
  `patient_type` varchar(20) DEFAULT NULL,
  `special_care` varchar(256) DEFAULT NULL,
  `sync_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `hn_rg` varchar(45) DEFAULT NULL,
  `middle_name` varchar(128) DEFAULT NULL,
  `middle_name_en` varchar(128) DEFAULT NULL,
  `maritalstatus` varchar(20) DEFAULT NULL,
  `religion_code` varchar(20) DEFAULT NULL,
  `race_code` varchar(20) DEFAULT NULL,
  `nationality_code` varchar(20) DEFAULT NULL,
  `passport` varchar(45) DEFAULT NULL,
  `title_code` varchar(20) DEFAULT NULL,
  `notification_type` varchar(45) DEFAULT NULL COMMENT '3D,7D,30D,NONE',
  PRIMARY KEY (`patient_id`),
  KEY `IND01` (`hn`),
  KEY `IND_firstname` (`first_name`),
  KEY `IND_idcard` (`idcard`),
  KEY `IND_lastname` (`last_name`)
) ENGINE=MyISAM AUTO_INCREMENT=39294 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_address`
--

DROP TABLE IF EXISTS `patient_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_address` (
  `patient_id` int(11) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `tambon` varchar(4) DEFAULT NULL,
  `amphoe` varchar(4) DEFAULT NULL,
  `province` varchar(4) DEFAULT NULL,
  `addresstype` int(11) NOT NULL,
  `tel` varchar(32) DEFAULT NULL,
  `mobilephoneno` varchar(32) DEFAULT NULL,
  `emailaddress` varchar(128) DEFAULT NULL,
  `notifiedperson` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`patient_id`,`addresstype`),
  KEY `IND01` (`patient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_agent`
--

DROP TABLE IF EXISTS `patient_agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_agent` (
  `patient_agent_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `agent_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`patient_agent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_expire_log`
--

DROP TABLE IF EXISTS `patient_expire_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_expire_log` (
  `patient_expire_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `hn` varchar(45) DEFAULT NULL,
  `remark` text,
  `log_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `log_by` int(11) DEFAULT NULL,
  `expire_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`patient_expire_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_info_confirm`
--

DROP TABLE IF EXISTS `patient_info_confirm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_info_confirm` (
  `patient_info_confirm_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `confirm_datetime` datetime DEFAULT NULL,
  `confirm_type` varchar(45) DEFAULT NULL COMMENT 'APPOINT, PREVISIT',
  `info_change` text,
  PRIMARY KEY (`patient_info_confirm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_need`
--

DROP TABLE IF EXISTS `patient_need`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_need` (
  `patient_need_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `patient_need_code_id` int(11) DEFAULT NULL,
  `patient_need_for_id` int(11) DEFAULT NULL,
  `special_reason` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`patient_need_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_need_code`
--

DROP TABLE IF EXISTS `patient_need_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_need_code` (
  `patient_need_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `need_code` varchar(45) DEFAULT NULL,
  `need_name` varchar(256) DEFAULT NULL,
  `msg_suffix` int(11) DEFAULT NULL,
  `enable_mobile` varchar(1) DEFAULT 'N',
  `need_name_en` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`patient_need_code_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_need_for`
--

DROP TABLE IF EXISTS `patient_need_for`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_need_for` (
  `patient_need_for_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_need_code_id` int(11) DEFAULT NULL,
  `need_for` varchar(256) DEFAULT NULL,
  `need_for_en` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`patient_need_for_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_scan`
--

DROP TABLE IF EXISTS `patient_scan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_scan` (
  `patient_scan_id` int(11) NOT NULL AUTO_INCREMENT,
  `hn` varchar(45) DEFAULT NULL,
  `suffix` int(11) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `scan_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `flag_delete` char(1) DEFAULT 'N',
  `delete_date` datetime DEFAULT NULL,
  `delete_by` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`patient_scan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patient_type`
--

DROP TABLE IF EXISTS `patient_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient_type` (
  `patient_type_code` varchar(20) NOT NULL,
  `patient_type_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`patient_type_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `postpone_history`
--

DROP TABLE IF EXISTS `postpone_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postpone_history` (
  `postpone_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) DEFAULT NULL,
  `postpone_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `postpone_from` text,
  `postpone_reason_id` int(11) DEFAULT NULL,
  `postpone_by` int(11) DEFAULT NULL,
  `postpone_remark` text,
  PRIMARY KEY (`postpone_history_id`),
  KEY `IND01` (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=660 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `postpone_reason`
--

DROP TABLE IF EXISTS `postpone_reason`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postpone_reason` (
  `postpone_reason_id` int(11) NOT NULL AUTO_INCREMENT,
  `postpone_reason` varchar(200) DEFAULT NULL,
  `postpone_reason_code` varchar(45) DEFAULT NULL,
  `enable_mobile` char(1) DEFAULT 'N',
  `postpone_reason_en` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`postpone_reason_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `procedure_item`
--

DROP TABLE IF EXISTS `procedure_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procedure_item` (
  `procedure_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `procedure_name` varchar(100) DEFAULT NULL,
  `procedure_name_en` varchar(100) DEFAULT NULL,
  `procedure_code` varchar(45) DEFAULT NULL,
  `need_slot` char(1) DEFAULT 'Y',
  `procedure_note` text,
  `pre_list` text,
  `department_id` int(11) DEFAULT NULL,
  `procedure_note_en` text,
  `duration_minute` int(11) DEFAULT NULL,
  `is_active` char(1) DEFAULT 'Y',
  `is_special_room` char(1) DEFAULT 'N',
  `ssb_doctor_id` int(11) DEFAULT NULL,
  `facroom` varchar(45) DEFAULT NULL,
  `medical_name` varchar(100) DEFAULT NULL,
  `note_symbol` varchar(45) DEFAULT NULL,
  `use_md` char(1) DEFAULT 'N',
  PRIMARY KEY (`procedure_item_id`),
  KEY `IND_code` (`procedure_code`)
) ENGINE=MyISAM AUTO_INCREMENT=1306 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `procedure_item_bak`
--

DROP TABLE IF EXISTS `procedure_item_bak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procedure_item_bak` (
  `procedure_item_id` int(11) NOT NULL DEFAULT '0',
  `procedure_name` varchar(45) DEFAULT NULL,
  `procedure_name_en` varchar(45) DEFAULT NULL,
  `procedure_code` varchar(45) DEFAULT NULL,
  `need_slot` char(1) DEFAULT 'Y',
  `procedure_note` text,
  `pre_list` text,
  `department_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `procedure_log`
--

DROP TABLE IF EXISTS `procedure_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procedure_log` (
  `procedure_delete_id` int(11) NOT NULL AUTO_INCREMENT,
  `procedure_id` int(11) DEFAULT NULL,
  `appuser_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `procedure_delete_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action_by` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`procedure_delete_id`)
) ENGINE=MyISAM AUTO_INCREMENT=865 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `procedure_mapping`
--

DROP TABLE IF EXISTS `procedure_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procedure_mapping` (
  `procedure_mapping_id` int(11) NOT NULL AUTO_INCREMENT,
  `procedure_item_id` int(11) NOT NULL,
  `procedure_template_id` int(11) NOT NULL,
  PRIMARY KEY (`procedure_mapping_id`),
  KEY `IND01` (`procedure_template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `procedure_template`
--

DROP TABLE IF EXISTS `procedure_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procedure_template` (
  `procedure_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`procedure_template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quippe_link`
--

DROP TABLE IF EXISTS `quippe_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quippe_link` (
  `quippe_link_id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` varchar(45) DEFAULT NULL,
  `link_mode` varchar(45) DEFAULT NULL COMMENT 'REG_HN, REG_VN, MSC',
  PRIMARY KEY (`quippe_link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reg_report`
--

DROP TABLE IF EXISTS `reg_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reg_report` (
  `reg_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `report_code` varchar(45) DEFAULT NULL,
  `report_file` varchar(128) DEFAULT NULL,
  `report_name` varchar(256) DEFAULT NULL,
  `report_mode` varchar(45) DEFAULT NULL,
  `default_printer` varchar(128) DEFAULT NULL,
  `default_document` varchar(1) DEFAULT 'N',
  `file_format` varchar(45) DEFAULT NULL,
  `allow_group_list` text,
  PRIMARY KEY (`reg_report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reg_report2`
--

DROP TABLE IF EXISTS `reg_report2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reg_report2` (
  `reg_report_id` int(11) NOT NULL DEFAULT '0',
  `report_code` varchar(45) DEFAULT NULL,
  `report_file` varchar(128) DEFAULT NULL,
  `report_name` varchar(256) DEFAULT NULL,
  `report_mode` varchar(45) DEFAULT NULL,
  `default_printer` varchar(128) DEFAULT NULL,
  `default_document` varchar(1) DEFAULT 'N',
  `file_format` varchar(45) DEFAULT NULL,
  `allow_group_list` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reg_report_set`
--

DROP TABLE IF EXISTS `reg_report_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reg_report_set` (
  `reg_report_set_id` int(11) NOT NULL AUTO_INCREMENT,
  `set_name` varchar(255) DEFAULT NULL,
  `id_list` text,
  PRIMARY KEY (`reg_report_set_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) DEFAULT NULL,
  `report_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `request_timetable`
--

DROP TABLE IF EXISTS `request_timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_timetable` (
  `request_timetable_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `timetable_date` date DEFAULT NULL,
  `time_from` varchar(15) DEFAULT NULL,
  `time_to` varchar(15) DEFAULT NULL,
  `request_by` int(11) DEFAULT NULL,
  `request_time` datetime DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `approve_time` datetime DEFAULT NULL,
  `request_status` varchar(45) DEFAULT NULL COMMENT 'NEW, APPROVE, REJECT, CANCEL',
  `request_status_remark` text,
  PRIMARY KEY (`request_timetable_id`),
  KEY `IND01` (`timetable_date`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `running_no`
--

DROP TABLE IF EXISTS `running_no`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `running_no` (
  `running_date` date NOT NULL,
  `current_running` int(11) DEFAULT '1',
  PRIMARY KEY (`running_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `slot_config`
--

DROP TABLE IF EXISTS `slot_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slot_config` (
  `slot_config_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `is_new_patient` varchar(1) DEFAULT NULL,
  `appointment_type_id` int(11) DEFAULT NULL,
  `is_thai` varchar(1) DEFAULT NULL,
  `slot_minute` int(11) DEFAULT NULL,
  `allow_overlap` int(11) DEFAULT NULL,
  PRIMARY KEY (`slot_config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_action_order`
--

DROP TABLE IF EXISTS `sp_action_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_action_order` (
  `sp_action_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn_id` int(11) DEFAULT NULL,
  `finish_datetime` datetime DEFAULT NULL,
  `procedure_item_id` int(11) DEFAULT NULL,
  `finish_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`sp_action_order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_closevisit`
--

DROP TABLE IF EXISTS `sp_closevisit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_closevisit` (
  `sp_closevisit_id` int(11) NOT NULL AUTO_INCREMENT,
  `closevisit_code` varchar(45) DEFAULT NULL,
  `closevisit_name` varchar(256) DEFAULT NULL,
  `seq` int(11) DEFAULT NULL,
  `appgroup_list` text,
  PRIMARY KEY (`sp_closevisit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_data`
--

DROP TABLE IF EXISTS `sp_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_data` (
  `sp_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_template_id` int(11) DEFAULT NULL,
  `hn` varchar(45) DEFAULT NULL,
  `vn` varchar(45) DEFAULT NULL,
  `visitdate` date DEFAULT NULL,
  `vn_suffix` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `is_deleted` char(1) NOT NULL DEFAULT 'N',
  `delete_by` int(11) DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `action_type` varchar(128) DEFAULT NULL,
  `file_extension` varchar(45) NOT NULL DEFAULT 'png',
  `lab_report_by` int(11) DEFAULT NULL,
  `lab_approve_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`sp_data_id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_data_detail`
--

DROP TABLE IF EXISTS `sp_data_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_data_detail` (
  `sp_data_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_data_id` int(11) DEFAULT NULL,
  `sp_input_config_id` int(11) DEFAULT NULL,
  `sp_data` varchar(45) DEFAULT NULL,
  `is_highlight` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`sp_data_detail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1542 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_data_history`
--

DROP TABLE IF EXISTS `sp_data_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_data_history` (
  `sp_data_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_data_id` int(11) DEFAULT NULL,
  `log_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `action_by` int(11) DEFAULT NULL,
  `history_content` text,
  PRIMARY KEY (`sp_data_history_id`)
) ENGINE=MyISAM AUTO_INCREMENT=214 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_finish_log`
--

DROP TABLE IF EXISTS `sp_finish_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_finish_log` (
  `sp_finish_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `in_datetime` datetime DEFAULT NULL,
  `proceed_datetime` datetime DEFAULT NULL,
  `finish_datetime` datetime DEFAULT NULL,
  `out_datetime` datetime DEFAULT NULL,
  `finish_by` int(11) DEFAULT NULL,
  `in_reset_reason` int(11) DEFAULT NULL,
  `proceed_reset_reason` int(11) DEFAULT NULL,
  `finish_reset_reason` int(11) DEFAULT NULL,
  `out_reset_reason` int(11) DEFAULT NULL,
  `is_hold` char(1) NOT NULL DEFAULT 'N',
  `hold_remark` text,
  PRIMARY KEY (`sp_finish_log_id`),
  KEY `IND01` (`vn_id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_input_config`
--

DROP TABLE IF EXISTS `sp_input_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_input_config` (
  `sp_input_config_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_template_id` int(11) DEFAULT NULL,
  `input_index` int(11) DEFAULT NULL,
  `input_name` varchar(128) DEFAULT NULL,
  `input_type` varchar(45) DEFAULT NULL,
  `data_type` varchar(45) DEFAULT NULL,
  `option_list` text,
  `unit` varchar(45) DEFAULT NULL,
  `lr_m_min` float DEFAULT NULL,
  `lr_m_max` float DEFAULT NULL,
  `lr_f_min` float DEFAULT NULL,
  `lr_f_max` float DEFAULT NULL,
  `lr_lower_flag` varchar(45) DEFAULT NULL,
  `lr_higher_flag` varchar(45) DEFAULT NULL,
  `lr_normal_flag` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sp_input_config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=380 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_input_config (backup)`
--

DROP TABLE IF EXISTS `sp_input_config (backup)`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_input_config (backup)` (
  `sp_input_config_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_template_id` int(11) DEFAULT NULL,
  `input_index` int(11) DEFAULT NULL,
  `input_name` varchar(128) DEFAULT NULL,
  `input_type` varchar(45) DEFAULT NULL,
  `data_type` varchar(45) DEFAULT NULL,
  `option_list` text,
  PRIMARY KEY (`sp_input_config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_reset_reason`
--

DROP TABLE IF EXISTS `sp_reset_reason`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_reset_reason` (
  `sp_reset_reason_id` int(11) NOT NULL AUTO_INCREMENT,
  `reset_reason` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`sp_reset_reason_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_status_history`
--

DROP TABLE IF EXISTS `sp_status_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_status_history` (
  `sp_status_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `action_status` varchar(45) DEFAULT NULL,
  `action_by` varchar(45) DEFAULT NULL,
  `hold_remark` text,
  `action_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`sp_status_history_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_template`
--

DROP TABLE IF EXISTS `sp_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_template` (
  `sp_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_code` varchar(45) DEFAULT NULL,
  `template_name` varchar(128) DEFAULT NULL,
  `template_mode` varchar(45) DEFAULT NULL,
  `template_desc` text,
  `is_enable` char(1) DEFAULT 'Y',
  `template_html` text,
  `input_column` int(11) DEFAULT '1',
  `ui_type` varchar(45) NOT NULL DEFAULT 'KEYIN',
  `department_list` text,
  `max_width` int(11) DEFAULT NULL,
  PRIMARY KEY (`sp_template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sp_template (backup)`
--

DROP TABLE IF EXISTS `sp_template (backup)`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_template (backup)` (
  `sp_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_code` varchar(45) DEFAULT NULL,
  `template_name` varchar(128) DEFAULT NULL,
  `template_mode` varchar(45) DEFAULT NULL,
  `template_desc` text,
  `is_enable` char(1) DEFAULT 'Y',
  `clinic_code` varchar(45) DEFAULT NULL,
  `template_html` text,
  `input_column` int(11) DEFAULT '1',
  PRIMARY KEY (`sp_template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `specialty`
--

DROP TABLE IF EXISTS `specialty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `specialty` (
  `specialty_id` int(11) NOT NULL AUTO_INCREMENT,
  `specialty_name` varchar(128) DEFAULT NULL,
  `specialty_remark` text,
  `specialty_name_en` varchar(128) DEFAULT NULL,
  `enable_mobile` char(1) DEFAULT 'N',
  PRIMARY KEY (`specialty_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `symptom`
--

DROP TABLE IF EXISTS `symptom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `symptom` (
  `symptom_id` int(11) NOT NULL AUTO_INCREMENT,
  `symptom_name` varchar(215) DEFAULT NULL,
  `enable_mobile` varchar(1) DEFAULT 'N',
  `specialty_id` int(11) DEFAULT NULL,
  `symptom_name_en` varchar(215) DEFAULT NULL,
  `seq` int(11) DEFAULT NULL,
  PRIMARY KEY (`symptom_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `symptom_freq`
--

DROP TABLE IF EXISTS `symptom_freq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `symptom_freq` (
  `symptom_freq_id` int(11) NOT NULL AUTO_INCREMENT,
  `freq_name` varchar(215) DEFAULT NULL,
  PRIMARY KEY (`symptom_freq_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `symptom_site`
--

DROP TABLE IF EXISTS `symptom_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `symptom_site` (
  `symptom_site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(215) DEFAULT NULL,
  `symptom_id` int(11) DEFAULT NULL,
  `enable_mobile` varchar(1) DEFAULT 'N',
  `site_name_en` varchar(215) DEFAULT NULL,
  PRIMARY KEY (`symptom_site_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sysprop`
--

DROP TABLE IF EXISTS `sysprop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sysprop` (
  `sysprop_name` varchar(50) NOT NULL,
  `sysprop_value` text,
  `sysprop_desc` text,
  PRIMARY KEY (`sysprop_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `test` (
  `seq` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timetable` (
  `timetable_id` int(11) NOT NULL AUTO_INCREMENT,
  `timetable_date` date DEFAULT NULL,
  `timetable_time` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `timetable_remark` text,
  `department_id` int(11) DEFAULT NULL,
  `timetable_active` char(1) NOT NULL DEFAULT 'Y',
  `timetable_history_id` int(11) DEFAULT NULL,
  `timetable_template_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`timetable_id`),
  KEY `IND01` (`timetable_date`,`timetable_time`),
  KEY `IND02` (`doctor_id`),
  KEY `IND03` (`doctor_id`,`timetable_date`)
) ENGINE=MyISAM AUTO_INCREMENT=961517 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `timetable_conf`
--

DROP TABLE IF EXISTS `timetable_conf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timetable_conf` (
  `timetable_conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `timetable_id` int(11) DEFAULT NULL,
  `hour_flag` int(11) DEFAULT NULL,
  `allow_appointment_type` text,
  `t_slot_old` int(11) DEFAULT NULL,
  `t_slot_new` int(11) DEFAULT NULL,
  `t_slot_new_unspecify` int(11) DEFAULT NULL,
  PRIMARY KEY (`timetable_conf_id`),
  KEY `IND01` (`timetable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=270088 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `timetable_history`
--

DROP TABLE IF EXISTS `timetable_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timetable_history` (
  `timetable_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `timetable_date` date DEFAULT NULL,
  `time_list` varchar(512) DEFAULT NULL,
  `reason` text,
  `action_by` int(11) DEFAULT NULL,
  `action_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `mode` varchar(45) DEFAULT NULL COMMENT 'OFF,UNOFF,DEL,SLOT,ADD,GEN',
  `doctor_id` int(11) DEFAULT NULL,
  `timetable_id_list` text,
  `is_effective` char(1) NOT NULL DEFAULT 'Y',
  `message` text,
  PRIMARY KEY (`timetable_history_id`),
  KEY `IND01` (`timetable_date`,`doctor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=407 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `timetable_template`
--

DROP TABLE IF EXISTS `timetable_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timetable_template` (
  `timetable_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `time_from` varchar(45) DEFAULT NULL,
  `time_to` varchar(45) DEFAULT NULL,
  `tt_slot_old` int(11) DEFAULT NULL,
  `tt_slot_new` int(11) DEFAULT NULL,
  `tt_slot_new_unspecify` int(11) DEFAULT NULL,
  `tt_allow_appointment_type` text,
  `th_slot_old` int(11) DEFAULT NULL,
  `th_slot_new` int(11) DEFAULT NULL,
  `th_slot_new_unspecify` int(11) DEFAULT NULL,
  PRIMARY KEY (`timetable_template_id`),
  KEY `IND01` (`doctor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=957 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `timetable_void`
--

DROP TABLE IF EXISTS `timetable_void`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timetable_void` (
  `timetable_void_id` int(11) NOT NULL AUTO_INCREMENT,
  `timetable_id` int(11) DEFAULT NULL,
  `void_reason` text,
  `void_by` varchar(255) DEFAULT NULL,
  `void_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `void_type` varchar(45) DEFAULT NULL,
  `void_datetime` datetime DEFAULT NULL,
  `appointment_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`timetable_void_id`),
  KEY `IND01` (`timetable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tmp001`
--

DROP TABLE IF EXISTS `tmp001`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tmp001` (
  `appointmentno` varchar(255) DEFAULT NULL,
  `procedure_code` varchar(45) DEFAULT NULL,
  `appdate` date DEFAULT NULL,
  `apptime` time DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `procedure_item_id` int(11) DEFAULT NULL,
  `timetable_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vital_sign`
--

DROP TABLE IF EXISTS `vital_sign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vital_sign` (
  `vital_sign_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn_id` int(11) DEFAULT NULL,
  `vital_sign_seq` int(11) DEFAULT NULL,
  `bp_high` int(11) DEFAULT NULL,
  `bp_low` int(11) DEFAULT NULL,
  `pulse` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `vital_sign_remark` text,
  `is_repeat` char(1) DEFAULT NULL,
  PRIMARY KEY (`vital_sign_id`),
  KEY `IND01` (`vn_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vn_appointment`
--

DROP TABLE IF EXISTS `vn_appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vn_appointment` (
  `vn_appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `print_procedure` text,
  PRIMARY KEY (`vn_appointment_id`),
  KEY `IND01` (`vn_id`),
  KEY `IND02` (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vn_info`
--

DROP TABLE IF EXISTS `vn_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vn_info` (
  `vn_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitdate` date DEFAULT NULL,
  `vn` varchar(20) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `msc_status` varchar(45) DEFAULT NULL,
  `msc_status_sub` varchar(45) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `arrive_datetime` datetime DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `ack_datetime` datetime DEFAULT NULL,
  `reg_datetime` datetime DEFAULT NULL,
  `finish_datetime` datetime DEFAULT NULL,
  `screening_by` int(11) DEFAULT NULL,
  `msc_hold_remark` text,
  `flag_step1` char(1) DEFAULT NULL,
  `flag_step2` char(1) DEFAULT NULL,
  `flag_step3` char(1) DEFAULT NULL,
  `vital_sign_flag` varchar(45) DEFAULT NULL,
  `eye_history_flag` varchar(45) DEFAULT NULL COMMENT 'YES,NO,NA',
  `eye_history_remark` text,
  `contact_lens_flag` varchar(45) DEFAULT NULL,
  `eye_glasses_flag` varchar(45) DEFAULT NULL,
  `medical_history_flag` varchar(45) DEFAULT NULL,
  `allergy_flag` varchar(45) DEFAULT NULL,
  `allergy_other_flag` varchar(45) DEFAULT NULL,
  `print_leftdata` text,
  `print_rightdata` text,
  `fast_screening` varchar(1) DEFAULT NULL,
  `complaint_only` text,
  `complaintmemo` text,
  `newpatient` int(11) DEFAULT NULL,
  `clinic_list` text,
  `msc_duration` int(11) DEFAULT NULL,
  `walkin_datetime` datetime DEFAULT NULL,
  `walkin_by` varchar(128) DEFAULT NULL,
  `confirmout_datetime` datetime DEFAULT NULL,
  `confirmout_by` varchar(128) DEFAULT NULL,
  `running` int(11) DEFAULT NULL,
  `queueno` varchar(5) DEFAULT NULL,
  `codecolor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`vn_id`),
  KEY `IND01` (`visitdate`,`vn`),
  KEY `IND02` (`patient_id`),
  KEY `IND03` (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1186 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vn_info_old`
--

DROP TABLE IF EXISTS `vn_info_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vn_info_old` (
  `vn_info_old_id` int(11) NOT NULL AUTO_INCREMENT,
  `hn` varchar(45) DEFAULT NULL,
  `vn` varchar(45) DEFAULT NULL,
  `visitdate` date DEFAULT NULL,
  `medical_history_flag` varchar(45) DEFAULT NULL,
  `eye_history_flag` varchar(45) DEFAULT NULL,
  `contact_lens_flag` varchar(45) DEFAULT NULL,
  `eye_glasses_flag` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`vn_info_old_id`),
  KEY `IND01` (`hn`,`visitdate`,`vn`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vn_procedure`
--

DROP TABLE IF EXISTS `vn_procedure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vn_procedure` (
  `vn_procedure_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn_id` int(11) DEFAULT NULL,
  `procedure_item_id` int(11) DEFAULT NULL,
  `vn_procedure_remark` text,
  `appointment_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`vn_procedure_id`),
  KEY `IND01` (`vn_id`),
  KEY `IND02` (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=892 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vn_right`
--

DROP TABLE IF EXISTS `vn_right`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vn_right` (
  `vn_right_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn` varchar(10) DEFAULT NULL,
  `visitdate` date DEFAULT NULL,
  `suffix` int(11) DEFAULT NULL,
  PRIMARY KEY (`vn_right_id`),
  KEY `IND01` (`visitdate`,`vn`,`suffix`)
) ENGINE=MyISAM AUTO_INCREMENT=648 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vn_right_detail`
--

DROP TABLE IF EXISTS `vn_right_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vn_right_detail` (
  `vn_right_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `vn_right_id` varchar(45) DEFAULT NULL,
  `rightcode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`vn_right_detail_id`),
  KEY `IND01` (`vn_right_id`)
) ENGINE=MyISAM AUTO_INCREMENT=600 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `vw_doctor_img`
--

DROP TABLE IF EXISTS `vw_doctor_img`;
/*!50001 DROP VIEW IF EXISTS `vw_doctor_img`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_doctor_img` AS SELECT 
 1 AS `doctor_code`,
 1 AS `doctor_img`,
 1 AS `doctor_certify`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ward`
--

DROP TABLE IF EXISTS `ward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ward` (
  `ward_id` int(11) NOT NULL AUTO_INCREMENT,
  `ward_name` varchar(255) DEFAULT NULL,
  `ward_name_en` varchar(255) DEFAULT NULL,
  `ward_code` varchar(45) NOT NULL,
  PRIMARY KEY (`ward_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Final view structure for view `vw_doctor_img`
--

/*!50001 DROP VIEW IF EXISTS `vw_doctor_img`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_doctor_img` AS select `doctor`.`doctor_code` AS `doctor_code`,`doctor`.`doctor_img` AS `doctor_img`,`doctor`.`certifypublicno` AS `doctor_certify` from `doctor` */;
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

-- Dump completed on 2025-02-13 11:22:43
