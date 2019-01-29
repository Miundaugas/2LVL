<?php

// namespace MVC\controllers;

include_once 'libs/Controller.php';
include_once 'models/Comments.php';
include_once 'helpers/FormHelper.php';
include_once 'helpers/Helper.php';

class CommentsController extends Controller {
	
	public function index(){
		echo 'index works';
	}

	public function add($id){
		$this->view->title = 'Create new comment';

		$form = new FormHelper('POST', 'http://localhost/2LVL/2019.01.24/MVC/index.php/comments/store/'.$id);
		$form->textArea('content');
		$form->input([
			'name' => 'submit',
			'type' => 'submit',
			'value' => 'Comment'
		]);
		$this->view->form = $form->get();
		$this->view->render('newComment');
	}

	public function store($id){
		$postId  = $id;
		$comment = $_POST['content'];
		$author  = $_SESSION['id'];

		$insert = new Comments();
		$insert->insertComment($postId, $comment, $author);
		echo 'Commented';
		header('Refresh:2; url=http://localhost/2LVL/2019.01.24/MVC/index.php/posts/show/'.$id);
	}

	public function deleteComment($id){
		$delete = new Comments();
		$delete->deleteComment($id);
		echo 'Comment Deleted';
		header( 'Refresh:2; url=http://localhost/2LVL/2019.01.24/MVC/index.php/posts');
	}
}