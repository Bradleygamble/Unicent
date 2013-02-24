<?PHP

class Template
{

	private $vars = array();

	public static function render($template = '')
	{

		if(file_exists($template . '.php'))
		{
			$contents = file_get_contents($template . '.php');

			eval(' ?> ' . $contents . ' <?php ');
		}

	}

}

?>