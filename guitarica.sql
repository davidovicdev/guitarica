-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: guitarica
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (11,'ABC'),(9,'Admira'),(3,'Alesis'),(13,'Audac'),(4,'Casio'),(14,'DB'),(16,'Denon'),(10,'Elixir'),(20,'Ernie Ball'),(8,'Ibanez'),(2,'K&M'),(1,'Korg'),(21,'Laney'),(17,'Numark'),(18,'Pioneer'),(22,'Rane'),(6,'Soundsation'),(19,'Valencia'),(12,'Vic'),(7,'Vinage'),(15,'Void'),(5,'Vox');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`product_id`,`user_id`),
  KEY `fk_cart_users1_idx` (`user_id`),
  CONSTRAINT `fk_cart_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `fk_cart_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (4,'Amplifiers'),(5,'DJ equipment'),(3,'Drums'),(1,'Guitars'),(2,'Pianos');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `src_UNIQUE` (`src`),
  KEY `fk_images_products1_idx` (`product_id`),
  CONSTRAINT `fk_images_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,1,'22_4.jpg','22_4.jpg','2022-03-14 16:15:27'),(2,2,'12121_1.jpg','12121_1.jpg','2022-03-14 16:15:27'),(3,3,'asdasdasdasd.jpg','asdasdasdasd.jpg','2022-03-14 16:15:27'),(4,4,'vc104.jpg','vc104.jpg','2022-03-14 16:15:27'),(5,4,'vc104_2.jpg','vc104_2.jpg','2022-03-14 16:15:27'),(6,4,'vc104_3.jpg','vc104_3.jpg','2022-03-14 16:15:27'),(7,5,'yellowstone_mjce_bk.jpg','yellowstone_mjce_bk.jpg','2022-03-14 16:15:27'),(8,5,'yellowstone_mjce_bk_2.jpg','yellowstone_mjce_bk_2.jpg','2022-03-14 16:15:27'),(9,5,'yellowstone_mjce_sb_2_1_1.jpg','yellowstone_mjce_sb_2_1_1.jpg','2022-03-14 16:15:27'),(10,6,'yellowstone_mjce_nt.jpg','yellowstone_mjce_nt.jpg','2022-03-14 16:15:27'),(11,6,'yellowstone_mjce_nt_2.jpg','yellowstone_mjce_nt_2.jpg','2022-03-14 16:15:27'),(12,6,'yellowstone_mjce_sb_2_1.jpg','yellowstone_mjce_sb_2_1.jpg','2022-03-14 16:15:27'),(13,7,'yellowstone_mjce_sb.jpg','yellowstone_mjce_sb.jpg','2022-03-14 16:15:27'),(14,7,'yellowstone_mjce_sb_3.jpg','yellowstone_mjce_sb_3.jpg','2022-03-14 16:15:27'),(15,7,'yellowstone_mjce_sb_2.jpg','yellowstone_mjce_sb_2.jpg','2022-03-14 16:15:27'),(16,8,'bobcat-bk-s66-product-1.png','bobcat-bk-s66-product-1.png','2022-03-14 16:15:27'),(17,8,'bobcat-v90-7-1.jpg','bobcat-v90-7-1.jpg','2022-03-14 16:15:27'),(18,8,'bobcat-v90-8-1.jpg','bobcat-v90-8-1.jpg','2022-03-14 16:15:27'),(19,8,'bobcat-v90-bk-back-1-1.jpg','bobcat-v90-bk-back-1-1.jpg','2022-03-14 16:15:27'),(20,9,'rider-std-h_3ts.jpg','rider-std-h_3ts.jpg','2022-03-14 16:15:27'),(21,9,'rider-std-h_3ts_2.jpg','rider-std-h_3ts_2.jpg','2022-03-14 16:15:27'),(22,9,'rider-std-h_3ts_3.jpg','rider-std-h_3ts_3.jpg','2022-03-14 16:15:27'),(23,10,'rider-std-h_bk.jpg','rider-std-h_bk.jpg','2022-03-14 16:15:27'),(24,10,'rider-std-h_bk_2.jpg','rider-std-h_bk_2.jpg','2022-03-14 16:15:27'),(25,10,'rider-std-h_bk_3.jpg','rider-std-h_bk_3.jpg','2022-03-14 16:15:27'),(26,11,'horseman_3ts.jpg','horseman_3ts.jpg','2022-03-14 16:15:27'),(27,11,'horseman_3ts_2.jpg','horseman_3ts_2.jpg','2022-03-14 16:15:27'),(28,11,'horseman_3ts_3.jpg','horseman_3ts_3.jpg','2022-03-14 16:15:27'),(29,12,'horseman_trd.jpg','horseman_trd.jpg','2022-03-14 16:15:27'),(30,12,'horseman_bk_2.jpg','horseman_bk_2.jpg','2022-03-14 16:15:27'),(31,12,'horseman_bk_3.jpg','horseman_bk_3.jpg','2022-03-14 16:15:27'),(32,13,'horseman_trd (1).jpg','horseman_trd (1).jpg','2022-03-14 16:15:27'),(33,13,'horseman_trd_2.jpg','horseman_trd_2.jpg','2022-03-14 16:15:27'),(34,13,'horseman_trd_3.jpg','horseman_trd_3.jpg','2022-03-14 16:15:27'),(35,14,'1_13_8.jpg','1_13_8.jpg','2022-03-14 16:15:27'),(36,15,'2_22.png','2_22.png','2022-03-14 16:15:27'),(37,16,'elixir-12002.jpg','elixir-12002.jpg','2022-03-14 16:15:27'),(38,17,'recitalpro_ortho_web.jpg','recitalpro_ortho_web.jpg','2022-03-14 16:15:27'),(39,17,'recitalpro_voicestyles_web.jpg','recitalpro_voicestyles_web.jpg','2022-03-14 16:15:27'),(40,17,'recitalpro_left_web.jpg','recitalpro_left_web.jpg','2022-03-14 16:15:27'),(41,17,'recitalpro_front_web_00.jpg','recitalpro_front_web_00.jpg','2022-03-14 16:15:27'),(42,18,'alesis_concert.jpg','alesis_concert.jpg','2022-03-14 16:15:27'),(43,18,'alesis_concert_2.jpg','alesis_concert_2.jpg','2022-03-14 16:15:28'),(44,18,'alesis_concert_3.jpg','alesis_concert_3.jpg','2022-03-14 16:15:28'),(45,18,'alesis_concert_4.jpg','alesis_concert_4.jpg','2022-03-14 16:15:28'),(46,19,'primus_.jpeg','primus_.jpeg','2022-03-14 16:15:28'),(47,19,'jpeg.jpg','jpeg.jpg','2022-03-14 16:15:28'),(48,19,'primus3.jpeg','primus3.jpeg','2022-03-14 16:15:28'),(49,19,'primus4.jpeg','primus4.jpeg','2022-03-14 16:15:28'),(50,20,'1pa4x61.jpg','1pa4x61.jpg','2022-03-14 16:15:28'),(51,20,'2pa4x61.jpg','2pa4x61.jpg','2022-03-14 16:15:28'),(52,20,'3pa4x61.jpg','3pa4x61.jpg','2022-03-14 16:15:28'),(53,20,'4pa4x61.jpg','4pa4x61.jpg','2022-03-14 16:15:28'),(54,21,'1pa4x76.jpg','1pa4x76.jpg','2022-03-14 16:15:28'),(55,21,'3pa4x76.jpg','3pa4x76.jpg','2022-03-14 16:15:28'),(56,21,'2pa4x76.jpg','2pa4x76.jpg','2022-03-14 16:15:28'),(57,22,'pa_700.jpg','pa_700.jpg','2022-03-14 16:15:28'),(58,22,'e153e2a159fbdaa3c5cf306395b8a8e4_pc.png','e153e2a159fbdaa3c5cf306395b8a8e4_pc.png','2022-03-14 16:15:28'),(59,22,'c24364d9611bb6a67352a7d64705d57b_pc.png','c24364d9611bb6a67352a7d64705d57b_pc.png','2022-03-14 16:15:28'),(60,23,'korg_ms20fs_7.png','korg_ms20fs_7.png','2022-03-14 16:15:28'),(61,23,'korg_ms20fs_3.png','korg_ms20fs_3.png','2022-03-14 16:15:28'),(62,23,'korg_ms20fs_5.png','korg_ms20fs_5.png','2022-03-14 16:15:28'),(63,23,'korg_ms20fs.png','korg_ms20fs.png','2022-03-14 16:15:28'),(64,24,'harmony32_ortho_web.jpg','harmony32_ortho_web.jpg','2022-03-14 16:15:28'),(65,24,'harmony32_angle_web.jpg','harmony32_angle_web.jpg','2022-03-14 16:15:28'),(66,24,'harmony32_front_web.jpg','harmony32_front_web.jpg','2022-03-14 16:15:28'),(67,24,'harmony32_rear_web.jpg','harmony32_rear_web.jpg','2022-03-14 16:15:28'),(68,25,'korg_nts1.png','korg_nts1.png','2022-03-14 16:15:28'),(69,25,'korg_nts1_vi.png','korg_nts1_vi.png','2022-03-14 16:15:28'),(70,25,'korg_nts1_iii.png','korg_nts1_iii.png','2022-03-14 16:15:28'),(71,25,'korg_nts1_ii.png','korg_nts1_ii.png','2022-03-14 16:15:28'),(72,26,'k_m_21110-300-55.jpg','k_m_21110-300-55.jpg','2022-03-14 16:15:28'),(73,27,'ds-1h_2.jpg','ds-1h_2.jpg','2022-03-14 16:15:28'),(74,28,'ec-5_2.jpg','ec-5_2.jpg','2022-03-14 16:15:28'),(75,29,'voxtelstar2020_3_edited.jpg','voxtelstar2020_3_edited.jpg','2022-03-14 16:15:28'),(76,29,'voxtelstar2020_4_edited.jpg','voxtelstar2020_4_edited.jpg','2022-03-14 16:15:28'),(77,29,'voxtelstar2020_5_edited.jpg','voxtelstar2020_5_edited.jpg','2022-03-14 16:15:28'),(78,29,'voxtelstar2020_7_edited.jpg','voxtelstar2020_7_edited.jpg','2022-03-14 16:15:28'),(79,30,'crimsoniimeshkit_ortho_web.jpg','crimsoniimeshkit_ortho_web.jpg','2022-03-14 16:15:28'),(80,30,'crimsoniimeshkit_module_back_hires.jpg','crimsoniimeshkit_module_back_hires.jpg','2022-03-14 16:15:28'),(81,30,'crimsoniimeshkit_module_ortho_web.jpg','crimsoniimeshkit_module_ortho_web.jpg','2022-03-14 16:15:28'),(82,30,'crimsoniimeshkit_module_side_web_1200x750.jpg','crimsoniimeshkit_module_side_web_1200x750.jpg','2022-03-14 16:15:28'),(83,31,'debut_ortho_web.jpg','debut_ortho_web.jpg','2022-03-14 16:15:28'),(84,31,'debut_topdown_web.jpg','debut_topdown_web.jpg','2022-03-14 16:15:28'),(85,31,'debut_detail_web.jpg','debut_detail_web.jpg','2022-03-14 16:15:28'),(86,31,'debut_module_web.jpg','debut_module_web.jpg','2022-03-14 16:15:28'),(87,32,'strike-se_ortho_web.jpg','strike-se_ortho_web.jpg','2022-03-14 16:15:28'),(88,32,'strike-se_drummount_web.jpg','strike-se_drummount_web.jpg','2022-03-14 16:15:28'),(89,32,'strike-se_kick_web.jpg','strike-se_kick_web.jpg','2022-03-14 16:15:28'),(90,32,'strike-se_cymbal-14_web.jpg','strike-se_cymbal-14_web.jpg','2022-03-14 16:15:28'),(91,33,'51jcshsorxl._sl1200_.jpg','51jcshsorxl._sl1200_.jpg','2022-03-14 16:15:28'),(92,33,'71-xzioecml._sl1500_.jpg','71-xzioecml._sl1500_.jpg','2022-03-14 16:15:28'),(93,33,'81tfy7cy2pl._sl1500_.jpg','81tfy7cy2pl._sl1500_.jpg','2022-03-14 16:15:28'),(94,33,'91mgqh4c-il._sl1500_.jpg','91mgqh4c-il._sl1500_.jpg','2022-03-14 16:15:28'),(95,34,'percpad_ortho_web.png','percpad_ortho_web.png','2022-03-14 16:15:28'),(96,34,'percpad_angle_web.png','percpad_angle_web.png','2022-03-14 16:15:28'),(97,34,'alesis_percpad_pad-1.jpg','alesis_percpad_pad-1.jpg','2022-03-14 16:15:28'),(98,35,'sd-7aw.jpg','sd-7aw.jpg','2022-03-14 16:15:28'),(99,36,'10_3.jpg','10_3.jpg','2022-03-14 16:15:28'),(100,37,'sd-5an.jpg','sd-5an.jpg','2022-03-14 16:15:28'),(101,38,'3_8_4.jpg','3_8_4.jpg','2022-03-14 16:15:28'),(102,38,'1_22_3.jpg','1_22_3.jpg','2022-03-14 16:15:28'),(103,38,'4_8_4.jpg','4_8_4.jpg','2022-03-14 16:15:28'),(104,39,'la15c_1.jpg','la15c_1.jpg','2022-03-14 16:15:28'),(105,39,'la15c_2.jpg','la15c_2.jpg','2022-03-14 16:15:28'),(106,40,'gc212-e.jpg','gc212-e.jpg','2022-03-14 16:15:28'),(107,40,'gc212-e_3.jpg','gc212-e_3.jpg','2022-03-14 16:15:28'),(108,40,'gc212-e_2.jpg','gc212-e_2.jpg','2022-03-14 16:15:28'),(109,41,'cambridge50.jpg','cambridge50.jpg','2022-03-14 16:15:28'),(110,42,'vox_pathfinder10.jpg','vox_pathfinder10.jpg','2022-03-14 16:15:28'),(111,43,'red_spark-15.jpg','red_spark-15.jpg','2022-03-14 16:15:28'),(112,43,'red_spark-15_2.jpg','red_spark-15_2.jpg','2022-03-14 16:15:28'),(113,43,'red_spark-15_4.jpg','red_spark-15_4.jpg','2022-03-14 16:15:28'),(114,43,'red_spark-15_5.jpg','red_spark-15_5.jpg','2022-03-14 16:15:28'),(115,44,'red_spark-30.jpg','red_spark-30.jpg','2022-03-14 16:15:28'),(116,44,'red_spark-30_2.jpg','red_spark-30_2.jpg','2022-03-14 16:15:28'),(117,44,'red_spark-30_4.jpg','red_spark-30_4.jpg','2022-03-14 16:15:28'),(118,44,'red_spark-30_5.jpg','red_spark-30_5.jpg','2022-03-14 16:15:28'),(119,45,'red_spark-60.jpg','red_spark-60.jpg','2022-03-14 16:15:28'),(120,45,'red_spark-60_2.jpg','red_spark-60_2.jpg','2022-03-14 16:15:28'),(121,45,'red_spark-60_4.jpg','red_spark-60_4.jpg','2022-03-14 16:15:28'),(122,45,'red_spark-60_5.jpg','red_spark-60_5.jpg','2022-03-14 16:15:28'),(123,46,'prime2-side-topdown-webk_1_1_1_.jpg','prime2-side-topdown-webk_1_1_1_.jpg','2022-03-14 16:15:28'),(124,46,'prime-2-features-frontk.png','prime-2-features-frontk.png','2022-03-14 16:15:28'),(125,46,'prime2.png','prime2.png','2022-03-14 16:15:28'),(126,46,'prime-2-features-reark.png','prime-2-features-reark.png','2022-03-14 16:15:28'),(127,47,'numark_mixtrackplatinumfx_ortho_web-624x390.jpg','numark_mixtrackplatinumfx_ortho_web-624x390.jpg','2022-03-14 16:15:28'),(128,47,'numark_mixtrackplatinumfx_angle_front_web-624x390.jpg','numark_mixtrackplatinumfx_angle_front_web-624x390.jpg','2022-03-14 16:15:28'),(129,47,'numark_mixtrackplatinumfx_angle_web-624x390.jpg','numark_mixtrackplatinumfx_angle_web-624x390.jpg','2022-03-14 16:15:28'),(130,47,'numark_mixtrackplatinumfx_front_web-624x390.jpg','numark_mixtrackplatinumfx_front_web-624x390.jpg','2022-03-14 16:15:28'),(131,48,'primego-side-topdown-webk_2.jpg','primego-side-topdown-webk_2.jpg','2022-03-14 16:15:28'),(132,48,'prime_go_dopuna.jpg','prime_go_dopuna.jpg','2022-03-14 16:15:28'),(133,48,'primego-side-back-webk_2.jpg','primego-side-back-webk_2.jpg','2022-03-14 16:15:28'),(134,48,'primego-angle-left-webk_2.jpg','primego-angle-left-webk_2.jpg','2022-03-14 16:15:28'),(135,49,'1490202941000_img_773927.jpg','1490202941000_img_773927.jpg','2022-03-14 16:15:28'),(136,49,'1490203323000_1327205.jpg','1490203323000_1327205.jpg','2022-03-14 16:15:28'),(137,49,'1490202941000_img_773926.jpg','1490202941000_img_773926.jpg','2022-03-14 16:15:28'),(138,49,'1490202941000_img_773928.jpg','1490202941000_img_773928.jpg','2022-03-14 16:15:28'),(139,50,'1484318727000_img_736750.jpg','1484318727000_img_736750.jpg','2022-03-14 16:15:28'),(140,50,'1484318739000_1310962.jpg','1484318739000_1310962.jpg','2022-03-14 16:15:28'),(141,50,'1484318727000_img_736751.jpg','1484318727000_img_736751.jpg','2022-03-14 16:15:28'),(142,50,'1484318727000_img_736752.jpg','1484318727000_img_736752.jpg','2022-03-14 16:15:28'),(143,51,'plx_1000.jpg','plx_1000.jpg','2022-03-14 16:15:28'),(144,51,'pioneer-plx-1000.jpg','pioneer-plx-1000.jpg','2022-03-14 16:15:28'),(145,52,'2000nxs.jpg','2000nxs.jpg','2022-03-14 16:15:28'),(146,52,'djm-2000nexus_2.jpg','djm-2000nexus_2.jpg','2022-03-14 16:15:28'),(147,52,'pioneer-djm-2000-nexus_03xxl.jpg','pioneer-djm-2000-nexus_03xxl.jpg','2022-03-14 16:15:28'),(148,53,'scratch_ortho_web.jpg','scratch_ortho_web.jpg','2022-03-14 16:15:28'),(149,53,'scratch_angle_web.jpg','scratch_angle_web.jpg','2022-03-14 16:15:28'),(150,53,'scratch_rear_web.jpg','scratch_rear_web.jpg','2022-03-14 16:15:28'),(151,53,'scratch_front_web.jpg','scratch_front_web.jpg','2022-03-14 16:15:28'),(152,54,'seventy_two.jpg','seventy_two.jpg','2022-03-14 16:15:28'),(153,54,'seventy_two_2.jpg','seventy_two_2.jpg','2022-03-14 16:15:28'),(154,54,'seventy_two_3.jpg','seventy_two_3.jpg','2022-03-14 16:15:28'),(155,55,'korg_kp3_.jpg','korg_kp3_.jpg','2022-03-14 16:15:28'),(156,56,'pioneer-rmx1000-remix-station.jpg','pioneer-rmx1000-remix-station.jpg','2022-03-14 16:15:28'),(157,56,'3-pioneer-rmx-1000-backside-20120318-230224.jpg','3-pioneer-rmx-1000-backside-20120318-230224.jpg','2022-03-14 16:15:28'),(158,57,'rmx-500-main.jpg','rmx-500-main.jpg','2022-03-14 16:15:28'),(159,57,'rmx-500-side.jpg','rmx-500-side.jpg','2022-03-14 16:15:28'),(160,57,'rmx-500-angle.jpg','rmx-500-angle.jpg','2022-03-14 16:15:28'),(161,58,'6_m_3.jpg','6_m_3.jpg','2022-03-14 16:15:28'),(162,58,'denon_dopuna_2.png','denon_dopuna_2.png','2022-03-14 16:15:28'),(163,58,'sc6000m-side-front-webk_1_1.jpg','sc6000m-side-front-webk_1_1.jpg','2022-03-14 16:15:28'),(164,58,'sc6000m-side-back-webk_1_1.jpg','sc6000m-side-back-webk_1_1.jpg','2022-03-14 16:15:28'),(165,59,'1.sl1500_.jpg','1.sl1500_.jpg','2022-03-14 16:15:28'),(166,59,'4._ac_sl1500_.jpg','4._ac_sl1500_.jpg','2022-03-14 16:15:28'),(167,59,'5._ac_sl1500_.jpg','5._ac_sl1500_.jpg','2022-03-14 16:15:28'),(168,59,'7._ac_sl1500_.jpg','7._ac_sl1500_.jpg','2022-03-14 16:15:28'),(169,60,'sc5000m_3.jpg','sc5000m_3.jpg','2022-03-14 16:15:28'),(170,60,'sc5000m_5.jpg','sc5000m_5.jpg','2022-03-14 16:15:28'),(171,60,'sc5000m_6.jpg','sc5000m_6.jpg','2022-03-14 16:15:28');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mark` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`mark`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marks`
--

LOCK TABLES `marks` WRITE;
/*!40000 ALTER TABLE `marks` DISABLE KEYS */;
INSERT INTO `marks` VALUES (1,1),(2,2),(3,3),(4,4),(5,5);
/*!40000 ALTER TABLE `marks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Home','index'),(2,'Shop','products.index'),(3,'Contact','contact.index'),(4,'About us','about'),(5,'About author','aboutAuthor');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2022_03_12_150155_create_activities_table',1),(3,'2022_03_12_150155_create_brands_table',1),(4,'2022_03_12_150155_create_cart_table',1),(5,'2022_03_12_150155_create_categories_table',1),(6,'2022_03_12_150155_create_images_table',1),(7,'2022_03_12_150155_create_marks_table',1),(8,'2022_03_12_150155_create_menu_table',1),(9,'2022_03_12_150155_create_order_product_table',1),(10,'2022_03_12_150155_create_orders_table',1),(11,'2022_03_12_150155_create_prices_table',1),(12,'2022_03_12_150155_create_products_table',1),(13,'2022_03_12_150155_create_reviews_table',1),(14,'2022_03_12_150155_create_roles_table',1),(15,'2022_03_12_150155_create_sub_categories_table',1),(16,'2022_03_12_150155_create_users_table',1),(17,'2022_03_12_150155_create_wishlist_table',1),(18,'2022_03_12_150156_add_foreign_keys_to_cart_table',1),(19,'2022_03_12_150156_add_foreign_keys_to_images_table',1),(20,'2022_03_12_150156_add_foreign_keys_to_order_product_table',1),(21,'2022_03_12_150156_add_foreign_keys_to_orders_table',1),(22,'2022_03_12_150156_add_foreign_keys_to_prices_table',1),(23,'2022_03_12_150156_add_foreign_keys_to_products_table',1),(24,'2022_03_12_150156_add_foreign_keys_to_reviews_table',1),(25,'2022_03_12_150156_add_foreign_keys_to_sub_categories_table',1),(26,'2022_03_12_150156_add_foreign_keys_to_users_table',1),(27,'2022_03_12_150156_add_foreign_keys_to_wishlist_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_product` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `fk_order_product_orders1_idx` (`order_id`),
  KEY `fk_order_product_products1` (`product_id`),
  CONSTRAINT `fk_order_product_orders1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `fk_order_product_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_users1_idx` (`user_id`),
  CONSTRAINT `fk_order_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prices`
--

DROP TABLE IF EXISTS `prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `price` decimal(45,0) NOT NULL,
  `active` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prices_products1_idx` (`product_id`),
  CONSTRAINT `fk_prices_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prices`
--

LOCK TABLES `prices` WRITE;
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
INSERT INTO `prices` VALUES (1,1,60,1,'2022-03-14 16:15:28',NULL),(2,2,60,1,'2022-03-14 16:15:28',NULL),(3,3,55,1,'2022-03-14 16:15:28',NULL),(4,4,90,1,'2022-03-14 16:15:28',NULL),(5,5,90,1,'2022-03-14 16:15:28',NULL),(6,6,95,1,'2022-03-14 16:15:28',NULL),(7,7,130,1,'2022-03-14 16:15:28',NULL),(8,8,1480,1,'2022-03-14 16:15:28',NULL),(9,9,110,1,'2022-03-14 16:15:28',NULL),(10,10,110,1,'2022-03-14 16:15:28',NULL),(11,11,130,1,'2022-03-14 16:15:28',NULL),(12,12,130,1,'2022-03-14 16:15:28',NULL),(13,13,130,1,'2022-03-14 16:15:28',NULL),(14,14,15,1,'2022-03-14 16:15:28',NULL),(15,15,20,1,'2022-03-14 16:15:28',NULL),(16,16,5,1,'2022-03-14 16:15:28',NULL),(17,17,460,1,'2022-03-14 16:15:28',NULL),(18,18,320,1,'2022-03-14 16:15:28',NULL),(19,19,430,1,'2022-03-14 16:15:28',NULL),(20,20,850,1,'2022-03-14 16:15:28',NULL),(21,21,920,1,'2022-03-14 16:15:28',NULL),(22,22,1230,1,'2022-03-14 16:15:28',NULL),(23,23,1300,1,'2022-03-14 16:15:28',NULL),(24,24,50,1,'2022-03-14 16:15:28',NULL),(25,25,100,1,'2022-03-14 16:15:28',NULL),(26,26,20,1,'2022-03-14 16:15:28',NULL),(27,27,45,1,'2022-03-14 16:15:28',NULL),(28,28,90,1,'2022-03-14 16:15:28',NULL),(29,29,2000,1,'2022-03-14 16:15:28',NULL),(30,30,300,1,'2022-03-14 16:15:28',NULL),(31,31,900,1,'2022-03-14 16:15:28',NULL),(32,32,2500,1,'2022-03-14 16:15:28',NULL),(33,33,90,1,'2022-03-14 16:15:28',NULL),(34,34,160,1,'2022-03-14 16:15:28',NULL),(35,35,10,1,'2022-03-14 16:15:28',NULL),(36,36,10,1,'2022-03-14 16:15:28',NULL),(37,37,10,1,'2022-03-14 16:15:28',NULL),(38,38,250,1,'2022-03-14 16:15:28',NULL),(39,39,100,1,'2022-03-14 16:15:28',NULL),(40,40,190,1,'2022-03-14 16:15:28',NULL),(41,41,230,1,'2022-03-14 16:15:28',NULL),(42,42,290,1,'2022-03-14 16:15:28',NULL),(43,43,70,1,'2022-03-14 16:15:28',NULL),(44,44,140,1,'2022-03-14 16:15:28',NULL),(45,45,210,1,'2022-03-14 16:15:28',NULL),(46,46,1500,1,'2022-03-14 16:15:28',NULL),(47,47,280,1,'2022-03-14 16:15:28',NULL),(48,48,1100,1,'2022-03-14 16:15:28',NULL),(49,49,410,1,'2022-03-14 16:15:28',NULL),(50,50,600,1,'2022-03-14 16:15:28',NULL),(51,51,830,1,'2022-03-14 16:15:28',NULL),(52,52,1900,1,'2022-03-14 16:15:28',NULL),(53,53,520,1,'2022-03-14 16:15:28',NULL),(54,54,2030,1,'2022-03-14 16:15:29',NULL),(55,55,300,1,'2022-03-14 16:15:29',NULL),(56,56,800,1,'2022-03-14 16:15:29',NULL),(57,57,670,1,'2022-03-14 16:15:29',NULL),(58,58,2000,1,'2022-03-14 16:15:29',NULL),(59,59,1500,1,'2022-03-14 16:15:29',NULL),(60,60,1400,1,'2022-03-14 16:15:29',NULL);
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand_id` int NOT NULL,
  `sub_category_id` int NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `quantity` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_brands1_idx` (`brand_id`),
  KEY `fk_products_sub_categories1_idx` (`sub_category_id`),
  CONSTRAINT `fk_products_brands1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `fk_products_sub_categories1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,6,1,'Toledo Primera Student 4/4','Prvi koraci su najbitniji u učenju bilo kog instrumenta. Mekan vrat za lako sviranje prstima, što pomaže učenicima da sviraju i melodije i akorde. U pitanju je cela gitara, postoji model ove gitare 3/4 i 1/2',26,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(2,6,1,'Toledo Primera Student 44 BK','Prvi koraci su najbitniji u učenju bilo kog instrumenta. Mekan vrat za lako sviranje prstima, što pomaže učenicima da sviraju i melodije i akorde. U pitanju je cela gitara, postoji model ove gitare 3/4 i 1/2',18,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(3,6,1,'Toledo Primera Student 34','Prvi koraci su najbitniji u učenju bilo kog instrumenta. Mekan vrat za lako sviranje prstima, što pomaže učenicima da sviraju i melodije i akorde. U pitanju je 3/4 gitara, za decu od 6 do 10 godina',17,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(4,19,1,'VC104K Pack','Valencia VC104Kit 4/4 u paketu sa torbom i štimerom je jedna od najpopularnijih klasicnih gitara namenjena početnicima. Odlican izbor po pristupacnoj ceni. ',8,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(5,6,2,'Yellowstone MJCE SB',NULL,30,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(6,6,2,'Yellowstone MJCE NT',NULL,28,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(7,6,2,'Yellowstone MJCE BK',NULL,12,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(8,5,3,'Bobcat S66B',NULL,10,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(9,6,3,'Rider-STD-H BK',NULL,12,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(10,6,3,'Rider-STD-H 3TS',NULL,6,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(11,6,4,'Horseman BK',NULL,19,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(12,6,4,'Horseman 3TS',NULL,7,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(13,6,4,'Horseman TRD',NULL,22,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(14,10,5,'Nanoweb Electric Super light',NULL,20,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(15,10,5,'Nanoweb 80/20 Acoustic Guitar Strings',NULL,12,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(16,20,5,'Super Slinky',NULL,29,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(17,3,7,'Recital PRO',NULL,7,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(18,3,7,'Concert',NULL,14,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(19,6,7,'Primius',NULL,17,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(20,1,8,'Pa4x-61',NULL,21,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(21,1,8,'Pa4x-76',NULL,19,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(22,1,8,'PA-700',NULL,25,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(23,1,9,'MS20-FS',NULL,26,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(24,3,9,'Harmony 32',NULL,27,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(25,1,9,'NTS-1 Digital',NULL,28,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(26,2,10,'Boom Arm Black',NULL,16,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(27,1,10,'DS-1H',NULL,12,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(28,1,10,'EC-5',NULL,24,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(29,5,11,'Telstar 2020',NULL,9,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(30,3,12,'Debut Kit',NULL,5,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(31,3,12,'Crimson II Kit',NULL,17,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(32,3,12,'Strike Pro Special Edition',NULL,15,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(33,3,13,'PERCPAD',NULL,25,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(34,3,13,'Sample Pad 4',NULL,27,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(35,12,14,'Firth 5A',NULL,30,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(36,12,14,'Firth 5AN',NULL,20,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(37,6,14,'SD-5AN',NULL,22,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(38,5,16,'VX50AG',NULL,10,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(39,21,16,'LA15C',NULL,28,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(40,6,17,'GC212-E',NULL,14,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(41,5,17,'Cambridge 50',NULL,21,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(42,5,17,'Pathfinder 10',NULL,22,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(43,6,18,'Red Spark 15',NULL,7,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(44,6,18,'Red Spark 30',NULL,24,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(45,6,18,'Red Spark 60',NULL,16,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(46,16,19,'Prime 2',NULL,20,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(47,17,19,'Mixtrack Platinum FX',NULL,11,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(48,16,19,'Prime GO',NULL,13,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(49,17,20,'NTX1000',NULL,6,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(50,16,20,'VL12',NULL,15,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(51,18,20,'PLX-1000',NULL,19,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(52,18,21,'DJM2000 Nexus',NULL,6,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(53,17,21,'Scratch',NULL,28,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(54,22,21,'Seventy-Two',NULL,20,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(55,1,22,'KAOSSPAD KP3+',NULL,21,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(56,18,22,'RMX 1000',NULL,18,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(57,18,22,'RMX 500',NULL,17,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(58,16,23,'DJ SC6000M',NULL,10,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(59,16,23,'DJ SC5000M',NULL,7,'2022-03-14 16:15:27','2022-03-14 16:15:27'),(60,16,23,'DJ SC5000',NULL,18,'2022-03-14 16:15:27','2022-03-14 16:15:27');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `mark_id` int NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`,`user_id`),
  KEY `fk_reviews_products1_idx` (`product_id`),
  KEY `fk_reviews_users1_idx` (`user_id`),
  KEY `fk_reviews_marks1_idx` (`mark_id`),
  CONSTRAINT `fk_reviews_marks1` FOREIGN KEY (`mark_id`) REFERENCES `marks` (`id`),
  CONSTRAINT `fk_reviews_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `fk_reviews_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,2,4,'Good','This was my first product bought from this website and it is awesome','2002-06-15 06:52:23',NULL),(1,3,4,'Good','No comments for it, great product','1981-02-06 10:00:24',NULL),(1,4,1,'Best','I recently bought this product and its fantastic','1998-09-16 09:14:07',NULL),(1,5,4,'Best','I recently bought this product and its fantastic','1988-07-28 17:47:07',NULL),(1,6,3,'Best','I recently bought this product and its fantastic','1981-11-21 23:23:50',NULL),(1,7,3,'Best','I recently bought this product and its fantastic','1994-12-22 21:41:20',NULL),(1,8,2,'Good','I recently bought this product and its fantastic','2020-03-20 07:00:45',NULL),(1,9,1,'Great Product','This was my first product bought from this website and it is awesome','1997-07-07 13:56:28',NULL),(1,10,2,'Best Product Ever','Good, good','1998-05-29 06:28:51',NULL),(2,2,5,'Best','Good, good','1989-07-31 00:57:36',NULL),(2,3,4,'Best','I recently bought this product and its fantastic','1973-05-06 13:04:24',NULL),(2,4,3,'Great Product','Good, good','2009-07-22 13:27:46',NULL),(2,5,5,'Great Product','I recently bought this product and its fantastic','1998-01-01 05:30:19',NULL),(2,6,5,'Best Product Ever','No comments for it, great product','2017-03-14 08:40:42',NULL),(2,7,1,'Best Product Ever','This was my first product bought from this website and it is awesome','2012-02-08 04:37:57',NULL),(2,8,3,'Excellent','Good, good','1974-10-31 18:48:19',NULL),(2,9,3,'Best Product Ever','I recently bought this product and its fantastic','1976-08-14 05:46:46',NULL),(2,10,2,'Best','I recently bought this product and its fantastic','1999-06-07 23:10:20',NULL),(3,2,4,'Great Product','No comments for it, great product','1975-09-17 10:01:32',NULL),(3,3,2,'Great Product','This was my first product bought from this website and it is awesome','2013-10-13 17:48:32',NULL),(3,4,5,'Best','This was my first product bought from this website and it is awesome','1997-11-26 10:42:54',NULL),(3,5,2,'Best','This was my first product bought from this website and it is awesome','1992-08-28 05:09:22',NULL),(3,6,4,'Best Product Ever','This was my first product bought from this website and it is awesome','2001-02-01 16:08:37',NULL),(3,7,2,'Great Product','Good, good','1972-09-09 16:56:31',NULL),(3,8,3,'Best Product Ever','This was my first product bought from this website and it is awesome','1995-12-15 16:47:03',NULL),(3,9,1,'Best Product Ever','This was my first product bought from this website and it is awesome','1990-06-28 17:02:37',NULL),(3,10,3,'Great Product','This was my first product bought from this website and it is awesome','1984-10-15 10:53:10',NULL),(4,2,3,'Excellent','This was my first product bought from this website and it is awesome','2020-03-31 21:28:58',NULL),(4,3,5,'Great Product','No comments for it, great product','1985-02-08 00:36:29',NULL),(4,4,4,'Best Product Ever','No comments for it, great product','2008-12-02 22:00:12',NULL),(4,5,3,'Good','This was my first product bought from this website and it is awesome','2007-08-17 05:15:41',NULL),(4,6,1,'Excellent','Good, good','1975-06-01 17:41:56',NULL),(4,7,1,'Best','No comments for it, great product','2003-11-10 04:39:34',NULL),(4,8,5,'Best Product Ever','I recently bought this product and its fantastic','1972-10-21 20:47:48',NULL),(4,9,3,'Good','I recently bought this product and its fantastic','2008-02-25 23:46:57',NULL),(4,10,5,'Good','Good, good','2006-12-04 11:37:32',NULL),(5,2,3,'Good','Good, good','1989-08-15 12:49:56',NULL),(5,3,4,'Good','This was my first product bought from this website and it is awesome','1975-09-12 12:52:47',NULL),(5,4,5,'Excellent','I recently bought this product and its fantastic','2001-03-27 22:50:44',NULL),(5,5,5,'Excellent','No comments for it, great product','1982-03-20 21:47:44',NULL),(5,6,3,'Best Product Ever','No comments for it, great product','1990-11-12 20:33:13',NULL),(5,7,4,'Excellent','No comments for it, great product','1986-08-02 22:22:06',NULL),(5,8,3,'Good','I recently bought this product and its fantastic','1984-10-23 14:42:30',NULL),(5,9,2,'Good','No comments for it, great product','2018-05-06 02:19:33',NULL),(5,10,1,'Good','No comments for it, great product','2013-05-10 20:21:14',NULL),(6,2,4,'Best','This was my first product bought from this website and it is awesome','2014-05-24 12:33:14',NULL),(6,3,3,'Great Product','No comments for it, great product','2020-07-14 13:37:27',NULL),(6,4,5,'Excellent','This was my first product bought from this website and it is awesome','2015-05-11 06:09:19',NULL),(6,5,2,'Great Product','I recently bought this product and its fantastic','1988-08-31 15:27:52',NULL),(6,6,3,'Excellent','Good, good','2019-06-09 12:45:58',NULL),(6,7,5,'Best','This was my first product bought from this website and it is awesome','1982-04-28 05:59:47',NULL),(6,8,2,'Great Product','This was my first product bought from this website and it is awesome','2001-12-03 02:30:52',NULL),(6,9,3,'Great Product','This was my first product bought from this website and it is awesome','1974-07-28 10:28:30',NULL),(6,10,1,'Great Product','This was my first product bought from this website and it is awesome','2006-07-13 02:55:42',NULL),(7,2,4,'Best Product Ever','I recently bought this product and its fantastic','1991-04-09 10:05:56',NULL),(7,3,3,'Best Product Ever','No comments for it, great product','2014-05-16 01:16:33',NULL),(7,4,2,'Best Product Ever','I recently bought this product and its fantastic','1977-04-04 13:31:23',NULL),(7,5,2,'Great Product','Good, good','2021-01-23 05:52:48',NULL),(7,6,4,'Best Product Ever','No comments for it, great product','1995-03-22 07:51:47',NULL),(7,7,4,'Great Product','No comments for it, great product','2003-03-19 21:34:46',NULL),(7,8,5,'Best','I recently bought this product and its fantastic','1998-04-15 00:38:12',NULL),(7,9,3,'Good','Good, good','1996-11-21 12:05:25',NULL),(7,10,2,'Best','I recently bought this product and its fantastic','1972-09-05 12:52:48',NULL),(8,2,2,'Great Product','This was my first product bought from this website and it is awesome','1998-01-06 11:20:59',NULL),(8,3,4,'Best Product Ever','Good, good','2005-02-16 11:34:47',NULL),(8,4,4,'Good','I recently bought this product and its fantastic','1979-02-13 21:04:25',NULL),(8,5,2,'Good','No comments for it, great product','1999-12-07 13:40:39',NULL),(8,6,4,'Best Product Ever','Good, good','1978-06-13 19:42:34',NULL),(8,7,1,'Great Product','This was my first product bought from this website and it is awesome','1973-04-06 00:32:23',NULL),(8,8,3,'Great Product','No comments for it, great product','1972-08-27 05:48:30',NULL),(8,9,1,'Best Product Ever','This was my first product bought from this website and it is awesome','2020-10-28 09:10:34',NULL),(8,10,4,'Excellent','Good, good','1983-06-24 09:52:03',NULL),(9,2,4,'Good','Good, good','2016-12-30 16:31:59',NULL),(9,3,5,'Excellent','I recently bought this product and its fantastic','2009-01-10 01:44:41',NULL),(9,4,2,'Great Product','Good, good','1994-11-30 03:44:19',NULL),(9,5,4,'Best Product Ever','Good, good','2016-03-16 17:41:23',NULL),(9,6,4,'Great Product','No comments for it, great product','2015-12-30 06:56:48',NULL),(9,7,2,'Excellent','This was my first product bought from this website and it is awesome','1977-09-29 19:06:44',NULL),(9,8,2,'Excellent','Good, good','2005-01-28 05:35:17',NULL),(9,9,5,'Best','No comments for it, great product','1973-01-27 23:08:42',NULL),(9,10,3,'Best Product Ever','I recently bought this product and its fantastic','2002-08-02 12:57:03',NULL),(10,2,2,'Best Product Ever','I recently bought this product and its fantastic','1996-10-18 17:02:15',NULL),(10,3,1,'Best Product Ever','No comments for it, great product','1970-02-17 14:53:04',NULL),(10,4,3,'Great Product','This was my first product bought from this website and it is awesome','2020-06-14 05:04:51',NULL),(10,5,3,'Best','Good, good','1990-09-30 13:43:01',NULL),(10,6,1,'Great Product','I recently bought this product and its fantastic','1990-02-16 07:54:10',NULL),(10,7,3,'Best','No comments for it, great product','1982-05-16 15:38:01',NULL),(10,8,5,'Great Product','This was my first product bought from this website and it is awesome','1988-11-06 07:47:50',NULL),(10,9,1,'Good','I recently bought this product and its fantastic','1991-06-03 11:59:33',NULL),(10,10,5,'Great Product','No comments for it, great product','1996-10-23 13:04:18',NULL),(11,2,1,'Great Product','No comments for it, great product','2005-11-12 21:49:42',NULL),(11,3,5,'Great Product','No comments for it, great product','2021-07-13 16:35:46',NULL),(11,4,3,'Great Product','I recently bought this product and its fantastic','2009-04-27 20:06:39',NULL),(11,5,1,'Good','This was my first product bought from this website and it is awesome','1988-09-19 03:37:53',NULL),(11,6,3,'Good','I recently bought this product and its fantastic','2017-09-28 01:12:48',NULL),(11,7,3,'Excellent','No comments for it, great product','2001-01-02 13:41:07',NULL),(11,8,2,'Best Product Ever','This was my first product bought from this website and it is awesome','2020-09-02 11:40:28',NULL),(11,9,2,'Good','No comments for it, great product','2018-04-15 07:44:30',NULL),(11,10,2,'Great Product','Good, good','1979-09-13 21:57:22',NULL),(12,2,4,'Excellent','No comments for it, great product','1980-05-20 20:12:43',NULL),(12,3,5,'Good','No comments for it, great product','1975-09-17 19:42:55',NULL),(12,4,2,'Best Product Ever','This was my first product bought from this website and it is awesome','2016-03-10 22:43:23',NULL),(12,5,5,'Great Product','I recently bought this product and its fantastic','2004-09-13 03:38:08',NULL),(12,6,2,'Great Product','This was my first product bought from this website and it is awesome','1993-01-14 03:56:08',NULL),(12,7,5,'Great Product','No comments for it, great product','2002-04-12 00:29:43',NULL),(12,8,1,'Best Product Ever','No comments for it, great product','1993-11-16 06:07:41',NULL),(12,9,2,'Good','No comments for it, great product','1995-07-05 21:08:23',NULL),(12,10,2,'Good','Good, good','1997-06-02 22:00:35',NULL),(13,2,2,'Great Product','This was my first product bought from this website and it is awesome','1998-04-29 05:10:05',NULL),(13,3,1,'Excellent','I recently bought this product and its fantastic','1978-05-07 22:05:45',NULL),(13,4,5,'Excellent','Good, good','1985-01-07 21:49:54',NULL),(13,5,2,'Best','No comments for it, great product','1976-01-22 02:42:06',NULL),(13,6,5,'Excellent','This was my first product bought from this website and it is awesome','1987-01-22 07:54:24',NULL),(13,7,3,'Best','Good, good','1994-11-02 04:57:30',NULL),(13,8,2,'Best','Good, good','2016-10-10 13:27:56',NULL),(13,9,2,'Great Product','Good, good','1970-07-01 21:09:39',NULL),(13,10,1,'Best','This was my first product bought from this website and it is awesome','1980-02-06 10:03:53',NULL),(14,2,3,'Good','Good, good','1990-03-27 03:07:20',NULL),(14,3,5,'Excellent','This was my first product bought from this website and it is awesome','2008-10-08 00:25:33',NULL),(14,4,3,'Best Product Ever','No comments for it, great product','2014-04-26 13:41:49',NULL),(14,5,4,'Best','I recently bought this product and its fantastic','1987-08-02 19:03:36',NULL),(14,6,1,'Best Product Ever','No comments for it, great product','1998-06-19 00:40:20',NULL),(14,7,2,'Excellent','No comments for it, great product','2007-02-04 18:57:01',NULL),(14,8,5,'Best Product Ever','I recently bought this product and its fantastic','1979-11-09 14:36:42',NULL),(14,9,3,'Great Product','No comments for it, great product','1993-07-16 10:55:37',NULL),(14,10,4,'Good','Good, good','1976-03-30 05:16:32',NULL),(15,2,4,'Good','This was my first product bought from this website and it is awesome','2004-04-15 00:39:11',NULL),(15,3,2,'Best Product Ever','Good, good','1983-09-21 23:20:10',NULL),(15,4,1,'Good','No comments for it, great product','1986-09-04 07:22:48',NULL),(15,5,5,'Best','I recently bought this product and its fantastic','1985-12-14 19:20:54',NULL),(15,6,1,'Excellent','This was my first product bought from this website and it is awesome','2018-07-23 16:21:23',NULL),(15,7,5,'Best','Good, good','1999-06-21 10:07:02',NULL),(15,8,5,'Excellent','No comments for it, great product','1982-05-10 07:09:22',NULL),(15,9,2,'Great Product','Good, good','1985-01-29 06:26:13',NULL),(15,10,2,'Excellent','Good, good','2011-10-27 17:25:56',NULL),(16,2,1,'Good','I recently bought this product and its fantastic','1979-12-25 06:23:44',NULL),(16,3,1,'Great Product','Good, good','1976-08-29 12:58:24',NULL),(16,4,3,'Great Product','This was my first product bought from this website and it is awesome','1992-04-25 03:56:08',NULL),(16,5,2,'Great Product','Good, good','2016-09-02 14:17:13',NULL),(16,6,5,'Excellent','This was my first product bought from this website and it is awesome','2018-01-29 22:20:11',NULL),(16,7,4,'Excellent','Good, good','1980-05-08 07:59:21',NULL),(16,8,5,'Best Product Ever','I recently bought this product and its fantastic','2000-07-05 12:17:42',NULL),(16,9,3,'Great Product','This was my first product bought from this website and it is awesome','2012-03-28 10:43:00',NULL),(16,10,1,'Best Product Ever','Good, good','2000-01-21 20:41:32',NULL),(17,2,3,'Good','Good, good','1971-07-02 22:50:57',NULL),(17,3,1,'Good','No comments for it, great product','2017-06-10 04:24:05',NULL),(17,4,2,'Excellent','I recently bought this product and its fantastic','1993-03-26 19:22:23',NULL),(17,5,3,'Good','I recently bought this product and its fantastic','1987-07-19 14:56:28',NULL),(17,6,2,'Excellent','This was my first product bought from this website and it is awesome','1992-05-15 21:54:16',NULL),(17,7,3,'Excellent','Good, good','2015-04-17 02:37:06',NULL),(17,8,5,'Good','I recently bought this product and its fantastic','1976-07-16 22:44:49',NULL),(17,9,4,'Good','No comments for it, great product','2016-05-17 18:15:53',NULL),(17,10,1,'Excellent','Good, good','1991-02-12 13:20:38',NULL),(18,2,5,'Good','This was my first product bought from this website and it is awesome','2012-06-09 10:58:17',NULL),(18,3,1,'Best','No comments for it, great product','1995-06-21 06:01:35',NULL),(18,4,4,'Best','Good, good','1997-07-31 08:18:09',NULL),(18,5,1,'Best Product Ever','I recently bought this product and its fantastic','2004-10-19 01:17:30',NULL),(18,6,2,'Great Product','I recently bought this product and its fantastic','2005-06-16 07:31:36',NULL),(18,7,4,'Great Product','No comments for it, great product','2002-10-20 23:14:50',NULL),(18,8,4,'Excellent','I recently bought this product and its fantastic','2012-05-29 17:06:32',NULL),(18,9,3,'Great Product','Good, good','1989-10-14 05:44:59',NULL),(18,10,5,'Excellent','This was my first product bought from this website and it is awesome','2021-02-19 12:58:54',NULL),(19,2,3,'Great Product','No comments for it, great product','1971-08-20 00:18:24',NULL),(19,3,3,'Great Product','Good, good','1996-11-07 23:12:39',NULL),(19,4,2,'Best','Good, good','1977-06-23 21:22:32',NULL),(19,5,5,'Best Product Ever','Good, good','1999-11-05 17:12:34',NULL),(19,6,2,'Best Product Ever','Good, good','2008-11-24 23:56:28',NULL),(19,7,2,'Great Product','No comments for it, great product','1995-08-28 15:29:55',NULL),(19,8,1,'Excellent','This was my first product bought from this website and it is awesome','2009-11-06 16:06:23',NULL),(19,9,3,'Best','I recently bought this product and its fantastic','1982-02-03 14:52:25',NULL),(19,10,1,'Good','This was my first product bought from this website and it is awesome','1996-10-13 14:21:29',NULL),(20,2,2,'Great Product','This was my first product bought from this website and it is awesome','2011-08-21 06:26:46',NULL),(20,3,1,'Good','I recently bought this product and its fantastic','2000-07-01 11:23:51',NULL),(20,4,5,'Excellent','Good, good','2009-09-02 01:05:47',NULL),(20,5,2,'Best Product Ever','This was my first product bought from this website and it is awesome','1970-05-15 17:21:55',NULL),(20,6,5,'Best','This was my first product bought from this website and it is awesome','2012-12-01 01:40:52',NULL),(20,7,2,'Great Product','I recently bought this product and its fantastic','1985-05-25 18:17:25',NULL),(20,8,5,'Great Product','This was my first product bought from this website and it is awesome','1972-06-06 04:56:40',NULL),(20,9,3,'Best','No comments for it, great product','1976-11-11 19:45:57',NULL),(20,10,4,'Best','This was my first product bought from this website and it is awesome','2001-08-25 22:16:32',NULL),(21,2,4,'Great Product','This was my first product bought from this website and it is awesome','1972-05-02 01:40:41',NULL),(21,3,5,'Best','This was my first product bought from this website and it is awesome','1999-08-29 01:06:11',NULL),(21,4,3,'Best','Good, good','2021-08-01 06:57:23',NULL),(21,5,3,'Great Product','Good, good','1976-04-04 12:04:56',NULL),(21,6,2,'Excellent','Good, good','1998-08-02 00:46:10',NULL),(21,7,4,'Great Product','I recently bought this product and its fantastic','1990-04-21 22:04:37',NULL),(21,8,1,'Best Product Ever','I recently bought this product and its fantastic','1985-05-21 01:22:33',NULL),(21,9,5,'Best Product Ever','No comments for it, great product','1984-11-17 18:18:17',NULL),(21,10,4,'Great Product','No comments for it, great product','1992-12-07 19:03:22',NULL),(22,2,5,'Best','Good, good','2000-10-25 15:43:30',NULL),(22,3,1,'Great Product','I recently bought this product and its fantastic','2020-09-08 01:06:50',NULL),(22,4,5,'Best Product Ever','Good, good','1987-06-20 10:54:34',NULL),(22,5,1,'Best','No comments for it, great product','2019-07-16 01:33:32',NULL),(22,6,4,'Best Product Ever','No comments for it, great product','1976-01-01 16:38:37',NULL),(22,7,4,'Great Product','I recently bought this product and its fantastic','1981-11-23 11:06:28',NULL),(22,8,5,'Excellent','Good, good','1981-10-26 20:50:22',NULL),(22,9,5,'Best Product Ever','This was my first product bought from this website and it is awesome','1986-10-18 19:08:36',NULL),(22,10,2,'Great Product','No comments for it, great product','2005-08-13 20:52:43',NULL),(23,2,1,'Best Product Ever','Good, good','2017-04-01 10:04:04',NULL),(23,3,1,'Great Product','Good, good','1999-06-08 11:02:35',NULL),(23,4,5,'Good','I recently bought this product and its fantastic','1996-12-23 04:47:55',NULL),(23,5,3,'Best','I recently bought this product and its fantastic','1972-10-15 20:51:25',NULL),(23,6,5,'Great Product','I recently bought this product and its fantastic','2009-12-23 15:07:22',NULL),(23,7,2,'Excellent','I recently bought this product and its fantastic','2022-02-01 09:16:36',NULL),(23,8,4,'Best Product Ever','I recently bought this product and its fantastic','1973-04-03 20:15:53',NULL),(23,9,4,'Good','I recently bought this product and its fantastic','2011-07-09 12:37:11',NULL),(23,10,4,'Best Product Ever','I recently bought this product and its fantastic','1989-01-09 22:00:03',NULL),(24,2,1,'Good','This was my first product bought from this website and it is awesome','1974-01-05 00:38:10',NULL),(24,3,3,'Great Product','This was my first product bought from this website and it is awesome','2002-08-23 19:38:29',NULL),(24,4,3,'Good','This was my first product bought from this website and it is awesome','2009-08-04 20:17:37',NULL),(24,5,4,'Good','I recently bought this product and its fantastic','1970-01-23 12:51:20',NULL),(24,6,2,'Best Product Ever','This was my first product bought from this website and it is awesome','1989-03-21 08:36:54',NULL),(24,7,1,'Best','This was my first product bought from this website and it is awesome','2007-02-19 22:54:22',NULL),(24,8,5,'Excellent','No comments for it, great product','2010-05-26 09:24:53',NULL),(24,9,3,'Best Product Ever','Good, good','1979-01-02 21:45:49',NULL),(24,10,5,'Excellent','Good, good','1980-03-05 14:26:14',NULL),(25,2,1,'Best','I recently bought this product and its fantastic','2021-02-21 01:46:37',NULL),(25,3,3,'Best','No comments for it, great product','1986-01-13 12:30:52',NULL),(25,4,2,'Excellent','This was my first product bought from this website and it is awesome','2007-02-14 23:04:08',NULL),(25,5,4,'Great Product','This was my first product bought from this website and it is awesome','1995-05-28 08:48:57',NULL),(25,6,3,'Best','This was my first product bought from this website and it is awesome','1992-02-06 16:50:16',NULL),(25,7,3,'Best Product Ever','I recently bought this product and its fantastic','2009-08-16 05:54:30',NULL),(25,8,3,'Great Product','I recently bought this product and its fantastic','1974-02-20 10:47:00',NULL),(25,9,2,'Great Product','This was my first product bought from this website and it is awesome','1986-04-23 19:51:31',NULL),(25,10,4,'Good','I recently bought this product and its fantastic','2006-11-16 10:23:59',NULL),(26,2,5,'Great Product','Good, good','2019-01-25 15:07:23',NULL),(26,3,2,'Great Product','I recently bought this product and its fantastic','1992-09-22 11:56:27',NULL),(26,4,2,'Good','I recently bought this product and its fantastic','1982-07-19 15:48:55',NULL),(26,5,5,'Excellent','No comments for it, great product','2002-05-16 23:28:47',NULL),(26,6,1,'Best','Good, good','1988-10-22 00:34:54',NULL),(26,7,2,'Great Product','I recently bought this product and its fantastic','2001-09-17 05:27:09',NULL),(26,8,2,'Excellent','No comments for it, great product','1977-11-03 09:31:35',NULL),(26,9,2,'Best','This was my first product bought from this website and it is awesome','2016-10-06 01:23:23',NULL),(26,10,4,'Best Product Ever','This was my first product bought from this website and it is awesome','2011-10-05 02:48:20',NULL),(27,2,5,'Great Product','No comments for it, great product','2005-12-03 15:59:54',NULL),(27,3,1,'Excellent','Good, good','2003-05-27 14:43:02',NULL),(27,4,3,'Good','No comments for it, great product','1983-04-16 20:46:18',NULL),(27,5,4,'Excellent','No comments for it, great product','1985-01-22 23:36:04',NULL),(27,6,2,'Great Product','This was my first product bought from this website and it is awesome','2012-06-22 16:15:46',NULL),(27,7,4,'Good','I recently bought this product and its fantastic','2014-03-28 11:53:31',NULL),(27,8,5,'Best Product Ever','This was my first product bought from this website and it is awesome','1984-02-13 04:31:13',NULL),(27,9,5,'Excellent','This was my first product bought from this website and it is awesome','1984-12-22 00:04:18',NULL),(27,10,1,'Best Product Ever','No comments for it, great product','1974-07-02 07:18:40',NULL),(28,2,5,'Best Product Ever','Good, good','2010-08-05 13:12:37',NULL),(28,3,2,'Good','Good, good','1978-03-25 21:07:41',NULL),(28,4,3,'Best','This was my first product bought from this website and it is awesome','1992-09-06 15:46:20',NULL),(28,5,3,'Best Product Ever','Good, good','1971-01-03 10:58:13',NULL),(28,6,5,'Great Product','I recently bought this product and its fantastic','1977-03-03 00:33:48',NULL),(28,7,1,'Best Product Ever','No comments for it, great product','1983-11-29 09:18:04',NULL),(28,8,4,'Great Product','I recently bought this product and its fantastic','2019-09-21 16:51:27',NULL),(28,9,3,'Best','This was my first product bought from this website and it is awesome','1996-12-20 06:17:15',NULL),(28,10,5,'Best','No comments for it, great product','1985-07-09 09:59:46',NULL),(29,2,4,'Best Product Ever','I recently bought this product and its fantastic','2017-06-17 05:28:58',NULL),(29,3,5,'Great Product','This was my first product bought from this website and it is awesome','2004-02-21 10:46:02',NULL),(29,4,2,'Best Product Ever','This was my first product bought from this website and it is awesome','2016-02-02 14:13:32',NULL),(29,5,2,'Best','This was my first product bought from this website and it is awesome','2018-10-25 23:50:01',NULL),(29,6,3,'Great Product','I recently bought this product and its fantastic','1999-02-08 17:40:47',NULL),(29,7,5,'Excellent','This was my first product bought from this website and it is awesome','1973-03-22 04:25:54',NULL),(29,8,4,'Good','This was my first product bought from this website and it is awesome','2010-05-26 18:52:34',NULL),(29,9,3,'Excellent','No comments for it, great product','2005-06-01 19:17:55',NULL),(29,10,1,'Best Product Ever','No comments for it, great product','1970-08-31 22:27:39',NULL),(30,2,1,'Excellent','This was my first product bought from this website and it is awesome','2011-06-19 13:16:01',NULL),(30,3,1,'Good','I recently bought this product and its fantastic','1978-10-09 05:51:50',NULL),(30,4,3,'Great Product','No comments for it, great product','2006-10-15 22:09:08',NULL),(30,5,2,'Excellent','Good, good','2019-03-22 12:41:13',NULL),(30,6,5,'Best Product Ever','No comments for it, great product','1972-08-11 23:48:26',NULL),(30,7,5,'Excellent','This was my first product bought from this website and it is awesome','2012-04-30 12:37:23',NULL),(30,8,3,'Good','I recently bought this product and its fantastic','2017-01-29 18:25:17',NULL),(30,9,4,'Good','Good, good','1998-11-08 17:25:01',NULL),(30,10,3,'Best','Good, good','2021-04-01 10:54:18',NULL),(31,2,4,'Best Product Ever','No comments for it, great product','2019-08-13 00:27:24',NULL),(31,3,5,'Great Product','I recently bought this product and its fantastic','1986-04-01 01:41:15',NULL),(31,4,3,'Good','This was my first product bought from this website and it is awesome','2013-06-18 01:00:40',NULL),(31,5,1,'Best Product Ever','I recently bought this product and its fantastic','2012-04-01 18:32:23',NULL),(31,6,4,'Good','No comments for it, great product','1973-11-11 03:03:36',NULL),(31,7,5,'Best Product Ever','I recently bought this product and its fantastic','2002-06-05 21:56:40',NULL),(31,8,1,'Great Product','This was my first product bought from this website and it is awesome','1989-01-14 00:09:13',NULL),(31,9,5,'Best','This was my first product bought from this website and it is awesome','1973-07-15 21:48:34',NULL),(31,10,5,'Best Product Ever','No comments for it, great product','2021-05-28 21:13:45',NULL),(32,2,5,'Best Product Ever','Good, good','1988-08-12 11:56:47',NULL),(32,3,1,'Best Product Ever','This was my first product bought from this website and it is awesome','2008-10-07 15:50:22',NULL),(32,4,3,'Good','Good, good','1994-08-10 08:59:38',NULL),(32,5,5,'Excellent','This was my first product bought from this website and it is awesome','2011-03-19 10:32:23',NULL),(32,6,3,'Best Product Ever','No comments for it, great product','1990-11-21 22:22:27',NULL),(32,7,2,'Good','Good, good','1999-12-20 18:21:21',NULL),(32,8,1,'Best','This was my first product bought from this website and it is awesome','1997-10-16 02:36:17',NULL),(32,9,4,'Great Product','This was my first product bought from this website and it is awesome','2001-04-18 03:34:12',NULL),(32,10,2,'Best','This was my first product bought from this website and it is awesome','1976-08-31 05:43:08',NULL),(33,2,2,'Great Product','This was my first product bought from this website and it is awesome','2005-12-16 22:19:52',NULL),(33,3,2,'Great Product','Good, good','1997-08-27 10:14:49',NULL),(33,4,3,'Good','This was my first product bought from this website and it is awesome','2016-12-04 17:33:36',NULL),(33,5,2,'Great Product','I recently bought this product and its fantastic','2003-04-02 22:42:44',NULL),(33,6,4,'Best Product Ever','I recently bought this product and its fantastic','1979-05-07 20:01:02',NULL),(33,7,5,'Best Product Ever','This was my first product bought from this website and it is awesome','2008-09-10 18:24:40',NULL),(33,8,4,'Best Product Ever','I recently bought this product and its fantastic','1985-01-18 05:56:36',NULL),(33,9,4,'Good','Good, good','2018-01-09 23:44:51',NULL),(33,10,1,'Best Product Ever','This was my first product bought from this website and it is awesome','1979-11-02 22:52:29',NULL),(34,2,1,'Best','No comments for it, great product','1983-01-06 21:06:04',NULL),(34,3,5,'Great Product','I recently bought this product and its fantastic','1985-08-26 03:20:08',NULL),(34,4,5,'Best Product Ever','I recently bought this product and its fantastic','1972-08-12 22:09:46',NULL),(34,5,4,'Best Product Ever','Good, good','1985-08-01 05:18:03',NULL),(34,6,1,'Great Product','No comments for it, great product','2014-08-10 20:06:22',NULL),(34,7,2,'Great Product','No comments for it, great product','1982-09-29 07:45:03',NULL),(34,8,5,'Best','Good, good','2011-02-23 16:58:39',NULL),(34,9,3,'Best Product Ever','Good, good','1998-07-21 19:18:30',NULL),(34,10,3,'Good','I recently bought this product and its fantastic','1984-06-05 18:50:09',NULL),(35,2,3,'Best Product Ever','Good, good','2014-12-25 05:03:19',NULL),(35,3,5,'Best Product Ever','This was my first product bought from this website and it is awesome','1986-07-04 05:44:12',NULL),(35,4,1,'Great Product','No comments for it, great product','1975-12-04 18:01:21',NULL),(35,5,5,'Great Product','I recently bought this product and its fantastic','1973-11-04 21:19:03',NULL),(35,6,1,'Good','No comments for it, great product','1985-06-17 12:59:37',NULL),(35,7,5,'Best','No comments for it, great product','1975-10-15 10:36:58',NULL),(35,8,1,'Best Product Ever','Good, good','1996-11-02 18:31:25',NULL),(35,9,2,'Best','I recently bought this product and its fantastic','1979-03-21 00:57:40',NULL),(35,10,3,'Best Product Ever','This was my first product bought from this website and it is awesome','2013-07-21 00:10:50',NULL),(36,2,2,'Good','No comments for it, great product','1997-08-04 19:16:27',NULL),(36,3,3,'Best','This was my first product bought from this website and it is awesome','1984-04-18 03:53:45',NULL),(36,4,1,'Best','I recently bought this product and its fantastic','1972-06-11 22:40:48',NULL),(36,5,5,'Good','No comments for it, great product','1994-02-22 09:29:15',NULL),(36,6,3,'Great Product','This was my first product bought from this website and it is awesome','1970-09-09 18:00:11',NULL),(36,7,4,'Good','No comments for it, great product','2009-02-11 14:32:37',NULL),(36,8,2,'Great Product','Good, good','1988-11-19 11:45:21',NULL),(36,9,4,'Great Product','Good, good','1979-08-28 11:55:01',NULL),(36,10,2,'Best','No comments for it, great product','1989-06-27 11:34:42',NULL),(37,2,1,'Excellent','Good, good','1977-03-04 10:42:33',NULL),(37,3,2,'Great Product','This was my first product bought from this website and it is awesome','1988-06-13 21:27:10',NULL),(37,4,5,'Best Product Ever','I recently bought this product and its fantastic','2015-01-05 07:35:41',NULL),(37,5,2,'Great Product','No comments for it, great product','1980-02-10 15:17:20',NULL),(37,6,4,'Great Product','No comments for it, great product','1975-01-02 12:50:58',NULL),(37,7,3,'Best','This was my first product bought from this website and it is awesome','1999-03-16 22:15:40',NULL),(37,8,3,'Best','This was my first product bought from this website and it is awesome','2003-06-01 17:56:39',NULL),(37,9,5,'Excellent','No comments for it, great product','1980-05-12 15:59:52',NULL),(37,10,2,'Best Product Ever','This was my first product bought from this website and it is awesome','1993-05-02 06:36:26',NULL),(38,2,4,'Best','This was my first product bought from this website and it is awesome','2011-09-22 07:50:45',NULL),(38,3,3,'Good','This was my first product bought from this website and it is awesome','2001-03-31 13:23:27',NULL),(38,4,3,'Good','Good, good','2008-03-27 07:30:44',NULL),(38,5,3,'Best Product Ever','I recently bought this product and its fantastic','2000-10-15 07:49:47',NULL),(38,6,3,'Best','Good, good','2018-02-16 22:13:03',NULL),(38,7,1,'Best Product Ever','I recently bought this product and its fantastic','1998-07-03 12:04:09',NULL),(38,8,1,'Best','I recently bought this product and its fantastic','2016-02-11 13:19:18',NULL),(38,9,4,'Best Product Ever','No comments for it, great product','2020-02-28 09:02:05',NULL),(38,10,3,'Best','Good, good','1981-11-10 19:08:58',NULL),(39,2,5,'Good','This was my first product bought from this website and it is awesome','2007-11-26 02:41:22',NULL),(39,3,1,'Best','Good, good','2006-07-19 13:59:14',NULL),(39,4,2,'Excellent','No comments for it, great product','2016-03-16 10:30:15',NULL),(39,5,1,'Good','This was my first product bought from this website and it is awesome','2000-03-21 09:25:32',NULL),(39,6,5,'Best','This was my first product bought from this website and it is awesome','2009-01-06 21:57:33',NULL),(39,7,2,'Best Product Ever','No comments for it, great product','2020-02-28 06:08:36',NULL),(39,8,4,'Good','This was my first product bought from this website and it is awesome','2021-11-10 16:40:38',NULL),(39,9,2,'Great Product','No comments for it, great product','1971-10-28 08:41:23',NULL),(39,10,2,'Best Product Ever','No comments for it, great product','1981-07-08 22:41:53',NULL),(40,2,4,'Good','This was my first product bought from this website and it is awesome','2002-09-02 06:20:17',NULL),(40,3,3,'Best Product Ever','No comments for it, great product','2015-12-06 22:38:25',NULL),(40,4,1,'Best','No comments for it, great product','1983-08-26 07:25:10',NULL),(40,5,2,'Best Product Ever','No comments for it, great product','1999-02-15 11:50:10',NULL),(40,6,4,'Best','Good, good','2019-11-29 13:00:48',NULL),(40,7,5,'Best Product Ever','No comments for it, great product','2016-03-25 11:28:04',NULL),(40,8,1,'Best','I recently bought this product and its fantastic','1999-05-04 03:30:15',NULL),(40,9,1,'Good','No comments for it, great product','1993-01-13 02:46:16',NULL),(40,10,2,'Best Product Ever','This was my first product bought from this website and it is awesome','1975-05-11 02:56:01',NULL),(41,2,5,'Great Product','Good, good','2021-06-09 12:35:22',NULL),(41,3,5,'Best Product Ever','No comments for it, great product','1971-05-07 02:35:46',NULL),(41,4,5,'Great Product','I recently bought this product and its fantastic','2022-01-27 08:14:22',NULL),(41,5,4,'Best','I recently bought this product and its fantastic','2016-06-28 18:13:57',NULL),(41,6,5,'Excellent','This was my first product bought from this website and it is awesome','2001-01-20 13:33:33',NULL),(41,7,5,'Best Product Ever','No comments for it, great product','2004-01-29 20:38:43',NULL),(41,8,3,'Excellent','I recently bought this product and its fantastic','1979-05-17 05:25:00',NULL),(41,9,1,'Best Product Ever','Good, good','2009-07-30 04:32:58',NULL),(41,10,2,'Best Product Ever','No comments for it, great product','1975-05-21 14:31:12',NULL),(42,2,1,'Good','Good, good','2007-02-16 23:00:39',NULL),(42,3,2,'Good','I recently bought this product and its fantastic','1988-08-31 11:32:31',NULL),(42,4,4,'Great Product','Good, good','2011-10-02 11:59:06',NULL),(42,5,1,'Excellent','Good, good','1985-02-10 05:13:14',NULL),(42,6,5,'Excellent','This was my first product bought from this website and it is awesome','2018-05-03 19:04:50',NULL),(42,7,3,'Best Product Ever','I recently bought this product and its fantastic','1973-07-22 17:24:56',NULL),(42,8,3,'Excellent','Good, good','2001-03-12 05:08:37',NULL),(42,9,4,'Excellent','I recently bought this product and its fantastic','1995-07-29 10:21:27',NULL),(42,10,3,'Best','No comments for it, great product','1981-07-16 00:02:37',NULL),(43,2,1,'Best Product Ever','I recently bought this product and its fantastic','1975-02-11 23:59:50',NULL),(43,3,5,'Good','I recently bought this product and its fantastic','1992-06-03 14:34:01',NULL),(43,4,2,'Great Product','I recently bought this product and its fantastic','1998-05-10 14:07:13',NULL),(43,5,3,'Good','No comments for it, great product','2011-02-17 21:45:46',NULL),(43,6,4,'Best Product Ever','Good, good','1983-06-23 14:27:59',NULL),(43,7,5,'Best Product Ever','Good, good','1973-07-22 00:51:06',NULL),(43,8,3,'Good','Good, good','2016-04-10 02:06:45',NULL),(43,9,5,'Great Product','I recently bought this product and its fantastic','1974-12-23 16:44:04',NULL),(43,10,2,'Best','This was my first product bought from this website and it is awesome','1981-09-03 14:24:50',NULL),(44,2,5,'Best Product Ever','This was my first product bought from this website and it is awesome','1988-09-05 09:43:09',NULL),(44,3,3,'Good','No comments for it, great product','2020-11-30 03:32:51',NULL),(44,4,4,'Best Product Ever','This was my first product bought from this website and it is awesome','2009-04-27 00:01:42',NULL),(44,5,3,'Good','Good, good','1979-02-26 14:03:46',NULL),(44,6,1,'Best Product Ever','This was my first product bought from this website and it is awesome','1975-07-16 15:44:36',NULL),(44,7,5,'Good','No comments for it, great product','2001-03-29 16:55:30',NULL),(44,8,5,'Good','Good, good','2000-12-26 02:35:08',NULL),(44,9,4,'Best','Good, good','2020-02-19 22:38:31',NULL),(44,10,4,'Great Product','Good, good','1987-03-19 16:39:27',NULL),(45,2,2,'Best Product Ever','No comments for it, great product','1998-09-13 05:26:28',NULL),(45,3,4,'Best Product Ever','This was my first product bought from this website and it is awesome','2020-12-13 05:02:59',NULL),(45,4,3,'Great Product','I recently bought this product and its fantastic','2011-02-23 14:43:09',NULL),(45,5,1,'Best Product Ever','Good, good','1997-07-05 01:31:03',NULL),(45,6,3,'Excellent','Good, good','1981-12-19 10:44:01',NULL),(45,7,4,'Great Product','No comments for it, great product','2011-05-21 01:42:55',NULL),(45,8,2,'Excellent','This was my first product bought from this website and it is awesome','2007-01-01 16:49:14',NULL),(45,9,5,'Great Product','This was my first product bought from this website and it is awesome','2016-11-18 03:26:08',NULL),(45,10,3,'Best','No comments for it, great product','2004-06-11 02:20:16',NULL),(46,2,3,'Excellent','No comments for it, great product','1993-07-29 21:46:37',NULL),(46,3,1,'Excellent','Good, good','2002-04-24 04:03:43',NULL),(46,4,1,'Best','This was my first product bought from this website and it is awesome','1982-09-09 08:48:19',NULL),(46,5,1,'Good','Good, good','2007-08-09 13:03:56',NULL),(46,6,3,'Great Product','No comments for it, great product','1987-06-02 17:57:41',NULL),(46,7,4,'Best Product Ever','No comments for it, great product','1985-04-04 14:18:42',NULL),(46,8,5,'Excellent','No comments for it, great product','1973-11-21 08:14:16',NULL),(46,9,5,'Good','This was my first product bought from this website and it is awesome','1985-09-11 23:46:29',NULL),(46,10,4,'Best','No comments for it, great product','2001-05-05 10:59:31',NULL),(47,2,1,'Excellent','I recently bought this product and its fantastic','1986-01-16 22:19:11',NULL),(47,3,4,'Best','This was my first product bought from this website and it is awesome','1972-07-22 03:51:58',NULL),(47,4,4,'Great Product','Good, good','1991-03-10 06:03:39',NULL),(47,5,1,'Best','No comments for it, great product','2017-04-18 23:08:18',NULL),(47,6,4,'Excellent','I recently bought this product and its fantastic','2005-01-06 09:44:43',NULL),(47,7,5,'Good','This was my first product bought from this website and it is awesome','1984-04-15 11:17:45',NULL),(47,8,5,'Excellent','This was my first product bought from this website and it is awesome','1994-01-17 00:31:09',NULL),(47,9,4,'Good','Good, good','1976-01-26 19:32:44',NULL),(47,10,1,'Good','I recently bought this product and its fantastic','1974-05-02 18:36:23',NULL),(48,2,3,'Excellent','Good, good','1970-10-05 10:14:08',NULL),(48,3,3,'Good','Good, good','2010-10-16 08:08:00',NULL),(48,4,2,'Good','I recently bought this product and its fantastic','1974-10-31 18:24:37',NULL),(48,5,4,'Best','No comments for it, great product','1998-07-22 10:35:25',NULL),(48,6,2,'Best','I recently bought this product and its fantastic','2018-10-16 10:14:58',NULL),(48,7,2,'Good','Good, good','2011-08-12 08:04:04',NULL),(48,8,5,'Best Product Ever','No comments for it, great product','2011-03-17 03:06:07',NULL),(48,9,3,'Best Product Ever','I recently bought this product and its fantastic','2015-07-16 15:59:28',NULL),(48,10,5,'Best','This was my first product bought from this website and it is awesome','1995-05-20 16:36:56',NULL),(49,2,2,'Good','This was my first product bought from this website and it is awesome','1981-03-16 20:09:53',NULL),(49,3,3,'Excellent','No comments for it, great product','1987-07-23 06:52:18',NULL),(49,4,4,'Good','I recently bought this product and its fantastic','2018-10-12 12:50:18',NULL),(49,5,4,'Good','I recently bought this product and its fantastic','2005-09-07 10:56:34',NULL),(49,6,5,'Great Product','No comments for it, great product','2008-02-29 23:24:24',NULL),(49,7,5,'Good','I recently bought this product and its fantastic','1977-07-02 05:10:54',NULL),(49,8,5,'Good','Good, good','2012-12-31 17:11:18',NULL),(49,9,2,'Excellent','I recently bought this product and its fantastic','1976-12-26 15:44:12',NULL),(49,10,1,'Great Product','No comments for it, great product','1989-08-28 13:26:43',NULL),(50,2,1,'Great Product','No comments for it, great product','1995-11-20 13:54:42',NULL),(50,3,4,'Great Product','No comments for it, great product','1983-06-06 23:04:32',NULL),(50,4,2,'Great Product','No comments for it, great product','2009-11-11 05:17:58',NULL),(50,5,4,'Best','Good, good','2002-09-27 23:24:42',NULL),(50,6,2,'Excellent','I recently bought this product and its fantastic','2008-12-26 10:26:56',NULL),(50,7,3,'Best Product Ever','Good, good','1991-08-04 20:55:55',NULL),(50,8,1,'Best','No comments for it, great product','1973-03-13 02:18:21',NULL),(50,9,5,'Best','Good, good','2007-09-14 09:23:42',NULL),(50,10,2,'Best Product Ever','Good, good','1988-06-29 19:58:41',NULL),(51,2,1,'Excellent','I recently bought this product and its fantastic','1973-10-03 01:52:35',NULL),(51,3,5,'Great Product','Good, good','2018-11-15 12:26:26',NULL),(51,4,4,'Great Product','Good, good','1979-08-20 12:21:13',NULL),(51,5,5,'Best Product Ever','No comments for it, great product','1977-07-13 21:29:52',NULL),(51,6,3,'Best','This was my first product bought from this website and it is awesome','2011-05-15 17:29:42',NULL),(51,7,3,'Good','This was my first product bought from this website and it is awesome','1989-09-18 23:10:14',NULL),(51,8,5,'Excellent','Good, good','2008-09-11 07:59:18',NULL),(51,9,4,'Best Product Ever','Good, good','1996-02-27 02:50:11',NULL),(51,10,3,'Great Product','No comments for it, great product','1983-09-02 23:38:33',NULL),(52,2,1,'Great Product','I recently bought this product and its fantastic','1993-06-29 01:30:50',NULL),(52,3,5,'Great Product','I recently bought this product and its fantastic','1992-02-10 03:25:39',NULL),(52,4,1,'Great Product','I recently bought this product and its fantastic','1990-11-16 21:31:57',NULL),(52,5,2,'Best','Good, good','2018-08-24 14:22:12',NULL),(52,6,3,'Good','No comments for it, great product','2020-11-22 04:10:45',NULL),(52,7,1,'Great Product','This was my first product bought from this website and it is awesome','1987-10-03 23:08:45',NULL),(52,8,1,'Excellent','Good, good','1999-07-01 15:17:29',NULL),(52,9,5,'Great Product','I recently bought this product and its fantastic','2001-01-05 05:27:29',NULL),(52,10,4,'Good','No comments for it, great product','1975-08-28 08:37:08',NULL),(53,2,3,'Good','No comments for it, great product','1998-03-01 00:06:28',NULL),(53,3,2,'Excellent','This was my first product bought from this website and it is awesome','2008-12-04 01:28:06',NULL),(53,4,3,'Great Product','No comments for it, great product','1987-10-13 12:30:53',NULL),(53,5,5,'Good','This was my first product bought from this website and it is awesome','2018-04-16 13:29:09',NULL),(53,6,5,'Best Product Ever','No comments for it, great product','1991-01-11 16:40:36',NULL),(53,7,4,'Best','I recently bought this product and its fantastic','1999-04-05 22:52:54',NULL),(53,8,4,'Good','No comments for it, great product','1987-04-08 01:39:41',NULL),(53,9,5,'Best Product Ever','No comments for it, great product','2016-11-19 23:05:09',NULL),(53,10,1,'Best','I recently bought this product and its fantastic','2018-04-07 00:23:44',NULL),(54,2,4,'Good','Good, good','1978-11-14 05:30:07',NULL),(54,3,4,'Good','This was my first product bought from this website and it is awesome','2020-03-07 14:05:11',NULL),(54,4,1,'Good','No comments for it, great product','1995-09-02 17:45:32',NULL),(54,5,5,'Good','I recently bought this product and its fantastic','2001-11-18 19:17:32',NULL),(54,6,4,'Best','Good, good','2017-05-18 21:36:52',NULL),(54,7,5,'Best','This was my first product bought from this website and it is awesome','2015-06-17 05:26:26',NULL),(54,8,2,'Good','This was my first product bought from this website and it is awesome','1983-01-09 07:00:11',NULL),(54,9,1,'Great Product','I recently bought this product and its fantastic','1983-01-20 05:49:02',NULL),(54,10,4,'Excellent','Good, good','2004-02-04 12:07:21',NULL),(55,2,4,'Best','Good, good','1977-07-19 18:14:01',NULL),(55,3,5,'Best Product Ever','I recently bought this product and its fantastic','1982-08-14 10:16:38',NULL),(55,4,3,'Excellent','Good, good','1987-09-22 14:48:04',NULL),(55,5,1,'Great Product','This was my first product bought from this website and it is awesome','1999-04-28 08:26:20',NULL),(55,6,4,'Good','No comments for it, great product','2019-11-11 06:07:45',NULL),(55,7,3,'Good','This was my first product bought from this website and it is awesome','2001-03-28 11:27:01',NULL),(55,8,5,'Excellent','Good, good','1988-05-22 02:16:33',NULL),(55,9,5,'Good','I recently bought this product and its fantastic','2013-09-26 21:08:16',NULL),(55,10,3,'Good','This was my first product bought from this website and it is awesome','2015-06-03 06:23:31',NULL),(56,2,4,'Excellent','This was my first product bought from this website and it is awesome','1979-07-03 18:27:48',NULL),(56,3,1,'Best Product Ever','I recently bought this product and its fantastic','2009-01-27 22:30:45',NULL),(56,4,5,'Best','I recently bought this product and its fantastic','2021-09-30 13:54:07',NULL),(56,5,4,'Best Product Ever','This was my first product bought from this website and it is awesome','1996-07-09 04:58:22',NULL),(56,6,2,'Great Product','Good, good','1990-03-21 09:14:18',NULL),(56,7,3,'Best','I recently bought this product and its fantastic','2015-05-20 23:16:33',NULL),(56,8,1,'Great Product','No comments for it, great product','1974-05-20 12:02:08',NULL),(56,9,2,'Excellent','I recently bought this product and its fantastic','1978-06-15 21:56:24',NULL),(56,10,3,'Best','This was my first product bought from this website and it is awesome','1978-09-02 09:17:36',NULL),(57,2,2,'Good','I recently bought this product and its fantastic','2002-10-23 03:21:52',NULL),(57,3,5,'Good','Good, good','2017-02-24 18:53:00',NULL),(57,4,3,'Best','I recently bought this product and its fantastic','1990-05-18 01:12:02',NULL),(57,5,2,'Excellent','This was my first product bought from this website and it is awesome','2017-10-04 17:35:24',NULL),(57,6,4,'Good','I recently bought this product and its fantastic','2005-04-04 17:49:07',NULL),(57,7,3,'Great Product','Good, good','2010-09-11 13:25:16',NULL),(57,8,3,'Excellent','This was my first product bought from this website and it is awesome','2014-07-26 12:42:17',NULL),(57,9,4,'Excellent','This was my first product bought from this website and it is awesome','1973-11-15 11:12:15',NULL),(57,10,1,'Best','This was my first product bought from this website and it is awesome','1971-03-21 04:29:07',NULL),(58,2,4,'Best','I recently bought this product and its fantastic','1971-08-13 02:56:36',NULL),(58,3,4,'Excellent','I recently bought this product and its fantastic','2008-04-24 21:56:53',NULL),(58,4,3,'Best','I recently bought this product and its fantastic','1974-08-17 03:49:05',NULL),(58,5,3,'Best','No comments for it, great product','1979-01-09 14:25:29',NULL),(58,6,4,'Great Product','No comments for it, great product','2014-09-24 07:04:01',NULL),(58,7,5,'Excellent','Good, good','1988-08-12 13:53:06',NULL),(58,8,2,'Good','Good, good','2005-02-18 00:12:49',NULL),(58,9,1,'Best','Good, good','2011-07-11 13:53:00',NULL),(58,10,5,'Good','No comments for it, great product','2011-12-18 04:43:28',NULL),(59,2,3,'Best','This was my first product bought from this website and it is awesome','2005-11-15 01:31:13',NULL),(59,3,5,'Great Product','No comments for it, great product','1997-05-02 07:51:28',NULL),(59,4,2,'Great Product','I recently bought this product and its fantastic','1972-05-16 03:20:58',NULL),(59,5,5,'Best Product Ever','No comments for it, great product','2009-05-16 16:08:22',NULL),(59,6,5,'Great Product','I recently bought this product and its fantastic','2017-06-02 22:04:27',NULL),(59,7,3,'Excellent','I recently bought this product and its fantastic','2021-08-20 19:04:42',NULL),(59,8,4,'Best','I recently bought this product and its fantastic','2011-11-06 10:34:01',NULL),(59,9,4,'Best','Good, good','1995-02-04 09:07:20',NULL),(59,10,1,'Great Product','This was my first product bought from this website and it is awesome','2004-01-30 01:42:21',NULL),(60,2,5,'Excellent','No comments for it, great product','1999-09-07 23:57:54',NULL),(60,3,4,'Good','This was my first product bought from this website and it is awesome','2003-09-12 23:15:51',NULL),(60,4,2,'Best Product Ever','Good, good','1992-02-13 07:54:03',NULL),(60,5,2,'Great Product','This was my first product bought from this website and it is awesome','1994-02-13 05:27:43',NULL),(60,6,3,'Excellent','I recently bought this product and its fantastic','1995-06-18 20:35:45',NULL),(60,7,2,'Best','This was my first product bought from this website and it is awesome','1994-06-27 19:11:59',NULL),(60,8,2,'Good','I recently bought this product and its fantastic','2000-01-19 17:52:15',NULL),(60,9,1,'Great Product','Good, good','1979-06-22 05:19:28',NULL),(60,10,5,'Best Product Ever','No comments for it, great product','2004-01-25 08:47:28',NULL);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (2,'admin'),(1,'user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sub_categories_categories1_idx` (`category_id`),
  CONSTRAINT `fk_sub_categories_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categories`
--

LOCK TABLES `sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
INSERT INTO `sub_categories` VALUES (1,'Classical guitars',1),(2,'Acoustic guitars',1),(3,'Electric guitars',1),(4,'Bass guitars',1),(5,'Guitar strings',1),(6,'Acoustic pianos',2),(7,'Electric pianos',2),(8,'Arrangers',2),(9,'Synthesizers',2),(10,'Piano equipment and other',2),(11,'Acoustic drums',3),(12,'Electric drums',3),(13,'Percussion drums',3),(14,'Sticks',3),(15,'Other',3),(16,'Amplifiers for acoustic guitar',4),(17,'Amplifiers for electric guitar',4),(18,'Amplifiers for bass guitar',4),(19,'Controllers',5),(20,'Gramophones',5),(21,'Mixers',5),(22,'Effects',5),(23,'Media players',5);
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `first_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  UNIQUE KEY `address_UNIQUE` (`address`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_roles_idx` (`role_id`),
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,2,'Matija','Davidovic','+38163063063','Zdravka Celara 16','matija.davidovic.115.18@ict.edu.rs','32250170a0dca92d53ec9624f336ca24','2022-03-14 16:15:29','2022-03-14 16:15:29'),(2,1,'Guest','Guestovic','+38164064064','Guestinska 14C','guest@gmail.com','fcf41657f02f88137a1bcf068a32c0a3','2022-03-14 16:15:29',NULL),(3,1,'Jeffry','Heidenreich','341-569-4276','Pozeska 24','philip.kovacek@koepp.biz','fcf41657f02f88137a1bcf068a32c0a3','2022-03-14 16:15:29',NULL),(4,1,'Javier','Pagac','+1 (727) 478-0829','Kralja Milana 13/2','lennie59@yahoo.com','fcf41657f02f88137a1bcf068a32c0a3','2022-03-14 16:15:29',NULL),(5,1,'Issac','Bartell','+1 (364) 325-2662','Kralja Petra 74','klocko.verda@gmail.com','fcf41657f02f88137a1bcf068a32c0a3','2022-03-14 16:15:29',NULL),(6,1,'Kendall','Orn','(573) 205-0843','Bulevar Kralja Aleksandra 224','tmante@hotmail.com','fcf41657f02f88137a1bcf068a32c0a3','2022-03-14 16:15:29',NULL),(7,1,'Sandra','Pagac','(947) 348-0151','Bulevar despota Stefana 119','alan.orn@batz.org','fcf41657f02f88137a1bcf068a32c0a3','2022-03-14 16:15:29',NULL),(8,1,'Ezequiel','Schuster','1-330-352-4227','Tjentiste 223C','ohara.nia@heller.com','fcf41657f02f88137a1bcf068a32c0a3','2022-03-14 16:15:29',NULL),(9,1,'Dudley','Lowe','+18659319376','Krunska 28','awest@gmail.com','fcf41657f02f88137a1bcf068a32c0a3','2022-03-14 16:15:29',NULL),(10,1,'Florence','Hammes','1-986-245-6703','Batutova 19B','dejah.hauck@hotmail.com','fcf41657f02f88137a1bcf068a32c0a3','2022-03-14 16:15:29',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `fk_wishlist_users1_idx` (`user_id`),
  KEY `fk_wishlist_products1` (`product_id`),
  CONSTRAINT `fk_wishlist_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `fk_wishlist_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-14 18:16:21
