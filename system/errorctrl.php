<?php

class Error
{

	private function __construct() { }

	public static function display($error_string)
	{
		if(UNICENT_DISPLAY_ERRORS == "on")
		{
			echo "ERROR: " . $error_string;
		}
	}

}