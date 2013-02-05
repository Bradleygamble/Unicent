<?php 

class this
{

	function __construct()
	{
		echo "This!";
	}

	public function is($arg1)
	{
		Database::get($arg1)->where();
	}

}