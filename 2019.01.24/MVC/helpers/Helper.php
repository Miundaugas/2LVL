<?php

// namespace MVC\helpers;

class Helper{
	public static function getSlug($line){
		$line = strtolower($line);
		$line = str_replace(' ', '-', $line);
		return $line;
	}

	public function passGenerator($pass){
		$generatedPass = md5(md5($pass.'druska'));
		return $generatedPass;
	}
}