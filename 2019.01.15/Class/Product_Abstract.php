<?php

class Product_Abstract
{
	protected $price;
	protected $name;
	protected $type;

	public function setPrice($price){
		$this->price = $price;
	}

	public function getPrice(){
		return $this->price;
	}

	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
	}
}