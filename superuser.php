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
		<title>Super User Sign Up</title>
		<link href="FINsert/FIN.css" type="text/css" rel="stylesheet" />
		<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.1.0/prototype.js" type="text/javascript"></script>
	</head>

	<body>
		<div id = "header">
		</div>
		<div class = "content">
			<h1>Super User Sign Up</h1>
			<p id = "results"> <?= "".$error ?> </p>
				<form id = "submit" action="newUser.php" method = "POST">
					<div>
						<strong>User Name:</strong>
						<input type="text" name = "username" value="" maxlength = "20" size = "20" />
					</div>
					
					<div>
						<strong>Password:</strong>
						<input type="password" name="userpass" maxlength="20" size="20" />
					</div>
					
					<div>
						<strong>Confirm Password:</strong>
						<input type="password" name="confirmpass" maxlength="20" size="20" />
					</div>
					
					<div>
						<strong>Email Address:</strong>
						<input type="text" name="email" maxlength="45" size="20" />
					</div>
					
					<div>
						<strong>Confirm Email Address:</strong>
						<input type="text" name="confirmemail" maxlength="45" size="20" />
					</div>

					<div>
						<strong>Location of Super User:</strong>
						<select name = "location">Location
							<option value = "University of Washington">University of Washington</option>
						</select>
					</div>					
					
					<div id = "captcha">
						<?php
							require_once('recaptchalib.php');
							$publickey = "6Lew3cISAAAAAIOw1gZx4FQass1psLSboLuqscgA"; // you got this from the signup page
							echo recaptcha_get_html($publickey);
						?>
					</div>
					
					
					<div>
						<input type="submit" />
					</div>
					
				</form>
				
		</div>
	</body>
</html>
