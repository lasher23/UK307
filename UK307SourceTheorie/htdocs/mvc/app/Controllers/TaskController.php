<?php

//$dbh = connectToDatabase();

$taskModel = new Task();

$result = $taskModel->getAll();

//$statement = $dbh->prepare('SELECT * FROM tasks'); 
//$statement->execute();
//$result = $statement->fetchAll();

require 'app/Views/task.view.php';