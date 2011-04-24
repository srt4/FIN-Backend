	<?php
	/*
	Team: FIN
	Author: Dustin Abramson
	
	school_supplies.php allows a user to input information into fields for the easy creation of a school supplies
	location into FINsert.
	*/
	include("commoncode.php");
	loggedIn();
	top();   # print the shared top of the page
	sharedScript();

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
			<h1>FINsert School Supplies</h1>
			<p id = "results"> This is where results will be printed </p>
			<form id = "submit" action="create.php" method = "POST">
								<div>
					<input id = "in" type = "radio" name = "inOrOut" value = "inBuilding" checked> In A Building<br>
					<input id = "out" type = "radio" name = "inOrOut" value = "outside"> Not In A Building
				</div>
			
				<div>
					<strong>Choose the Building</strong>
					<select id = "buildings" name = "bid">
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
				</div>
				
				<div>
					<strong>Choose the Floor</strong>
					<select id = "floors" name = "fid">
					
					</select>
				</div>
				
				<div>
					<strong>Latitude:</strong>
					<input id = "latitude" type="text" name="latitude" maxlength="10" size="10" />
				</div>
					
				<div>
					<strong>Longitude:</strong>
					<input id = "longitude" type="text" name="longitude" maxlength="10" size="10" />
				</div>
				
				<div>
					<strong>Its Special Info:</strong>
					<input type="text" name = "special_info" maxlength="254" size="25" />
				</div>
				
				<div>
					<strong>What does it have?:</strong> <br />
					<input type = "checkbox" name = "bb" value = "bb" /> Blue Book<br />
					<input type = "checkbox" name = "sc" value = "sc" /> Scantron<br />
					<input type = "checkbox" name = "print" value = "print" /> Printing
				</div>
				
				<div>
					<input type = "hidden" name="category" value="school_supplies" />
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