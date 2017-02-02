<?php

include("../app.php");
include("../models.php");
include("../helpers.php");


header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$designId = GetQueryString("designId", 0);
if ($designId == 0) {
	ReturnErrorData("No design");
	die;
}

$design = Playground::where("id", $designId)->first();
if ($design==null) {
	ReturnErrorData("No valid playgrounds: ".$designId);
	die;
}

if (ValidRequiredQueryString("assetName")) {
	$assetName = GetQueryString("assetName", 0);
	$asset = Asset::where("name", $assetName)->first();
	if ($asset==null) {
		ReturnErrorData("No valid asset");
		die;
	}
	if ($asset->design_id !== $design->id) {
		ReturnErrorData("Error deleting (not for that asset)");
		die;
	}

	$asset->delete();

	ReturnData("asset_delete", "done");
} else {
	ReturnErrorData("No ID passed");
}
?>