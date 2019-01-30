<?php

namespace App\Models;

use App\Libs\Database;

class Comments {

	public function getCommentByPostId($id){
		$db = new Database();
		$db->select()->from('comments')->where('post_id', $id)->whereAnd('active', '1');
		return $db->get();
	}

	public function insertComment($postId, $comment, $author){
		$db = new Database();
		$db->insert('comments')->columns('comment, author_id, post_id, active')->values("'$comment', '$author', '$postId', '1'");
		return $db->get();
	}

	public function commentAuthor($id){
		$db = new Database();
		$db->select()->from('users')->where('id', $id)->whereAnd('active', '1');
		return $db->get();
	}

	public function deleteComment($id){
		$db = new Database();
		$db->update('comments')->set("active = '0'")->where('id', $id);
		return $db->get();
	}

	// public function updateComment($id){
	// 	$db = new Database();
	// 	$db->update('comments')->set("")->where('id', $id);
	// 	return $db->get();
	// }

}