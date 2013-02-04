<?php

class Error
{

	public static $_throwpage;

	private function __construct() { }

	public static function _throw($error_string)
	{
		if(UNICENT_DISPLAY_ERRORS == "on")
		{
			self::$_throwpage = file_get_contents(ROOT . DS . 'system' . DS . 'errors/throw_error.php');

			self::$_throwpage = str_replace("{error}", $error_string, self::$_throwpage);

			echo self::$_throwpage;
		}
	}

}