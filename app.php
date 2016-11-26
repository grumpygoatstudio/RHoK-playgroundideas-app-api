<?php

require 'vendor/autoload.php';


use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;


if ($_SERVER['HTTP_HOST'] == "playgroundideas.endzone.io") {
	//hosted testing version
	$capsule->addConnection([
		'driver'    => 'mysql',
		'host'      => 'localhost',
		'database'  => 'mygiftvo_playgroundideas',
		'username'  => 'mygiftvo_playgro',
		'password'  => 'DRm1ReA3R3Ex',
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	]);

} else {
	//local testing version
	$capsule->addConnection([
		'driver'    => 'mysql',
		'host'      => 'localhost',
		'database'  => 'playgroundideas-app',
		'username'  => 'root',
		'password'  => 'root',
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	]);

}




// Make this Capsule instance available globally via static methods
$capsule->setAsGlobal();

// Setup the Eloquent ORM
$capsule->bootEloquent();

define("SCREENSHOT_UPLOAD_DIR",  __DIR__.'/uploads/');
define("SCREENSHOT_URL_DIR",  "http://".$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/uploads/');

?>