<?php
$rentals = new Rentals ();
$risks = $rentals->getAllRisks ();
$mortgages = $rentals->getAllMortgages ();
if ($_SERVER ['REQUEST_METHOD'] !== 'POST') {
	header ( 'Location: view' );
	die ();
}

$errors = validate ( $_POST );
if (! ($errors ['name'] === '' && $errors ['email'] === '' && $errors ['phone'] === '' && $errors ['hypo'] === '' && $errors ['risk'] === '')) {
	require 'app/Views/newrental.view.php';
} else {
	$rentals->insertNewRental ( $_POST );
	header ( 'Location: new' );
}
/*
 * $errors = [
 * 'name' => '',
 * 'email' => '',
 * 'phone' => '',
 * 'hypo' => '',
 * 'risk' => ''
 * ];
 *
 * $name = trim ( $_POST ['name'] ) ?? '';
 * $phone = trim ( $_POST ['phone'] ) ?? '';
 * $email = trim ( $_POST ['email'] ) ?? '';
 * $hypo = trim ( $_POST ['mortgages'] ) ?? '';
 * $riska = trim ( $_POST ['risk'] ) ?? '';
 *
 * if ($name === '') {
 * $errors ['name'] = 'Das Feld Name darf nicht leer sein!';
 * }
 * if ($email === '') {
 * $errors ['email'] = 'Das Feld E-Mail darf nicht leer sein!';
 * } else if (preg_match ( "/.{0,}(@).{0,}/", $email ) === 0) {
 * $errors ['email'] = 'Das Feld E-Mail muss ein @ Zeichen enthalten!';
 * }
 * if (! preg_match ( "/^[0-9\+\-)(\s]*$/", $phone )) {
 * $errors ['phone'] = 'Das Feld Telefon darf nur folgende Zeichen enthalten: +-()1234567890 und leerzeichen!';
 * }
 * if (! $rentals->checkIfMortgageIDExist ( ( int ) $hypo )) {
 * $errors ['hypo'] = 'HTML sollte nicht bearbeitet werden!';
 * }
 * if (! $rentals->checkIfRiskIDExist ( ( int ) $riska )) {
 * $errors ['risk'] = 'HTML sollte nicht bearbeitet werden!';
 * }
 */
	