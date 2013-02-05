<?php

class Cookie
{

	public function __construct()
	{

	}

	//		Static function for setting cookies
	public static function set($data = array())
	{

		if(!is_array($data))
		{
			Alert::_throw(COOKIE_DATA_ERROR);
		}
		else
		{
			//		Check to ensure we have the minimum values for the cookie
			if(($data['name'] || $data['value']) == "")
			{
				//		We don't have the minimum values so we'll throw an error
				Alert::_throw(COOKIE_DATA_MISSING);
			}

			//		Check to see if a time has been defined
			if(!isset($data['time']))
			{
				//		No time has been defined, so we'll check the config for a default value
				if(strlen(DEFAULT_COOKIE_TIME) > 0)
				{
					//		The config has a default set, so we'll use that
					$data['time'] = time()+DEFAULT_COOKIE_TIME;
				}
				else
				{
					//		No default time is set, so we'll leave it blank
					$data['time'] = "";
				}
			}

			//		Check to see if a path has been defined
			if(!isset($data['path']))
			{
				//		No path has been defined, so we'll check the config for a default value
				if(DEFAULT_COOKIE_PATH != "")
				{
					//		The config has a default set, so we'll use that
					$data['path'] = DEFAULT_COOKIE_PATH;
				}
				else
				{
					//		No default path is set, so we'll leave it blank
					$data['path'] = "";
				}
			}

			//		Check to see if a domain has been defined
			if(!isset($data['domain']))
			{
				//		No domain has been defined, so we'll check the config for a default value
				if(DEFAULT_COOKIE_DOMAIN != "")
				{
					//		The config has a default set, so we'll use that
					$data['domain'] = DEFAULT_COOKIE_DOMAIN;
				}
				else
				{
					//		No default domain is set, so we'll leave it blank
					$data['domain'] = "";
				}
			}

			//		All checks have been done. Data has been set. We'll now set the cookie.
			$cookie = setcookie($data['name'], $data['value'], $data['time'], $data['path'], $data['domain']);
		}

	}

	public static function get($cookie_key)
	{
		return $_COOKIE[$cookie_key];
	}

	public static function destroy($cookie_key)
	{
		setcookie($cookie_key, '', 0);
	}

}