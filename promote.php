<?php
	/*
	Team: FIN
	Author: Dustin Abramson
	
	Allows for the promotion of applicants to super users.
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
		header('Location: http://yinnopiano.com/fin/admin.php');
		exit;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<!--For adding information to the FIN database.-->

	<head>
		<title>Backup Database</title>
		<link href="FINsert/FIN.css" type="text/css" rel="stylesheet" />
		<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.1.0/prototype.js" type="text/javascript"></script>
		<script type="text/javascript" src="getApplicants.js"></script>
	</head>

	<body>
		<div id = "header">
		</div>
		<div class = "content">
			<h1>FIN Promotion</h1>
			<p>Choose the location of applicants you would like to promote than hit the Submit button to get a list of them.</p>
			<form id = "submit" action="getApplicants.php" method = "POST">
				<div>
					<select name = "location">
						<option value = "University of Washington">University of Washington</option>
					</select>
				</div>
			</form>
			
			<div>
				<button id = "submitbutton" name = "submitbutton" type="button" value="submit">Submit</button>
			</div>
			
			<div id = "results">
				<p>Check the box next to the applicants you would like to promote then click the Submit Query button</p>
				<form id = "theApplicants" action= "promoteApplicants.php" method = "POST">
					<input type = "hidden" name= "username" value= <?= "".$username ?> />
					<input type = "hidden" name= "userpass" value= <?= "".$pass ?> />
				</form>
			</div>
		</div>
	</body>
</html>

<?php
	include 'FINsert/closedb.php';
?>