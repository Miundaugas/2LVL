<?php
// Pasiekiamas is controller.php

// namespace MVC\libs;

class View {
	
	private $viewCatalogPath = 'views/';

	public function render($templatePath){
		// /var/www/html/2LVL/2019.01.16/MVC/views/header.php(arba kitas page) is postscontroller.php (arba bet kurio kito page controllerio);
		require ($this->viewCatalogPath.'header.php');
		require ($this->viewCatalogPath.$templatePath.'.php');
		require ($this->viewCatalogPath.'footer.php');
	}
}