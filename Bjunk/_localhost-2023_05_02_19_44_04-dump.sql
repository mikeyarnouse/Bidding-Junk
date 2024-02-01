-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: biddingjunk
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(20) DEFAULT NULL,
  `AccessLevel` int(11) DEFAULT NULL,
  PRIMARY KEY (`AdminID`),
  UNIQUE KEY `AdminID` (`AdminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auctions`
--

DROP TABLE IF EXISTS `auctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auctions` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) DEFAULT NULL,
  `item_category` varchar(32) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `starting_bid` double DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT 'error.jpg',
  `winning_bid` double DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `id` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auctions`
--

LOCK TABLES `auctions` WRITE;
/*!40000 ALTER TABLE `auctions` DISABLE KEYS */;
INSERT INTO `auctions` VALUES (1,'AK-47 | Neon Rider','The Horizon Collection','The Horizon Collection The wear is 0.00167 it is Factory new ',400,'2023-04-23 16:00:09','2024-04-23 16:00:17','weapon_ak47_cu_ak_neon_rider_light_large.9209192b514c4ec98146b4747dec8ce407a977c8.png',NULL),(2,'AK-47 | Redline','The Phoenix Collection','Restricted Rifle The Wear is .100559 it is Minimal Wear',300,'2023-04-23 16:00:13','2024-04-23 16:00:18','weapon_ak47_cu_ak47_cobra_light_large.7494bfdf4855fd4e6a2dbd983ed0a243c80ef830.png',NULL),(3,'AWP | Snake Camo ','The Dust Collection','Mil-spec Sniper Rifle The Wear is 0.064079 it is Factory New',533,'2023-04-23 16:00:14','2024-04-23 16:00:19','weapon_awp_sp_snake_light_large.c0b327d960af85c987bed944287935fb4b6a780a.png',NULL),(8,'Kharl\'s g35 infinity','Vehicles','It drives sometimes when it isn\'t broken or not running',4000,'2023-04-26 03:36:48','2023-05-26 03:36:48','s-l500.jpg',NULL),(9,'M4A4 | Eye of Horus','Anubis Collection Package','FN',1800,'2023-04-27 21:54:46','2023-05-17 21:54:46','weapon_m4a1_gs_m4a4_ra_light_large.7531ec73ee20dac93f068342616599e4808fb850.png',NULL),(10,'FAMAS | Water of Nephthys','Anubis Collection Package','Classified Rifle The Wear is 0.003 it is FN',305.85,'2023-04-27 21:56:20','2023-05-17 21:56:20','weapon_famas_cu_famas_holo_ocean_light_large.e9efee74629f50aab0110ae3fc6a07aabac679e0.png',NULL),(11,'P250 | ','Anubis Collection Package','Classified Pistol The wear is 0.01 it is FN',275.17,'2023-04-27 21:57:16','2023-05-16 21:57:16','weapon_p250_gs_p250_apep_light_large.39613b6ade6f204aaaed995e47d0a9fa42963b45.png',NULL),(12,'Glock-18 | Ramese\'s Reach','Anubis Collection Package','Restricted Pistol The wear is 0.02 it is FN',52.68,'2023-04-27 21:58:15','2023-05-24 21:58:15','weapon_glock_cu_glock_ramzes_light_large.86da273a88db7c8d0231e03a45cd94929efeb1ff.png',NULL),(13,'P90 | ScaraB Rush','Anubis Collection Package','Restricted SMG The wear is 0.05 it is FN',33.18,'2023-04-27 21:59:02','2023-05-28 21:59:02','weapon_p90_cu_p90_scarab_of_wisdom_light_large.54f85e60f71185083323768b79e699da762e09e6.png',NULL),(14,'Nova | Sobek\'s Bite','Anubis Collection Package','Restricted Shotgun The wear is 0.05 it is FN',32.36,'2023-04-27 21:59:58','2023-05-17 21:59:58','weapon_nova_gs_nova_sobek_light_large.53046ae2482691e0c1ba90de50698f875294a737.png',NULL),(15,'AWP | Black Nile','Anubis Collection Package','Mil-Spec Sniper Rifle The wear is 0.0008 it is FN',56,'2023-04-27 22:01:26','2023-05-27 22:01:26','weapon_awp_gs_awp_strone_light_large.f6a8a693f8bcdd89436549db6079bb5f102c9616.png',NULL),(16,'AK-47 | Steel Delta','Anubis Collection Package','Mil-Spec Rifle The wear is 0.0002 it is FN',74,'2023-04-27 22:01:57','2023-05-23 22:01:57','weapon_ak47_gs_ak47_strone_light_large.8434d6be7fa076ce41c86eb5ea00efe9383800c6.png',NULL),(17,'M4A1-S | Hot Rod','The Chop Shop Collection','Classified Rifle The Float is 0.003 it is FN',1500,'2023-04-27 22:03:50','2023-05-25 22:03:50','weapon_m4a1_silencer_an_red_m4a1s_light_large.ec59e9b09e1e9f46af18dea65ee90e5bdfe9ebb1.png',NULL),(18,'AK-47 | Black Laminate','The Vertigo Collection','Mil-Spec Rifle The Float is 0.003 it is FN',1100,'2023-04-27 22:05:24','2023-04-28 22:05:24','weapon_ak47_hy_ak47lam_bw_light_large.c504cab278a4955e92255ee2022340be2d0982a4.png',NULL),(19,'AWP | Gungir','The Norse Collection','Mil-Spec Rifle The Float is 0.003 it is FN',1100,'2023-04-27 22:05:37','2023-04-28 22:05:37','-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FABz7PLfYQJF-dKxmomZqPv9NLPF2G0JuMYj0ryYodzz3wG3qBJpa27wJdKdJ1dqZwqE8gPrwL3ujcO_tM_XiSw0r8Krvkk.png',NULL),(20,'AWP | Medusa','The Gods and Monsters Collection','Covert Sniper Rifle The Float is 0.9879 it is Battle Scared',15000,'2023-04-27 22:07:20','2023-05-29 22:07:20','280x210.png',NULL),(21,'M4A4 | Poseidon','The Gods and Monsters Collection','Classified Rifle The Float is 0.004 it is Factory New',5000,'2023-04-27 22:08:09','2023-05-26 22:08:09','-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhjxszYfi5H5di5mr-HnvD8J_WCkmkEvp0pi7zDodv3jAHj-UM5ZGr7INfHJAc9MlzV-FK_kO281pa_ot2XnrA-A3kA.png',NULL),(22,'M4A1-S | Icarus Fell','The Gods and Monsters Collection','Restricted Rifle The Float is 0.004 it is Factory New',1000,'2023-04-27 22:08:55','2023-05-25 22:08:55','-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhz2v_Nfz5H_uO-jb-ClPbmJqjummJW4NE_3ujHpY2sigXl-UFoZGj7JYCXdgQ4YVnQ-1Lqxenn1MLpuszJz3tk6D5iuyjCqdNpmA.png',NULL),(23,'★ Bowie Knife | Fade StatTrak™','CS:GO Knifes','Covert Knife Stat Trak Factory New This item is the #1 lowest Float available The float is 0.000079972597',3200,'2023-04-27 22:27:08','2023-05-29 22:27:08','-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpovbSsLQJfwObaZzRU7dCJlo-cnvLLMrrukGpV7fp9g-7J4cLzjAzhrkA4aj-hcI6Sd1VvY13V-wO9xuvn05O_u5mcynE3uyYlsy2LgVXp1uhoh_bX.png',NULL),(24,'★ Karambit | Freehand StatTrak™ Factory New','CS:GO Knifes','Covert Knife Stat Trak Factory New This item is the #2 lowest Float available The float is 0.000796830049',7777,'2023-04-27 22:28:10','2023-05-29 22:28:10','-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpovbSsLQJf2PLacDBA5ciJlY20mvbmOL7VqX5B18N4hOz--YXygED680ttZzjwLNfDIwQ9aVvU8ljvxuzshZe16s7AnHQ2viN05X3cyRWzhgYMMLLqzslpTg.png',NULL);
/*!40000 ALTER TABLE `auctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bids` (
  `BiddingAmount` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bids`
--

LOCK TABLES `bids` WRITE;
/*!40000 ALTER TABLE `bids` DISABLE KEYS */;
INSERT INTO `bids` VALUES (500,'2023-04-22 21:34:53',1,1),(600,'2023-04-28 19:07:39',2,1),(700,'2023-04-28 19:07:41',3,1),(800,'2023-04-28 19:07:43',4,1),(100,'2023-04-28 19:07:44',5,1),(610,'2023-04-28 19:07:39',8,1),(701,'2023-04-28 19:07:41',9,1),(801,'2023-05-01 12:57:51',7,1),(4001,'2023-05-01 18:54:12',25,8),(7780,'2023-05-01 18:56:32',25,24),(600,'2023-05-01 18:57:07',25,3),(34,'2023-05-01 18:57:24',25,14),(60,'2023-05-01 18:57:37',25,12),(73,'2023-05-01 18:57:49',25,16),(1100,'2023-05-01 18:58:32',25,22);
/*!40000 ALTER TABLE `bids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'soup','$2y$10$.JT060jRSgQy8SDwUm.i3..5n.rtFQJOJnh.X1RKBi1PTV06PMj.O','2023-04-21 15:31:46',1),(2,'cole','$2y$10$FvHXwwFY79lqRga3inNpjOqmP3jmyfMsgfiyOoQy4ioJGBhyc4HCa','2023-04-21 16:34:48',0),(3,'hidden','$2y$10$3Mq0RyBaosWBKUrozw/DvOqAQ91Y1yWvzu8ltnYu54Yr.oz66CD6e','2023-04-21 16:54:55',0),(4,'flaco','$2y$10$8BNWVnRPixEJiin2wOaYfeYlrOOk8qjzXsaFPOhJoWOYmoWbywrEa','2023-04-22 20:03:00',0),(5,'flaco1','$2y$10$WoChXyhsBEKhGXlkeKR51.s/WhoaetV4Gbz2rvCVx8C/KNUy/Q.D2','2023-04-22 20:04:20',0),(6,'melon','$2y$10$I7iM0T3s6/vTEUy.tL4MFuPi4oNTkH4KtDZSo7ohwNEw/UrN/75lW','2023-04-22 20:13:55',0),(7,'mesa','$2y$10$BSYEkL5ZIglrn4/5eWRv9eD5rZLUISa.CCEnG88FBIGt1betXkhfG','2023-04-22 20:22:41',0),(8,'mesa1','$2y$10$YwzgZAK3NJJAVpDsvqUTOeS6CchYOtyAQbzrlV3MFb1e6cXO9Otfa','2023-04-22 20:25:01',0),(9,'valk','$2y$10$DKMZ0ohqtBq3JvRvIU/x2uyLtqIyMckSgCq8jQSJB7sOuB9oVEGaW','2023-04-22 20:31:00',0),(10,'valk1','$2y$10$qe6TqNKHNpB.N5SAOIZKbuTUyJ4nVKBtkw2zOBrba8AHZO.YbucYy','2023-04-22 20:31:12',0),(11,'valk2','$2y$10$oGTCucXmZ.wXjhlpeSxqneliv76KsgFyPyRUc.lMLquI0Ej1Gr6Za','2023-04-22 20:32:19',0),(12,'valk3','$2y$10$aLQLRimV/RpH8vOnagCJbuzsImpDr.JEGzlRnJcsHRtRTnUzHsJle','2023-04-22 20:32:40',0),(13,'valk4','$2y$10$JNqSh8uYI8yCYKhOR.3yPOJ9XPw7GQg2uwAoyMmIOQx5LrAngzx7i','2023-04-22 20:33:04',0),(14,'valk5','$2y$10$9VC9GmRVuxDO5rGh.mBi5OUZmzfRsG0vPN01rXB9pBMnT9AkpjHIG','2023-04-22 20:33:27',0),(15,'valk6','$2y$10$.ulNfFBunbFVbwVG//GLUe.FFBNX03ZKQ.1UqV7PvFtwZdkoAAgj2','2023-04-22 20:33:49',0),(16,'valk7','$2y$10$lrnQOhj9EOE7sbsYmiNa/OuYotHXVwChtmVBg9slRfvGqB/8s7gVi','2023-04-22 20:34:15',0),(17,'valk8','$2y$10$UGHl/VB2jrefkAJCyRrF.u1gCwgonHmOwUFpk2CdTHZ6/.QAEMc6G','2023-04-22 20:36:18',0),(18,'valk9','$2y$10$lbGfI11Rua1FDFK1ULd0WOh5SlSTazwg84JSZX8wHQZdcDEmCccVy','2023-04-22 20:37:43',0),(19,'valk11','$2y$10$DKyDLjh5GZXLs3J2T5qbY.KYhpYUnUGpRfeshwmqVZAubuojqXEtW','2023-04-22 20:38:49',0),(20,'valk12','$2y$10$Riutj9Zjr73jvUPtuKVQDeFX5g4Ybgj3T5Zz8Rce2syGpIWexaova','2023-04-22 20:39:46',0),(21,'valk14','$2y$10$2nSSI1XkCgbYWhiDgPFDr.BNP/fMOuC4ksLPrEZu9ki2Sl21K8MSy','2023-04-22 20:41:29',0),(22,'COLE23','$2y$10$kFwWqZk8l9WFQUqHmUMuPeKSHAtGad0lRsZVN778/xtDBsDjGs.nK','2023-04-22 21:03:46',0),(23,'blackjaw','$2y$10$lBsfOPfhXo9VYbPAEwrzEuO3gtCeOiKaszG0vJinG4Ds8eLYYO.kS','2023-04-22 21:08:34',0),(24,'Kharl','$2y$10$oK91.P9dueKeKx5TTgyw7uHbuth3qqUPsqssSQKTTdTqhsiJJqhLq','2023-04-25 23:33:41',1),(25,'sharjeel1','$2y$10$PnZzNTyn01pGb5BQ3Htn8.IDgvX0KawuCB/5ymYYo0UAPkICrw/wO','2023-05-01 18:53:07',0);
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

-- Dump completed on 2023-05-02 19:44:04
