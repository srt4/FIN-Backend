<?php
	/*
	Team: FIN
	Author: Dustin Abramson
	
	backup.php creates a backup of the current database with the database name as well as the time of creation.
	*/
	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	
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
	
	$backupFile = 'backuprestricted/'.$dbname.date("Y-m-d-H-i-s") . '.gz';
	$command = "mysqldump --opt -h $dbhost -u$dbuser -p$dbpassword $dbname | gzip > $backupFile";
	system($command, $result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<!--For adding information to the FIN database.-->

	<head>
		<title>Backup Database</title>
		<link href="FINsert/FIN.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id = "header">
		</div>
		<div class = "content">
			<h1>Backup Successful</h1>
		</div>
	</body>
</html>

<?php
	include 'FINsert/closedb.php';
?>
