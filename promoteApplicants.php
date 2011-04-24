<?php
	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	
	$username = mysql_real_escape_string($_POST["username"]);
	$pass = mysql_real_escape_string($_POST["userpass"]);
	
	$q = mysql_query("SELECT * FROM admin WHERE name = '$username' AND password = '$pass'");
	if (!$q) {
		die("Error, could not query the db! " . mysql_error());
	}
	
	if (mysql_num_rows($q) != 1) {
		header('Location: http://yinnopiano.com/fin/admin.php');
		exit;
	}
	
	$users = $_POST["applicants"];
	$i = 0;
	$size = sizeof($users);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Successful Sign Up</title>
		<link href="FINsert/FIN.css" type="text/css" rel="stylesheet" />
		<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.1.0/prototype.js" type="text/javascript"></script>
	</head>
	
	<body>
	<div id = "header">
	</div>
	<div class = "content">
		<h1>Congratulations!</h1>
		<p>
			<?= "".$username ?> you have successfully added the following super users.
		</p>
	<?php
		for ($i = 0; $i < $size; $i++) {
			$q = mysql_query("SELECT * FROM applicants WHERE name = '".$users[$i]."';");
			if (!$q) {
				die("Error, could not query the db! " . mysql_error());
			}
			$row = mysql_fetch_array($q);
			$q = mysql_query("INSERT INTO super_users VALUES ('".$row["name"]."', '".$row["password"]."', '".$row["email"]."', '".$row["location"]."');");
			if (!$q) {
				die("Error, could not query the db! " . mysql_error());
			}
			print("<p>".$row["name"]." added to super_users successfully.</p>");
			$q = mysql_query("DELETE FROM applicants WHERE name = '".$users[$i]."';");
		}
	?>
			</div>
	</body>
</html>	
<?php
	include 'FINsert/closedb.php';
?>