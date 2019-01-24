<?php

include_once 'libs/Controller.php';
include_once 'models/Posts.php';
include_once 'helpers/FormHelper.php';
include_once 'helpers/Helper.php';

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

	public function add(){
		$this->view->title = 'Create new post';
		$form = new FormHelper('POST', 'http://localhost/2LVL/2019.01.21/MVC/index.php/posts/store');

		$form->input([
			'name' => 'title',
			'type' => 'text',
			'placeholder' => 'Title'
		])->input([
			'name' => 'image',
			'type' => 'text',
			'placeholder' => 'Image URL'
		])->input([
			'name' => 'submit',
			'type' => 'submit',
			'value' => 'Add'
		]);

		$form->select([
			1 => 'vienas',
			2 => 'du',
			3 => 'trys'
		],
		[
			'name' => 'NAME',
			'class' => 'Class'
		]);
		$form->textArea('content');

		$this->view->form = $form->get();
		$this->view->render('newPost');
	}

	public function store(){
		$title    = $_POST['title'];
		$photoUrl = $_POST['image'];
		$content  = $_POST['content'];
		$slug     = Helper::getSlug($title);

		$post = new Posts();
		$post->insertPost($slug, $title, $content, $photoUrl);
	}

	public function edit($id){
		$this->view->title = 'Edit post';

		$postInfo = new Posts();		
		$info = $postInfo->getPostsById($id);
		while ($post = $info->fetch_assoc()) {

			$title 		 = $post['title'];
			$url 		 = $post['photo'];
			$postContent = $post['content'];

			$form = new FormHelper('POST', 'http://localhost/2LVL/2019.01.21/MVC/index.php/posts/update/'.$id);
			$form->input([
				'name' => 'title',
				'type' => 'text',
				'value' => $title
			])->input([
				'name' => 'image',
				'type' => 'text',
				'value' => $url
			])->input([
				'name' => 'submit',
				'type' => 'submit',
				'value' => 'Edit'
			]);

			$form->textArea('content', $postContent);
			$this->view->form = $form->get();
			$this->view->render('editPost');
		}
	}

	public function update($id){
		$newTitle 	= $_POST['title'];
		$newUrl   	= $_POST['image'];
		$newContent = $_POST['content'];
		$newSlug    = Helper::getSlug($newTitle);
		$author 	= '3';

		$update = new Posts();
		$update->updatePost($id,$newSlug, $newTitle, $newContent, $author, $newUrl);
	}

	public function delete($id){
		$delete = new Posts();
		$delete->deletePost($id);
		echo 'Deleted';
	}
}