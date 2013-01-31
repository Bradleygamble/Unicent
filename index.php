<?php

	include 'config/configuration.php';

	if(ENVIRONMENT == "development")
	{
		error_reporting(E_ALL);
		ini_set('error_reporting', E_ALL);
	}

	define('DS', '/');
	define('ROOT', dirname(dirname(__FILE__)));

	include '/system/system_builder.php';
	
	Database::get('hi')->where(array('hello' => 'd'));
