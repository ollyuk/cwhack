<?php

class App
{
	protected $controller = 'home';

	protected $method = 'index.php';

	protected $params = [];


	public function __construct()
	{
		$this->parseURL();
	}

	public function parseURL()
	{
		if(isset($_GET['url'])) {
			echo($_GET['url']);
		}
	}
}