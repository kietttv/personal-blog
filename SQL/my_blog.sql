-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: my_blog
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cusName` varchar(30) NOT NULL,
  `cusEmail` varchar(30) NOT NULL,
  `commContent` varchar(300) NOT NULL,
  `postID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `postID` (`postID`),
  CONSTRAINT `postID` FOREIGN KEY (`postID`) REFERENCES `post` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'Minh Thai','abc@gamil.com','hehe',1),(2,'Truong Van Tuan Kiet','tkiet@gmail.com','lorem',5),(3,'something','tkiet@gmail.com','abc',5),(4,'Minh Thai','mthai@gmailcom','rß║Ñt bß╗ò x',5),(5,'hacker','panh@gamil.com','heheehehehehehehehe',5),(6,'do mixi','dochet1989@gmail.com','gh├¬ :))',1),(7,'Truong Van Tuan Kiet','panh@gamil.com','hi hi',1),(8,'xemexis','xmx@gmail.com','good job em!',6);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cusName` varchar(30) NOT NULL,
  `cusEmail` varchar(20) NOT NULL,
  `cusSubject` varchar(30) NOT NULL,
  `messContent` varchar(1000) NOT NULL,
  `messTo` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `messTo` (`messTo`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`messTo`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (10,'Minh Thai','mthai@gamil.com','IT-Student','Good job bro!!!',1),(11,'Dang Khoi','dkhoi@gmail.com','','Nice website!!!',1),(12,'Huu Duy','hduy@gmail.com','IT-Student','L├ám bß║ín th├┤i cß║¡u nh├⌐. Lß╗¢n rß╗ôi.. T├¼nh y├¬u phß║úi cß║ºn thß╗¥i gian v├á sß╗▒ cß╗æ gß║»ng cß╗ºa cß║ú 2 mß╗¢i c├│ thß╗â h├¼nh th├ánh ─æ╞░╞íc. Kh├┤ng phß║úi nh╞░ trß║╗ con nß╗»a m├á cß╗⌐ d─âm ba c├óu l├á y├¬u ─æ╞░ß╗úc... Lß╗¢n rß╗ôi. C├│ y├¬u bß║ín th├¼ 2 ng╞░ß╗¥i c┼⌐ng phß║úi biß║┐t v├¼ nhau nh├⌐. Cß╗æ gß║»ng cho cß║ú 2 nh╞░ vß║¡y mß╗¢i b├¬n l├óu ─æ╞░ß╗úc. C├▓n kh├┤ng nhanh rß║ín nß╗⌐t lß║»m. M├á c├│ y├¬u th├¼ c┼⌐ng ─æß╗½ng bß╗Å b├¬ hß╗ìc h├ánh nh├⌐... Hß╗ìc h├ánh b├óy giß╗¥ quan trß╗ìng lß║»m, hß╗ìc ─æß╗â kiß║┐m c├íi nghß╗ü cho m├¼nh. Kiß║┐m ─æ╞░ß╗úc v├ái ─æß╗ông cho c├íi gia ─æ├¼nh nhß╗Å b├⌐ sau n├áy.. Vß║¡y l├á ─æ╞░ß╗úc rß╗ôi. Bß╗æ mß║╣ bß║ín b├¿ ─æß╗üu tin cß║¡u. Vß║¡y n├¬n h├úy cß╗æ gß║»ng l├¬n nh├⌐. Y├¬u mß╗Öt ng╞░ß╗¥i l├óu c├▓n h╞ín l├á l├óu l├óu y├¬u nhiß╗üu ng╞░ß╗¥i.. Vß║¡y nh├⌐.. Cß╗æ l├¬nnnnnnnn',1),(13,'Unknown ','',':))','Tell me how you making this web.',1);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `date` date NOT NULL,
  `thumbnail` varchar(30) NOT NULL,
  `content` mediumtext NOT NULL,
  `title` varchar(300) NOT NULL,
  `smallDescription` varchar(300) NOT NULL,
  `imgDetail` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uID` (`userID`),
  CONSTRAINT `uID` FOREIGN KEY (`userID`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,1,'2022-04-29','detail.jpg','<h6>Introduction</h6>\r\n<p>The Internet is an increasingly important part of everyday life for people around the world. But if you\'ve never used the Internet before, all of this new information might feel a bit confusing at first.</p>\r\n<p>Throughout this tutorial, we\'ll try to answer some basic questions you may have about the Internet and how it\'s used. When you\'re done, you\'ll have a good understanding of how the Internet works, how to connect to the Internet, and how to browse the Web.</p>\r\n<h6>What is the Internet?</h6>\r\n<p>The Internet is a global network of billions of computers and other electronic devices. With the Internet, it\'s possible to access almost any information, communicate with anyone else in the world, and do much more.</p>\r\n<p>You can do all of this by connecting a computer to the Internet, which is also called going online. When someone says a computer is online, it\'s just another way of saying it\'s connected to the Internet.</p>\r\n<h6>How does the Internet work?</h6>\r\n<p>At this point you may be wondering, how does the Internet work? The exact answer is pretty complicated and would take a while to explain. Instead, let\'s look at some of the most important things you should know.</p>\r\n<p>It\'s important to realize that the Internet is a global network of physical cables, which can include copper telephone wires, TV cables, and fiber optic cables. Even wireless connections like Wi-Fi and 3G/4G rely on these physical cables to access the Internet.</p>\r\n<p>When you visit a website, your computer sends a request over these wires to a server. A server is where websites are stored, and it works a lot like your computer\'s hard drive. Once the request arrives, the server retrieves the website and sends the correct data back to your computer. What\'s amazing is that this all happens in just a few seconds!</p>\r\n<p>┬⌐1998-2022 Goodwill Community Foundation, Inc. All rights reserved.</p>\r\n<p>Available at: https://edu.gcfglobal.org/en/internetbasics/what-is-the-internet/1/</p>\r\n','Internet','','carousel-1.jpg'),(5,1,'2022-09-20','What-is-SQL-1.jpg','<p>According to (SQLCourse, 2022), SQL (pronounced ΓÇ£ess-que-elΓÇ¥) stands for Structured Query Language. SQL is used to communicate with a database. According to ANSI (American National Standards Institute), it is the standard language for relational database management systems. SQL statements are used to perform tasks such as update data on a database, or retrieve data from a database. Some common relational database management systems that use SQL are: Oracle, Sybase, Microsoft SQL Server, Access, Ingres, etc.</p>\r\n<p>Although most database systems use SQL, most of them also have their own additional proprietary extensions that are usually only used on their system. However, the standard SQL commands such as ΓÇ£SelectΓÇ¥, ΓÇ£InsertΓÇ¥, ΓÇ£UpdateΓÇ¥, ΓÇ£DeleteΓÇ¥, ΓÇ£CreateΓÇ¥, and ΓÇ£DropΓÇ¥ can be used to accomplish almost everything that one needs to do with a database. This tutorial will provide you with the instruction on the basics of each of these commands as well as allow you to put them to practice using the SQL Interpreter.</p>\r\n<h5>References</h5>\r\n<p>SQLCourse, 2022. [Online]</p>\r\n<p>Available at: sqlcourse.com/beginner-course/what-is-sql/</p>','WHAT IS SQL?','','whatissql.jpg'),(6,1,'2022-09-21','SDLC-e1594845465311.png','<h5>What is the software development life cycle?</h5>\r\n<p>SDLC or the Software Development Life Cycle is a process that produces software with the highest quality and lowest cost in the shortest time possible. SDLC provides a well-structured flow of phases that help an organization to quickly produce high-quality software which is well-tested and ready for production use.</p>\r\n<p>The SDLC involves six phases as explained in the introduction. Popular SDLC models include the waterfall model, spiral model, and Agile model.</p>\r\n<h5>How the SDLC Works</h5>\r\n<p>SDLC works by lowering the cost of software development while simultaneously improving quality and shortening production time. SDLC achieves these apparently divergent goals by following a plan that removes the typical pitfalls of software development projects. That plan starts by evaluating existing systems for deficiencies.</p>\r\n<p>Next, it defines the requirements of the new system. It then creates the software through the stages of analysis, planning, design, development, testing, and deployment. By anticipating costly mistakes like failing to ask the end-user or client for feedback, SLDC can eliminate redundant rework and after-the-fact fixes.</p>\r\n<p>ItΓÇÖs also important to know that there is a strong focus on the testing phase. As the SDLC is a repetitive methodology, you have to ensure code quality at every cycle. Many organizations tend to spend few efforts on testing while a stronger focus on testing can save them a lot of rework, time, and money. Be smart and write the right types of tests.</p>\r\n<p>┬⌐ 2022 Stackify</p>\r\n<p>Available at: https://stackify.com/what-is-sdlc/</p>','What Is SDLC? ','','SDLC-HS2020.png');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `avata` varchar(50) NOT NULL,
  `bio` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','1','Goku','goku.jpg','Code is my life','Kame Island','0359690081','tvtkiet2002@gmail.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-23  7:48:06
