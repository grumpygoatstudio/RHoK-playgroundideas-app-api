<?php

$apiUrl = "http://playgroundideas.endzone.io/app-api/";
$userId = $_GET["userId"];

//NB: In Wordpress calls the the Json API should use wp_ methods & pass the WP user id

$jsonurl = $apiUrl."/playgrounds/get.php?userId=".$userId;
$json = file_get_contents($jsonurl);
$response = json_decode($json);
$playgrounds = $response->playground;
$hasPlaygrounds = count($playgrounds)>0;

?>
<html>
	<head>
		<style>
			table {
				border-collapse: collapse;
			}
			th {
				background-color: lightblue;
			}
			table, th, td {
				border: 1px solid black;
				padding: 4px
			}
		</style>
	</head>
	<body>
		<h1>Welcome user <?= $userId ?></h1>
		<a href="app.php?userId=<?= $userId  ?>">Start a new design</a>
		<hr />
		<?php
		if ($hasPlaygrounds) { ?>
			<h5>Your saved playground ideas</h5>
			<table>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Screenshot Name</th>
					<th>Screenshot</th>
					<th></th>
				</tr>
				<?php
				foreach ($playgrounds as $p) { ?>
					<tr>
						<td><?= $p->id ?></td>
						<td><?= $p->name ?></td>
						<td><?= $p->screenshot ?></td>
						<td><img src="<?= $p->Screenshot_Url ?>" /></td>
						<td><a href="app.php?userId=<?= $userId  ?>&designId=<?= $p->id ?>">Edit this design</a></td>
					</tr>
				<?php } ?>
			</table>
			<?php
		} else { ?>
			You don't have any saved playground ideas yet.
		<?php } ?>
	</body>
</html>