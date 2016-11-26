<?php
function ReturnData($key, $value) {

	if ($value == null) {
		$response = array(
			'status' => false,
			'message' => 'not found');
	} else {
		$response = array(
			'status' => true,
			'message' => 'Success',
			$key => $value);
	}

	echo json_encode($response);
}

//Get QuestString value with default value if querystring is not set
function GetQueryString($name, $default="") {
    return ValidRequiredQueryString($name) ? $_GET[$name] : $default;
}

//Check that query string param is not empty
function ValidRequiredQueryString($name) {
    return isset($_GET[$name]) && $_GET[$name] != "";
}

?>