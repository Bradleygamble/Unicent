<?php

class Alert
{

	public static $_throwpage;

	private function __construct() { }

	public static function _throw($string, $state = 'error')
	{
		$state = strtolower($state);

		if(UNICENT_DISPLAY_ALERTS == "on")
		{
			if($state === 'error')
			{
				self::$_throwpage = file_get_contents(ROOT . DS . 'system' . DS . 'alerts/throw_error.php');

				self::$_throwpage = str_replace("{error}", $string, self::$_throwpage);
			}
			else if($state === 'warning')
			{
				self::$_throwpage = file_get_contents(ROOT . DS . 'system' . DS . 'alerts/throw_warning.php');

				self::$_throwpage = str_replace("{warning}", $string, self::$_throwpage);
			}
			else if($state === 'success')
			{
				self::$_throwpage = file_get_contents(ROOT . DS . 'system' . DS . 'alerts/throw_success.php');

				self::$_throwpage = str_replace("{success}", $string, self::$_throwpage);
			}

			echo self::$_throwpage;
		}
	}

}