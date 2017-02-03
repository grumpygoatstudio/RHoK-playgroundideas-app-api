<?php

if ($_SERVER['HTTP_HOST'] == "playgroundideas.endzone.io") {
    defined("DBDRIVER")or define('DBDRIVER', 'mysql');
    defined("DBHOST")or define('DBHOST', 'localhost');
    defined("DBNAME")or define('DBNAME', 'playgroundideas-app');
    defined("DBUSER")or define('DBUSER', 'root');
    defined("DBPASS")or define('DBPASS', 'root');

    defined("APPROOT_URL")or define('APPROOT_URL', "http://".$_SERVER['SERVER_NAME'] . "/app-api" . DIRECTORY_SEPARATOR);
} else {
    defined("DBDRIVER")or define('DBDRIVER', 'mysql');
    defined("DBHOST")or define('DBHOST', 'localhost');
    defined("DBNAME")or define('DBNAME', 'playgroundideas-app');
    defined("DBUSER")or define('DBUSER', 'root');
    defined("DBPASS")or define('DBPASS', 'root');

    defined("APPROOT_URL")or define('APPROOT_URL', "http://".$_SERVER['SERVER_NAME'] . DIRECTORY_SEPARATOR);   
}

defined("SCREENSHOT_UPLOAD_DIR")or define("SCREENSHOT_UPLOAD_DIR",  __DIR__.'/uploads/');
defined("SCREENSHOT_URL_DIR")or define("SCREENSHOT_URL_DIR",   APPROOT_URL. 'uploads/');