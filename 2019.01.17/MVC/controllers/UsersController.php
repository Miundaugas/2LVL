<?php

include_once 'libs/Controller.php';
include_once 'models/Users.php';
class UsersController extends Controller {
	
	public function index(){
		$users = new Users();
		$this->view->title = 'Users';
		$this->view->Content = 'Contentas aprasytas UsersController.php';
		$this->view->users = $users->getAllUsers();
		$this->view->render('users');
	}
}