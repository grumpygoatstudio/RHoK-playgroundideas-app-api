<?php

require 'vendor/autoload.php';


use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;


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

/*
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
*/


// Make this Capsule instance available globally via static methods
$capsule->setAsGlobal();

// Setup the Eloquent ORM
$capsule->bootEloquent();

//get a bunch of useful paths
$base_dir  = __DIR__; // Absolute path to your installation, ex: /var/www/mywebsite
$doc_root  = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
$base_url  = preg_replace("!^${doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$port      = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
$domain    = $_SERVER['SERVER_NAME'];
$full_url  = "${protocol}://${domain}${disp_port}${base_url}"; # Ex: 'http://example.com', 'https://example.com/mywebsite', etc.

define("SCREENSHOT_UPLOAD_DIR",  $base_dir.'/uploads/');

?>