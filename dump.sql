-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ecommecs
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_unm` varchar(30) NOT NULL,
  `a_pwd` varchar(30) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nm` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Computers'),(2,'Laptops'),(3,'Desktops & All-in-One'),(4,'Monitors & Displays'),(5,'Keyboards & Mice'),(6,'Cables & Adapters'),(7,'Storage'),(8,' Accessories'),(9,'Networking'),(10,'Bags & Cases');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_fnm` varchar(100) NOT NULL,
  `c_mno` int(11) NOT NULL,
  `c_email` varchar(60) NOT NULL,
  `c_msg` longtext NOT NULL,
  `c_time` varchar(20) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (10,'Kimbugwe  Anthony',782478371,'anthony.kimbugwe@uict.ac.ug','best computer','1554201509'),(14,'mubiru dennis',2147483647,'kimbugweanthony7@gmail.com','hhh','1775677960');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_nm` varchar(50) NOT NULL,
  `b_cat` int(11) NOT NULL,
  `b_desc` longtext NOT NULL,
  `b_price` int(11) NOT NULL,
  `b_img` varchar(50) NOT NULL,
  `b_time` int(11) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (3,'Laptop - Surface Pro',2,'Full HD laptop with 8GB RAM, 256GB SSD. Ideal for work and study.',15000000,'item_img/surface.jpg',1774085338),(4,'Gaming Laptop 17\"',2,'High-performance gaming laptop with dedicated graphics.',4870000,'item_img/Laptop.jpg',1772108413),(5,'Desktop PC - Tower',1,'Processor: Intel Core i7-14700\r\nMemory: 8GB DDR5 RAM\r\nStorage: 512GB NVMe SSD\r\nMonitor: 19.5? Dell Monitor\r\nOperating System: Ubuntu OS\r\nGraphics: Integrated Intel Graphics\r\nUSB Ports: Multiple USB-C and USB-A\r\nDisplay Ports: DisplayPort, HDMI\r\nNetworking: Built-in WiFi and Bluetooth\r\nForm Factor: Compact design\r\nCooling System: Efficient cooling\r\nSecurity Features: TPM 2.0, chassis intrusion',2810000,'item_img/Desktop tower .jpg',1774085365),(6,'All-in-One Desktop 24\"',3,'24\" all-in-one computer with integrated display and webcam.1 headphone/microphone combo\r\n\r\n1 power connector\r\n\r\n1 RJ-45\r\n\r\n2 USB 2.0\r\n\r\n2 USB 3.2 Gen 1\r\n\r\n1 3-in-1 SD card reader',3370000,'item_img/All in one .jpg',1772108075),(7,'24\" LED Monitor',4,'Samsung 24-Inch Monitor LF24T450 – T45F Series – LED monitor Digital TV- 24? – 1920 x 1080 Full HD (1080p) @ 75 Hz – IPS – 250 cd/m² – 1000:1-5 ms – 2xHDMI, DisplayPort – black',1200000,'item_img/TV.jpg',1774085526),(8,'UHD 5K Odyssey Gaming Monitor',4,'Samsung 49 Inch UHD 5K Odyssey Gaming Monitor | 240Hz DQHD Curved | LS49CG954EMXUE',6500000,'item_img/odyss.jpg',1774085559),(9,'Wireless Keyboard & Mouse',5,'Ergonomic wireless keyboard and mouse combo. USB receiver included. Wireless Keyboard and Mouse Combo, RGB Backlit, Rechargeable & Light Up Letters, Full-Size, Soft Typing, Sleep Mode, 2.4GHz Quiet Keyboard Set for Mac, Windows, Laptop, PC, Trueque',170000,'item_img/Wireless key board .jpg',1772179819),(10,'Wireless Mouse',5,'Compact wireless mouse with long battery life. Hp Wireless Bluetooth Mouse, 2.4 GHZ LED Wireless Mouse for Laptop, RGB Dual Mode (Bluetooth 5.2 + USB) Bluetooth PC Mouse with USB-C',95000,'item_img/wireless mouse.jpg',1772179872),(11,'Mechanical Keyboard',5,'RGB mechanical keyboard with programmable keys.',335000,'item_img/keyboard manu.jpg',1772179798),(12,'USB-C Hub 7-in-1',6,'Adapter with HDMI, USB 3.0, SD card reader, and power delivery. USB C Hub 7 in 1 Multiport Adapter, with USB 3.0, USB 2.0 Type-C Data PD Charging Ports for Laptop, PC, Desktop and Other Type C Devices',145000,'item_img/hub.jpg',1772179849),(13,'HDMI Cable 2m',6,'High-speed HDMI cable for 4K video.',45000,'item_img/HDMI cable.jpg',1772614436),(14,'USB Flash Drive 64GB',8,'64GB USB 3.0 flash drive for backup and file transfer.',68000,'item_img/USB 64gb.jpg',1772708286),(15,'External SSD 500GB',8,'Portable external SSD with USB 3.2. Fast backup and storage.',295000,'item_img/SSD.jpg',1774085413),(16,'Laptop Stand',8,'Aluminum laptop stand for better ergonomics and cooling.',130000,'item_img/laptopstand .jpg',1772708553),(17,'Webcam 1080p',8,'Full HD webcam with built-in microphone for video calls.',185000,'item_img/webcam .jpg',1772345494),(18,'USB-C Docking Station',8,'Dock with dual HDMI, USB ports, and Ethernet.',485000,'item_img/docking station .jpg',1772708744),(19,'Wi-Fi Router Dual-Band',9,'AC1200 dual-band router for home and small office.',220000,'item_img/wifi router.jpg',1772461466),(20,'Ethernet Cable 5m',6,'Cat6 Ethernet cable for wired networking.',350000,'item_img/ethernet cable .jpg',1774085268),(21,'Laptop Sleeve 15\"',10,'Padded laptop sleeve with front pocket. TECOOL 13.3 inch Laptop Bag, Notebook Case for MacBook Air/Pro 13, MacBook Pro 14 2021, 13.3 inch Acer Asus Dell HP Samsung Laptop, 13.5 inch Surface Laptop 4/3, Shockproof Protective Cover, Grey',110000,'item_img/laptopsleeves.jpg',1772449058),(22,'Laptop Backpack',10,'Backpack with laptop compartment and USB charging port.',205000,'item_img/bag5.jpg',1774085294);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_name` varchar(30) NOT NULL,
  `o_address` varchar(200) NOT NULL,
  `o_pincode` int(11) NOT NULL,
  `o_city` varchar(30) NOT NULL,
  `o_state` varchar(30) NOT NULL,
  `o_mobile` int(11) NOT NULL,
  `o_rid` int(11) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (39,'Dhaval Makwana','Mahuva',125478,'nuihu','Gujarat',123456789,1);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_fnm` varchar(100) NOT NULL,
  `r_unm` varchar(50) NOT NULL,
  `r_pwd` varchar(30) NOT NULL,
  `r_cno` varchar(15) NOT NULL,
  `r_email` varchar(60) NOT NULL,
  `r_question` varchar(100) NOT NULL,
  `r_answer` varchar(50) NOT NULL,
  `r_nin` varchar(30) NOT NULL DEFAULT '',
  `r_time` varchar(20) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-10  8:52:18
