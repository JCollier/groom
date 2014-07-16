-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: groom_common
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.12.04.1

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
-- Table structure for table `inits`
--

DROP TABLE IF EXISTS `inits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inits` (
  `id` int(11) NOT NULL,
  `page` varchar(45) NOT NULL DEFAULT '',
  `section` varchar(45) NOT NULL DEFAULT '',
  `key` varchar(45) NOT NULL DEFAULT '',
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`page`,`section`,`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inits`
--

LOCK TABLES `inits` WRITE;
/*!40000 ALTER TABLE `inits` DISABLE KEYS */;
INSERT INTO `inits` VALUES (3,'admin','template','footer_links','home,logout'),(4,'admin','template','header_links','home,moderation,stats,administration,template,logout'),(2,'default','template','footer_links','home,info,about,contact'),(1,'default','template','header_links','home,social,info,gifts,account,admin,logout'),(0,'global','user','invited_users','test_10@test.com test_11@test.com test_12@test.com');
/*!40000 ALTER TABLE `inits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) DEFAULT NULL,
  `spec_1` varchar(45) DEFAULT NULL,
  `spec_2` varchar(45) DEFAULT NULL,
  `spec_3` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `value_estimated` decimal(10,0) NOT NULL DEFAULT '0',
  `created` varchar(45) DEFAULT NULL,
  `updated` varchar(45) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'not_confirmed',
  `img_path` varchar(45) NOT NULL DEFAULT 'default/',
  `img_name` varchar(45) DEFAULT '1.jpg',
  `img_folder` varchar(45) NOT NULL DEFAULT 'images1/',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'7','100','100','100','test item #1','test item #1',0,NULL,NULL,'not_confirmed','images1/','1.jpeg','images1/'),(2,'7','100','100','100','test item #2','test item #1 - for user 7',238,NULL,NULL,'approved','default/','1.jpeg','images_1/'),(3,'7','200','200','200','Furniture - Couch','Furniture - Brown Leather Sofa (4 pieces)',841,NULL,NULL,'approved','default/','2.jpg','images_1/'),(4,'7','300','300','300','Television','4k Television (adding a bunch of text for testing purposes) (adding a bunch of text for testing purposes) (adding a bunch of text for testing purposes) (adding a bunch of text for testing purposes)',3000,NULL,NULL,'approved','default/','3.jpg','images_1/'),(5,'7','400','400','400','sneaker collection - test item #4','sneaker collection - test item #4 - sneaker collection - for user 7',238,NULL,NULL,'approved','default/','4.jpg','images_1/'),(6,'7','500','500','500','woodworking kit - test item #5 - s- test item','woodworking kit - test item #5 - woodworking kit - for user 7',1700,NULL,NULL,'approved','default/','5.jpg','images_1/'),(7,'6','100','100','100','test item #2','test item #1 - for user 7',238,NULL,NULL,'approved','default/','1.jpeg','images_1/'),(8,'6','200','200','200','Furniture - Couch','Furniture - Brown Leather Sofa (4 pieces)',841,NULL,NULL,'approved','default/','2.jpg','images_1/');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL DEFAULT '1',
  `page` varchar(45) NOT NULL,
  `path` varchar(45) DEFAULT '',
  `label` varchar(45) DEFAULT '',
  `permissions` int(1) NOT NULL DEFAULT '0',
  `enable` int(1) NOT NULL DEFAULT '1',
  `position` int(1) NOT NULL DEFAULT '0',
  `footer_position` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'account','account','Settings',1,1,6,0),(6,'admin','admin','Admin',4,1,8,0),(9,'administration','administration','Administration',5,1,10,0),(6,'contact','contact','Contact Us',0,1,0,0),(2,'gifts','gifts','My Gifts',1,1,7,0),(7,'home','home','Home',0,1,1,0),(3,'info','info','About Us',0,1,2,0),(4,'logout','home/logout','Logout',1,1,90,0),(7,'moderation','admin/moderation','Moderation',4,0,11,0),(5,'social','home/social','Community',2,0,3,0),(8,'stats','admin/stats','Statistics',4,0,13,0),(11,'template','admin/template','Templating',5,1,12,0),(10,'tour','home/tour','Tour',0,1,4,0);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statics`
--

DROP TABLE IF EXISTS `statics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(45) NOT NULL DEFAULT 'home',
  `template` varchar(45) NOT NULL DEFAULT 'default',
  `static_content` varchar(255) DEFAULT '<div>some static info from DB</div>',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statics`
--

LOCK TABLES `statics` WRITE;
/*!40000 ALTER TABLE `statics` DISABLE KEYS */;
INSERT INTO `statics` VALUES (1,'info','basic','<div>some static info from DB</div>');
/*!40000 ALTER TABLE `statics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `confirmed` varchar(45) NOT NULL DEFAULT 'not_confirmed',
  `usertype` varchar(45) NOT NULL DEFAULT 'userbasic',
  `zip_code` varchar(45) DEFAULT NULL,
  `phone_num` varchar(45) DEFAULT NULL,
  `userlevel` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'bob','9a618248b64db62d15b300a07b00580b','','not_confirmed','userbasic',NULL,NULL,0),(2,'test','670b14728ad9902aecba32e22fa4f6bd','','not_confirmed','userbasic',NULL,NULL,0),(3,'test2','670b14728ad9902aecba32e22fa4f6bd','test@test.com','not_confirmed','userbasic',NULL,NULL,0),(4,'test3','8ad8757baa8564dc136c1e07507f4a98','test3@test.com','not_confirmed','userbasic',NULL,NULL,0),(5,'test4','86985e105f79b95d6bc918fb45ec7727','test4@test.com','not_confirmed','userbasic',NULL,NULL,0),(6,'test5','e3d704f3542b44a621ebed70dc0efe13','test5@test.com','not_confirmed','userbasic',NULL,NULL,0),(7,'test6','4cfad7076129962ee70c36839a1e3e15','test6@test.com','confirmed','admin',NULL,NULL,5),(8,'test7','b04083e53e242626595e2b8ea327e525','test7@test.com','not_confirmed','userbasic',NULL,NULL,2),(9,'test8','5e40d09fa0529781afd1254a42913847','test8@test.com','not_confirmed','userbasic',NULL,NULL,0),(10,'test9','739969b53246b2c727850dbb3490ede6','test9@test.com','not_confirmed','userbasic',NULL,NULL,0),(11,'user10','990d67a9f94696b1abe2dccf06900322','user10@test.com','not_confirmed','userbasic',NULL,NULL,0),(12,'user11','03aa1a0b0375b0461c1b8f35b234e67a','user11@test.com','not_confirmed','userbasic',NULL,NULL,0),(13,'user12','d781eaae8248db6ce1a7b82e58e60435','user12@test.com','not_confirmed','userbasic',NULL,NULL,0),(14,'test10','c1a8e059bfd1e911cf10b626340c9a54','test10@test.com','not_confirmed','userbasic',NULL,NULL,0),(15,'test12','60474c9c10d7142b7508ce7a50acf414','test_12@test.com','not_confirmed','userbasic',NULL,NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_extra`
--

DROP TABLE IF EXISTS `users_extra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_extra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_visibility` varchar(45) NOT NULL DEFAULT 'private',
  `favorite_users` varchar(45) DEFAULT NULL,
  `charity_type` varchar(45) NOT NULL DEFAULT 'donor',
  `favorite_items` varchar(45) DEFAULT NULL,
  `total_donated` int(11) NOT NULL DEFAULT '0',
  `total_received` int(11) NOT NULL DEFAULT '0',
  `profile_img_path` varchar(45) NOT NULL DEFAULT '/',
  `profile_img_name` varchar(45) NOT NULL DEFAULT 'default.gif',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_extra`
--

LOCK TABLES `users_extra` WRITE;
/*!40000 ALTER TABLE `users_extra` DISABLE KEYS */;
INSERT INTO `users_extra` VALUES (1,6,'public',NULL,'donor',NULL,700,0,'/','default.gif'),(2,5,'public',NULL,'donor',NULL,650,0,'/','default.gif'),(3,4,'public',NULL,'donor',NULL,80,0,'/','default.gif'),(4,3,'public',NULL,'donor',NULL,40,0,'/','default.gif'),(5,2,'public',NULL,'donor',NULL,40,0,'/','default.gif'),(6,1,'private',NULL,'donor',NULL,30,0,'/','default.gif'),(7,7,'public',NULL,'donor',NULL,30,0,'/','default.gif'),(8,8,'private',NULL,'donor',NULL,10,0,'/','default.gif'),(9,9,'private','','','',0,100,'/','default.gif'),(10,10,'private','','donor','',0,100,'/','default.gif'),(17,100,'private','','donor','',100,0,'/','default.gif'),(20,101,'private','','donor','',100,0,'/','default.gif'),(22,102,'private','','donor','',100,0,'/','default.gif'),(23,103,'private','','donor','',100,0,'/','default.gif'),(25,104,'private','','donor','',100,0,'/','default.gif'),(28,105,'private','','donor','',100,0,'/','default.gif'),(30,106,'private','','donor','',100,0,'/','default.gif');
/*!40000 ALTER TABLE `users_extra` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-16 18:00:59
