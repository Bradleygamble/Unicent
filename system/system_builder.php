<?php
	
	//		Array of files that we want to load on startup
	$load_files = array(
			ROOT . DS . 'config' . DS . 'languages' . DS . 'errors' . DS . LANGUAGE_SELECTED => 'php',
			ROOT . DS . 'system' . DS . 'core' . DS . 'errorctrl' => 'php',
			ROOT . DS . 'system' . DS . 'core' . DS . 'database' => 'php',
			ROOT . DS . 'system' . DS . 'core' . DS . 'sessions' => 'php',
			ROOT . DS . 'system' . DS . 'core' . DS . 'loader' => 'php',
			ROOT . DS . 'system' . DS . 'core' . DS . 'cookies' => 'php',
			ROOT . DS . 'system' . DS . 'core' . DS . 'template' => 'php'
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
				$log = fopen(ROOT . DS . ERROR_LOG_DIRECTORY . DS . "log" . date("Ymdhis") . ".txt", "x");
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
	echo '<link href="' . ROOT_FOLDER . '/assets/system/styles/core.css" type="text/css" rel="stylesheet" />'; 
	echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>';
	echo '<script src="' . ROOT_FOLDER . '/assets/system/js/scripts.js" type="text/javascript"></script>'; 

	//		Set up our database connection
	Database::_set_connection($CONNECTION['hostname'], $CONNECTION['username'], $CONNECTION['password'], $CONNECTION['database']);