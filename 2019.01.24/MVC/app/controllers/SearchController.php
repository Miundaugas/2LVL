<?php

namespace App\Controllers;

use App\Libs\Controller;
use App\Libs\Database;

class SearchController extends Controller {	

	public function find(){
		if(!empty($_POST['searchInfo'])){
			$keyWord = $_POST['searchInfo'];

			$db = new Database();
			$db->select()->from('posts')->searchWhere('slug')->searchLike("'%$keyWord%'")->searchOr('title')->searchLike("'%$keyWord%'")->searchOr('content')->searchLike("'%$keyWord%'");
			$info = $db->get();
			
			$returnedInfo = [];
			if(mysqli_num_rows($info) > 0){
				while($row = mysqli_fetch_array($info)){
					$returnedInfo = $row;
					$result = '';
					$result .= '<div class="search-result">';
					$result .= '<strong>'.$returnedInfo['title'].'</strong>';
					$result .= '<i>'.$returnedInfo['content'].'</i>';
					$result .= '</div>';

					echo $result;
				}
			} else {
				echo 'No results found!';
			}
		} else {
			
		}
	}
}