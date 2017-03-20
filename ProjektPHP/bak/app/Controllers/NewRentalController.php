<?php
$rentals = new Rentals ();
$risks = $rentals->getAllRisks ();
$mortgages = $rentals->getAllMortgages ();

require 'app/Views/newrental.view.php';