<?php

namespace App\Models;

use App\Libs\Database;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Posts {

	public function getAllPosts(){
		$db = new Database();
		$db = $db->select()->from('posts')->where('active', '1');
		return $db->get();
	}

	public function getPostsById($id){
		$db = new Database();
		$db->select()->from('posts')->where('id', $id)->whereAnd('active', '1');
		return $db->get();
	}

	public function insertPost($slug, $title, $content, $author, $photoUrl){
		$db = new Database();
		$db->insert('posts')->columns('slug, title, content, author, photo, active')->values("'$slug', '$title', '$content', '$author', '$photoUrl', '1'");
		return $db->get();
	}

	public function deletePost($id){
		$db = new Database();
		$db->update('posts')->set("active = '0'")->where('id', $id);
		return $db->get();
	}

	public function updatePost($id, $slug, $title, $content, $author, $photo){
		$db = new Database();
		$db->update('posts')->set("slug = '$slug', title = '$title', content = '$content', author = '$author', photo = '$photo'")->where('id', $id);
		return $db->get();
	}

	public function logInfo($author){
		$log = new Logger('POST');
		$log->pushHandler(new StreamHandler('/var/www/html/2LVL/2019.01.24/MVC/Logs/createdpost.log', Logger::INFO));
		$log->addInfo("New Post created by user: $author");
	}
}