<?php

class Home extends Controller
{
	public function index($name = '')
	{
		$this->model('User');

		$user = new stdClass(); //otherwise strict error reporting will report that $user is NULL or not initialised
		$user->name = $name;

		// calling the view method on the controller we have extended with home.
		$this->view('home/index', ['name' => $user->name]);
	}

	public function indexOld($name = '')
	{
		// $this refers to parent class Controller as well
		$this->model('User');

		$user->name = $name;
		//echo 'Param passed is: ' . $name . '<br>';
		echo 'You are on home/index <br>';
		echo $user->name;
	}

	public function test()
	{
		echo 'welcome to test!';
	}

	public function hurr()
	{
		echo 'Hurr durr I <3 php.';
	}
}