--
-- Table structure for table `arrivals`
--

DROP TABLE IF EXISTS `arrivals`;
CREATE TABLE IF NOT EXISTS `arrivals` (
  `array_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `ar_date` datetime NOT NULL,
  `ar_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ar_city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ar_line` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ar_trip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dep_date` datetime NOT NULL,
  `dep_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dep_line` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dep_trip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY (`array_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `arrivals`
--

INSERT INTO `arrivals` (`array_id`, `email`, `ar_date`, `ar_type`, `ar_city`, `ar_line`, `ar_trip`, `dep_date`, `dep_type`, `dep_line`, `dep_trip`, `registration_date`) VALUES
(1, 'kcr92@hotmail.com', '2014-07-09 08:00:00', 'Avion', 'Mexico', 'aeromexico', 'AM2410', '2014-07-16 19:30:00', 'Avion', 'aeromexico', 'AM258', '2014-05-23 15:45:01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `arrivals_v`
--
DROP VIEW IF EXISTS `arrivals_v`;
CREATE TABLE IF NOT EXISTS `arrivals_v` (
`array_id` mediumint(8) unsigned
,`first_name` varchar(20)
,`last_name` varchar(40)
,`community` varchar(40)
,`ar_date` datetime
,`ar_type` varchar(20)
,`ar_city` varchar(20)
,`ar_line` varchar(20)
,`ar_trip` varchar(20)
,`dep_date` datetime
,`dep_type` varchar(20)
,`dep_line` varchar(20)
,`dep_trip` varchar(20)
,`registration_date` datetime
);
-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

DROP TABLE IF EXISTS `attendees`;
CREATE TABLE IF NOT EXISTS `attendees` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `celphone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `shirt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `community` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `epej` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `cfmcu` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `blood` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `emergency` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `medicare` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `med_num` mediumint(20) NOT NULL,
  `comment` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`user_id`, `first_name`, `last_name`, `age`, `gender`, `celphone`, `email`, `shirt`, `community`, `epej`, `cfmcu`, `blood`, `emergency`, `phone`, `medicare`, `med_num`, `comment`, `registration_date`) VALUES
(1, 'Gustavo Antonio', 'Grajales Gonzalez', '27', 'Masculino', '8331408606', 'Grajalesmx@me.com', 'Hombre - M', 'Sagrada Familia - Tampico, Tamps', 'True', 'True', 'O+', 'Sarahi Garcia', '8331401135', '', 0, 'Ninguno', '2014-05-01 21:18:28'),
(2, 'Michell Emmanuel', 'Avila Tobias', '24', 'Masculino', '8331174630', 'avila.michell@gmail.com', 'Hombre - C', 'Sagrada Familia - Tampico, Tamps', 'True', '', 'O+', 'Sabina Tobias Perez', '8331188410', 'IMSS', 8388607, 'Ninguno', '2014-05-01 22:35:17'),
(3, 'Miguel Angel', 'Barrientos Cervantes', '21', 'Masculino', '8332842306', 'Miguel.barrientos.cervantes@gmail.com', 'Hombre - G', 'Sagrada Familia - Tampico, Tamps', 'True', 'True', 'O+', 'Ariel Giraldo Martinez', '8332727817', 'No Tengo', 0, 'Ninguna', '2014-05-12 23:56:02'),
(4, 'Luis Angel', 'Esquivel Figueroa', '18', 'Masculino', '8331344145', 'toco_098@hotmail.com', 'Hombre - M', 'Sagrada Familia - Tampico, Tamps', 'True', '', 'O+', 'ana lilia figueroa', '8332052545', 'Pemex', 0, '', '2014-05-14 01:21:01'),
(5, 'samuel de jesus', 'barragan martinez', '20', 'Masculino', '8332027504', 'samuel.barragan@iest.edu.mx', 'Hombre - M', 'Sagrada Familia - Tampico, Tamps', 'True', '', 'A+', '8332995691', '2133188', 'cemain', 0, '', '2014-05-17 19:24:23'),
(6, 'Carlos Alejandro', 'Fis Jimenez', '23', 'Masculino', '8332477213', 'alex_zero14x@hotmail.com', 'Hombre - E', 'Sagrada Familia - Tampico, Tamps', 'True', '', 'A+', 'Mi mama: Maria Guadalupe Jimenez Meza', '8331043303', 'imss', 0, '', '2014-05-22 00:35:34'),
(7, 'janet amairani', 'mar aran', '19', 'Femenino', '8332675798', 'nanii_mar@hotmail.com', 'Mujer - Ch', 'Sagrada Familia - Tampico, Tamps', 'True', '', 'A+', 'Ana Maria aran castro', '8332022620', 'IMSS', 0, '', '2014-05-22 19:33:00'),
(8, 'Katya', 'Corrales Rodarte', '22', 'Femenino', '686 215 23', 'kcr92@hotmail.com', 'Mujer - Ch', 'Verbum Dei - Mexicali, BC', 'True', '', 'A+', 'Eliseo Corrales Andrade', '6869466277', 'IMSS', 8388607, 'ninguna', '2014-05-23 05:42:35'),
(9, 'Ana Cecilia', 'Eliard Saldaña', '21', 'Femenino', '8332189194', 'anaeliard@hotmail.com', 'Mujer - 2X', 'Sagrada Familia - Tampico, Tamps', 'True', '', 'A+', 'Mauricio Eliard', '8332187692', '', 0, 'Soy alergica a la lactosa', '2014-05-23 05:57:19'),
(10, 'Edgar Alejandro', 'Gutierrez Lopez', '22', 'Masculino', '8331553829', 'doko_ae13@hotmail.com', 'Hombre - M', 'Sagrada Familia - Tampico, Tamps', 'True', '', 'A+', 'A mis Papas|', '8462660703', '', 0, '', '2014-05-23 06:10:47'),
(11, 'Mario Alonso', 'Pesqueira Sanchez', '20', 'Masculino', '6862880654', 'mariopesqueira14@hotmail.com', 'Hombre - M', 'Verbum Dei - Mexicali, BC', 'True', '', 'A+', 'Mayo Pesqueira', '7602356446', 'no tengo', 0, 'no tengo', '2014-05-23 19:10:14'),
(12, 'Luis Daniel', 'Valenciana Alzúa', '21', 'Masculino', '6861192432', 'luis.valenciana5@hotmail.com', 'Hombre - M', 'Verbum Dei - Mexicali, BC', 'True', '', 'A+', 'María Luisa Alzúa Torres', '6861578071', 'IMSS', 8388607, '', '2014-05-23 19:27:10'),
(13, 'Eduardo', 'Vaca Carballo', '19', 'Masculino', '6861455356', 'eduardo.vaka@hotmail.com', 'Hombre - M', 'Verbum Dei - Mexicali, BC', 'True', '', 'A+', 'Eduardo Vaca', '6862479325', 'IMSS', 8388607, '', '2014-05-24 03:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `payment` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `ticket` mediumint(20) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `file` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `email`, `payment`, `ticket`, `amount`, `file`, `registration_date`) VALUES
(1, 'kcr92@hotmail.com', '1', 271631, '600.00', '271631.jpg', '2014-05-23 05:51:58'),
(5, 'anaeliard@hotmail.com', '1', 9, '300.00', '000009.jpg', '2014-05-23 23:26:16');

-- --------------------------------------------------------

--
-- Stand-in structure for view `payments_v`
--
DROP VIEW IF EXISTS `payments_v`;
CREATE TABLE IF NOT EXISTS `payments_v` (
`payment_id` mediumint(8) unsigned
,`first_name` varchar(20)
,`last_name` varchar(40)
,`community` varchar(40)
,`payment` varchar(1)
,`ticket` mediumint(20)
,`file` varchar(20)
,`registration_date` datetime
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `pending_v`
--
DROP VIEW IF EXISTS `pending_v`;
CREATE TABLE IF NOT EXISTS `pending_v` (
`user_id` mediumint(8) unsigned
,`first_name` varchar(20)
,`last_name` varchar(40)
,`celphone` varchar(10)
,`email` varchar(60)
,`community` varchar(40)
,`registration_date` datetime
);
-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pass` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `registration_date`) VALUES
(1, 'Staff', 'EPEJ Tampico', 'email@epejtampico2014.com', '0974e9441e104579da6056f5812438b8008b086a', '2014-05-01 06:08:27'),
(2, 'Gustavo', 'Grajales', 'Grajalesmx@me.com', '80692fac5386f84aa0a14811bb58afe70ca352b9', '2014-05-02 20:52:54'),
(3, 'Sarahi', 'Garcia', 'Sarahi.Garcia05@gmail.com', '948237442903f809320b034db195f5df9b281f28', '2014-05-02 20:55:26');

-- --------------------------------------------------------

--
-- Structure for view `arrivals_v`
--
DROP TABLE IF EXISTS `arrivals_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u548011243_epej`@`localhost` SQL SECURITY DEFINER VIEW `arrivals_v` AS select `arrivals`.`array_id` AS `array_id`,`attendees`.`first_name` AS `first_name`,`attendees`.`last_name` AS `last_name`,`attendees`.`community` AS `community`,`arrivals`.`ar_date` AS `ar_date`,`arrivals`.`ar_type` AS `ar_type`,`arrivals`.`ar_city` AS `ar_city`,`arrivals`.`ar_line` AS `ar_line`,`arrivals`.`ar_trip` AS `ar_trip`,`arrivals`.`dep_date` AS `dep_date`,`arrivals`.`dep_type` AS `dep_type`,`arrivals`.`dep_line` AS `dep_line`,`arrivals`.`dep_trip` AS `dep_trip`,`arrivals`.`registration_date` AS `registration_date` from (`attendees` join `arrivals`) where (`arrivals`.`email` = `attendees`.`email`);

-- --------------------------------------------------------

--
-- Structure for view `payments_v`
--
DROP TABLE IF EXISTS `payments_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u548011243_epej`@`localhost` SQL SECURITY DEFINER VIEW `payments_v` AS select `payments`.`payment_id` AS `payment_id`,`attendees`.`first_name` AS `first_name`,`attendees`.`last_name` AS `last_name`,`attendees`.`community` AS `community`,`payments`.`payment` AS `payment`,`payments`.`ticket` AS `ticket`,`payments`.`file` AS `file`,`payments`.`registration_date` AS `registration_date` from (`attendees` join `payments`) where (`payments`.`email` = `attendees`.`email`);

-- --------------------------------------------------------

--
-- Structure for view `pending_v`
--
DROP TABLE IF EXISTS `pending_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u548011243_epej`@`localhost` SQL SECURITY DEFINER VIEW `pending_v` AS select `attendees`.`user_id` AS `user_id`,`attendees`.`first_name` AS `first_name`,`attendees`.`last_name` AS `last_name`,`attendees`.`celphone` AS `celphone`,`attendees`.`email` AS `email`,`attendees`.`community` AS `community`,`attendees`.`registration_date` AS `registration_date` from `attendees` where (not(`attendees`.`email` in (select `payments`.`email` from `payments`)));
