<?php

	define("ROOT", dirname(dirname(__FILE__)));
	define("DS", "/");

	require_once(ROOT . DS . 'config/configuration.php');
	require_once(ROOT . DS . 'config/database.php');

	if(ENVIRONMENT == "development")
	{
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	}

	require_once(ROOT . DS . 'system/system_builder.php');
	
	$url = @$_GET['url'];

	$url = explode('/', $url);

	if(isset($url[0]) && $url[0] != "")
	{
		$controller = strtolower($url[0]);
		array_shift($url);

		$function =	strtolower($url[0]);
		array_shift($url);

		require_once(ROOT . DS . 'public' . DS . 'Controllers' . DS . $controller . '.php');

		$con = new $controller();
		$function = call_user_func_array(array($con, $function), $url);
	}

