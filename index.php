<?php
	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	
	$username = mysql_real_escape_string($_POST["username"]);
	$userpass = mysql_real_escape_string($_POST["userpass"]);
	
	$pass = md5($userpass);
	$q = mysql_query("SELECT * FROM admin WHERE name = '$username' AND password = '$pass'");
	
	if (mysql_num_rows($q) != 1) {
		header('Location: http://www.fincdn.org/admin.php');
		exit;
	}
	$postfix = "?username=$username&userpass=$pass";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<!--For adding information to the FIN database.-->

	<head>
		<title>FIN Admin</title>
		<link href="FINsert/FIN.css" type="text/css" rel="stylesheet" />
	</head>


	<body>
		<div id = "header">
		</div>
		<div class = "content">
		<h1>What would you like to do?</h1>
			
			<p>
				<a href = <?= "FINsert/index.php".$postfix ?>>Use FINsert</a>
			</p>
				
			<p>
				<a href = <?= "promote.php".$postfix ?>>Promote Super User Applicants</a>
			</p>
			
			<p>
				<a href= <?= "backup.php".$postfix ?>>Backup The Database</a>
			</p>


<?php
	include 'FINsert/closedb.php';
?>
