<?php
include ('Product_Abstract.php');
class Simple_Product extends Product_Abstract 
{
	protected $qty;
	protected $weight;

	public function __construct(){
		$this->setType('simple');
	}

	public function setQty($qty){
		$this->qty = $qty;
	}
	public function getQty($qty){
		return $this->qty;
	}

}