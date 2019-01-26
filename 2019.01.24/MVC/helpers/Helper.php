<?php

class Helper{
	public static function getSlug($line){
		$line = strtolower($line);
		$line = str_replace(' ', '-', $line);
		return $line;
	}

	public function passGenerator($pass){
		$generatedPass = md5(md5($pass));
		return $generatedPass;
	}
}