<?php

class Database {

	private $conn;
	private $query = '';
	public function connect(){
		$this->conn = mysqli_connect("localhost", "root", "123456789", "mvc_php");

		if (!$this->conn) {
		   echo "Error: Unable to connect to MySQL." . PHP_EOL;
		   echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		   echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		   exit;
		}
		return $this->conn;
	}

	public function select($target = '*'){
		$this->query .= 'SELECT '.$target.' ';
		return $this;
	}

	public function from($tableName){
		$this->query .= 'FROM '.$tableName.' ';
		return $this;
	}

	public function where($field, $value, $operator='='){ //
		$this->query .= 'WHERE '.$field.' '.$operator.' '.$value.' ';
		return $this;
	}

	public function whereAnd($field, $value, $operator='='){ //
		$this->query .= 'AND '.$field.' '.$operator.' '.$value.' ';
		return $this;
	}

	public function whereOr($field, $value, $operator='='){ //
		$this->query .= 'OR '.$field.' '.$operator.' '.$value.' ';
		return $this;
	}

	public function get(){
		$getas = mysqli_query($this->connect(),$this->query);
		return $getas;
	}

	public function update($tableName){
		$this->query .= 'UPDATE '.$tableName.' ';
		return $this;
	}

	public function insert($tableName){
		$this->query .= 'INSERT '.$tableName.' ';
		return $this;
	}

	public function delete($target = '*'){
		$this->query .= 'DELETE '.$target.' ';
		return $this;
	}

	public function set($columnName){
		$this->query .= 'SET '.$columnName.' ';
	}

	public function values($columnValue){
		$this->query .= '= '.$columnValue.' ';
	}
}