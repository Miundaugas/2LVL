<?php

include_once 'libs/Controller.php';
include_once 'models/Posts.php';
class PostsController extends Controller {

	public function index(){
		$this->view->title = 'Posts';
		$posts = new Posts();				
		$this->view->posts = $posts->getAllPosts();
		$this->view->render('posts');
	}

	public function show($id){
		$this->view->title = 'Postas is DB'; //IDETI TITLE IS DB TITLE
		$posts = new Posts();
		$this->view->posts = $posts->getPostsById($id);
		$this->view->render('postsById');
	}
}