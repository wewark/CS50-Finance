-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `type` set('Purchase','Sale','Deposite') NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `symbol` varchar(5) NOT NULL DEFAULT '',
  `shares` int(11) NOT NULL DEFAULT '0',
  `price_per_share` decimal(65,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(65,4) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES ('Purchase',1,9,'FREE',10,1.1500,11.5000,'2016-08-24 20:21:37'),('Purchase',4,9,'GOOG',11,769.6400,8466.0400,'2016-08-24 21:12:52'),('Sale',5,9,'GOOG',11,769.6400,8466.0400,'2016-08-24 21:14:30'),('Purchase',6,9,'GOOG',10,769.6400,7696.4000,'2016-08-24 21:14:50'),('Purchase',7,9,'FREE',150,1.1500,172.5000,'2016-08-24 21:14:56'),('Sale',8,9,'FREE',150,1.1500,172.5000,'2016-08-24 21:15:10'),('Purchase',9,9,'FREE',100,1.1500,115.0000,'2016-08-24 21:21:55'),('Sale',10,9,'GOOG',10,769.6400,7696.4000,'2016-08-24 21:22:54'),('Purchase',11,9,'FREE',100,1.1500,115.0000,'2016-08-24 21:23:59'),('Purchase',12,9,'GOOG',10,769.6400,7696.4000,'2016-08-24 21:24:09'),('Sale',13,9,'GOOG',10,769.6400,7696.4000,'2016-08-24 21:24:21'),('Sale',14,9,'GOOG',10,769.6400,7696.4000,'2016-08-24 21:24:52'),('Purchase',15,9,'AAPL',5,108.0300,540.1500,'2016-08-24 21:25:14'),('Purchase',16,9,'GOOG',12,769.6400,9235.6800,'2016-08-24 21:25:24'),('Sale',17,9,'AAPL',5,108.0300,540.1500,'2016-08-24 21:25:42'),('Purchase',18,9,'AAPL',10,108.0300,1080.3000,'2016-08-24 21:25:52'),('Purchase',19,15,'GOOG',10,769.4100,7694.1000,'2016-08-26 12:25:37'),('Purchase',20,15,'JACK',1,98.9100,98.9100,'2016-08-26 12:25:52'),('Purchase',21,15,'JACK',10,98.9100,989.1000,'2016-08-26 12:26:00'),('Deposite',22,15,'',0,0.0000,80.0000,'2016-08-26 13:50:36'),('Deposite',23,9,'',0,0.0000,150.0000,'2016-08-26 13:56:59');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shares`
--

DROP TABLE IF EXISTS `shares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shares` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `symbol` varchar(5) NOT NULL,
  `shares` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`symbol`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shares`
--

LOCK TABLES `shares` WRITE;
/*!40000 ALTER TABLE `shares` DISABLE KEYS */;
INSERT INTO `shares` VALUES (12,9,'FREE',100),(15,9,'GOOG',12),(16,9,'AAPL',10),(17,15,'GOOG',10),(18,15,'JACK',11);
/*!40000 ALTER TABLE `shares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `full_name` text NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andi','Andi','$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS',10000.0000),(2,'caesar','Ceasar','$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa',10000.0000),(3,'eli','Eli','$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW',10000.0000),(4,'hdan','Hdan','$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G',10000.0000),(6,'john','John','$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy',10000.0000),(7,'levatich','Levatich','$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK',10000.0000),(8,'rob','Rob','$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2',10000.0000),(9,'skroob','President Skroob','$2y$10$VI6cp4nWdlqZlA.vhskdde39fbEPMwuB3uHgfFCWjiz242K0gygou',6135.0800),(10,'zamyla','Zamyla Chan','$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e',10000.0000),(14,'asd','Asd','$2y$10$daM9Orn9TieLBTY8ZeWw..bNnBLEPxjENfhaogRWrrzbGreAjevle',20004.0000),(15,'kha','Khaled Hamed','$2y$10$rxnRepMXNNvCrBXau4r9/.CWCaATuIYW2eVCphCOwKHExpCb669kq',1300.8900),(16,'test','Test','$2y$10$K1eI8QTKeUiUG62uLYJj5eg8/Fv.FT.KUYLD2ACvTsgxKpUXNThJC',10000.0000);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-26 14:20:44
