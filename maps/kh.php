<?php

// DEBUG
//file_put_contents("log", $_SERVER['QUERY_STRING'] . "\n", FILE_APPEND);

$zoom = $_GET['zoom'];
$x    = $_GET['x'];
$y    = $_GET['y'];

$filename = "data/$zoom/$x-$y.png";

if (file_exists($filename)) {
	header("Content-Type: image/png");
	readfile($filename);
} else {
	header("HTTP/1.0 404 Not Found");
	header("Content-Type: text/plain");
	echo "404 File Not Found";
}

?>
