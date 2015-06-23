<?php

class Controller
{
	public function model($model)
	{
		// could include file_check_exists
		require_once '../app/models/' . $model . '.php';
		return new $model();
		//echo '$model = ' . $model . '<br>';
	}

	public function view($view, $data = [])
	{
		require_once '../app/views/' . $view . '.php';
	}
}