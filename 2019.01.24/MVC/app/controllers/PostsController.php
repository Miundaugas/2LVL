<?php

namespace App\Controllers;

// include_once 'libs/Controller.php';
// include_once 'models/Posts.php';
// include_once 'models/Users.php';
// include_once 'models/Comments.php';
// include_once 'helpers/FormHelper.php';
// include_once 'helpers/Helper.php';
use App\Libs\Controller;
use App\Models\Posts;
use App\Models\Users;
use App\Models\Comments;
use App\Helpers\FormHelper;
use App\Helpers\Helper;

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
		$postsArray = [];
		$allPosts = $posts->getPostsById($id);
		while ($postInfo = $allPosts->fetch_assoc()) {
			$postAuthorId = $postInfo['author'];
			$users = new users();
			$currentUser = $users->getUserById($postAuthorId);
			while ($authorName = $currentUser->fetch_assoc()){
				$postInfo['author'] = $authorName;
			}
			$postsArray[] = $postInfo;
		}

		$form = new FormHelper('POST', 'http://localhost/2LVL/2019.01.24/MVC/index.php/comments/store/'.$id);
		$form->textArea('content');
		$form->input([
			'name' => 'submit',
			'type' => 'submit',
			'value' => 'Comment'
		]);
		$this->view->form = $form->get();

		$this->view->posts = $postsArray;


		// Komentaru istraukimas su autoriais pagal ID
		$comment = new Comments();		
		$comments = [];
		$test =  $comment->getCommentByPostId($id);
		while ($array = $test->fetch_assoc()) {
			$authorId = $array['author_id'];			
			$users = new users();			
			$userNames = $users->getUserById($authorId);
			while ($names = $userNames->fetch_assoc()){
				$array['author'] = $names;
			}
			$comments[] = $array;
		}

		$this->view->comments = $comments;
		$this->view->render('postsById');
	}

	public function add(){
		$this->view->title = 'Create new post';
		$form = new FormHelper('POST', 'http://localhost/2LVL/2019.01.24/MVC/index.php/posts/store');

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
		$author   = $_SESSION['id'];

		$post = new Posts();
		$post->insertPost($slug, $title, $content, $author, $photoUrl);
		echo 'Post created';
		header('Refresh:2; url=http://localhost/2LVL/2019.01.24/MVC/index.php/posts');
	}

	public function edit($id){
		$this->view->title = 'Edit post';

		$postInfo = new Posts();		
		$info = $postInfo->getPostsById($id);
		while ($post = $info->fetch_assoc()) {

			$title 		 = $post['title'];
			$url 		 = $post['photo'];
			$postContent = $post['content'];

			$form = new FormHelper('POST', 'http://localhost/2LVL/2019.01.24/MVC/index.php/posts/update/'.$id);
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

	public function delete(){
		$id = $_POST['btnId'];
		$delete = new Posts();
		$delete->deletePost($id);
	}

	// public function test(){
	// 	$userName = $_POST['myusername'];		
	// 	$slug = Helper::getSlug($userName);
	// 	echo $slug;
	// }
}