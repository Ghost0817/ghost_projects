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
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mn_title` varchar(255) NOT NULL,
  `en_title` varchar(255) NOT NULL,
  `mn_discription` varchar(255) NOT NULL,
  `en_discription` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'Гарны нинжа »','Keyboard Ninja »','Fast typists hate fruits!','Fast typists hate fruits!','29a634c0a2c7362d09d75192bd76370ef1f50dca.png','<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" width=\"916\" height=\"400\" id=\"Keyboard Ninja\" align=\"middle\">\r\n<param name=\"allowScriptAccess\" value=\"always\">\r\n<param name=\"movie\" value=\"http://images.typingweb.com/tutor/images/games/keyboard-ninja/preloader.swf\">\r\n<param name=\"menu\" value=\"false\">\r\n<param name=\"quality\" value=\"high\">\r\n<param name=\"bgcolor\" value=\"#000000\">\r\n<param name=\"wmode\" value=\"transparent\">\r\n<embed src=\"http://images.typingweb.com/tutor/images/games/keyboard-ninja/preloader.swf\" menu=\"false\" quality=\"high\" bgcolor=\"#000000\" width=\"916\" height=\"400\" name=\"Keyboard Ninja\" align=\"middle\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" wmode=\"transparent\">\r\n</object>'),(2,'Tommy Q','Tommy Q','Гэнэт! Зомбинууд алхаж байна.','Zombies are taking over. Oh snap!','dbfc9277dc47661b67b6319c024f0aadeb2e4f0b.png','<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" width=\"916\" height=\"400\" id=\"TommyQ\" align=\"middle\">\r\n<param name=\"allowScriptAccess\" value=\"always\">\r\n<param name=\"movie\" value=\"http://images.typingweb.com/tutor/images/games/tommyq/preloader.swf\">\r\n<param name=\"menu\" value=\"false\">\r\n<param name=\"quality\" value=\"high\">\r\n<param name=\"bgcolor\" value=\"#000000\">\r\n<param name=\"wmode\" value=\"transparent\">\r\n<embed src=\"http://images.typingweb.com/tutor/images/games/tommyq/preloader.swf\" menu=\"false\" quality=\"high\" bgcolor=\"#000000\" width=\"916\" height=\"400\" name=\"TommyQ\" align=\"middle\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" wmode=\"transparent\">\r\n</object>'),(3,'Type-a-Balloon »','Type-a-Balloon »','Сумаар захидал буудаж байна.','Shoot the letters with darts.','74187ecaa2ed771c6f2e1034e4ee350e859a5e16.png','<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" width=\"916\" height=\"400\" id=\"Type\" align=\"middle\">\r\n<param name=\"allowScriptAccess\" value=\"always\">\r\n<param name=\"movie\" value=\"http://images.typingweb.com/tutor/images/games/type-a-balloon/preloader.swf\">\r\n<param name=\"menu\" value=\"false\">\r\n<param name=\"quality\" value=\"high\">\r\n<param name=\"bgcolor\" value=\"#000000\">\r\n<param name=\"wmode\" value=\"transparent\">\r\n<embed src=\"http://images.typingweb.com/tutor/images/games/type-a-balloon/preloader.swf\" menu=\"false\" quality=\"high\" bgcolor=\"#000000\" width=\"916\" height=\"400\" name=\"Type\" align=\"middle\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" wmode=\"transparent\">\r\n</object>'),(4,'Cup Stacking','Cup Stacking','Эдгээр нь аяга, тэд овоолсон байх хэрэгтэй, харин цорын ганц арга зам нь захиа бичих юм.','These cups, they need to be stacked, but the only way is by typing their letters.','fc6fd314899d5924e0a5097260d948b811a520f5.png','<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\" width=\"600\" height=\"400\">\r\n<param name=\"movie\" value=\"http://images.typingweb.com/tutor/images/games/cupstacking/game.swf\">\r\n<param name=\"allowScriptAccess\" value=\"sameDomain\">\r\n<param name=\"loop\" value=\"false\">\r\n<param name=\"menu\" value=\"false\">\r\n<param name=\"quality\" value=\"high\">\r\n<param name=\"wmode\" value=\"transparent\">\r\n<embed src=\"http://images.typingweb.com/tutor/images/games/cupstacking/game.swf\" width=\"600\" height=\"400\" allowscriptaccess=\"sameDomain\" loop=\"false\" menu=\"false\" quality=\"high\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" wmode=\"transparent\">\r\n</object>'),(5,'Type Toss »','Type Toss »','Step right up folks! Carnival fun!','Step right up folks! Carnival fun!','8c0403583b976bce6478227cacb9fb01a4e8b7fd.png','<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" width=\"916\" height=\"400\" id=\"Type Toss\" align=\"middle\">\r\n<param name=\"allowScriptAccess\" value=\"always\">\r\n<param name=\"movie\" value=\"http://images.typingweb.com/tutor/images/games/type-toss/preloader.swf\">\r\n<param name=\"menu\" value=\"false\">\r\n<param name=\"quality\" value=\"high\">\r\n<param name=\"bgcolor\" value=\"#000000\">\r\n<param name=\"wmode\" value=\"transparent\">\r\n<embed src=\"http://images.typingweb.com/tutor/images/games/type-toss/preloader.swf\" menu=\"false\" quality=\"high\" bgcolor=\"#000000\" width=\"916\" height=\"400\" name=\"Type Toss\" align=\"middle\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" wmode=\"transparent\">\r\n</object>'),(6,'Baron Typesfast »','Baron Typesfast »','Shoot down ze word filled blimps!','Shoot down ze word filled blimps!','bb3eca86812f6d9b3c78d8a274aff081068e2d1b.png','<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" width=\"916\" height=\"400\" id=\"Baron\" align=\"middle\">\r\n<param name=\"allowScriptAccess\" value=\"always\">\r\n<param name=\"movie\" value=\"http://images.typingweb.com/tutor/images/games/baron-von-typesfast/preloader.swf\">\r\n<param name=\"menu\" value=\"false\">\r\n<param name=\"quality\" value=\"high\">\r\n<param name=\"bgcolor\" value=\"#000000\">\r\n<param name=\"wmode\" value=\"transparent\">\r\n<embed src=\"http://images.typingweb.com/tutor/images/games/baron-von-typesfast/preloader.swf\" menu=\"false\" quality=\"high\" bgcolor=\"#000000\" width=\"916\" height=\"400\" name=\"Baron\" align=\"middle\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" wmode=\"transparent\">\r\n</object>'),(7,'Галын бичээч »','Fire Typer »','Дөлөөс хотыг аврах!','Save the city from flames!','eb40e71f594795c0eb6bb8a92eb422b28cb3f257.png','<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" width=\"916\" height=\"400\" id=\"Type Toss\" align=\"middle\">\r\n<param name=\"allowScriptAccess\" value=\"always\">\r\n<param name=\"movie\" value=\"http://images.typingweb.com/tutor/images/games/fire-typer/preloader.swf\">\r\n<param name=\"menu\" value=\"false\">\r\n<param name=\"quality\" value=\"high\">\r\n<param name=\"bgcolor\" value=\"#000000\">\r\n<param name=\"wmode\" value=\"transparent\">\r\n<embed src=\"http://images.typingweb.com/tutor/images/games/fire-typer/preloader.swf\" menu=\"false\" quality=\"high\" bgcolor=\"#000000\" width=\"916\" height=\"400\" name=\"Type Toss\" align=\"middle\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" wmode=\"transparent\">\r\n</object>');
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-19 21:31:13
