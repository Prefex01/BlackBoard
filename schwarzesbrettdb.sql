-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: schwarzesbrettdb
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `anzeige`
--

DROP TABLE IF EXISTS `anzeige`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anzeige` (
  `idAnzeige` int(11) NOT NULL,
  `Text` longtext,
  `Preis` varchar(45) DEFAULT NULL,
  `Datum` timestamp(6) NULL DEFAULT NULL,
  `Titel` varchar(45) DEFAULT NULL,
  `Inserent_idInserent` int(11) NOT NULL,
  `Rubriken_idRubriken` int(11) NOT NULL,
  PRIMARY KEY (`idAnzeige`,`Inserent_idInserent`,`Rubriken_idRubriken`),
  KEY `fk_Anzeige_Inserent_idx` (`Inserent_idInserent`),
  KEY `fk_Anzeige_Rubriken1_idx` (`Rubriken_idRubriken`),
  CONSTRAINT `fk_Anzeige_Inserent` FOREIGN KEY (`Inserent_idInserent`) REFERENCES `inserent` (`idInserent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Anzeige_Rubriken1` FOREIGN KEY (`Rubriken_idRubriken`) REFERENCES `rubriken` (`idRubriken`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anzeige`
--

LOCK TABLES `anzeige` WRITE;
/*!40000 ALTER TABLE `anzeige` DISABLE KEYS */;
INSERT INTO `anzeige` VALUES (1,'Sehr gute Maschine macht A1 Expresso mit viel Koffien','70','2017-02-02 10:19:59.000000','Expressomaschine',2,1),(2,'Sehr gute Golf nur bissen Haalo Piza gefaren aber sonst alles paletti tip top','4,99','2017-02-02 10:44:44.000000','VW Golf V16i GT',4,4),(3,'1 Gramm zum Preis von 2','20','2017-02-02 10:46:14.000000','Deal des Jahres',3,3),(4,'Meie Lieblingsjacke muss trennen weil schwul','6,50','2017-02-02 10:47:33.000000','Schwule Smilodox Jacke',1,2),(5,'Suche Nachhilfe, am besten in alles. Bitte kostenlos','0','2017-02-02 10:51:02.000000','Nachhilfe',5,3),(6,'Alle Gesmäcker da Traube Minze, Love 66, Ladykiller, Hate 99','15','2017-02-02 10:53:21.000000','Shisha Tabak',6,4),(7,'Maxi Pack Gnoccis 10kg zum Aktionspreis','33','2017-02-02 10:57:29.000000','Maxi Pack Gnoccis',2,4),(8,'Suche sehr kalte Klimaanlage, weil die Almans aus meiner Klasse immer die Fenster zu machen ohne zu fragen','50','2017-02-08 09:00:31.000000','Klimaanlage',2,4),(9,'Suche guten Haarschnitt, bitter nötig','10','2017-02-08 09:11:50.000000','Haarschnitt',5,2),(10,'Gegenstände, Geld, Autos, Tiere','2,50','2017-02-08 09:21:13.000000','Klaue alles und jeden',7,3);
/*!40000 ALTER TABLE `anzeige` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inserent`
--

DROP TABLE IF EXISTS `inserent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inserent` (
  `idInserent` int(11) NOT NULL,
  `Vorname` varchar(45) DEFAULT NULL,
  `Nachname` varchar(45) DEFAULT NULL,
  `Nickname` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idInserent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inserent`
--

LOCK TABLES `inserent` WRITE;
/*!40000 ALTER TABLE `inserent` DISABLE KEYS */;
INSERT INTO `inserent` VALUES (1,'Alexander Simon','Heyer','alex_higher','alex.heyer@ymail.com'),(2,'Christian','Chiarelli','expressoitalia','gnoccifranzösien@web.it'),(3,'Enzo','Cardone','prefex','e.cardone@web.de'),(4,'Alessandro','Napoli','xXDerHackerXx','pizzanapoli@web.it'),(5,'Mieszko','Jackson','childmolester','schuelerdesmonats@jahu.de'),(6,'Marco','Spratte','shishaking187','pfeiferpfeifen@shish.com'),(7,'Kevin','Malik','malikke','schnappundweg@yahoo.pl');
/*!40000 ALTER TABLE `inserent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubriken`
--

DROP TABLE IF EXISTS `rubriken`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubriken` (
  `idRubriken` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRubriken`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubriken`
--

LOCK TABLES `rubriken` WRITE;
/*!40000 ALTER TABLE `rubriken` DISABLE KEYS */;
INSERT INTO `rubriken` VALUES (1,'Elektronik'),(2,'Mode'),(3,'Dienstleistungen'),(4,'Sonstiges');
/*!40000 ALTER TABLE `rubriken` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-08 10:23:54
