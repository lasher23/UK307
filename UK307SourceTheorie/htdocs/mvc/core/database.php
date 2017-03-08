<?php

function connectToDatabase(){
	$dbh='';
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=tasklist', 'root', '');//,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']/;
	}catch (PDOException $e){
		die('Keine Verbindung zur Datenbank moeglich: ' . $e->getMessage());
	}
	return $dbh;
}