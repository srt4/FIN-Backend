<?php

/*
	Team: FIN
	Author: Dustin Abramson
	
	creates a form that allows user to input the information needed for creating a region object in
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
			<h1>FINsert Regions</h1>
			<p id = "results"> This is where results will be printed </p>
				<form id = "submit" action="create.php" method = "POST">
					<div>
						<strong>Latitude:</strong>
						<input id = "latitude" type="text" name="latitude" maxlength="10" size="10" />
					</div>
					
					<div>
						<strong>Longitude:</strong>
						<input id = "longitude" type="text" name="longitude" maxlength="10" size="10" />
					</div>
					
					<div>
						<input type = "hidden" name="category" value="regions" />
						<input type = "hidden" name="finsert" value= "finsert" />
					</div>
				</form>
				
			<div>
				<button id = "submitbutton" name = "submitbutton" type="button" value="submit">Submit</button>
			</div>
		</div>
	</body>
</html>