<?php
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
	die();
}

	$dbh = connectToDatabase();

$statement = $dbh->prepare('INSERT INTO tasks(title) VALUES (:title)' ); 
$statement->bindParam(':title', $_POST['title']);
$statement->execute();

require 'app/controllers/TaskController.php';