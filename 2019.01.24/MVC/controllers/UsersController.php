<?php

// namespace MVC\controllers;

include_once 'libs/Controller.php';
include_once 'models/Users.php';
include_once 'helpers/FormHelper.php';
include_once 'helpers/Helper.php';

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


		$form = new FormHelper('POST', 'http://localhost/2LVL/2019.01.24/MVC/index.php/users/store');

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
			$passGen = new Helper();
			$pass = $passGen->passGenerator($pass1);
			$getEmails = new Users();		
			$getEmails->insertUser($name, $email, $pass);

			// $emails = $getEmails->getAllEmails($email);
			// var_dump($email);
			// while ($info = $emails->fetch_assoc()) {
			// 	if($info['email'] != $email){
			// 		$getEmails->insertUser($name, $email, $pass);
			// 	} else {
			// 		echo 'Vartotojas su '.$email.' pastu jau registruotas!';
			// 	}
			// }
			echo 'Registered';
			header('Refresh:2; url=http://localhost/2LVL/2019.01.24/MVC/index.php/users/login');

		} else {
			echo 'pass nevienodi';
		}
	}

	public function login(){
		$this->view->title = 'Log in';
		$form = new FormHelper('POST', 'http://localhost/2LVL/2019.01.24/MVC/index.php/users/longInUser');
		$form->input([
			'name' => 'email',
			'class' => 'loginemail',
			'type' => 'email',
			'placeholder' => 'Enter your email'
		])->input([
			'name' => 'pass1',
			'class' => 'loginpass',
			'type' => 'password',
			'placeholder' => 'Enter your password'
		])->input([
			'name' => 'submit',
			'class' => 'login',
			'type' => 'submit',
			'value' => 'Log in'
		]);
		$this->view->form = $form->get();
		$this->view->render('login');
	}

	public function longInUser(){
		$email 	   = $_POST['email'];
		$loginPass = md5(md5($_POST['pass1'].'druska'));

		$emails = new Users();
		$userInfo = $emails->getAllEmails($email);
		$userEmail = $userInfo->fetch_assoc();
		if($userEmail != NULL){
			if($loginPass != $userEmail['pass']){
				echo 'Bad password';
			} else {
				$_SESSION['id'] = $userEmail['id'];
				$_SESSION['name'] = $userEmail['name'];
				header('Location: http://localhost/2LVL/2019.01.24/MVC/index.php');
			}
		} else {
			echo 'User with this email is not registered';
		}
	}

	public function logOut(){
		session_unset($_SESSION['id'],$_SESSION['name']);
		session_destroy();
		header('Location: http://localhost/2LVL/2019.01.24/MVC/index.php');
	}
}