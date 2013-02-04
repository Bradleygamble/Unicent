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
	private static $qry_order_by;

	private static $_connection = null;
	private static $_instance = null;

	public function __construct() 
	{ 

	}

	public static function _set_connection($hostname, $username, $password, $database)
	{
		if(self::$_connection === null)
		{
			$mysql_connect = @mysql_connect($hostname, $username, $password);
			$database_connect = @mysql_select_db($database);

			if($mysql_connect && $database_connect)
			{
				self::$_connection == TRUE;
			}
		}

	}

	public static function get($table = "")
	{
		self::$_instance = new self;

		//		We need to clear out any strings as the user is selecting a new table
		self::$qry_query = "";
		self::$qry_where = "";
		self::$qry_results = "";

		//		Check to see if a table was actually supplied
		if(self::$qry_table == "")
		{
			//		If a table was not supplied, we'll throw an error
			Error::_throw(DATABASE_GET_ERROR_MSG);
		}
		else
		{
			//		Set our table to the user defined table
			self::$qry_table = $table;
		}

		//		Return an instance of this
		return self::$_instance;
	}

	//		---------------------------------------------------------------

	public static function select($data = "*")
	{	
		self::$_instance = new self;

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
		}
		else if($data != "" || $data == "*")
		{
			//		We need to do something here...
		}
		else
		{
			//		If a database was not supplied, we'll throw an error
			Error::_throw(DATABASE_SELECT_ERROR_MSG);
		}

		//		Return an instance of this
		return self::$_instance;
	}

	//		---------------------------------------------------------------

	public function where($data = NULL)
	{
		self::$_instance = new self;

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
			Error::_throw(DATABASE_WHERE_ERROR_MSG);
		}

		return self::$_instance;
	}

	//		---------------------------------------------------------------

	public function or_where()
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

	public function limit()
	{

	}

	//		---------------------------------------------------------------

	public function order_by()
	{

	}

	//		---------------------------------------------------------------

	public function result_row()
	{
		self::$qry_query = $this->_build_query();
		return self::$qry_results = $this->_run_query_row();
	}

	//		---------------------------------------------------------------

	public function result_array()
	{
		self::$qry_query = $this->_build_query();
		return self::$qry_results = $this->_run_query_array();
	}

	//		---------------------------------------------------------------

	private function _build_query()
	{
		//		We ned to piece together the qrysy string
		self::$qry_query = self::$qry_select . self::$qry_where . self::$qry_order_by . self::$qry_limit;

		//		We want to return with the query
		return self::$qry_query;
	}

	//		---------------------------------------------------------------

	private function _run_query_row()
	{
		//		Get the actual results from the row
		self::$qry_results = @mysql_fetch_row(self::$qry_query);

		//		Check to see if we actually have any results
		if(empty(self::$qry_results))
		{
			//		If we don't have any results, we'll _throw an error
			Error::_throw(MYSQL_FETCH_ROW_ERROR);
		}

		//		Return the results
		return self::$qry_results;
	}

	//		---------------------------------------------------------------

	private function _run_query_array()
	{
		//		Get the actual results from the array
		self::$qry_results = @mysql_fetch_assoc(self::$qry_query);

		//		Check to see if we actually have any results
		if(empty(self::$qry_results))
		{
			//		If we don't have any results, we'll _throw an error
			Error::_throw(MYSQL_FETCH_ASSOC_ERROR);
		}

		//		Return the results
		return self::$qry_results;
	}

}