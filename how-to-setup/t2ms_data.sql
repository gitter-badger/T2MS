USE `t2ms`;


--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES 
(1,'Madawa Soysa',773145877,0,40),
(2,'Prabushi Samarakoon',771459902,0,35),
(3,'Sachini Herath',716801909,0,36),
(4,'Sachith Senevirathne',718442940,0,42),
(5,'Sajith Wijesuriya',713419902,0,38),
(6,'Samith Sirimanna',713380245,0,37),
(7,'Akila Udage',715789594,0,33),
(8,'Ashan Fernando',713879187,0,36),
(9,'Buddhika Kulasuriya',715117536,0,35),
(10,'Chamindri Abeysekara',754209127,0,37),
(11,'Nuwan Chandirathne',777630382,0,34),
(12,'Charith Udugama',777754822,0,40),
(13,'Chaya Lekamwasam',717097120,0,38),
(14,'Praneeth Rathnayake',717414208,0,36),
(15,'Dakila Serasinghe',717260366,0,39),
(16,'Danushi Liyanage',713868001,0,36),
(17,'Faheem Jalaldeen',773407413,0,36),
(18,'Bhanuka Weerasinghe',714655034,0,35),
(19,'Madhushika De Silva',784606232,0,39),
(20,'Harini Hapuaracchchi',779432484,0,38);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `locality`
--

LOCK TABLES `locality` WRITE;
/*!40000 ALTER TABLE `locality` DISABLE KEYS */;
INSERT INTO `locality` VALUES 
(1,'Moratuwa'),
(2,'Panadura'),
(3,'Fort'),
(4,'Pettah'),
(5,'Kandy'),
(6,'Mount Lavinia'),
(7,'Piliyandala'),
(8,'Boralesgamuwa'),
(9,'Ratmalana'),
(10,'Angulana'),
(11,'Maradana'),
(12,'Kottawa');
/*!40000 ALTER TABLE `locality` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Dumping data for table `owners`
--

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;
INSERT INTO `owners` VALUES 
(1,'Madhawi De Mel','234, Kaduwela Road, Kotte',775233179,'madhawid'),
(2,'Isuru Fernando','87, Jubilee Road, Katubedda, Moratuwa',715465178,'isuruf'),
(3,'Sabra Ossen','Near Ananda College, Maradana',775837356,'sabrao'),
(4,'Rajith Vidanarachchi','134/1, ABC Road, Pelawatta',712345678,'rajithv'),
(5,'Ridwan Sheriffdeen','71, Galle Road, Mount Lavinia',754987654,'ridwans'),
(6,'Supun Amarasinghe','67, BCC Road, Kottawa',775837357,'supuna'),
(7,'Dilhasha Nazeer','123, Kotta Road, Borella',778449321,'dilhashan'),
(8,'Sarith Samarajeewa','12, Raja Mawatha, Ratmalana',71555444,'sariths'),
(9,'Vipula Dissanayake','56, Samanpaya, Maho',716320074,'vipulad'),
(10,'Shenal Senarath','67, Puttalam Road, Negombo',715779682,'shenals');
/*!40000 ALTER TABLE `owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES 
(1,'Moratuwa'),
(2,'Panadura'),
(2,'Panadure'),
(3,'Fort'),
(3,'Kotuwa'),
(4,'Pettah'),
(4,'Pitakotuwa'),
(5,'Kandy'),
(5,'Mahanuwara'),
(5,'Nuwara'),
(6,'Galkissa'),
(6,'Mount Lavinia'),
(6,'Mt lavinia'),
(6,'Mt. lavinia'),
(7,'Piliyandala'),
(8,'Boralasgamuwa'),
(8,'Boralesgamuwa'),
(9,'Rathmalana'),
(9,'Ratmalana'),
(10,'Agulana'),
(10,'Angulana'),
(11,'Maradana'),
(12,'Kottawa');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tuksessions`
--

LOCK TABLES `tuksessions` WRITE;
/*!40000 ALTER TABLE `tuksessions` DISABLE KEYS */;
INSERT INTO `tuksessions` VALUES 
(1,1,'2014-03-13 02:33:00','2014-03-13 06:49:00'),
(1,1,'2014-03-13 07:40:00','2014-03-13 16:35:00'),
(2,5,'2014-03-12 23:36:00','2014-03-13 04:36:00'),
(2,5,'2014-03-13 05:00:00','2014-03-13 07:44:00'),
(2,5,'2014-03-13 08:30:00','2014-03-13 16:24:00'),
(3,1,'2014-03-12 23:37:00','2014-03-13 11:22:00'),
(4,11,'2014-03-12 23:30:00','2014-03-13 05:38:00'),
(4,12,'2014-03-13 08:31:00','2014-03-13 17:40:00'),
(5,1,'2014-03-13 02:10:00','2014-03-13 05:57:00'),
(5,10,'2014-03-13 06:15:00','2014-03-13 11:45:00'),
(5,1,'2014-03-13 12:30:00','2014-03-13 18:40:00'),
(6,2,'2014-03-12 23:47:00','2014-03-13 06:47:00'),
(6,2,'2014-03-13 07:48:00','2014-03-13 17:48:00'),
(7,3,'2014-03-12 21:36:00','2014-03-13 00:09:00'),
(7,3,'2014-03-13 04:40:00','2014-03-13 07:42:00'),
(7,3,'2014-03-13 08:38:00','2014-03-13 16:50:00'),
(8,6,'2014-03-12 22:39:00','2014-03-13 04:51:00'),
(8,6,'2014-03-13 05:40:00','2014-03-13 14:52:00'),
(8,6,'2014-03-13 15:05:00','2014-03-13 18:29:00');
/*!40000 ALTER TABLE `tuksessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES 
(1,'Kasun Fernando',712169268,'AAC 9811',35,2),
(2,'Sanka Rasnayaka',718419260,'ABA 9873',40,2),
(3,'Stephania Posso',617889083,'HH 6755',32,2),
(4,'Kalhara Amarasinghe',785123456,'LV 7788',34,3),
(5,'Farazath Ahamed',777603866,'YC 3124',37,3),
(6,'Yasith Vidanarachchi',122445667,'LH 9900',34,4),
(7,'Malaka G L',728889991,'YA 8012',36,4),
(8,'AY Dissanayake',789966771,'HG 5656',33,5),
(9,'Yasiru Kassapa',712176268,'UP 6745',38,5),
(10,'Nazick Ahamed',723457691,'KK 6655',38,5),
(11,'Kalhari Ossen',775655655,'HH 8989',39,6),
(12,'Mohommed Hajara',773355440,'JE 1230',34,7),
(13,'Srishiyamalan Ratnavel',715678901,'ACA 1456',35,7),
(14,'Kalpana Panditha',776890432,'ABC 5666',34,8),
(15,'Miyuru Dias',774123956,'HC 1144',36,8),
(16,'Dewmal Siniatus',711328260,'AAB 7601',32,10),
(17,'Dehan D Croos',723456778,'YQ 4090',35,10),
(18,'Pasan Madushanka',717767778,'KL 0389',35,10),
(19,'D H Karunathilake',712345668,'AAG 8911',34,10),
(20,'Asanka Illyapparachchi',712345889,'AAA 9999',36,10),
(21,'Onila Fonseka',715567889,'ABC 2309',35,2),
(22,'A Perera',723456742,'TLM 6767',35,2),
(23,'Sachintha Gamlath',716678091,'AG 5511',36,9),
(24,'D Gunawardena',776889502,'YY 8888',34,9),
(25,'S P Dissanayake',718884017,'HF 6710',35,9);
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-14 21:21:53
