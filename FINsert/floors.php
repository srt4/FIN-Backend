	<?php
	/*
	Team: FIN
	Author: Dustin Abramson
	
	floors.php allows the insertion of a floor coupled with a building into a database.
	Floor names should be the name of the floor while floor numbers simply apply to floor
	ordering. For exact specification see create.php.
	
	*/
	include("commoncode.php");
	loggedIn();
	top();   # print the shared top of the page
	include 'config.php';
	include 'opendb.php';
		
		$q = mysql_query("SELECT * FROM buildings;");
		if (!$q) {
			die("Error, could not query the db! " . mysql_error());
		}
		$row = mysql_fetch_array($q);
	?>

	<body>
		<div id = "header">
		</div>
		<div class = "content">
			<h1>FINsert Floors</h1>
			<p id = "results"> This is where results will be printed </p>
			<form id = "submit" action="create.php" method = "POST">
				<div>
					<strong>Choose the Building</strong>
					<select name = "bid">
						<?php
							while($row) {
								$bid = $row["bid"];
								$name = $row["name"];
								?>
								<option value = <?= $bid ?>><?= $name ?></option>
							<?php
								$row = mysql_fetch_array($q);
							}
						?>
					</select>
				<div>
					<strong>Floor Name:</strong>
					<input type="text" name = "name" />
				</div>
				
				<div>
					<strong>Floor Number:</strong>
					<input type = "text" name = "number" maxlength="4" size="4" />
				</div>
				
				<div>
					<input type = "hidden" name="category" value="floors" />
					<input type = "hidden" name="finsert" value= "finsert" />
				</div>
			</form>
			<div>
				<button id = "submitbutton" name = "submitbutton" type="button" value="submit">Submit</button>
			</div>
		</div>
	</body>
</html>

<?php
	include 'closedb.php';
?>