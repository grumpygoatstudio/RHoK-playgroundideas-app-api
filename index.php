<?php



?>

<html>
	<head>

	</head>
	<body>
		<h1>Testing the API</h1>
		<hr />
		<h5>JSON</h5>
		<ul>
			<li><a href="test.php" target="_blank">Static test JSON</a></li>
		</ul>
		<hr />
		<h5>Get</h5>
		<ul>
			<li><a href="users/get.php" target="_blank">Get all Users</a></li>
			<li><a href="users/get.php?id=1" target="_blank">Get one User</a></li>
			<li><a href="playgrounds/get.php" target="_blank">Get all Playgrounds</a></li>
			<li><a href="playgrounds/get.php?userId=1" target="_blank">Get all Playgrounds for one user</a></li>
			<li><a href="playgrounds/get.php?id=1" target="_blank">Get one Playground</a></li>
		</ul>
		<hr />
		<h5>Save Playground</h5>
		<form action="playgrounds/save.php" method="post" target="_blank" enctype="multipart/form-data">
			<p>
				<label for="userId">User ID:</label><input name="userId" type="number" />
			</p>
			<p>
				<label for="name">Playground Name:</label><input name="name" type="text" />
			</p>
			<p>
				<label for="name">Screenshot file:</label><input name="screenshot" type="file" />
			</p>
			<input type="submit" />
		</form>
	</body>
</html>