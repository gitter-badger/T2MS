USE `t2ms`;


--
-- Dumping data for table `customer`
--

INSERT INTO `customer` VALUES 
(1,'Madawa Soysa',773145877,0,40,NULL),
(2,'Prabushi Samarakoon',771459902,0,35,NULL),
(3,'Sachini Herath',716801909,0,36,NULL),
(4,'Sachith Senevirathne',718442940,0,42,NULL),
(5,'Sajith Wijesuriya',713419902,0,38,NULL),
(6,'Samith Sirimanna',713380245,0,37,NULL),
(7,'Akila Udage',715789594,0,33,NULL),
(8,'Ashan Fernando',713879187,0,36,NULL),
(9,'Buddhika Kulasuriya',715117536,0,35,NULL),
(10,'Chamindri Abeysekara',754209127,0,37,NULL),
(11,'Nuwan Chandirathne',777630382,0,34,NULL),
(12,'Charith Udugama',777754822,0,40,NULL),
(13,'Chaya Lekamwasam',717097120,0,38,NULL),
(14,'Praneeth Rathnayake',717414208,0,36,NULL),
(15,'Dakila Serasinghe',717260366,0,39,NULL),
(16,'Danushi Liyanage',713868001,0,36,NULL),
(17,'Faheem Jalaldeen',773407413,0,36,NULL),
(18,'Bhanuka Weerasinghe',714655034,0,35,NULL),
(19,'Madhushika De Silva',784606232,0,39,NULL),
(20,'Harini Hapuaracchchi',779432484,0,38,NULL);

--
-- Dumping data for table `locality`
--

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


--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `address`, `contact`, `password`, `deleted`) VALUES
(2, 'Madhawi De Mel', '234, Kaduwela Road, Kotte', 775233179, 'a5618a6e4db7f6aee5ac0d4728c3a17e45d8fe47', NULL),
(1, 'Isuru Fernando', '87, Jubilee Road, Katubedda, Moratuwa', 715465178, '47df6cafd3b4bed4c7bba9d00d0cf0fc680a9921', NULL),
(3, 'Sabra Ossen', 'Near Ananda College, Maradana', 775837356, 'de2e0e7e68532d937cf480a76d1e0e5df0d200f5', NULL),
(4, 'Rajith Vidanaarachchi', '134/1, ABC Road, Pelawatta', 712345678, '4f9ce5af3646c34913399d8412be366854108c8c', NULL),
(5, 'Ridwan Shariffdeen', '71, Galle Road, Mount Lavinia', 754987654, 'fa19b49f8732d1d9b232984d1951e04e81435e2d', NULL),
(6, 'Supun Amarasinghe', '67, BCC Road, Kottawa', 775837357, 'a36a12601734b2182164b7f84fdd1b8fca7fc1ae', NULL),
(7, 'Dilhasha Nazeer', '123, Kotta Road, Borella', 778449321, 'f6e223153f056bf944856e90620cf2e3a5d449a5', NULL),
(8, 'Sarith Samarajeewa', '12, Raja Mawatha, Ratmalana', 71555444, 'eef60a0950eee6e19d0a40997d8c66f878f72c7a', NULL),
(9, 'Vipula Dissanayake', '56, Samanpaya, Maho', 716320074, '8494060283424dd5f83b140dd2f66056a4e10890', NULL),
(10, 'Shenal Senarath', '67, Puttalam Road, Negombo', 715779682, '5d9b06fd85dea257281b7510cf63a1ee2b601fbf', NULL);
--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` VALUES
(1,'Kasun Fernando',712169268,'AAC 9811',35,2,NULL),
(2,'Sanka Rasnayaka',718419260,'ABA 9873',40,2,NULL),
(3,'Stephania Posso',617889083,'HH 6755',32,2,NULL),
(4,'Kalhara Amarasinghe',785123456,'LV 7788',34,3,NULL),
(5,'Farazath Ahamed',777603866,'YC 3124',37,3,NULL),
(6,'Yasith Vidanarachchi',122445667,'LH 9900',34,4,NULL),
(7,'Malaka G L',728889991,'YA 8012',36,4,NULL),
(8,'AY Dissanayake',789966771,'HG 5656',33,5,NULL),
(9,'Yasiru Kassapa',712176268,'UP 6745',38,5,NULL),
(10,'Nazick Ahamed',723457691,'KK 6655',38,5,NULL),
(11,'Kalhari Ossen',775655655,'HH 8989',39,6,NULL),
(12,'Mohommed Hajara',773355440,'JE 1230',34,7,NULL),
(13,'Srishiyamalan Ratnavel',715678901,'ACA 1456',35,7,NULL),
(14,'Kalpana Panditha',776890432,'ABC 5666',34,8,NULL),
(15,'Miyuru Dias',774123956,'HC 1144',36,8,NULL),
(16,'Dewmal Siniatus',711328260,'AAB 7601',32,10,NULL),
(17,'Dehan D Croos',723456778,'YQ 4090',35,10,NULL),
(18,'Pasan Madushanka',717767778,'KL 0389',35,10,NULL),
(19,'D H Karunathilake',712345668,'AAG 8911',34,10,NULL),
(20,'Asanka Illyapparachchi',712345889,'AAA 9999',36,10,NULL),
(21,'Onila Fonseka',715567889,'ABC 2309',35,2,NULL),
(22,'A Perera',723456742,'TLM 6767',35,2,NULL),
(23,'Sachintha Gamlath',716678091,'AG 5511',36,9,NULL),
(24,'D Gunawardena',776889502,'YY 8888',34,9,NULL),
(25,'S P Dissanayake',718884017,'HF 6710',35,9,NULL);
--
-- Dumping data for table `tags`
--

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

--
-- Dumping data for table `tuksessions`
--

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

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`,`time`,`fare`,`status`,`startLocation`,`endLocation`,`vehicleID`,`customerID`) VALUES
(1,'2014-03-22 19:52:00',233,2,1,12,1,1),
(2,'2014-03-22 19:52:00',112,2,2,1,2,6),
(18,'2014-03-22 19:53:00',1200,2,2,3,3,12),
(4,'2014-03-21 19:53:00',70,2,1,1,1,3),
(19,'2014-03-21 19:54:00',350,2,3,11,22,7),
(20,'2014-03-23 19:55:00',400,2,5,5,2,8),
(21,'2014-03-23 19:55:00',120,2,1,10,1,7),
(22,'2014-03-23 19:56:00',600,2,6,8,3,13),
(9,'2014-03-23 19:56:00',134,2,6,10,3,12),
(10,'2014-03-20 19:57:00',78,2,9,10,3,17),
(11,'2014-03-19 19:57:00',1431,2,9,12,22,20),
(12,'2014-03-18 19:58:00',233,2,3,4,3,15),
(13,'2014-03-17 19:59:00',567,2,2,7,2,19),
(14,'2014-03-13 19:59:00',455,2,4,12,1,5),
(16,'2014-03-06 20:00:00',712,2,9,11,1,16),
(17,'2014-02-22 20:28:00',1000,2,12,3,1,10);