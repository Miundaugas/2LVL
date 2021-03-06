<?php

namespace App\Models;

// include_once 'libs/Database.php';
use App\Libs\Database;

class Users {
	public function getAllUsers(){
		$db = new Database();
		$db = $db->select()->from('users')->where('active', '1');
		return $db->get();
	}

	public function getAllEmails($email){
		$db = new Database();
		$db = $db->select()->from('users')->where('email', "'$email'");
		return $db->get();
	}

	public function getUserById($id){
		$db = new Database();
		$db->select()->from('users')->where('id', $id)->whereAnd('active', '1');
		return $db->get();
	}

	public function insertUser($name, $email, $pass){
		$db = new Database();
		$db->insert('users')->columns('name, email, pass, active, role')->values("'$name','$email','$pass', '1', '0'");
		return $db->get();
	}

	public function deleteUser($id){
		$db = new Database();
		$db->update('users')->set("active = '0'")->where('id', $id);
		return $db->get();
		// GAL padaryti su pasirinkimu istrinti visiskai arba by default 'active=0';
	}

	// public function updateUser(){

	// }
}