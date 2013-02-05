<?php

	include 'config/configuration.php';
	include 'config/database.php';

	if(ENVIRONMENT == "development")
	{
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	}

	if(ROOT_FOLDER == "")
	{
		define("ROOT", dirname(dirname(__FILE__)));
	}
	else
	{
		define("ROOT", dirname(__FILE__));
	}

	define("DS", "/");

	include 'system/system_builder.php';
	
	Database::get('hi')->where(array('sadfas' => 'asadf'))->result_array();

	Alert::_throw('Hey, you did it!', 'success');

	$cookie = array('name' => "MyCookie!", 'value' => "MyValue!");
	Cookie::set($cookie);

	echo Cookie::get($cookie['name']);
