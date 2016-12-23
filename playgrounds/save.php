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

$user = User::where("user_id", $userId)->first();
if ($user==null) {
	//user does not exist, so lets create one!
	$user = new User();
	$user->User_Id = $userId;
	//name?
	$user->save();
}

$imagePathParts = pathinfo($_FILES['screenshot']['name']);
$filedatestamp = date('mdYHis');
$savedFilename = str_replace("//", "", $imagePathParts['filename']) . "-" . $filedatestamp . "." . $imagePathParts['extension'];
$uploadfile = SCREENSHOT_UPLOAD_DIR . $savedFilename;

if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $uploadfile)) {
	$playgroundName = GetPost("name", "New Playground");

	$playground = new Playground();

	$playground->User_Id = $userId;
	$playground->Name = $playgroundName;
	$playground->Screenshot = $savedFilename;
	$playground->Model = GetPost("model", "");

	$playground->save();

	//non DB field
	$playground->Screenshot_Url = SCREENSHOT_URL_DIR.$playground->Screenshot;

	ReturnData("playground", $playground);
} else {
	ReturnErrorData("Error uploading screenshot");
}
?>