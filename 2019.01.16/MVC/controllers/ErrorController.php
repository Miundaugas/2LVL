<?php

include_once '/var/www/html/2LVL/2019.01.16/MVC/libs/Controller.php';

class ErrorController extends Controller {
	public function index(){
		$this->view->errorMessage = 'Nera tokio page';
		$this->view->render('error');
	}
}