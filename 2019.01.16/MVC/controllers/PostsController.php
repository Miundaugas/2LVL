<?php

include_once '/var/www/html/2LVL/2019.01.16/MVC/libs/Controller.php';

class PostsController extends Controller {

	public function index(){
		$this->view->title = 'Posts';
		$this->view->Content = 'Contentas aprasytas PostsController.php';
		$this->view->render('header');
		$this->view->render('posts');		
	}

	public function show($id){
		echo 'URL id - '.$id;
	}
}