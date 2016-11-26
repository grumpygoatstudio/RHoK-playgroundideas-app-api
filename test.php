<?php
header("Content-Type: application/json");

GetData();

function GetData() {


	echo '{"status":true,"message":"Success","user":{"id":1,"remote_id":22,"name":"Barry"}}';
}

?>