<?php

include_once '/var/www/html/2LVL/2019.01.16/MVC/libs/Controller.php';

class UsersController extends Controller {
	
	public function index(){
		$this->view->title = 'Users';
		$this->view->Content = 'Contentas aprasytas UsersController.php';
		$this->view->render('header');
		$this->view->render('users');
	}
}