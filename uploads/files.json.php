<?php
//header("Content-Type: application/json");

$objects = array();

$dir = new DirectoryIterator(dirname(__FILE__));
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
		$obj = new stdClass();
		$obj ->Name = $fileinfo->getFilename();
		$obj ->ImageName= $fileinfo->getFilename();
		$obj ->ModelName= $fileinfo->getFilename();
		$obj ->Catagory = "";
		array_push($objects, $obj);
    }
}

$response = new stdClass();
$response->Objects = $objects;

	echo json_encode($response, JSON_PRETTY_PRINT);
?>