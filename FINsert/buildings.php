<?php
/*
	Team: FIN
	Author: Dustin Abramson
	
	creates a form that allows user to input the information needed for creating a building object in
	the database.
	
	For more information about the requirements of this information please see create.php
*/

include("commoncode.php");
loggedIn();
top();   # print the shared top of the page
?>
</head>

	<body>
		<div id = "header">
		</div>
		<div class = "content">
			<h1>FINsert Buildings</h1>
			<p id = "results"> This is where results will be printed </p>
				<form id = "submit" action="create.php" method = "POST">
					<div>
						<strong>Building Name:</strong>
						<input type="text" name = "name" value="" />
					</div>
					
					<div>
						<strong>Latitude:</strong>
						<input type="text" name="latitude" id="lat" maxlength="10" size="10" />
					</div>
					
					<div>
						<strong>Longitude:</strong>
						<input type="text" name="longitude" id="lon" maxlength="10" size="10" />
					</div>
	                <?php
					include ('building.map.php');
					?>
					<div>
						<input type = "hidden" name="category" value="buildings" />
						<input type = "hidden" name="finsert" value= "finsert" />
					</div>
				</form>
							
					
			<div>
				<button id = "submitbutton" name = "submitbutton" type="button" value="submit">Submit</button>
			</div>
		</div>	
	</body>
</html>

