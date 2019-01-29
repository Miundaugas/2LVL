<?php

// namespace MVC\controllers;

include_once 'libs/Controller.php';

class ErrorController extends Controller {
	public function index(){
		$this->view->title = '404 Error';
		$this->view->errorMessage = 'Nera tokio page';
		$this->view->render('error');
	}
}