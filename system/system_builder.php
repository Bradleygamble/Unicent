<?php
	
	//		Array of files that we want to load on startup
	$load_files = array(
			'config' . DS . 'languages' . DS . LANGUAGE_SELECTED => 'php',
			'system' . DS . 'errorctrl' => 'php',
			'system' . DS . 'database' => 'php',
			'system' . DS . 'sessions' => 'php',
			'system' . DS . 'loader' => 'php',
			'system' . DS . 'cookies' => 'php',
			'system' . DS . 'template' => 'php'
			);

	//		Loop through all of the files to load them
	foreach($load_files as $key => $value)
	{	
		//		Supress any include errors, as we will write them to the log instead
		$load = @include $key . '.' . $value;

		//		If the file fails to load we write it to the log
		if(!$load)
		{
			//		Check to see if we have the log file created and open already
			if(!isset($log))
			{
				//		Prepare the log for us to write to
				$log = fopen(ERROR_LOG_DIRECTORY . DS . "log" . date("Ymdhis") . ".txt", "x");
			}

			fwrite($log, "[" . date("d/m/Y H:i:s") . "] -- Failed to load SYSTEM FILE: '" . $key . "." . $value . "' \n");
		}
	}

	//		Check to see if the log file is open
	if(isset($log))
	{
		//		Close the log file
		fclose($log);
	}

	//		Now we need to define everything! 

	//		Set up our database connection
	Database::_set_connection($CONNECTION['hostname'], $CONNECTION['username'], $CONNECTION['password'], $CONNECTION['database']);