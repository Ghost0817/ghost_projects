-- MySQL dump 10.13  Distrib 8.0.18, for macos10.14 (x86_64)
--
-- Host: localhost    Database: typingw1_new
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `mn_title` varchar(255) NOT NULL,
  `en_title` varchar(255) NOT NULL,
  `mn_body` text NOT NULL,
  `en_body` text NOT NULL,
  `sortnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'How much does Bicheech.com cost?','How much does Bicheech.com cost?','Bicheech.com is free! Make sure to register for a free account to save your typing progress and statistics! Bicheech.com displays fun and interesting ads to help pay for the cost of building and maintaining Bicheech.com. If you would prefer not to see advertisements, you can upgrade to a Premium Account and you will never see another ad again.','Bicheech.com is free! Make sure to register for a free account to save your typing progress and statistics! Bicheech.com displays fun and interesting ads to help pay for the cost of building and maintaining Bicheech.com. If you would prefer not to see advertisements, you can upgrade to a Premium Account and you will never see another ad again.',1),(2,'I am trying to add my students but I get an error message that says username already taken.','I am trying to add my students but I get an error message that says username already taken.','We use a shared student username database. When you try to create a username it is checked against every other student in our system, just like trying to register for an email address with Google. You will find that common usernames are “already in use” by other students at other schools. Make sure the names are unique as possible to avoid this.','We use a shared student username database. When you try to create a username it is checked against every other student in our system, just like trying to register for an email address with Google. You will find that common usernames are “already in use” by other students at other schools. Make sure the names are unique as possible to avoid this.',2),(3,'How do students reset lost passwords?','How do students reset lost passwords?','You can reset your students\' passwords from the Classes page of your Teacher Portal.','You can reset your students\' passwords from the Classes page of your Teacher Portal.',3),(4,'I purchased Ad-Free licenses. Why do I still see ads on the students accounts?','I purchased Ad-Free licenses. Why do I still see ads on the students accounts?','You will need to assign the licenses to your students. To assign the licenses to your students click on the Manage Premium Licenses link at the very top of your teacher portal. Once there you will have the ability to upgrade and downgrade your students.','You will need to assign the licenses to your students. To assign the licenses to your students click on the Manage Premium Licenses link at the very top of your teacher portal. Once there you will have the ability to upgrade and downgrade your students.',4),(5,'My student has two teachers who use Bcheech.com. How can I add another teacher so they can also view students progress.','My student has two teachers who use Bcheech.com. How can I add another teacher so they can also view students progress.','Bicheech.com’s Teacher Portal only supports a single login per account.','Bicheech.com’s Teacher Portal only supports a single login per account.',5),(6,'I accidentally deleted my students account, can I recover the data from that account?','I accidentally deleted my students account, can I recover the data from that account?','Unfortunately once an account has been deleted the data can not be recovered.','Unfortunately once an account has been deleted the data can not be recovered.',6),(7,'How is the time spent typing calculated?','How is the time spent typing calculated?','Time spent typing is calculated from the time the student starts and stops typing on the keyboard in a lesson screen. It also includes the timed tests. The time does not include the time it takes to move from one lesson to another or time spent on games.','Time spent typing is calculated from the time the student starts and stops typing on the keyboard in a lesson screen. It also includes the timed tests. The time does not include the time it takes to move from one lesson to another or time spent on games.',7),(8,'Can I disable the backspace key?','Can I disable the backspace key?','The backspace key can not be disabled.','The backspace key can not be disabled.',8),(9,'I do not want my students to view the Class Scoreboard, can this be disabled?','I do not want my students to view the Class Scoreboard, can this be disabled?','Yes, the Scoreboard can be disabled from within your Teacher Portal, on the Account page, under Enable Class Scoreboard.','Yes, the Scoreboard can be disabled from within your Teacher Portal, on the Account page, under Enable Class Scoreboard.',9);
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-19 21:31:15
