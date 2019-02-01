<?php

namespace App\Controllers;

use App\Libs\Controller;
use App\Libs\Database;

class SearchController extends Controller {	

	public function find(){
		$keyWord = $_POST['searchInfo'];

		$db = new Database();
		$db->select()->from('posts')->searchWhere('slug')->searchLike("'%$keyWord%'")->searchOr('title')->searchLike("'%$keyWord%'")->searchOr('content')->searchLike("'%$keyWord%'");
		$info = $db->get();
		if(mysqli_num_rows($info) > 0){
			while($row = mysqli_fetch_array($info)){
				echo $row['title'].'<br>';
			}
		}
		
	}
}