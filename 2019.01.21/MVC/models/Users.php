<?php

include_once 'libs/Database.php';

class Users {
	public function getAllUsers(){
		$db = new Database();
		$db = $db->select()->from('users')->where('active', '1');
		return $db->get();
	}

	public function getUserById($id){
		$db = new Database();
		$db->select()->from('users')->where('id', $id)->whereAnd('active', '1');
		return $db->get();
	}

	public function insertUser($name, $email, $pass){
		$db = new Database();
		$db->insert('users')->columns('name, email, pass, active, role')->values("$name","$email","$pass", '1', '0');
		return $db->get();
	}

	public function deleteUser($id){
		$db = new Database();
		$db->update('users')->set("active = '0'")->where('id', $id);
		return $db->get();
	}

	// public function updateUser(){

	// }
}