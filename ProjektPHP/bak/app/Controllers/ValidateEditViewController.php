<?php
$rentals = new Rentals ();
$risks = $rentals->getAllRisks ();
$mortgages = $rentals->getAllMortgages ();
if ($_SERVER ['REQUEST_METHOD'] !== 'POST') {
	header ( 'Location: view' );
	die ();
}
$id = $_GET ['id'];
$errors = validate ( $_POST );
var_dump ( $errors );
if (! ($errors ['name'] === '' && $errors ['email'] === '' && $errors ['phone'] === '' && $errors ['hypo'] === '' && $errors ['risk'] === '')) {
	require 'app/Views/edit.view.php';
} else {
	$rentals->updateWhereID ( $id, $_POST );
	header ( 'Location: rentals' );
}