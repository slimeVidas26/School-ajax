<?php
session_start();

define("UPLOAD_DIR", 'uploads/');

$root = dirname(__FILE__);
$root = substr($root, -9);
$root = str_replace("\\", '/', $root);
define('ROOT', $root);
//echo $root;

spl_autoload_register(function ($class_name) {

	$directorys = array(
		'app/Models/',
		'app/Views/',
		'app/Controllers/',
		'libraries/',

	);

	foreach ($directorys as $directory) {
		$class_name = strtolower($class_name);
		$f = $directory . 'class.' . $class_name . '.php';

		if (file_exists($f)) {
			require_once ($f);
			return;
		}

	}
});