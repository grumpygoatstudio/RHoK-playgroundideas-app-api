<?php

require '../start.php';
require '../helpers.php';

use Models\Image; 
use Models\User;
use Models\Playground;

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");


if (ValidRequiredPost("userId")) {
	$userId = GetPost("userId", 0);
	// $user = Users::get_user($userId);
	$user = User::where("user_id", $userId)->first();
	if ($user==null) {
		ReturnErrorData("No valid user: ".$userId);
		die;
	}
} else {
	ReturnErrorData("Error: No valid user ID given.");
	die;
}

if (ValidRequiredPost("designId")) {
	$designId = GetPost("designId", 0);
	$design = PlayGround::where("id", $designId)->first();
	if ($design->user_id !== $user->user_id){
		ReturnErrorData("Error: Design not accessable for that user");
		die;
	}
} else {
	ReturnErrorData("Error: No valid design ID given.");
	die;
}

if (isset($_FILES['image']) && $_FILES['image'] != "") {
	$fileName = $_FILES['image']['name'];
	$imagePathParts = pathinfo($_FILES['image']['name']);
	$imageType = $_FILES['image']['type'];
	$filedatestamp = date('mdYHis');
	$savedFilename = str_replace("//", "", $imagePathParts['filename']) . "-" . $filedatestamp . "." . $imagePathParts['extension'];
	$uploadfile = SCREENSHOT_UPLOAD_DIR . $savedFilename;

	if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
		$imageUrl = SCREENSHOT_URL_DIR.$fileName;
		$image = Image::create([
			'user_id'=>$userId, 
            'design_id'=>$designId, 
            'name'=>$fileName, 
            'type'=>$imageType, 
            'url'=>$imageUrl
		]);
		ReturnData("image", $image);
	} else {
		ReturnErrorData("Error uploading image");
	}
} else {
	ReturnErrorData("Error: No valid image file given.");
	die;
}	