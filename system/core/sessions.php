<?php

class Session
{
	private static $_session = NULL;

	//		Construction function
	public function __construct() 
	{
		//		Start a session if the session hasn't already been started
		if(self::$_session === NULL)
		{
			//		Set the session
			self::$_session = session_start();
		}
	}

	//		Static function for setting a session
	public static function set($session_key, $session_val)
	{
		//		Set the session
		$_SESSION[$session_key] = $session_val;
	}

	//		Static function for getting the value of a session
	public static function get($session_key)
	{
		//		Check to see if we actually have this session
		if(!isset($_SESSION[$session_key]))
		{
			//		Display an error as the session does not exist
			Alert::_throw(SESSION_NOT_SET, 'error');
		}
		//		Return a set session
		return $_SESSION[$session_key];
	}

	//		Static function for destroying a session
	public static function destroy($session_key)
	{
		//		Destroy the session
		unset($_SESSION[$session_key]);
	}

}