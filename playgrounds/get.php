<?php

include("../app.php");
include("../models.php");
include("../helpers.php");


header("Content-Type: application/json");

if (isset($_GET["id"])) {
	$playId = GetQueryString("id", 0);
	$play = PlayGround::where("id", $_GET["id"])->first();
	ReturnData("playground", $play);
} else {
	$plays = Playground::all();
	ReturnData("playgrounds", $plays);
}

?>