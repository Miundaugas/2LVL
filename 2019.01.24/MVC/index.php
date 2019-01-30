<?php
session_start();

require_once('vendor/autoload.php');

if(isset($_SERVER['PATH_INFO'])){

	$path = explode('/', $_SERVER['PATH_INFO']);

	// echo '<pre>';
	// print_r($path);

	// $path[1] - Controlleris;
	// $path[2] - metodas(funkcija);

	$classFile = '';
	if(isset($path[1])){ // Viskas url'e po '/'.
		$classFile = ucfirst($path[1]).'Controller';	// Verciam i klases pavadinima.
	}

	// var_dump($classFile);
	if(file_exists('app/controllers/'.$classFile.'.php')){

		$class = 'App\Controllers\\'.$classFile;
		$object = new $class();

		if(!empty($path[2])){
			$method = strtolower($path[2]);  // padaryti i mazasias raides //show
			if(method_exists($object, $method)){
				if(isset($path[3])){
					$id = $path[3];
					$object->$method($id); // show() metodas(funkcija);
				} else {
					$object->$method();
				}			
			} else {
				// include_once('app/controllers/ErrorController.php');
				$errorObject = new App\Controllers\ErrorController();
				$errorObject->index();
			}
		} else {
			$object->index();
		}
	} else {
		// include_once('app/controllers/ErrorController.php');
		$errorObject = new App\Controllers\ErrorController();
		$errorObject->index();
	}
} else {
	// include_once('app/controllers/IndexController.php');
	$indexObject = new App\Controllers\IndexController();
	$indexObject->index();
}