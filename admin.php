<?php
/*
	Team: FIN
	Author: Dustin Abramson
	
	Main Super User creation page.
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Log In</title>
		<link href="FINsert/FIN.css" type="text/css" rel="stylesheet" />
		<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.1.0/prototype.js" type="text/javascript"></script>
	</head>

	<body>
		<div id = "header">
		</div>
		<div class = "content">
			<h1>Log In</h1>
				<form id = "submit" action="index.php" method = "POST">
					<div>
						<strong>User Name:</strong>
						<input type="text" name = "username" value="" maxlength = "20" size = "20" />
					</div>
					
					<div>
						<strong>Password:</strong>
						<input type="password" name="userpass" maxlength="20" size="20" />
					</div>
					
					<div>
						<input type="submit" />
					</div>
					
				</form>
				
		</div>
	</body>
</html>