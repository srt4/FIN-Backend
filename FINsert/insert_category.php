<?php
	include 'config.php';
	include 'opendb.php';
	
	$name = mysql_real_escape_string($_REQUEST["name"]);
	$theQuery = mysql_query("CREATE TABLE IF NOT EXISTS `$name` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `special_info` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `not_found_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10;");
	
	print("Creation of category $name successful!!");
	include 'closedb.php';
?>