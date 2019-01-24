<?php

include_once '/var/www/html/2LVL/2019.01.16/MVC/libs/Controller.php';

class IndexController extends Controller {
	
	public function index(){
		$this->view->title = 'Home';
		$this->view->Content = 'Contentas aprasytas IndexController.php';
		$this->view->render('header');
	}
}