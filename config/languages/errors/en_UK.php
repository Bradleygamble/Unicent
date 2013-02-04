<?php

	//		Set your error messages here:
	$error = array();

	//		Database error messages
	$error['DATABASE_SELECT_ERROR_MSG'] 		= "Database::select() - The values/fields you are trying to select are invalid";
	$error['DATABASE_GET_ERROR_MSG'] 			= "Database::get() - You have not defined a table name";
	$error['DATABASE_WHERE_ERROR_MSG'] 			= "Database::where() - Argument 2 should be an array()";
	$error['DATABASE_OR_WHERE_ERROR_MSG']		= "Database::select() - The values/fields you are trying to select are invalid";
	$error['DATABASE_DELETE_ERROR_MSG'] 		= "Database::select() - The values/fields you are trying to select are invalid";
	$error['DATABASE_RESULT_ARRAY_ERROR_MSG'] 	= "Database::select() - The values/fields you are trying to select are invalid";
	$error['DATABASE_ROW_ARRAY_ERROR_MSG'] 		= "Database::select() - The values/fields you are trying to select are invalid";
	$error['DATABASE_LIMIT_ERROR_MSG'] 			= "Database::select() - The values/fields you are trying to select are invalid";
	$error['DATABASE_GET_WHERE_ERROR_MSG'] 		= "Database::select() - The values/fields you are trying to select are invalid";
	$error['DATABASE_UPDATE_ERROR_MSG'] 		= "Database::select() - The values/fields you are trying to select are invalid";
	$error['DATABASE_CONNECTION_ERROR']			= "A connection to the Database could not be established.";
	$error['MYSQL_CONNECTION_ERROR']			= "A connection to the MySQL Server could not be established.";
	$error['MYSQL_FETCH_ASSOC_ERROR']			= "'mysql_fetch_assoc()' returned with no results.";
	$error['MYSQL_FETCH_ASSOC_ROW']				= "'mysql_fetch_row()' returned with no results.";

	//		Session error messages
	$error['SESSION_NOT_SET']					= "Session::get() - This session is currently not set";

	//		Cookie error messages
	$error['COOKIE_DATA_ERROR']					= "Cookie::set() - Cookie data must be an array.";
	$error['COOKIE_DATA_MISSING']				= "Cookie::set() - Cookie's must at least have a name and value.";

	foreach($error as $error_key => $error_val)
	{
		define($error_key, $error_val);
	}