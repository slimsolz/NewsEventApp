-- MySQL dump 10.13  Distrib 8.0.16, for macos10.14 (x86_64)
--
-- Host: localhost    Database: news_event_db
-- ------------------------------------------------------
-- Server version	8.0.15

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin@gmail.com','Admin','Admin','admin');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `display_status` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Node DevConf','NYC','Everything nodejs',1,'2019-06-03 13:47:08'),(2,'React Conf','LA','React for beginners',1,'2019-06-03 19:57:51'),(4,'PHP DevConf','SF','PHP like never before',1,'2019-06-04 18:33:15'),(5,'CleanCode TechTalk','CHA','Clean Code for humans',0,'2019-06-04 18:40:07'),(6,'Hackaton','SF','Social Engineering',0,'2019-06-04 18:43:19'),(10,'Code For Africa','LA','Developer Africa',0,'2019-06-04 18:57:34'),(9,'A.I','NYC','Robotics',1,'2019-06-04 18:52:36'),(11,'Machine Learning Conf','CHI','Coding is fun',1,'2019-06-04 19:00:11'),(12,'FullStack ','LA','Nodejs/Express, Reactjs and Postgres',1,'2019-06-04 19:00:51'),(14,'Frontend Dev','CAL','Html, CSS, Js',1,'2019-06-04 19:29:51');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` varchar(100) NOT NULL,
  `display_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (2,'Pan cake','Desserts',0.59,'Amazing',1),(4,'Bread','Sandwiches',1.25,'Smooth, tasty and delicious ',1),(6,'Salad','Salads',0.59,'Vegetables like never before',1);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `publish_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `story_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Alleged Neymar rape','2019-06-06 16:40:13','In a television interview with Brazilian station SBT broadcast Wednesday, 26-year-old Najila Trindade said she had been left \"traumatized,\" accusing the Paris Saint-Germain forward of raping and violently assaulting her.\nNeymar, the world\'s most expensive soccer player, has previously denied all the allegations against him, and has called the incident, \"a trap.\"\nCNN has contacted Neymar and PSG for comment on the allegations made by Trindade in the interview, but has yet to receive a response.\nSpeaking on Wednesday, Trindade, who met Neymar on May 15 in Paris, says she contacted him on Instagram, intent on pursuing a sexual relationship with the soccer star.\n\"There was a sexual intent, it was a desire of mine. I think that was clear to him. And he asked when I could go and I said at that moment I couldn\'t, for financial reasons, I couldn\'t go, and also because of my schedule at work.\n\"And so he suggested \"well, but I can solve that\" and I went. With money ... with the ticket,\" she told Brazil\'s SBT.\r All my guys are ballers\r All my guys are ballers\r All my guys are ballers\r All my guys are ballers\r All my guys are ballers\r All my guys are ballers\r All my guys are ballers\r All my guys are ballers'),(2,'Ford closes UK plant as Brexit ','2019-06-03 10:27:52','London (CNN Business)Ford has announced plans to close an engine plant in Wales, dealing yet another blow to a UK industry that is being ravaged by weak car sales and uncertainty over Brexit.\n\nThe US automaker said it would shutter its plant in Bridgend by September 2020, when a contract to supply engines to Jaguar Land Rover ends. Some 1,700 people work at the factory.\nFord (F) said Brexit did not influence its decision. But the company had previously warned that it may have to close plants if Britain leaves the European Union without protecting trade.\nIn January, the carmaker said that crashing out of the bloc would cost it $800 million in 2019.\n\"Ford have been quite clear that Brexit uncertainty raises big issues concerning their future in the United Kingdom,\" said David Bailey, a professor at Birmingham Business School.\nAuto industry executives have warned that a disorderly Brexit would snarl supply chains and disrupt production. Continued uncertainty over the future terms of trade has caused investment to plummet.\nUK factories have been battered as a result. A key survey published Monday suggested Britain\'s manufacturing industry is contracting for the first time since July 2016.\n\"[Companies] voiced their deep anxieties over Brexit\'s continuing impacts as some supply chains were re-directed away from the United Kingdom resulting in a drop in total new orders for the first time since October,\" said Duncan Brock, group director at the Chartered Institute of Procurement and Supply.\r well you must work ooooo\r well you must work ooooowell you must work ooooowell you must work ooooo'),(3,'Apple monitor stand that costs more than an iPhone','2019-06-03 10:28:40','(CNN)Apple product launches always get buzz, but one new gadget announcement has left some people bemused: a monitor stand that costs more than many computers.\n\nAt its annual Worldwide Developer Conference in San Jose this week, Apple (AAPL) revealed a collection of new products, including a monitor stand for $999.\nThat\'s on top of the hefty price tag for its new Mac Pro desktop, which starts at $6,000, and a display monitor, the Pro Display XDR, a 32-inch 6K retina LCD display ($4,999).\n\"The Pro Stand has an intricately engineered arm that perfectly counterbalances the display so it feels virtually weightless, allowing users to easily place it into position,\" the company notes on its website.\nThe stand is optional: Mac Pro users could technically lean a monitor against the computer itself instead, or purchase a VESA Mount Adapter ($199). It\'s unclear as of now if the new system will be compatible with third-party monitor stands. CNN has contacted Apple for comment on this.\nBut the stand caused a stir on social media, with some technology fans mocking the price of what is generally regarded as an unexciting accessory.\nAfter all, the stand is more expensive than an iPhone X, which is currently for sale on Apple\'s website starting at $749.');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-06 21:28:28
