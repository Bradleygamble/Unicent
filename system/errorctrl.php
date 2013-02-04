<?php

class Error
{

	private function __construct() { }

	public static function display($error_string)
	{
		if(UNICENT_ERROR_LOGGING == "on")
		{
			echo "ERROR: " . $error_string;
		}
	}

}