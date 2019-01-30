<?php

namespace App\Helpers;

class FormHelper {
	private $form = '';

	public function __construct($method, $action){
		$this->form .= '<form method="'.$method.'" action="'.$action.'">';
	}

	public function input($attributes){
		$this->form .= '<input ';
		foreach ($attributes as $key => $attr) {
			$this->form .= $key.'="'.$attr.'" ';
		}
		$this->form .= '>' . '<br>';

		return $this;
	}

	public function select($options, $name){

		$this->form .= '<select ';
		foreach ($name as $key => $value) {
			$this->form .= $key . '="' .$value. '" ';
		}
		$this->form .= '>';

		foreach ($options as $key => $value) {
			$this->form .= '<option value="'.$key.'">';
			$this->form .= $value;
			$this->form .= '</option>';
		}
		$this->form .= '</select>' . '<br>';

		return $this;
	}

	public function textArea($name, $content = ''){
		$this->form .= '<textarea name="'.$name.'">';
		$this->form .= $content;
		$this->form .= '</textarea>' . '<br>';

		return $this;
	}

	public function get(){
		$this->form .='</form>';
		return $this->form;
	}
}