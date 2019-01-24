<?php

include_once 'libs/Controller.php';
include_once 'models/Users.php';
include_once 'helpers/FormHelper.php';
class UsersController extends Controller {
	
	public function index(){
		$users = new Users();
		$this->view->title = 'Users';
		$this->view->Content = 'Contentas aprasytas UsersController.php';
		$this->view->users = $users->getAllUsers();
		$this->view->render('users');
	}

	public function show($id){
		$this->view->title = 'User from DB';
		$users = new Users();
		$this->view->users = $users->getUserById($id);
		$this->view->render('userById');
	}

	public function register(){
		$this->view->title = 'Register';


		$form = new FormHelper('POST', 'http://localhost/2LVL/2019.01.21/MVC/index.php/users/store');

		$form->input([
			'name' => 'name',
			'type' => 'text',
			'placeholder' => 'Enter your name'
		])->input([
			'name' => 'email',
			'type' => 'email',
			'placeholder' => 'Enter your email'
		])->input([
			'name' => 'pass1',
			'type' => 'password',
			'placeholder' => 'Enter your password'
		])->input([
			'name' => 'pass2',
			'type' => 'password',
			'placeholder' => 'Confirm your password'
		])->input([
			'name' => 'submit',
			'type' => 'submit',
			'value' => 'Register'
		]);
		$this->view->form = $form->get();
		$this->view->render('registration');
	}

	public function store(){
		$name  = $_POST['name'];
		$email = $_POST['email'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		if($pass1 == $pass2){
			$pass = md5(md5($pass1,'druska'));
			$register = new Users();
			$register->insertUser($name, $email, $pass);
		} else {
			echo 'pass nevienodi';
		}
	}

	public function login(){
		$this->view->title = 'Log in';

		$form = new FormHelper('POST', '');
		$form->input([
			'name' => 'email',
			'type' => 'email',
			'placeholder' => 'Enter your email'
		])->input([
			'name' => 'pass1',
			'type' => 'password',
			'placeholder' => 'Enter your password'
		])->input([
			'name' => 'submit',
			'type' => 'submit',
			'value' => 'Log in'
		]);
		$this->view->form = $form->get();
		$this->view->render('login');
	}
}