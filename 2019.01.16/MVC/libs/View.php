<?php
// Pasiekiamas is controller.php
class View {
	
	private $viewCatalogPath = '/var/www/html/2LVL/2019.01.16/MVC/views/';

	public function render($templatePath){
		// /var/www/html/2LVL/2019.01.16/MVC/views/header.php(arba kitas page) is postscontroller.php (arba bet kurio kito page controllerio);
		require ($this->viewCatalogPath.$templatePath.'.php');
	}
}