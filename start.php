<?php 

require 'config.php';
require 'vendor/autoload.php';

use Models\Database;
new Database();

define("SCREENSHOT_UPLOAD_DIR",  __DIR__.'/uploads/');
define("SCREENSHOT_URL_DIR",   APPROOT_URL. 'uploads/');

?>
