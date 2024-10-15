-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: e-report
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `db_backup`
--

DROP TABLE IF EXISTS `db_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `db_backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `initiator` varchar(255) NOT NULL,
  `backup_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `db_backup`
--

LOCK TABLES `db_backup` WRITE;
/*!40000 ALTER TABLE `db_backup` DISABLE KEYS */;
INSERT INTO `db_backup` VALUES (1,'IT Admin','2024-10-15 13:50:13'),(2,'IT Admin','2024-10-15 14:32:07'),(3,'IT Admin','2024-10-15 14:33:01');
/*!40000 ALTER TABLE `db_backup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file_revisions`
--

DROP TABLE IF EXISTS `file_revisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_revisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(255) NOT NULL,
  `revision_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `revised_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file_revisions`
--

LOCK TABLES `file_revisions` WRITE;
/*!40000 ALTER TABLE `file_revisions` DISABLE KEYS */;
INSERT INTO `file_revisions` VALUES (1,'1251703316','2024-08-01 08:13:15','Sen Omabtang','2024-08-01 08:13:15'),(2,'6705202021','2024-08-01 08:20:43','Sen Omabtang','2024-08-01 08:20:43'),(3,'2773167363','2024-08-01 08:21:31','Sen Omabtang','2024-08-01 08:21:31'),(4,'7876572424','2024-08-01 08:22:19','Sen Omabtang','2024-08-01 08:22:19'),(5,'7876572424','2024-08-01 08:22:19','Sen Omabtang','2024-08-01 08:22:19'),(6,'7876572424','2024-08-01 08:22:19','Sen Omabtang','2024-08-01 08:22:19'),(7,'1251703316','2024-08-01 08:13:15','Sen Omabtang','2024-08-01 08:13:15'),(8,'6705202021','2024-08-01 08:20:43','Sen Omabtang','2024-08-01 08:20:43'),(9,'6705202021','2024-08-02 00:44:43','Sen Omabtang','2024-08-02 00:44:43'),(10,'7876572424','2024-08-02 02:30:13','Sen Omabtang','2024-08-02 02:30:13'),(11,'2773167363','2024-08-02 03:00:31','Sen Omabtang','2024-08-02 03:00:31'),(12,'1251703316','2024-08-02 03:45:42','Allyssa Kate Maranan','2024-08-02 03:45:42'),(13,'5700843114','2024-08-05 00:18:03','Khenneth Puerto','2024-08-05 00:18:03'),(14,'5700843114','2024-08-02 05:19:59','Sen Omabtang','2024-08-02 05:19:59'),(15,'5700843114','2024-08-02 05:57:56','Sen Omabtang','2024-08-02 05:57:56'),(16,'5700843114','2024-08-02 05:58:02','Sen Omabtang','2024-08-02 05:58:02'),(17,'5700843114','2024-08-02 05:59:49','Sen Omabtang','2024-08-02 05:59:49'),(18,'5700843114','2024-08-02 05:59:58','Sen Omabtang','2024-08-02 05:59:58'),(19,'5700843114','2024-08-02 06:01:18','Sen Omabtang','2024-08-02 06:01:18'),(20,'5700843114','2024-08-02 06:03:35','Sen Omabtang','2024-08-02 06:03:35'),(21,'5700843114','2024-08-02 06:09:54','Sen Omabtang','2024-08-02 06:09:54'),(22,'5700843114','2024-08-02 06:45:19','Sen Omabtang','2024-08-02 06:45:19'),(23,'5700843114','2024-08-02 06:45:41','Sen Omabtang','2024-08-02 06:45:41'),(24,'5700843114','2024-08-02 06:54:53','Sen Omabtang','2024-08-02 06:54:53'),(25,'5700843114','2024-08-02 07:00:42','Sen Omabtang','2024-08-02 07:00:42'),(26,'1251703316','2024-08-02 07:27:17','Sen Omabtang','2024-08-02 07:27:17'),(27,'2330834753','2024-08-02 09:27:33','Sen Omabtang','2024-08-02 09:27:33'),(28,'1130737970','2024-08-08 23:57:20','Allyssa Kate Maranan','2024-08-08 23:57:20'),(29,'1130737970','2024-08-09 00:13:45','Sen Omabtang','2024-08-09 00:13:45'),(30,'2330834753','2024-09-24 03:25:15','Sen Omabtang','2024-09-24 03:25:15');
/*!40000 ALTER TABLE `file_revisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_accounts`
--

DROP TABLE IF EXISTS `m_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `isAllow` varchar(50) NOT NULL,
  `secret_id` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_accounts`
--

LOCK TABLES `m_accounts` WRITE;
/*!40000 ALTER TABLE `m_accounts` DISABLE KEYS */;
INSERT INTO `m_accounts` VALUES (1,'24-11115','IT Admin','admin','admin','','admin','','IT','2024-06-25 15:53:34'),(2,'23-10525','Allyssa Kate Maranan','ally','ally','','checker','','','2024-07-10 07:11:31'),(3,'24-11109','Khenneth Puerto','khenneth','ken','','approver','','','2024-07-11 10:43:07'),(4,'24-11114','Sen Omabtang','sen','sen','','uploader','Yes','','2024-07-11 15:43:45'),(5,'24-11192','Joyce Ann Montero','joyce','joyce','','approver','','IT','2024-07-25 09:10:34'),(6,'12-34567','Juan Dela Cruz','juan','juan','','uploader','','','2024-07-26 16:56:34'),(7,'24-00000','IT Super Admin','Super Admin','SuperIT','','approver','','SuperIT','2024-08-12 10:30:34');
/*!40000 ALTER TABLE `m_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_report_title`
--

DROP TABLE IF EXISTS `m_report_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_report_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_doc` varchar(255) NOT NULL,
  `sub_doc` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_report_title`
--

LOCK TABLES `m_report_title` WRITE;
/*!40000 ALTER TABLE `m_report_title` DISABLE KEYS */;
INSERT INTO `m_report_title` VALUES (1,'Initial Practice Training Report-Special Batch','Training Attendance and Comprehension Practical Result','2024-06-25 13:42:14'),(3,'Final Practice Training Report','Training Attendance and Comprehension Practical Result','2024-06-25 13:42:14'),(5,'Trainers Evaluation Results','Theory Training','2024-06-25 13:42:14'),(6,'Trainers Evaluation Results','Initial Practice Training','2024-06-25 13:42:14'),(7,'Trainers Evaluation Results','Final Practice Training','2024-06-25 13:42:14'),(8,'Trainers Evaluation Results','SEP','2024-06-25 13:42:14'),(9,'Trainers Evaluation Results','Soft Skills','2024-06-25 13:42:14'),(10,'Training History','','2024-06-25 13:43:21'),(11,'Trainer Certification Record','','2024-06-25 13:43:32'),(12,'Theory Training Overall Training Report','','2024-06-25 13:44:15'),(13,'Training Record','','2024-06-25 13:45:02'),(14,'SEP Comprehensive Report','Expert','2024-06-25 13:45:54'),(15,'SEP Comprehensive Report','Jr.Staff','2024-06-25 13:45:54'),(16,'SEP Comprehensive Report','Staff','2024-06-25 13:45:54'),(17,'Initial Practice Training Report','Training Attendance and Comprehension Practical Result','2024-06-25 13:47:13'),(19,'Final Practice Training Report-Special Batch','Training Attendance and Comprehension Practical Re','2024-06-25 13:48:07');
/*!40000 ALTER TABLE `m_report_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_report`
--

DROP TABLE IF EXISTS `t_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reporter_id` varchar(255) NOT NULL,
  `reporter_name` varchar(255) NOT NULL,
  `report_status` varchar(50) NOT NULL,
  `report_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_report`
--

LOCK TABLES `t_report` WRITE;
/*!40000 ALTER TABLE `t_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_training_group`
--

DROP TABLE IF EXISTS `t_training_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_training_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `training_title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_training_group`
--

LOCK TABLES `t_training_group` WRITE;
/*!40000 ALTER TABLE `t_training_group` DISABLE KEYS */;
INSERT INTO `t_training_group` VALUES (1,'Theory Training','2024-07-04 17:06:55'),(2,'Initial Practice','2024-07-04 17:06:55'),(3,'Final Practice','2024-07-04 17:06:55'),(4,'MNTT','2024-07-04 17:06:55'),(5,'SEP','2024-07-04 17:06:55');
/*!40000 ALTER TABLE `t_training_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_training_record`
--

DROP TABLE IF EXISTS `t_training_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_training_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(255) NOT NULL,
  `batch_no` varchar(255) NOT NULL,
  `training_group` varchar(255) NOT NULL,
  `group_no` varchar(255) NOT NULL,
  `upload_month` varchar(50) NOT NULL,
  `upload_year` varchar(50) NOT NULL,
  `uploader_id` varchar(255) NOT NULL,
  `uploader_name` varchar(255) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_upload_date` varchar(255) NOT NULL,
  `checker_id` varchar(255) NOT NULL,
  `checker_name` varchar(255) NOT NULL,
  `checker_email` varchar(255) NOT NULL,
  `checker_status` varchar(255) NOT NULL,
  `checked_date` varchar(255) NOT NULL,
  `checker_comment` varchar(255) NOT NULL,
  `approver_id` varchar(255) NOT NULL,
  `approver_name` varchar(255) NOT NULL,
  `approver_email` varchar(255) NOT NULL,
  `approver_status` varchar(255) NOT NULL,
  `approved_date` varchar(255) NOT NULL,
  `approver_comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_training_record`
--

LOCK TABLES `t_training_record` WRITE;
/*!40000 ALTER TABLE `t_training_record` DISABLE KEYS */;
INSERT INTO `t_training_record` VALUES (2,'5437072567','600','Theory Training','1','May','2024','24-11114','Sen Omabtang','2024-07-15 14:53:23','','23-10525','Allyssa Kate Maranan','','approved','2024-07-15 15:00:17','checked by checker','24-11109','Khenneth Puerto','khennethlp@gmail.com','approved','2024-06-15 15:00:46','approved by approver'),(3,'6505723826','601','Theory Training','2','June','2024','24-11114','Sen Omabtang','2024-07-15 15:40:50','','23-10525','Allyssa Kate Maranan','ally.maranan@furukawaelectric.com','approved','2024-07-15 16:21:46','','24-11109','Khenneth Puerto','khennethlp@gmail.com','disapproved','2024-07-15 16:39:26','disapproved by ken'),(6,'2011806998','591','Theory Training','54','June','2024','24-11114','Sen Omabtang','2024-07-16 10:50:25','','23-10525','Allyssa Kate Maranan','ally.maranan@furukawaelectric.com','approved','2024-07-16 10:51:10','sen','24-11109','Khenneth Puerto','khennethlp@gmail.com','approved','2024-07-16 10:51:41','wrae'),(7,'6774284262','231','Final Practice','11','July','2024','24-11114','Sen Omabtang','2024-07-16 10:56:59','','23-10525','Allyssa Kate Maranan','','Disapproved','2024-07-18 17:25:13','test checker disapproved and file uploading','null','','','','',''),(8,'7825019177','555','Theory Training','22','April','2024','24-11114','Sen Omabtang','2024-07-16 16:44:40','2024-07-24 11:41:32','23-10525','Allyssa Kate Maranan','ally.maranan@furukawaelectric.com','Approved','2024-07-24 13:21:00','','24-11109','Khenneth Puerto','khennethlp@gmail.com','Approved','2024-07-24 13:35:00',''),(9,'8135610066','619','Theory Training','3','June','2024','24-11114','Sen Omabtang','2024-07-17 08:07:17','','23-10525','Allyssa Kate Maranan','ally.maranan@furukawaelectric.com','Approved','2024-07-19 13:59:01','','24-11109','Khenneth Puerto','khennethlp@gmail.com','Approved','2024-03-19 14:20:48','teeeeeeeeeeeeeeeeeeeeeeeeeeest'),(10,'5453100458','500','Theory Training','2','July','2024','24-11114','Sen Omabtang','2024-07-17 10:58:29','','23-10525','Allyssa Kate Maranan','ally.maranan@furukawaelectric.com','Approved','2024-07-18 17:26:54','checker approved','24-11109','Khenneth Puerto','khennethlp@gmail.com','Approved','2024-03-19 13:16:01','test approved'),(11,'9954119553','545','Theory Training','5','May','2024','24-11114','Sen Omabtang','2024-07-17 11:38:17','','23-10525','Allyssa Kate Maranan','ally.maranan@furukawaelectric.com','Disapproved','2024-07-17 16:37:52','','','','','','',''),(12,'9954119553','545','Theory Training','5','April','2024','24-11114','Sen Omabtang','2024-07-17 11:38:17','','23-10525','Allyssa Kate Maranan','ally.maranan@furukawaelectric.com','Approved','2024-07-17 11:53:02','','24-11109','Khenneth Puerto','khennethlp@gmail.com','Approved','2024-07-17 16:34:04',''),(14,'7876572424','623','Final Practice','2','June','2024','24-11114','Sen Omabtang','2024-07-19 14:59:54','2024-08-01 16:22:19','23-10525','Allyssa Kate Maranan','','Disapproved','2024-08-02 07:14:35','disapproved due to blah blah','','','','PENDING','',''),(15,'9644995866','624','Initial Practice','2','July','2024','24-11114','Sen Omabtang','2024-07-19 15:56:54','','23-10525','Allyssa Kate Maranan','ally.maranan@furukawaelectric.com','Approved','2024-07-19 17:41:14','','24-11109','Khenneth Puerto','khennethlp@gmail.com','Disapproved','2024-07-19 17:41:30',''),(16,'3272133934','787','Theory Training','2','April','2024','24-11114','Sen Omabtang','2024-07-24 07:57:09','','23-10525','Allyssa Kate Maranan','ally.maranan@furukawaelectric.com','Approved','2024-07-24 08:22:01','','24-11109','Khenneth Puerto','khennethlp@gmail.com','Disapproved','2024-07-24 08:25:53','check for highlighted column'),(20,'5483371992','1000','Final Practice','5','May','2024','24-11114','Sen Omabtang','2024-07-25 12:03:59','','23-10525','Allyssa Kate Maranan','','Disapproved','2024-07-26 09:08:12','update highlighted column','24-11109','','','','',''),(21,'2773167363','1001','Initial Practice','10','June','2024','24-11114','Sen Omabtang','2024-07-25 12:05:35','2024-08-01 16:21:31','23-10525','Allyssa Kate Maranan','','Disapproved','2024-08-02 07:17:05','update this','','','','','',''),(23,'8805789478','1002','Theory Training','11','April','2024','24-11114','Sen Omabtang','2024-07-25 12:06:45','','23-10525','Allyssa Kate Maranan','','Approved','2024-07-26 11:14:32','','24-11192','Joyce Ann Montero','','Approved','2024-07-26 14:17:32',''),(24,'8805789478','1002','Theory Training','11','July','2024','24-11114','Sen Omabtang','2024-07-25 12:06:45','','23-10525','Allyssa Kate Maranan','','Approved','2024-07-26 08:16:00','','24-11109','Khenneth Puerto','','Disapproved','2024-07-26 08:18:16','disapproved'),(25,'2573687612','100','Theory Training','5','May','2024','24-11114','Sen Omabtang','2024-07-25 14:03:25','','23-10525','Allyssa Kate Maranan','','Approved','2024-07-25 14:04:42','','24-11109','Khenneth Puerto','','Approved','2024-07-25 14:05:08',''),(26,'2330834753','999','Theory Training','15','April','2024','24-11114','Sen Omabtang','2024-07-26 09:04:09','2024-09-24 11:25:15','23-10525','Allyssa Kate Maranan','','Approved','2024-09-24 11:32:34','','24-11109','Khenneth Puerto','','Approved','2024-09-24 11:33:11',''),(34,'2037165022','1100','MNTT','N/A','June','2024','24-11114','Sen Omabtang','2024-07-30 17:21:01','','','','','','','','24-11109','Khenneth Puerto','','Approved','2024-07-31 08:45:07',''),(36,'6013305888','1102','SEP','N/A','July','2024','24-11114','Sen Omabtang','2024-07-30 17:33:58','','','','','','','','24-11109','Khenneth Puerto','','Approved','2024-07-31 11:05:35',''),(37,'4820775615','1103','MNTT','5','April','2024','24-11114','Sen Omabtang','2024-07-31 08:14:38','','','','','','','','24-11109','Khenneth Puerto','','Approved','2024-07-31 11:08:34',''),(48,'1130737970','1114','Theory Training','N/A','May','2024','24-11114','Sen Omabtang','2024-08-08 16:38:08','2024-08-09 08:13:45','23-10525','','','Pending','','','','','','','',''),(49,'3832590524','1116','Theory Training','N/A','July','2024','24-11114','Sen Omabtang','2024-08-08 16:38:26','','23-10525','','','Pending','','','','','','','',''),(50,'3262507317','1116','Initial Practice','N/A','June','2024','24-11114','Sen Omabtang','2024-08-08 16:39:13','','23-10525','Allyssa Kate Maranan','','Approved','2024-08-09 08:37:53','','24-11109','','','Pending','',''),(51,'8937166216','623','Theory Training','N/A','April','2024','24-11114','Sen Omabtang','2024-08-09 10:49:08','','23-10525','Allyssa Kate Maranan','','Approved','2024-08-09 10:59:54','','24-11109','Khenneth Puerto','','Approved','2024-08-09 11:03:09',''),(52,'3561487161','N/A','Initial Practice','N/A','September','2024','24-11114','Sen Omabtang','2024-09-27 08:10:04','','23-10525','','','Pending','','','','','','','',''),(53,'8471565507','N/A','Initial Practice','N/A','September','2024','24-11114','Sen Omabtang','2024-09-27 08:56:59','','23-10525','','','Pending','','','','','','','',''),(54,'4330562370','N/A','Theory Training','N/A','August','2024','24-11114','Sen Omabtang','2024-09-27 09:01:57','','23-10525','','','Pending','','','','','','','',''),(55,'8003161332','N/A','Theory Training','2','August','2024','24-11114','Sen Omabtang','2024-09-27 09:02:41','','23-10525','','','Pending','','','','','','','',''),(56,'2410120889','N/A','Initial Practice','N/A','April','2024','24-11114','Sen Omabtang','2024-09-27 09:11:03','','23-10525','','','Pending','','','','','','','',''),(57,'3956687450','N/A','Theory Training','N/A','June','2024','24-11114','Sen Omabtang','2024-09-27 09:13:49','','23-10525','','','Pending','','','','','','','',''),(58,'2519191323','N/A','Theory Training','N/A','August','2024','24-11114','Sen Omabtang','2024-09-27 09:14:45','','23-10525','','','Pending','','','','','','','','');
/*!40000 ALTER TABLE `t_training_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_upload_file`
--

DROP TABLE IF EXISTS `t_upload_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_upload_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(255) NOT NULL,
  `main_doc` varchar(255) NOT NULL,
  `sub_doc` varchar(255) NOT NULL,
  `file_name` varchar(2048) NOT NULL,
  `updated_file` varchar(1000) NOT NULL COMMENT 'uploaded by checker or approver',
  `uploader_updated_file` varchar(1000) NOT NULL COMMENT 'updated disapproved file',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_upload_file`
--

LOCK TABLES `t_upload_file` WRITE;
/*!40000 ALTER TABLE `t_upload_file` DISABLE KEYS */;
INSERT INTO `t_upload_file` VALUES (2,'5437072567','Training History','','TRAINING HISTORY Batch 243-286.pdf','',''),(3,'6505723826','Theory Training Overall Training Report','','TMIS - Work Instruction (1).xlsx','',''),(6,'2011806998','Trainers Evaluation Results','Theory Training','HR-005.pdf','',''),(7,'6774284262','Initial Practice Training Report-Special Batch','Training Attendance and Comprehension Practical Result','COT_2024-07-09 (1).pdf','',''),(8,'7825019177','Trainers Evaluation Results','Theory Training','HR-005 updated.pdf','HR-005 (1) (3).pdf',''),(9,'8135610066','Trainers Evaluation Results','Theory Training','TRAINER\'S EVALUATION RESULT FPT January.pdf','',''),(10,'5453100458','Initial Practice Training Report-Special Batch','Training Attendance and Comprehension Practical Result','Copy of B604.xlsx','',''),(11,'9954119553','Trainers Evaluation Results','Theory Training','Copy of B604 (1).xlsx','',''),(12,'9954119553','Trainers Evaluation Results','Theory Training','Copy of B604.xlsx','',''),(14,'7876572424','Final Practice Training Report','Practical Understanding Test','HR-005.pdf','HR-005 updated.pdf',''),(15,'9644995866','Initial Practice Training Report','Practical Understanding Test','RT-012 (1).pdf','',''),(16,'3272133934','Initial Practice Training Report-Special Batch','Training Attendance and Comprehension Practical Result','Copy of B604.xlsx','Copy of B604 (9).xlsx',''),(20,'5483371992','Final Practice Training Report-Special Batch','Training Attendance and Comprehension Practical Re','Copy of B604 (1).xlsx','Copy of B604 TO UPDATE.xlsx',''),(21,'2773167363','Initial Practice Training Report','Practical Understanding Test','RT-011.pdf','RT-011 to update.pdf',''),(23,'8805789478','Theory Training Overall Training Report','','LAYOUT ni berto (2).xlsx','',''),(24,'8805789478','Theory Training Overall Training Report','','RT-012 (1).pdf','RT-012 disapproved.pdf',''),(25,'2573687612','Training History','','TRAINING HISTORY Batch 243-286.pdf','',''),(26,'2330834753','Training History','','erecord_work_instructions.pdf','TRAINING HISTORY Batch 243-286 to update.pdf',''),(34,'2037165022','Training History','','TRAINING HISTORY Batch 243-286.pdf','',''),(36,'6013305888','Trainers Evaluation Results','Theory Training','INITIAL PROCESS SPECIAL BATCH - JANUARY.pdf','',''),(37,'4820775615','Initial Practice Training Report-Special Batch','Training Attendance and Comprehension Practical Result','INITIAL PROCESS SPECIAL BATCH - JANUARY.pdf','',''),(48,'1130737970','Trainers Evaluation Results','Theory Training','TRAINER\'S EVALUATION RESULT FPT January.pdf','TRAINER\'S EVALUATION RESULT FPT January updated.pdf',''),(49,'3832590524','Training History','','TRAINING HISTORY Batch 243-286.pdf','',''),(50,'3262507317','Initial Practice Training Report-Special Batch','Training Attendance and Comprehension Practical Result','INITIAL PROCESS SPECIAL BATCH - JANUARY.pdf','',''),(51,'8937166216','Trainers Evaluation Results','Theory Training','Trainers Evaluation Result April 2024.xlsx','',''),(52,'3561487161','Initial Practice Training Report-Special Batch','Training Attendance and Comprehension Practical Result','Batch 297.xlsx','',''),(53,'8471565507','Initial Practice Training Report-Special Batch','Training Attendance and Comprehension Practical Result','Batch 609 IPT Report.xlsx','',''),(54,'4330562370','Trainers Evaluation Results','Theory Training','Batch 609 IPT Report.xlsx','',''),(55,'8003161332','Theory Training Overall Training Report','','Batch 297.xlsx','',''),(56,'2410120889','Initial Practice Training Report-Special Batch','Training Attendance and Comprehension Practical Result','Batch 609 IPT Report.xlsx','',''),(57,'3956687450','Final Practice Training Report','Training Attendance and Comprehension Practical Result','Batch 609 IPT Report.xlsx','',''),(58,'2519191323','Theory Training Overall Training Report','','Batch 297.xlsx','','');
/*!40000 ALTER TABLE `t_upload_file` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-15 14:33:01
