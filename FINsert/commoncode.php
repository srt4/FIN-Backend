<?php
/*
	Team: FIN
	Author: Dustin Abramson
	
	commoncode.php simply stores code that is redundantly used in many of the individual form pages.
	It includes the linking between multiple files that are used in the multiple forms.
*/
function getCategories() {
	include 'config.php';
	include 'opendb.php';
	
	$sql = "SHOW TABLES FROM $dbname";
	$result = mysql_query($sql);
	
	if (!$result) {
		echo "DB Error, could not list tables\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
	}
	$toReturn = "";
	$row = mysql_fetch_row($result);
	$name = "{$row[0]}";
	if ($name != "buildings" && $name != "regions" && $name != "floors" && $name != "update_cache" &&
		$name != "logged_in_cache" && $name != "super_users" && $name != "delete_log" &&
		$name != "admin" && $name != "applicants") {
		$toReturn = $toReturn.$name;
	}
	while ($row = mysql_fetch_row($result)) {
		$name = "{$row[0]}";
		if ($name == "atms") {
			$toReturn = $toReturn.$name;
		} else {
			if ($name != "buildings" && $name != "regions" && $name != "floors" && $name != "update_cache" &&
				$name != "logged_in_cache" && $name != "super_users" && $name != "delete_log" &&
				$name != "admin" && $name != "applicants") {
				$toReturn = $toReturn.",".$name;
			}
		}
	}
	
	return $toReturn;
}

function loggedIn() {
	include 'config.php';
	include 'opendb.php';
	
	$username = mysql_real_escape_string($_REQUEST["username"]);
	$pass = mysql_real_escape_string($_REQUEST["userpass"]);
	
	$q = mysql_query("SELECT * FROM admin WHERE name = '$username' AND password = '$pass'");
	if (!$q) {
		die("Could not connect to database");
	}
	
	if (mysql_num_rows($q) != 1) {
		header('Location: http://www.fincdn.org/admin.php');
		exit;
	}
	return "username=$username&userpass=$pass";
}

function top() {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>FINsert</title>
		<link href="FIN.css" type="text/css" rel="stylesheet" />
		<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.1.0/prototype.js" type="text/javascript"></script>
		<script type="text/javascript" src="request.js"></script>
		
<?php
}

function sharedScript() {
?>
<script type="text/javascript" src="getter.js"></script>

<?php
}

function nameTop() {
?>
</head>

	<?php
		include 'config.php';
		$db = mysql_connect($dbhost, $dbuser, $dbpassword);
		//Establish database connections
		return $db;
	?>

<?php
}
?>
