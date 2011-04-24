<?php
$q = mysql_query("SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';");

if(!$q) {
	echo '<p>Error loading database: ' . mysql_error() . "</p>";
} else {
	echo "<p>Success</p>";
}

$q = mysql_query("CREATE TABLE IF NOT EXISTS `atms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `special_info` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `not_found_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;");

if(!$q) {
	echo '<p>Error loading atms: ' . mysql_error() . "</p>";
} else {
	echo "<p>Success</p>";
}

/*
--
-- Dumping data for table `atms`
--



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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `bike_racks`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;");

if(!$q) {
	echo 'Error loading database: ' . mysql_error() . "\n";
} else {
	echo "success";
}
*/
?>