<?php

require 'start.php';

use Controllers\Images; 
use Controllers\Users;
use Controllers\Playgrounds;

// $image = Images::create_image("12","1","TestImage3.jpg","");
// echo(json_encode($image));
?>

<html>
	<head>

	</head>
	<body>
		<h1>Testing the Wordpress integration:</h1>
		<ul>
			<li style="font-weight: bold;padding: 8px;;font-size:1.2em"><a href="wp-simulate/list.php?userId=<?= rand() ?>" target="_blank">'Login to Wordpress' as a user who has not used Unity app before</a></li>
			<li><a href="wp-simulate/list.php?userId=1" target="_blank">'Login' as a user who has saved playgrounds</a></li>
		</ul>
		<hr />
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
			<li><a href="users/get.php?id=22" target="_blank">Get one User</a></li>
			<li><a href="playgrounds/get.php" target="_blank">Get all Playgrounds</a></li>
			<li><a href="playgrounds/get.php?userId=1" target="_blank">Get all Playgrounds for one user</a></li>
			<li><a href="playgrounds/get.php?id=1" target="_blank">Get one Playground</a></li>
			<li><a href="assets/get.php?userId=12&designId=1&assetName=testPhotoAsset.jpg" target="_blank">Get an Asset</a></li>
			<li><a href="assets/playground_get_all.php?userId=12&designId=1" target="_blank">Get All Assets From A Playground</a></li>
		</ul>
		<hr />
		<h5>Save Playground</h5>
		This will create the user if not already there, save the playground to the database & save the uploaded file to the server.
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
			<p>
				<label for="name">Playground Data Model (JSoN):</label><input name="model" type="text" />
			</p>
			<input type="submit" />
		</form>

		<hr />
		<h5>Update Playground</h5>
		This will update an existing playground, if one with this ID exists, otherwise it will create a new one.
		<form action="playgrounds/save.php" method="post" target="_blank" enctype="multipart/form-data">
			<p>
				<label for="userId">Playground ID:</label><input name="designId" type="number" />
			</p>
			<p>
				<label for="userId">User ID:</label><input name="userId" type="number" />
			</p>
			<p>
				<label for="name">Playground Name:</label><input name="name" type="text" />
			</p>
			<p>
				<label for="name">Screenshot file:</label><input name="screenshot" type="file" />
			</p>
			<p>
				<label for="name">Playground Data Model (JSoN):</label><input name="model" type="text" />
			</p>
			<input type="submit" />
		</form>
		<hr />
		<h5>Delete Playground</h5>
		This will delete a saved playground.
		<form action="playgrounds/delete.php" method="get" target="_blank" enctype="multipart/form-data">
			<p>
				<label for="userId">User ID:</label><input name="userId" type="number" />
			</p>
			<p>
				<label for="designId">Playground ID:</label><input name="designId" type="number" />
			</p>
			<input type="submit" />
		</form>
	</body>
</html>