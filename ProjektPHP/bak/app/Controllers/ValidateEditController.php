<?php
if ($_SERVER ['REQUEST_METHOD'] !== 'GET') {
	header ( 'Location: rentals' );
}

$id = $_GET ['id'] ?? '';

$rentals = new Rentals ();
if (! $rentals->checkIfRentalIDExist ( $id )) {
	// TODO: add error handeling
}
$values = $rentals->getAllFromID ( $id );
$risks = $rentals->getAllRisks ();
$mortgages = $rentals->getAllMortgages ();
$name = $values ['name'];
$email = $values ['email'];
$phone = $values ['phone'];
require 'app/views/edit.view.php';