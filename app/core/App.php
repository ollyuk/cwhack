<?php

class App
{
	protected $controller = 'home';

	protected $method = 'index.php';

	protected $params = [];

	//public	$url = [];



	public function __construct()
	{
		// when contructing call the parseURL method to get the $url.
		$url = $this->parseURL();

		//print_r($url);


		// If we have a php file then load it as an object, then check if we have the method requested belonging to it.
		if(file_exists('../app/controllers/' . $url[0] . '.php'))
		{
			$this->controller = $url[0]; 	// $controller = url[controller]
			unset($url[0]); 				// remove value from $url[0]
		}

		require_once '../app/controllers/' . $this -> controller . '.php';

		$this->controller = new $this->controller;

		//var_dump($this->controller);
		echo'object ' . get_class($this->controller) . ' exists';

		if(isset($url[1]))
		{		//check if method_exists belonging to the object we created above (object, method_name)
			
			if(method_exists($this->controller, $url[1]))
			{
				echo' as does the method ' . $url[1];
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		print('<p>');

		// params object = if url exists then as we UNSET the value of $url[0] it puts element 1 of the $url into 0 and so on, otherwise just create an empty array.
		$this->params = $url ? array_values($url) : [];


		call_user_func_array([$this->controller, $this->method], $this->params);
		//print_r($this->params);
	}

	public function parseURL()
	{
		if(isset($_GET['url']))
		{
			// $url = array [controller, method, arg1, arg2...] 
			// rtrim - removes trailing /
			// explode splits string into array on '/'
			// Filters a variable with a specified filter
			return $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
			//echo($_GET['url']);
		}
	}
}