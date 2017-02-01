<?php

include("../app.php");
include("../models.php");
include("../helpers.php");


header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");


if (ValidRequiredQueryString("userId")) {
	$userId = GetQueryString("userId", 0);
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


if (ValidRequiredPost("filename")) {
	$assetName = GetQueryString("name", 0);
	if (ValidRequiredPost("file")) {
		$assetData = GetQueryString("file", 0);
		if ($assetData==null) {
			ReturnErrorData("Error: No valid asset file given.");
			die;
		}
		// check if asset exists
		$asset = Asset::where(["name"=>$assetName, "design_id"=>$design_id])->get();
		if ($asset==null) {
			//create a new asset
			$asset = new Asset();
		}
		// set db params 
		$asset->design_id = $designId;
		$asset->name = $assetName;
		$asset->contents = $assetData;
		$asset->save();
		ReturnData("design", $design);

	} else {
		ReturnErrorData("Error: No valid asset file given.");
		die;
	}		
} else {
	ReturnErrorData("Error: No valid asset name given.");
	die;
}

?>