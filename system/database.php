<?php

class Database
{

	private static $qry_select;
	private static $qry_where;
	private static $qry_query;
	private static $qry_table;
	private static $qry_results;
	private static $qry_delete;
	private static $qry_limit;
	private static $qry_update;

	private __construct() { }

	public static function get($table = "")
	{
		//		We need to clear out any strings as the user is selecting a new table
		self::$qry_query = "";
		self::$qry_where = "";
		self::$qry_results = "";

		//		Set our table to the user defined table
		self::$qry_table = $table;

		if(self::$qry_table == "")
		{
			Error::display(DATABASE_GET_ERROR_MSG);
		}

		return self::$qry_table;
	}

	//		---------------------------------------------------------------

	public static function select($data = "*")
	{	
		//		Check to see if the data we recieve is an array
		if(is_array($data))
		{
			//		Loop through all of the data to build our SELECT string
			foreach($data as $data_val)
			{
				//		Check to see if we have any data in our SELECT string already
				if(self::$qry_select == "")
				{	
					//		Start a SELECT string
					self::$qry_select = "SELECT `" . $data_val . "`";
				}
				else
				{
					//		Append to the SELECT string that we already have
					self::$qry_select .= ", `" . $data_val . "`";
				}
			}

			return self::$qry_select;

		}
		else if($data != "" || $data == "*")
		{
			//		We need to do something here...
		}
		else
		{
			Error::display(DATABASE_SELECT_ERROR_MSG);
		}

		return self::$qry_select;
	}

	//		---------------------------------------------------------------

	public static function where($data = NULL)
	{
		//		Check to see if the data we were given is an array
		if(is_array($data))
		{
			//		We have an array so we'll loop it round and build our WHERE string
			foreach($data as $data_key => $data_val)
			{
				//		Default command is always "="
				$command = "=";

				//		Check to see if the user is defining their own command
				if(strstr($data_val, "=", TRUE))
				{
					//		Set the command to the users chosen command
					$command = strstr($data_val, "=", TRUE) . "=";
				}

				//		Check to see if the string is currently empty
				if(self::$qry_where == "")
				{
					//		We'll build the string from the beginning
					self::$qry_where = "`" . $data_key . "`" . $command . "'" . $data_key . "'";
				}
				else
				{
					//		The string isn't empty so we'll append to it
					self::$qry_where .= "`" . $data_key . "`" . $command . "'" . $data_key . "'";
				}
			}
		}
		else
		{
			//		The user has not supplied an array, so we display an error
			Error::display(DATABASE_WHERE_ERROR_MSG);
		}

		return self::$qry_where;
	}

	//		---------------------------------------------------------------

	public static function or_where()
	{

	}

	//		---------------------------------------------------------------

	public static function delete()
	{

	}

	//		---------------------------------------------------------------

	public static function update()
	{

	}

	//		---------------------------------------------------------------

	public static function limit()
	{

	}

	//		---------------------------------------------------------------

	public static function order_by()
	{

	}

	//		---------------------------------------------------------------

	public static function result_row()
	{
		self::$qry_query = _build_query();
		return self::$qry_results = _run_query_row();
	}

	//		---------------------------------------------------------------

	public static function result_array()
	{
		self::$qry_query = _build_query();
		return self::$qry_results = _run_query_array();
	}

	//		---------------------------------------------------------------

	private function _build_query()
	{
		//		We ned to piece together the qrysy string
		self::$qry_query = self::$qry_select . self::$qry_where . self::$qry_order_by . self::$qry_limit;

		return self::$qry_query;
	}

	//		---------------------------------------------------------------

	private function _run_query_row()
	{
		self::$qry_results = mysql_fetch_row(self::$qry_query);

		return self::$qry_results;
	}

	//		---------------------------------------------------------------

	private function _run_query_array()
	{
		self::$qry_results = mysql_fetch_assoc(self::$qry_query);

		return self::$qry_results;
	}

}