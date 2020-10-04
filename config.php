<?php
	require_once('defines.php');

	global $config;
	$config = array();

	if (ENVIRONMENT == "development") {
		define("BASE_URL", "http://localhost/");
		$config['dbname'] = "saas";
		$config['host'] = "localhost";
		$config['dbuser'] = "root";
		$config['dbpass'] = "";
	}else{
		define("BASE_URL", "http://localhost/");
		$config['dbname'] = "saas";
		$config['host'] = "localhost";
		$config['dbuser'] = "root";
		$config['dbpass'] = "";
	}
?>