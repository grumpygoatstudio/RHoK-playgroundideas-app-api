<?php

include("../app.php");
include("../models.php");
include("../helpers.php");


header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$userId = GetPost("userId", 0);
if ($userId == 0) {
	ReturnErrorData("No user");
	die;
}

$user = User::where("id", $userId)->first();
if ($user==null) {
	ReturnErrorData("No valid user");
	die;
}


if (ValidRequiredPost("designId")) {
	$playId = GetPost("designId", 0);
	$play = PlayGround::where("id", $playId)->first();

	if ($play->user_id != $user->id){
		ReturnErrorData("Error deleting (not for that user)");
		die;
	}

	$play->delete();

	ReturnData("playground_delete", "done");
} else {
	ReturnErrorData("No ID passed");
}
?>