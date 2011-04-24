-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2011 at 11:44 AM
-- Server version: 5.1.55
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `dustinab_FIN`
--

-- --------------------------------------------------------

--
-- Table structure for table `atms`
--

CREATE TABLE IF NOT EXISTS `atms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `special_info` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `not_found_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `atms`
--

INSERT INTO `atms` VALUES(9, 2, 47656465, -122310287, 'US Bank, Bank of America', 4, 1);
INSERT INTO `atms` VALUES(23, 8, 47660362, -122312950, '', 0, 0);
INSERT INTO `atms` VALUES(12, 2, 47655790, -122308060, 'BECU, WSECU', 45, 0);
INSERT INTO `atms` VALUES(22, 1, 47660102, -122312987, '', 0, 0);
INSERT INTO `atms` VALUES(24, 4, 47658169, -122303646, 'BECU', 119, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bike_racks`
--

CREATE TABLE IF NOT EXISTS `bike_racks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `special_info` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `not_found_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `bike_racks`
--

INSERT INTO `bike_racks` VALUES(10, 2, 47656582, -122309098, '', 3, 3);
INSERT INTO `bike_racks` VALUES(11, 5, 47656109, -122306296, '', 0, 2);
INSERT INTO `bike_racks` VALUES(12, 2, 47655480, -122307010, '', 55, 3);
INSERT INTO `bike_racks` VALUES(13, 2, 47655951, -122309428, '', 0, 2);
INSERT INTO `bike_racks` VALUES(14, 2, 47654860, -122306558, '', 17, 3);
INSERT INTO `bike_racks` VALUES(15, 2, 47656760, -122308058, '', 0, 0);
INSERT INTO `bike_racks` VALUES(16, 6, 47653595, -122305974, '', 0, 9);
INSERT INTO `bike_racks` VALUES(17, 3, 47654058, -122308419, '', 0, 1);
INSERT INTO `bike_racks` VALUES(18, 3, 47653470, -122308780, '', 60, 0);
INSERT INTO `bike_racks` VALUES(19, 3, 47653470, -122308780, '', 60, 0);
INSERT INTO `bike_racks` VALUES(20, 3, 47653470, -122308780, '', 56, 1);
INSERT INTO `bike_racks` VALUES(21, 2, 47655575, -122309662, '', 0, 1);
INSERT INTO `bike_racks` VALUES(22, 2, 47656629, -122307181, '', 8, 0);
INSERT INTO `bike_racks` VALUES(23, 5, 47655257, -122305192, '', 0, 0);
INSERT INTO `bike_racks` VALUES(24, 2, 47654950, -122308258, '', 0, 1);
INSERT INTO `bike_racks` VALUES(25, 1, 47660640, -122310566, '', 72, 1);
INSERT INTO `bike_racks` VALUES(26, 5, 47656269, -122305867, '', 0, 0);
INSERT INTO `bike_racks` VALUES(27, 1, 47658382, -122308753, '', 68, 0);
INSERT INTO `bike_racks` VALUES(28, 2, 47655480, -122307010, '', 51, 0);
INSERT INTO `bike_racks` VALUES(29, 2, 47656582, -122309098, 'delete', 1, 0);
INSERT INTO `bike_racks` VALUES(30, 8, 47664911, -122315904, '', 0, 0);
INSERT INTO `bike_racks` VALUES(31, 2, 47656582, -122309098, 'delete', 1, 0);
INSERT INTO `bike_racks` VALUES(32, 2, 47656582, -122309098, 'delete', 1, 0);
INSERT INTO `bike_racks` VALUES(33, 2, 47656582, -122309098, 'delete', 1, 0);
INSERT INTO `bike_racks` VALUES(34, 6, 47653314, -122305661, '', 87, 0);
INSERT INTO `bike_racks` VALUES(35, 4, 47657628, -122306468, '', 0, 0);
INSERT INTO `bike_racks` VALUES(36, 5, 47654997, -122305609, '', 0, 0);
INSERT INTO `bike_racks` VALUES(37, 1, 47660640, -122310566, '', 73, 0);
INSERT INTO `bike_racks` VALUES(38, 3, 47651312, -122310496, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
  `bid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` VALUES(1355045905, 2, 'Kane Hall', 47656582, -122309098);
INSERT INTO `buildings` VALUES(1355041089, 2, 'Odegaard Undergraduate Library', 47656465, -122310287);
INSERT INTO `buildings` VALUES(1355049279, 2, 'Smith Hall', 47656629, -122307181);
INSERT INTO `buildings` VALUES(1354991954, 2, 'Mary Gates Hall', 47654799, -122307776);
INSERT INTO `buildings` VALUES(1354995063, 2, 'Sieg Hall', 47654860, -122306558);
INSERT INTO `buildings` VALUES(1354956584, 6, 'Electrical Engineering Building', 47653613, -122306380);
INSERT INTO `buildings` VALUES(1354976177, 6, 'Guggenheim Hall', 47654244, -122306348);
INSERT INTO `buildings` VALUES(1355063673, 2, 'Savery Hall', 47657123, -122308101);
INSERT INTO `buildings` VALUES(1354978090, 6, 'Loew Hall', 47654249, -122304590);
INSERT INTO `buildings` VALUES(1355012426, 2, 'Meany Hall', 47655549, -122310554);
INSERT INTO `buildings` VALUES(1355022391, 2, 'Suzzallo Library', 47655790, -122308060);
INSERT INTO `buildings` VALUES(1355013831, 2, 'Allen Library', 47655480, -122307010);
INSERT INTO `buildings` VALUES(1354949751, 3, 'Bagley Hall', 47653470, -122308780);
INSERT INTO `buildings` VALUES(1355107053, 4, 'Art Building', 47658468, -122306416);
INSERT INTO `buildings` VALUES(1354985332, 2, 'Johnson Hall', 47654620, -122308849);
INSERT INTO `buildings` VALUES(1355102050, 1, 'Denny Hall', 47658382, -122308753);
INSERT INTO `buildings` VALUES(1355084604, 4, 'Music Building', 47657728, -122305925);
INSERT INTO `buildings` VALUES(1355170235, 1, 'Burke Museum', 47660640, -122310566);
INSERT INTO `buildings` VALUES(1355124959, 1, 'Paccar Hall', 47659112, -122308474);
INSERT INTO `buildings` VALUES(1354948034, 6, 'Paul G. Allen Center for CSE', 47653314, -122305661);
INSERT INTO `buildings` VALUES(1355127643, 1, 'William H. Gates Hall', 47659274, -122310812);
INSERT INTO `buildings` VALUES(1355005897, 2, 'Gerdberding Hall', 47655300, -122309364);
INSERT INTO `buildings` VALUES(1355070655, 2, 'Parrington Hall', 47657417, -122310233);
INSERT INTO `buildings` VALUES(1355170870, 4, 'McCarty Hall', 47660467, -122304568);
INSERT INTO `buildings` VALUES(1355100554, 4, 'McMahon Hall', 47658169, -122303646);
INSERT INTO `buildings` VALUES(1355062678, 5, 'Padelford Hall', 47656969, -122304322);
INSERT INTO `buildings` VALUES(1355012307, 9, 'Terry Hall', 47655748, -122316842);

-- --------------------------------------------------------

--
-- Table structure for table `coffee`
--

CREATE TABLE IF NOT EXISTS `coffee` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `special_info` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `not_found_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `coffee`
--

INSERT INTO `coffee` VALUES(2, 6, 47653613, -122306380, 'Jolt Volt \\n Mon to Fri, 8am to 3pm', 23, 3);
INSERT INTO `coffee` VALUES(3, 2, 47655790, -122308060, 'Suzzallo Cafe \\n Mon to Thu, 7:30am to 10pm \\n Fri, 7:30am to 6pm \\n Sat, 12 to 5pm \\n Sun, 1 to 10pm', 45, 2);
INSERT INTO `coffee` VALUES(4, 3, 47653470, -122308780, 'Think Tank \\n Mon to Fri, 7:30am to 3pm', 57, 0);
INSERT INTO `coffee` VALUES(6, 2, 47654799, -122307776, 'Mary Gates Hall Espresso \\n Mon to Thu, 7:30am to 9pm \\n Fri, 7:30am to 5pm', 14, 0);
INSERT INTO `coffee` VALUES(19, 1, 47660640, -122310566, 'Burke Museum Cafe\\n Mon to Fri, 7am to 5pm\\n Sat 10am to 5pm, Sun 9am to 5pm', 73, 0);
INSERT INTO `coffee` VALUES(20, 6, 47653314, -122305661, 'Reboot \\n Mon to Thu, 7:30am to 6pm \\n Fri, 7:30am to 5pm', 82, 0);
INSERT INTO `coffee` VALUES(21, 2, 47657417, -122310233, 'Public Grounds \\n Mon to Fri, 8am to 3:30pm', 101, 0);
INSERT INTO `coffee` VALUES(22, 4, 47660467, -122304568, 'Ian''s Domain \\n Mon to Fri, 8 to 1am \\n Sat to Sun, 10 to 1am', 112, 0);
INSERT INTO `coffee` VALUES(23, 4, 47658169, -122303646, 'Joe Haus', 118, 0);
INSERT INTO `coffee` VALUES(24, 5, 47656969, -122304322, 'Padelford Espresso \\n Mon to Fri, 8am to 3pm', 132, 0);
INSERT INTO `coffee` VALUES(25, 1, 47659274, -122310812, 'The Supreme Cup \\n Mon to Thu, 7:30am to 5pm \\n Fri, 7:30am to 3pm', 90, 0);
INSERT INTO `coffee` VALUES(26, 9, 47655748, -122316842, '2 Convenient \\n Mon to Fri, 7 to 1am \\n Sat to Sun, 8 to 1am', 139, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dining`
--

CREATE TABLE IF NOT EXISTS `dining` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `special_info` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `not_found_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `dining`
--

INSERT INTO `dining` VALUES(13, 6, 47652922, -122304917, 'Curbside 8, Siganos \\n Mon to Fri, 10:30am to 3pm', 0, 0);
INSERT INTO `dining` VALUES(14, 2, 47655733, -122309938, 'Hot Dawgs, Motosurf, Red Square BBQ \\n Mon to Fri, 10:30am to 3pm', 0, 1);
INSERT INTO `dining` VALUES(22, 1, 47659112, -122308474, 'Orin''s Place\\n Mon-Thu, 7 am to 9 pm\\n Fri, 7 am to 5 pm', 76, 0);
INSERT INTO `dining` VALUES(23, 4, 47658169, -122303646, 'The 8 \\n Mon to Fri, 7am to 8pm \\n Sat to Sun, 8am to 8pm', 118, 0);

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE IF NOT EXISTS `floors` (
  `fid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `fnum` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `bid` (`bid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` VALUES(1, 1355045905, 1, 'Basement');
INSERT INTO `floors` VALUES(2, 1355045905, 2, 'Floor 1');
INSERT INTO `floors` VALUES(3, 1355045905, 3, 'Floor 2');
INSERT INTO `floors` VALUES(4, 1355041089, -1, 'Basement');
INSERT INTO `floors` VALUES(5, 1355041089, 1, 'Floor 1');
INSERT INTO `floors` VALUES(6, 1355041089, 2, 'Floor 2');
INSERT INTO `floors` VALUES(7, 1355041089, 3, 'Floor 3');
INSERT INTO `floors` VALUES(8, 1355049279, 1, 'Basement');
INSERT INTO `floors` VALUES(9, 1355049279, 2, 'Floor 1');
INSERT INTO `floors` VALUES(10, 1355049279, 3, 'Floor 2');
INSERT INTO `floors` VALUES(11, 1355049279, 4, 'Floor 3');
INSERT INTO `floors` VALUES(12, 1355049279, 5, 'Floor 4');
INSERT INTO `floors` VALUES(13, 1354991954, 1, 'Basement');
INSERT INTO `floors` VALUES(14, 1354991954, 2, 'Floor 1');
INSERT INTO `floors` VALUES(15, 1354991954, 3, 'Floor 2');
INSERT INTO `floors` VALUES(16, 1354991954, 4, 'Floor 3');
INSERT INTO `floors` VALUES(17, 1354995063, 1, 'Floor 1');
INSERT INTO `floors` VALUES(18, 1354995063, 2, 'Floor 2');
INSERT INTO `floors` VALUES(19, 1354995063, 3, 'Floor 3');
INSERT INTO `floors` VALUES(20, 1354995063, 4, 'Floor 4');
INSERT INTO `floors` VALUES(21, 1354956584, -1, 'Basement');
INSERT INTO `floors` VALUES(63, 1355107053, 0, 'Floor 0');
INSERT INTO `floors` VALUES(23, 1354956584, 1, 'Floor 1');
INSERT INTO `floors` VALUES(24, 1354976177, 1, 'Floor 1');
INSERT INTO `floors` VALUES(25, 1354976177, 2, 'Floor 2');
INSERT INTO `floors` VALUES(26, 1354976177, 3, 'Floor 3');
INSERT INTO `floors` VALUES(27, 1354976177, 4, 'Floor 4');
INSERT INTO `floors` VALUES(28, 1355063673, 1, 'Floor 1');
INSERT INTO `floors` VALUES(29, 1355063673, 2, 'Floor 2');
INSERT INTO `floors` VALUES(30, 1355063673, 3, 'Floor 3');
INSERT INTO `floors` VALUES(31, 1355063673, 4, 'Floor 4');
INSERT INTO `floors` VALUES(32, 1354956584, 2, 'Floor 2');
INSERT INTO `floors` VALUES(33, 1354956584, 3, 'Floor 2M');
INSERT INTO `floors` VALUES(34, 1354956584, 4, 'Floor 3');
INSERT INTO `floors` VALUES(35, 1354956584, 5, 'Floor 3M');
INSERT INTO `floors` VALUES(36, 1354956584, 6, 'Floor 4');
INSERT INTO `floors` VALUES(37, 1354956584, 7, 'Floor 4M');
INSERT INTO `floors` VALUES(38, 1354978090, -1, 'Basement');
INSERT INTO `floors` VALUES(39, 1354978090, 1, 'Floor 1');
INSERT INTO `floors` VALUES(40, 1354978090, 2, 'Floor 2');
INSERT INTO `floors` VALUES(41, 1354978090, 3, 'Floor 3');
INSERT INTO `floors` VALUES(42, 1355012426, 1, 'Lower Level');
INSERT INTO `floors` VALUES(43, 1355022391, 0, 'Basement');
INSERT INTO `floors` VALUES(44, 1355022391, 1, 'Ground Level');
INSERT INTO `floors` VALUES(45, 1355022391, 2, 'Floor 1');
INSERT INTO `floors` VALUES(46, 1355022391, 3, 'Floor 2');
INSERT INTO `floors` VALUES(47, 1355022391, 4, 'Floor 3');
INSERT INTO `floors` VALUES(48, 1355022391, 5, 'Floor 4');
INSERT INTO `floors` VALUES(49, 1355022391, 6, 'Floor 5');
INSERT INTO `floors` VALUES(50, 1355013831, 0, 'Basement 2');
INSERT INTO `floors` VALUES(51, 1355013831, 1, 'Basement');
INSERT INTO `floors` VALUES(52, 1355013831, 2, 'Ground Level');
INSERT INTO `floors` VALUES(53, 1355013831, 3, 'Floor 1');
INSERT INTO `floors` VALUES(54, 1355013831, 4, 'Floor 2');
INSERT INTO `floors` VALUES(55, 1355013831, 5, 'Floor 3');
INSERT INTO `floors` VALUES(56, 1354949751, 0, 'Ground Level');
INSERT INTO `floors` VALUES(57, 1354949751, 1, 'Floor 1');
INSERT INTO `floors` VALUES(58, 1354949751, 2, 'Floor 2');
INSERT INTO `floors` VALUES(59, 1354949751, 3, 'Floor 3');
INSERT INTO `floors` VALUES(60, 1354949751, 4, 'Floor 4');
INSERT INTO `floors` VALUES(64, 1355107053, 1, 'Floor 1');
INSERT INTO `floors` VALUES(65, 1355107053, 2, 'Floor 2');
INSERT INTO `floors` VALUES(66, 1355107053, 3, 'Floor 3');
INSERT INTO `floors` VALUES(67, 1355102050, 1, 'Floor 1');
INSERT INTO `floors` VALUES(68, 1355102050, 2, 'Floor 2');
INSERT INTO `floors` VALUES(69, 1355102050, 3, 'Floor M');
INSERT INTO `floors` VALUES(70, 1355102050, 4, 'Floor 3');
INSERT INTO `floors` VALUES(71, 1355102050, 5, 'Floor 4');
INSERT INTO `floors` VALUES(72, 1355170235, 2, 'Main Level');
INSERT INTO `floors` VALUES(73, 1355170235, 1, 'Lower Level');
INSERT INTO `floors` VALUES(74, 1355124959, 0, 'B');
INSERT INTO `floors` VALUES(75, 1355124959, 1, 'Level 1');
INSERT INTO `floors` VALUES(76, 1355124959, 2, 'Level 2');
INSERT INTO `floors` VALUES(77, 1355124959, 3, 'Level 3');
INSERT INTO `floors` VALUES(78, 1355124959, 4, 'Level 4');
INSERT INTO `floors` VALUES(79, 1355124959, 5, 'Level 5');
INSERT INTO `floors` VALUES(81, 1354948034, 0, 'Floor B1');
INSERT INTO `floors` VALUES(82, 1354948034, 1, 'Floor 1');
INSERT INTO `floors` VALUES(83, 1354948034, 2, 'Floor 2');
INSERT INTO `floors` VALUES(84, 1354948034, 3, 'Floor 3');
INSERT INTO `floors` VALUES(85, 1354948034, 4, 'Floor 4');
INSERT INTO `floors` VALUES(86, 1354948034, 5, 'Floor 5');
INSERT INTO `floors` VALUES(87, 1354948034, 6, 'Floor 6');
INSERT INTO `floors` VALUES(88, 1355127643, 1, 'Lower Basement');
INSERT INTO `floors` VALUES(89, 1355127643, 2, 'Basement');
INSERT INTO `floors` VALUES(90, 1355127643, 3, 'Floor 1');
INSERT INTO `floors` VALUES(91, 1355127643, 4, 'Floor 2');
INSERT INTO `floors` VALUES(92, 1355127643, 5, 'Floor 3');
INSERT INTO `floors` VALUES(93, 1355127643, 6, 'Floor 4');
INSERT INTO `floors` VALUES(94, 1355005897, 1, 'Basement');
INSERT INTO `floors` VALUES(95, 1355005897, 2, 'Ground');
INSERT INTO `floors` VALUES(96, 1355005897, 3, 'Floor 1');
INSERT INTO `floors` VALUES(97, 1355005897, 4, 'Floor 2');
INSERT INTO `floors` VALUES(98, 1355005897, 5, 'Floor 3');
INSERT INTO `floors` VALUES(99, 1355005897, 6, 'Floor 4');
INSERT INTO `floors` VALUES(100, 1355070655, 1, 'Basement');
INSERT INTO `floors` VALUES(101, 1355070655, 2, 'Floor 1');
INSERT INTO `floors` VALUES(102, 1355070655, 3, 'Floor 2');
INSERT INTO `floors` VALUES(103, 1355070655, 4, 'Floor 3');
INSERT INTO `floors` VALUES(104, 1355070655, 5, 'Floor 4');
INSERT INTO `floors` VALUES(105, 1355070655, 6, 'Floor 5');
INSERT INTO `floors` VALUES(111, 1355170870, 3, 'Floor 2');
INSERT INTO `floors` VALUES(110, 1355170870, 2, 'Floor 1');
INSERT INTO `floors` VALUES(109, 1355170870, 1, 'Ground');
INSERT INTO `floors` VALUES(112, 1355170870, 4, 'Floor 3');
INSERT INTO `floors` VALUES(113, 1355170870, 5, 'Floor 4');
INSERT INTO `floors` VALUES(114, 1355170870, 6, 'Floor 5');
INSERT INTO `floors` VALUES(115, 1355170870, 7, 'Floor 6');
INSERT INTO `floors` VALUES(116, 1355100554, 1, 'Parking Level C');
INSERT INTO `floors` VALUES(117, 1355100554, 2, 'Parking Level B');
INSERT INTO `floors` VALUES(118, 1355100554, 3, 'Dining Level');
INSERT INTO `floors` VALUES(119, 1355100554, 4, 'Floor 1');
INSERT INTO `floors` VALUES(120, 1355100554, 5, 'Floor 2');
INSERT INTO `floors` VALUES(121, 1355100554, 6, 'Floor 3');
INSERT INTO `floors` VALUES(122, 1355100554, 7, 'Floor 4');
INSERT INTO `floors` VALUES(123, 1355100554, 8, 'Floor 5');
INSERT INTO `floors` VALUES(124, 1355100554, 9, 'Floor 6');
INSERT INTO `floors` VALUES(125, 1355100554, 11, 'Floor 8');
INSERT INTO `floors` VALUES(126, 1355100554, 12, 'Floor 9');
INSERT INTO `floors` VALUES(127, 1355100554, 13, 'Floor 10');
INSERT INTO `floors` VALUES(128, 1355100554, 14, 'Floor 11');
INSERT INTO `floors` VALUES(129, 1355100554, 15, 'Floor 12');
INSERT INTO `floors` VALUES(130, 1355062678, 1, 'Basement 2');
INSERT INTO `floors` VALUES(131, 1355062678, 2, 'Basement 1');
INSERT INTO `floors` VALUES(132, 1355062678, 3, 'Floor 1');
INSERT INTO `floors` VALUES(133, 1355062678, 4, 'Floor 2');
INSERT INTO `floors` VALUES(134, 1355062678, 5, 'Floor 3');
INSERT INTO `floors` VALUES(135, 1355062678, 6, 'Floor 4');
INSERT INTO `floors` VALUES(136, 1355062678, 7, 'Floor 5');
INSERT INTO `floors` VALUES(137, 1355062678, 8, 'Floor 6');
INSERT INTO `floors` VALUES(138, 1355012307, 1, 'Ground Level');
INSERT INTO `floors` VALUES(139, 1355012307, 2, 'Floor 1');
INSERT INTO `floors` VALUES(140, 1355012307, 3, 'Floor 2');
INSERT INTO `floors` VALUES(141, 1355012307, 4, 'Floor 3');
INSERT INTO `floors` VALUES(142, 1355012307, 5, 'Floor 4');
INSERT INTO `floors` VALUES(143, 1355012307, 7, 'Floor 6');
INSERT INTO `floors` VALUES(144, 1355012307, 8, 'Floor 7');
INSERT INTO `floors` VALUES(145, 1355012307, 9, 'Floor 8');
INSERT INTO `floors` VALUES(146, 1355012307, 10, 'Floor 9');
INSERT INTO `floors` VALUES(147, 1355012307, 11, 'Floor 10');
INSERT INTO `floors` VALUES(148, 1355012307, 12, 'Floor 11');

-- --------------------------------------------------------

--
-- Table structure for table `mailboxes`
--

CREATE TABLE IF NOT EXISTS `mailboxes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `special_info` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `not_found_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mailboxes`
--

INSERT INTO `mailboxes` VALUES(3, 2, 47654998, -122309954, 'Pick up at 4:10 pm', 0, 1);
INSERT INTO `mailboxes` VALUES(5, 1, 47658643, -122309615, 'Pick up at 3:45pm\\n UPS and Mail', 0, 0);
INSERT INTO `mailboxes` VALUES(6, 6, 47653243, -122305128, 'Pick up at 4pm', 0, 1);
INSERT INTO `mailboxes` VALUES(7, 3, 47653800, -122310208, 'Pick up at 4:08 pm', 0, 0);
INSERT INTO `mailboxes` VALUES(10, 3, 47654115, -122307197, '', 0, 0);
INSERT INTO `mailboxes` VALUES(11, 9, 47657133, -122313093, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `rid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` VALUES(1, 47659000, -122309000);
INSERT INTO `regions` VALUES(2, 47656000, -122309000);
INSERT INTO `regions` VALUES(3, 47653000, -122309000);
INSERT INTO `regions` VALUES(4, 47659000, -122304000);
INSERT INTO `regions` VALUES(5, 47656000, -122304000);
INSERT INTO `regions` VALUES(6, 47653000, -122304000);
INSERT INTO `regions` VALUES(8, 47659000, -122313000);
INSERT INTO `regions` VALUES(9, 47656000, -122313000);
INSERT INTO `regions` VALUES(10, 47653000, -122313000);

-- --------------------------------------------------------

--
-- Table structure for table `restrooms`
--

CREATE TABLE IF NOT EXISTS `restrooms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `special_info` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `not_found_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `restrooms`
--

INSERT INTO `restrooms` VALUES(56, 2, 47656582, -122309098, '', 1, 0);
INSERT INTO `restrooms` VALUES(57, 2, 47656582, -122309098, '', 3, 0);
INSERT INTO `restrooms` VALUES(58, 2, 47654799, -122307776, '', 13, 0);
INSERT INTO `restrooms` VALUES(59, 2, 47654799, -122307776, '', 14, 0);
INSERT INTO `restrooms` VALUES(60, 2, 47654799, -122307776, '', 15, 0);
INSERT INTO `restrooms` VALUES(61, 2, 47654799, -122307776, '', 16, 0);
INSERT INTO `restrooms` VALUES(62, 2, 47656629, -122307181, '', 8, 0);
INSERT INTO `restrooms` VALUES(63, 2, 47656629, -122307181, '', 9, 0);
INSERT INTO `restrooms` VALUES(64, 2, 47656629, -122307181, '', 10, 0);
INSERT INTO `restrooms` VALUES(65, 2, 47656629, -122307181, '', 11, 0);
INSERT INTO `restrooms` VALUES(67, 2, 47656465, -122310287, '', 4, 0);
INSERT INTO `restrooms` VALUES(68, 2, 47656465, -122310287, '', 5, 0);
INSERT INTO `restrooms` VALUES(69, 2, 47656465, -122310287, '', 6, 0);
INSERT INTO `restrooms` VALUES(70, 2, 47656465, -122310287, '', 7, 0);
INSERT INTO `restrooms` VALUES(71, 4, 47658468, -122306416, '', 63, 0);
INSERT INTO `restrooms` VALUES(72, 2, 47657123, -122308101, '', 28, 0);
INSERT INTO `restrooms` VALUES(73, 2, 47657123, -122308101, '', 29, 0);
INSERT INTO `restrooms` VALUES(74, 2, 47657123, -122308101, '', 30, 0);
INSERT INTO `restrooms` VALUES(75, 2, 47657123, -122308101, '', 31, 0);
INSERT INTO `restrooms` VALUES(76, 4, 47658468, -122306416, '', 64, 0);
INSERT INTO `restrooms` VALUES(77, 4, 47658468, -122306416, '', 65, 0);
INSERT INTO `restrooms` VALUES(78, 4, 47658468, -122306416, '', 66, 0);
INSERT INTO `restrooms` VALUES(79, 6, 47654244, -122306348, '', 24, 0);
INSERT INTO `restrooms` VALUES(80, 6, 47654244, -122306348, '', 25, 0);
INSERT INTO `restrooms` VALUES(81, 6, 47654244, -122306348, '', 26, 0);
INSERT INTO `restrooms` VALUES(82, 6, 47654244, -122306348, '', 27, 0);
INSERT INTO `restrooms` VALUES(83, 2, 47655790, -122308060, '', 45, 0);
INSERT INTO `restrooms` VALUES(84, 6, 47653613, -122306380, '', 36, 0);
INSERT INTO `restrooms` VALUES(85, 1, 47658382, -122308753, '', 67, 0);
INSERT INTO `restrooms` VALUES(86, 1, 47658382, -122308753, '', 68, 0);
INSERT INTO `restrooms` VALUES(87, 1, 47658382, -122308753, '', 69, 0);
INSERT INTO `restrooms` VALUES(88, 1, 47658382, -122308753, '', 70, 0);
INSERT INTO `restrooms` VALUES(89, 1, 47658382, -122308753, '', 71, 0);
INSERT INTO `restrooms` VALUES(90, 1, 47659112, -122308474, '', 75, 0);
INSERT INTO `restrooms` VALUES(91, 1, 47659112, -122308474, '', 76, 0);
INSERT INTO `restrooms` VALUES(92, 1, 47659112, -122308474, '', 77, 0);
INSERT INTO `restrooms` VALUES(93, 1, 47659112, -122308474, '', 78, 0);
INSERT INTO `restrooms` VALUES(94, 1, 47659112, -122308474, '', 79, 0);
INSERT INTO `restrooms` VALUES(95, 6, 47653314, -122305661, '', 82, 0);
INSERT INTO `restrooms` VALUES(96, 6, 47653314, -122305661, '', 83, 0);
INSERT INTO `restrooms` VALUES(97, 6, 47653314, -122305661, '', 84, 0);
INSERT INTO `restrooms` VALUES(98, 6, 47653314, -122305661, '', 85, 0);
INSERT INTO `restrooms` VALUES(99, 6, 47653314, -122305661, '', 86, 0);
INSERT INTO `restrooms` VALUES(100, 6, 47653314, -122305661, '', 87, 0);
INSERT INTO `restrooms` VALUES(101, 6, 47653613, -122306380, '', 34, 0);
INSERT INTO `restrooms` VALUES(102, 6, 47653613, -122306380, '', 32, 0);
INSERT INTO `restrooms` VALUES(103, 6, 47653613, -122306380, '', 23, 0);
INSERT INTO `restrooms` VALUES(104, 6, 47653613, -122306380, '', 21, 0);
INSERT INTO `restrooms` VALUES(105, 2, 47654860, -122306558, '', 20, 0);
INSERT INTO `restrooms` VALUES(106, 2, 47654860, -122306558, '', 19, 0);
INSERT INTO `restrooms` VALUES(107, 2, 47654860, -122306558, '', 17, 0);
INSERT INTO `restrooms` VALUES(108, 2, 47654860, -122306558, '', 18, 0);
INSERT INTO `restrooms` VALUES(109, 4, 47660467, -122304568, '', 112, 0);
INSERT INTO `restrooms` VALUES(110, 4, 47658169, -122303646, '', 119, 0);
INSERT INTO `restrooms` VALUES(111, 2, 47655549, -122310554, '', 80, 0);
INSERT INTO `restrooms` VALUES(112, 9, 47655748, -122316842, '', 139, 0);

-- --------------------------------------------------------

--
-- Table structure for table `school_supplies`
--

CREATE TABLE IF NOT EXISTS `school_supplies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `special_info` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `not_found_count` int(11) NOT NULL,
  `blue_book` tinyint(1) NOT NULL,
  `scantron` tinyint(1) NOT NULL,
  `printing` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `school_supplies`
--

INSERT INTO `school_supplies` VALUES(16, 2, 47656465, -122310287, 'Odegaard UBookstore', 5, 0, 1, 1, 0);
INSERT INTO `school_supplies` VALUES(17, 2, 47656465, -122310287, 'Odegaard Learning Commons', 5, 0, 0, 0, 1);
INSERT INTO `school_supplies` VALUES(18, 2, 47656465, -122310287, 'Odegaard Learning Commons', 6, 0, 0, 0, 1);
INSERT INTO `school_supplies` VALUES(19, 2, 47656465, -122310287, 'By George Newsstand', 4, 0, 1, 1, 0);
INSERT INTO `school_supplies` VALUES(36, 6, 47653314, -122305661, 'Reboot', 82, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vending`
--

CREATE TABLE IF NOT EXISTS `vending` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `special_info` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `not_found_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `vending`
--

INSERT INTO `vending` VALUES(11, 2, 47656582, -122309098, 'Snack, Soda, Milk', 2, 0);
INSERT INTO `vending` VALUES(12, 2, 47654799, -122307776, 'Snack, Soda', 13, 0);
INSERT INTO `vending` VALUES(13, 2, 47656629, -122307181, 'Snack, Soda, Coffee', 9, 0);
INSERT INTO `vending` VALUES(19, 2, 47656465, -122310287, 'Soda, water, and snacks', 4, 0);
INSERT INTO `vending` VALUES(23, 6, 47653613, -122306380, '', 21, 0);
INSERT INTO `vending` VALUES(20, 2, 47657123, -122308101, 'Soda, Snack', 28, 0);
INSERT INTO `vending` VALUES(24, 2, 47654860, -122306558, '', 18, 0);
INSERT INTO `vending` VALUES(25, 1, 47658382, -122308753, 'Snack', 68, 0);
INSERT INTO `vending` VALUES(26, 1, 47659112, -122308474, 'Snack, Soda', 75, 0);
INSERT INTO `vending` VALUES(28, 2, 47655549, -122310554, 'Snack, Soda', 42, 0);