<?php
header("Content-Type: application/json");



function GetData() {

	$response = array(
		'status' => true,
		'message' => 'Success',
		'data' => ['bunch of data']);

	echo json_encode($response);
}

?>