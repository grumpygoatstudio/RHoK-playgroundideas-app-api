<?php

include("../app.php");
include("../models.php");
include("../helpers.php");


header("Content-Type: application/json");

if (isset($_GET["id"])) {
	$userId = GetQueryString("id", 0);
	$user = User::where("id", $_GET["id"])->first();
	ReturnData("user", $user);
} else {
	$users = User::all();
	ReturnData("users", $users);
}

?>