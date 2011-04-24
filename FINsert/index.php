<?php
/*
	Team: FIN
	Author: Dustin Abramson
	
	The main index for Finsert

	When loaded it displays all of the available categories for inserting information from the database.
	Generates unique links for use in forms that allow the easy addition of information.

	There are four unique values that are not generated being: regions, buildings, floors, and school supplies.

	index.php will only create the correct forms if you make sure to use the same format as a standard category
	when inserting in the database. If you do a special items such as school supplies you will have to create
	your own custom form and make sure the for loop doesn't generate it by including the name of the category in
	the if statement marked below.

*/
	include 'config.php';
	include 'opendb.php';
	include 'commoncode.php';
	
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
	$postfixOne = "?username=$username&userpass=$pass";
	$postfixTwo = "&username=$username&userpass=$pass";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<!--For adding information to the FIN database.-->

	<head>
		<title>FINsert</title>
		<link href="FIN.css" type="text/css" rel="stylesheet" />
	</head>


	<body>
		<div id = "header">
		</div>
		<div class = "content">
		<h1>FINsert</h1>
			<h2>Extend the Category List of FIN</h2>
			
			<p>
				<a href = <?= "category.php".$postfixOne ?>>Add category</a>
			</p>
				
			<h2>Extend the Regional Coverage of FIN</h2>
			<p>
				<a href = <?= "regions.php".$postfixOne ?>>Add regions</a>
			</p>
			
			<p>
				<a href= <?= "buildings.php".$postfixOne ?>>Add buildings</a>
			</p>
			<p>
				<a href= <?= "floors.php".$postfixOne ?>>Add floors</a>
			</p>
			
			<h2>Add Items to FIN</h2>
			<?php
				$names = getCategories();
				$tables = preg_split("/[,]+/", $names);
				$size = sizeof($tables);
				$i = 0;
				$toPrint = "";
				for ($i = 0; $i < $size; $i++) {
					if($tables[$i] != "school_supplies") {
						$toPrint = "standard.php?category=".$tables[$i]."".$postfixTwo;
						print(" <p> <a href= $toPrint > Add ".$tables[$i]." </a> </p>");
					}
				}
			?>
			
			<p>
				<a href= <?= "school_supplies.php".$postfixOne ?>>Add school supplies</a>
			</p>
		</div>
		
	<?php
		include 'closedb.php';
	?>
	</body>
</html>
