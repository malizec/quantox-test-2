<?php

namespace App;

define("DIR", __DIR__ . '/../');

// Add your base url
$url = 'http://localhost:3000';

define("URL", $url);

/**
 * @return Request uri 
 */
$requested_uri = $_SERVER['REQUEST_URI'];

//
if ( count($requested_uri) == 0 && empty($requested_uri) ) {
	return false;
} elseif(count($requested_uri) == 0) {
	$url = $requested_uri;
} else {
	$url = explode('/', $requested_uri);
}


require_once DIR.'/config/function.php';
require_once DIR.'/config/routes.php';
