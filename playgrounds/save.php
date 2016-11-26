<?php

include("../app.php");
include("../models.php");
include("../helpers.php");


header("Content-Type: application/json");

$userId = GetPost("userId", 0);
if ($userId == 0) {
	ReturnErrorData("No user");
	die;
}

$uploadfile = SCREENSHOT_UPLOAD_DIR . basename($_FILES['screenshot']['name']);
if (!move_uploaded_file($_FILES['screenshot']['tmp_name'], $uploadfile)) {
	ReturnErrorData("Error uploading screenshot");
	die;
}

$playgroundName = GetPost("name", "New Playground");

$playground = new Playground();

$playground->User_Id = $userId;
$playground->Name = $playgroundName;
$playground->Screenshot = $_FILES['screenshot']['name'];

$playground->save();

//non DB field
$playground->Screenshot_Url = SCREENSHOT_URL_DIR.$playground->Screenshot;

ReturnData("playground", $playground);
?>