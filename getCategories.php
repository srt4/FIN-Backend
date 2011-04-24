<?php
	/*
	Team: FIN
	Author: Dustin Abramson
	
	getCategories returns a string seperated by commas of all the tablenames in the database for
	extensibility reasons.
	*/
	include 'FINsert/commoncode.php';
	$var = getCategories();
	print("".$var);
	
?>