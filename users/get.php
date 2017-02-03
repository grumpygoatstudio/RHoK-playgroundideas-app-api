<?php

require '../start.php';
require '../helpers.php';

use Models\Image; 
use Models\User;
use Models\Playground;

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if (isset($_GET["id"])) {
	$userId = GetQueryString("id", 0);
	$user = User::where("user_id", $_GET["id"])->first();
	ReturnData("user", $user);
} else {
	$users = User::all();
	ReturnData("users", $users);
}

?>