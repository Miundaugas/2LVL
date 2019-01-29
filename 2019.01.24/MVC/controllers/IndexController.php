<?php

// namespace MVC\controllers;

include_once 'libs/Controller.php';

class IndexController extends Controller {
	
	public function index(){
		$this->view->title = 'Home';
		$this->view->render('index');
	}
}