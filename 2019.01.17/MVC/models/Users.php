<?php

include_once 'libs/Database.php';

class Users {
	public function getAllUsers(){
		$db = new Database();
		$db = $db->select()->from('users');
		return $db->get();
	}
}