<?php

$path = explode('/', $_SERVER['PATH_INFO']);

echo '<pre>';
// print_r($path);

// $path[1] - Controlleris;
// $path[2] - metodas(funkcija);

$classFile = '';
if(isset($path[1])){ // Viskas url'e po '/'.
	$classFile = ucfirst($path[1]).'Controller';	// Verciam i klases pavadinima.
}
// var_dump($classFile);
if(file_exists('controllers/'.$classFile.'.php')){
	include_once('controllers/'.$classFile.'.php');
	
	$object = new $classFile;

	if(!empty($path[2])){
		$method = strtolower($path[2]);  // padaryti i mazasias raides //show
		if(method_exists($object, $method)){
			if(isset($path[3])){
				$id = $path[3];
				$object->$method($id); // show() metodas;
			}			
		}
	} else {
		$object->index();
	}
} else {
	echo '404';
}