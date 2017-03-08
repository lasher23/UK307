<?php

class Task{
	protected $dbh;
	function __construct(){
		$this->dbh =  connectToDatabase();
	}
	
	function getAll(){
		
		$statement = $this->dbh->prepare('SELECT * FROM tasks');
		$statement->execute();

		return $statement->fetchAll();
	}
}