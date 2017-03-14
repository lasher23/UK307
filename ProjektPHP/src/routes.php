<?php
$router = new Router ();

$router->define ( [ 
		'' => 'app/Controllers/WelcomeController.php',
		'rentals' => 'app/Controllers/RentalsController.php',
		'new' => 'app/Controllers/NewRentalController.php',
		'validateNew' => 'app/Controllers/ValidateNewController.php' 
] );