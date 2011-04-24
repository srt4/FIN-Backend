<?php
	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	
	$email = mysql_real_escape_string($_POST["email"]);
	$username = mysql_real_escape_string($_POST["username"]);
	$userpass = mysql_real_escape_string($_POST["userpass"]);
	$confirmpass = mysql_real_escape_string($_POST["confirmpass"]);
	$confirmemail = mysql_real_escape_string($_POST["confirmemail"]);
	$location = mysql_real_escape_string($_POST["location"]);

	require_once('recaptchalib.php');
	$privatekey = "6Lew3cISAAAAAPyqtiiJq7DWOHfAJ80PfFutluSs";
	$resp = recaptcha_check_answer ($privatekey,
								$_SERVER["REMOTE_ADDR"],
								$_POST["recaptcha_challenge_field"],
								$_POST["recaptcha_response_field"]);

	if (!$resp->is_valid) {
		$error = "The CAPTCHA wasn't entered correctly. Go back and try it again.";
		include 'superuser.php';
		die ();
	}
	
	$q = mysql_query("SELECT * FROM super_users WHERE '$username' = name");
	if (!$q) {
		$error = "Could not reach the database at this time.";
		include 'superuser.php';
		die();
	}
	if(mysql_num_rows($q) >= 1) {
		$error = "Username already exists, please choose another";
		include 'superuser.php';
		die();
	}
	
	$q = mysql_query("SELECT * FROM applicants WHERE '$username' = name");
	if (!$q) {
		$error = "Could not reach the database at this time.";
		include 'superuser.php';
		die();
	}
	if(mysql_num_rows($q) >= 1) {
		$error = "Username already exists, please choose another";
		include 'superuser.php';
		die();
	}
	
	if ($userpass != $confirmpass) {
		$error = "Passwords did not match";
		include 'superuser.php';
		die();
	}
	
	if ($confirmemail != $email) {
		$error = "Emails did not match.";
		include 'superuser.php';
		die();
	}

	if (!preg_match("/^[a-zA-Z0-9_\-]+@(([a-zA-Z0-9_\-])+\.)+[a-zA-Z]{2,4}$/", "".$email)) {
		$error = "Invalid Email Address";
		include 'superuser.php';
		die();
	}
	
	$pass = md5($userpass);
	$q = mysql_query("INSERT INTO applicants VALUES ('$username', '$pass', '$email', '$location')");
	
	if (!$q) {
		die("Insertion mysql error");
	}
	include 'FINsert/closedb.php';
	include 'success.php';
?>
