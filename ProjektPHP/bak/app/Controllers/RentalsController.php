<?php
$rentals = new Rentals ();
$rentalsUnpaid = $rentals->getAllUnpaid ();

require 'app/Views/rentals.view.php';