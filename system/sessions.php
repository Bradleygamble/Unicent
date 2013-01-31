<?php

class Session
{

	private __construct() 
	{
		session_start();
	}

	public function set($session_key, $session_val)
	{
		//		Set the session
		$_SESSION[$session_key] = $session_val;
	}

	public function get($session_key)
	{
		//		Check to see if we actually have this session
		if(!isset($_SESSION[$session_key]))
		{
			//		Display an error as the session does not exist
			Error::display(SESSION_NOT_SET);
		}
		//		Return a set session
		return $_SESSION[$session_key];
	}

	public function unset($session_key)
	{
		//		Unset the session
		unset($_SESSION[$session_key]);
	}

}