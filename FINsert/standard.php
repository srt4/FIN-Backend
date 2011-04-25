<?php
	/*
	Team: FIN
	Author: Dustin Abramson
	
	standard.php is a general form that represents the information input required for many of
	the entries present in the FIN database. If a new table is inserted the FIN front page
	will in turn create a new form when clicked on. Allows the selection of a building name
	if adding the object inside a building, but allows the specification of latitude and
	longitude coordinates if not.
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
			<h1>FINsert <?= "".$_REQUEST["category"] ?></h1>
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
					<input id = "lat" type="text" name="latitude" maxlength="10" size="10" />
				</div>
					
				<div>
					<strong>Longitude:</strong>
					<input id = "lon" type="text" name="longitude" maxlength="10" size="10" />
				</div>
				
				<div>
					<strong>Special Info:</strong>
					<input type="text" name = "special_info" maxlength="254" rows="5" onKeyDown="countRemaining(this)" onKeyUp="countRemaining(this)" />
					<br />
					<span style="font-size:16px">Remaining characters: <span type="text" id="countdown">254</span></span>
						<script type="text/javascript"> 
							function countRemaining(object) {
								length = object.value.length;
								// Pretty hacky but this fixes the select all bug.
								/*
								if (length > 254-document.getElementById('countdown').innerHTML) {
									var str = document.getElementsByName('special_info')[0].value;
									document.getElementsByName('special_info')[0].value = 
										str.replace(/(?!'\\n')(?!'\')(?!'\n')\n(?!\n)(?!'\')(?!'\\n')$/g, '\\n\n');	
								}*/
								// need to update this, since we might've inserted some characters
								length = 254-object.value.length;
								document.getElementById('countdown').innerHTML = length;
								// Stop the user from adding input if length > maxLength	
								if (length < 0) 
									document.getElementsByName('special_info')[0].value = 
										document.getElementsByName('special_info')[0].value.substring(0, 254);
							}
						</script> 

				</div>
				
				<div>
					<input type = "hidden" name="category" value= <?= "".$_REQUEST["category"]."" ?> />
					<input type = "hidden" name="finsert" value= "finsert" />
				</div>
			</form>
			<? include('building.map.php') ?>
			<div>
				<button id = "submitbutton" name = "submitbutton" type="button" value="submit">Submit</button>
			</div>
		</div>
	</body>
</html>
<?php
	include 'closedb.php';
?>

