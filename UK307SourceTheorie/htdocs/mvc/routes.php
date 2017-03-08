<?php
$router = new Router();
$router->define([
    '' =>  'app/controllers/CarController.php',
    'about' =>  'app/controllers/AboutController.php',
    'contacts' => 'app/controllers/ContactsController.php',
    'beer' => 'app/controllers/BeerController.php',
    'spam' => 'app/controllers/SpamController.php',
    'clown' => 'app/controllers/ClownController.php',
    'form' => 'app/controllers/FormController.php',
    'validate' => 'app/controllers/ValidateController.php',
    'sst' => 'app/controllers/sstController.php',
    'whack' => 'app/controllers/WhackController.php',
    'task' => 'app/controllers/TaskController.php',
    'insert' => 'app/controllers/InsertController.php',
    'contents' => 'app/controllers/ContentsController.php'
]);
