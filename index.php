<?php

	include 'config/configuration.php';
	include 'config/database.php';

	if(ENVIRONMENT == "development")
	{
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	}

	define("DS", "/");
	if(ROOT_FOLDER == "")
	{
		define("ROOT", dirname(dirname(__FILE__)));
	}
	else
	{
		define("ROOT", dirname(__FILE__));
	}

	include 'system/system_builder.php';

	echo "Hi'";
	
	Database::get('hi')->where(array('sadfas' => 'asadf'))->result_array();