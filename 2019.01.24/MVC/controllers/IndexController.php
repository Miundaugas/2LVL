<?php

include_once 'libs/Controller.php';

class IndexController extends Controller {
	
	public function index(){
		$this->view->title = 'Home';
		$this->view->render('index');
		$this->view->Content = 'Contentas aprasytas IndexController.php';
	}
}