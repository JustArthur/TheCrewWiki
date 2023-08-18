-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: the_crew_wiki
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `idBrand` bigint NOT NULL AUTO_INCREMENT,
  `nomBrand` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imgBrand` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `anneeBrand` bigint NOT NULL,
  `idCountry` bigint DEFAULT NULL,
  PRIMARY KEY (`idBrand`),
  KEY `brands_FK` (`idCountry`),
  CONSTRAINT `brands_FK` FOREIGN KEY (`idCountry`) REFERENCES `country` (`idCountry`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Abarth','ManufacturerAbarth.webp',1949,1),(2,'Acura','ManufacturerAcura.webp',1986,2),(3,'Aeroboat','ManufacturerAeroboat.webp',0,3),(4,'Alfa Romeo','ManufacturerAlfa_Romeo.webp',1910,1),(5,'Ariel','ManufacturerAriel.webp',1991,3),(6,'Aston Martin','ManufacturerAston_Martin.webp',1913,3),(7,'Audi','ManufacturerAudi.webp',1909,4),(8,'Beechcraft','ManufacturerBeechcraft.webp',1932,5),(9,'Bentley','ManufacturerBentley.webp',1919,3),(10,'BMW','ManufacturerBMW.webp',1916,4),(11,'Bugatti','logo-Bugatti-143105730.png',1909,6),(12,'Cadillac','ManufacturerCadillac.webp',1902,5),(13,'Chevrolet','ManufacturerChevrolet.webp',1911,5),(14,'Chrysler','Chrysler_logo.png',1925,5),(15,'Citroën','ManufacturerCitro n.webp',1919,6),(16,'DCB','ManufacturerDCB.webp',0,5),(17,'Creators','ManufacturerCreators.webp',0,14),(18,'DMC','ManufacturerDMC.webp',1975,5),(19,'Dodge','ManufacturerDodge.webp',1914,5),(20,'Ducati','ManufacturerDucati.webp',1926,1),(21,'Extra Aerobatic Planes','ManufacturerExtra_Aerobatics.webp',1988,4),(22,'Fender','ManufacturerFender.webp',0,5),(23,'Ferrari','ManufacturerFerrari.webp',1947,1),(24,'Ford','ManufacturerFord.webp',1903,5),(25,'Forsberg Racing','ManufacturerForsberg_Racing.webp',0,5),(26,'Frauscher','ManufacturerFrauscher.webp',0,7),(27,'Granville Brothers','ManufacturerGranville.webp',0,5),(28,'Harley-Davidson','ManufacturerHarley-Davidson.webp',1903,5),(29,'Harmon Rocker','ManufacturerHarmon_Rocket.webp',0,5),(30,'Honda','ManufacturerHonda.webp',1948,2),(31,'Hummer','ManufacturerHummer.webp',1992,5),(32,'Ice Marine','ManufacturerICE_Marine.webp',0,3),(33,'Indian','ManufacturerIndian.webp',1901,5),(34,'Infiniti','Infiniti_logo.svg.png',1989,2),(35,'Jaguar','ManufacturerJaguar.webp',1922,3),(36,'Jeep','ManufacturerJeep.webp',1941,5),(37,'Kawasaki','ManufacturerKawasaki.webp',1953,2),(38,'Koenigsegg','ManufacturerKoenigsegg.webp',1994,12),(39,'KTM','ManufacturerKTM.webp',1934,7),(40,'Lamborghini','ManufacturerLamborghini.webp',1963,1),(41,'Lancia','ManufacturerLancia.webp',1906,1),(42,'Lotus','ManufacturerLotus.webp',1952,3),(43,'Land Rover','land-rover-logo-3789246928.png',1948,3),(44,'Maserati','ManufacturerMaserati.webp',1914,1),(45,'Mazda','ManufacturerMazda.webp',1920,2),(46,'McLaren','ManufacturerMcLaren.webp',1989,3),(47,'Mercedes-Benz','ManufacturerMercedes-Benz.webp',1926,4),(48,'Mini','ManufacturerMini.webp',1969,3),(49,'Mitsubishi','ManufacturerMitsubishi.webp',1970,2),(50,'MV Agusta','ManufacturerMV_Agusta.webp',1945,1),(51,'Nissan','ManufacturerNissan.webp',1933,2),(52,'Noble','noble-automotive-logo-28766C8DB9-seeklogo.png',1999,3),(53,'North American','ManufacturerNorth_American.webp',1928,5),(54,'Pagani','ManufacturerPagani.webp',1992,1),(55,'Pilatus','ManufacturerPilatus.webp',1939,11),(56,'Peugeot','ManufacturerPeugeot.webp',1810,6),(57,'Plymouth','ManufacturerPlymouth.webp',1928,5),(58,'Pontiac','ManufacturerPontiac.webp',1925,5),(59,'Porsche','ManufacturerPorsche.webp',1931,4),(60,'Proto','ManufacturerProto.webp',0,14),(61,'RAM','30385-Dodge-RAM-2848928499.png',0,5),(62,'Red Bull','ManufacturerRed_Bull.webp',0,3),(63,'Renault','ManufacturerRenault.webp',1998,6),(64,'RUF','ManufacturerRUF.webp',1939,4),(65,'Saleen','ManufacturerSaleen.webp',1983,5),(66,'Shelby','ManufacturerShelby.webp',0,5),(67,'Slick AirCraft','ManufacturerSlick_Aircraft.webp',0,8),(68,'Spyker','ManufacturerSpyker.webp',1998,9),(69,'Supermarine','ManufacturerSupermarine.webp',1913,3),(70,'Suzuki','ManufacturerSuzuki.webp',1909,2),(71,'TVR','ManufacturerTVR.webp',1947,3),(72,'Vector','none.png',0,3),(73,'Volkswagen','ManufacturerVolkswagenWhite.webp',1937,4),(74,'Waco Aircraft Corp','ManufacturerWACO.webp',0,5),(75,'Xtremeair','xtremeair_logo-46183931.png',2006,4),(76,'Yamaha','ManufacturerYamaha.webp',1955,2),(77,'Zivko','ManufacturerZivko.webp',1993,5);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `idCar` bigint NOT NULL AUTO_INCREMENT,
  `nomCar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `anneeCar` bigint NOT NULL,
  `imgCar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `summitReward` int NOT NULL DEFAULT '0',
  `battlepassReward` int NOT NULL DEFAULT '0',
  `iconReward` bigint DEFAULT '0',
  `buckPrice` bigint DEFAULT '0',
  `crewCreditPrice` bigint DEFAULT '0',
  `idBrand` bigint DEFAULT NULL,
  PRIMARY KEY (`idCar`),
  KEY `cars_FK` (`idBrand`),
  CONSTRAINT `cars_FK` FOREIGN KEY (`idBrand`) REFERENCES `brands` (`idBrand`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'Bugatti Chiron',2017,'TC2BugattiChiron.webp',0,0,0,2485000,355000,11),(2,'Bugatti Chiron Super Sport 300+',2019,'TC2BugattiChironSS300+.webp',0,0,0,1957199,279599,11),(3,'Bugatti Centodieci',2022,'TC2BugattiCentodieci.webp',0,0,0,1793679,256239,11),(4,'Bugatti Chiron Carbon Edition',2017,'TC2BugattiChironCarbon.webp',0,0,1000,0,0,11),(5,'Bugatti Divo',2020,'TC2BugattiDivo.webp',0,0,0,2599100,371300,11),(6,'Bugatti Chiron Interception Unit',2017,'TC2BugattiChironInterceptionUnit.webp',0,1,0,0,0,11),(7,'Bugatti Divo Emerald Storm',2020,'TC2BugattiDivoEmeraldStorm.webp',1,0,0,0,0,11),(8,'Bugatti Divo Magma Edititon',2020,'TC2BugattiDivoMagma.webp',1,0,0,0,0,11),(9,'Bugatti EB110',1991,'TC2BugattiEB110.webp',0,0,0,1342879,191839,11),(10,'Bugatti La Voiture Noire',2021,'TC2BugattiLVN.webp',0,0,0,2233839,319119,11),(11,'Type 57 SC Atlantic',1934,'TC2BugattiType57.webp',0,0,0,671439,95919,11),(12,'Bugatti Veyron 16.4 Grand Sport Vitesse',2005,'TC2BugattiVeyron164GrandSportVitesse.webp',0,0,0,2093000,299000,11),(13,'Bugatti Veyron 16.4 Grand Sport Vitesse Deep Blue Edition',2005,'TC2BugattiVeyron164GrandSportVitesseDeepBlue.webp',1,0,0,0,0,11),(14,'Bugatti Veyron 16.4 Grand Sport Vitesse Edition One',2005,'TC2BugattiVeyron164GrandSportVitesseEditionOne.webp',1,0,0,0,0,11),(15,'Koenigsegg Jesko',2019,'TC2KoenigseggJesko.webp',0,0,0,2675400,382200,38),(16,'Honda S2000 Red Panther Edition',1999,'TC2HondaS2000RedPantherEdition.webp',1,0,0,0,0,30);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `idCountry` bigint NOT NULL AUTO_INCREMENT,
  `nameCountry` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `flagCountry` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`idCountry`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Italie','italia.png'),(2,'Japon','japan.png'),(3,'Royaume-Uni','england.png'),(4,'Allemagne','german.png'),(5,'Etats-Unis','america.png'),(6,'France','french.png'),(7,'Autriche','autriche.png'),(8,'Afrique du Sud','afrique_du_sud.png'),(9,'Pays-bas','pays_bas.png'),(11,'Suisse','suisse.png'),(12,'Suède','suede.png'),(14,'Inconnu','none.png');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `idUser` bigint NOT NULL AUTO_INCREMENT,
  `identifiantUser` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passwordUser` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rangUser` bigint NOT NULL,
  `emailUser` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Kuma','$2y$10$7/JyQAo3TRV0gsP40C9fdO7KDUQysyxATZfvaAOoN3m8l1pd.6ERy',3,''),(2,'Wayz','$2y$10$TxrcngefLdDwOnncG/Cvgeb2uMyfSNiNmOdCgqFhSEVdAza4LAyNq',3,''),(3,'','$2y$10$n/shuRZspFYd.pkkEVb6cOeix3GK1AoD/YjeCOoBPWjoKUb7cdeRO',0,'maxxozou@gmail.com'),(6,'userTest','$2y$10$jpkyOxDtTbvKBQG5Dm3Sm.ePjyLDKpwWhe9XBrO/keGl/X4ff8x9u',0,'test@gmail.com'),(7,'userTest2','$2y$10$49eVXnPZIkjWpkYu41JF.OtIUv6t//VEP.7c1k8JbNQ7AfaPJxqS2',0,'arthur@gmail.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'the_crew_wiki'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-18 21:29:58
