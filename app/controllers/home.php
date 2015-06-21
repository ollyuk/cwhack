<?php

class Home extends Controller
{
	public function index($name = '')
	{
		echo 'Param passed is: ' . $name . '<br>';
		echo 'home/index';
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