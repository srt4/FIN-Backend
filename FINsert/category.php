<?php
/*
	Team: FIN
	Author: Dustin Abramson
	
	Allows a user to create a standard categorical item in the database.
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
			<h1>FINsert Categories</h1>
			<p id = "results"> This is where results will be printed </p>
				<form id = "submit" action="insert_category.php" method = "POST">
					<div>
						<p>The standard for category names is all lowercase with underscores instead of spaces</p>
						<strong>Category Name:</strong>
						<input type="text" name = "name" value="" />
					</div>
				</form>
				
			<div>
				<button id = "submitbutton" name = "submitbutton" type="button" value="submit">Submit</button>
			</div>
		</div>
	</body>
</html>

