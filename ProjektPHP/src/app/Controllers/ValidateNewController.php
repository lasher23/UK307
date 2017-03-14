<?php
$rentals = new Rentals ();
if ($_SERVER ['REQUEST_METHOD'] !== 'POST') {
	header ( 'Location: view' );
	die ();
}

$errors = [ 
		'name' => '',
		'email' => '',
		'phone' => '',
		'hypo' => '',
		'risk' => '' 
];

$name = trim ( $_POST ['name'] ) ?? '';
$phone = trim ( $_POST ['phone'] ) ?? '';
$email = trim ( $_POST ['email'] ) ?? '';
$hypo = trim ( $_POST ['mortgages'] ) ?? '';
$risk = trim ( $_POST ['risk'] ) ?? '';

if ($name === '') {
	$errors ['name'] = 'Das Feld Name darf nicht leer sein!';
}
if ($email === '') {
	$errors ['email'] = 'Das Feld E-Mail darf nicht leer sein!';
} else if (preg_match ( "/.{0,}(@).{0,}/", $email ) === false) {
	$errors ['email'] = 'Das Feld E-Mail muss ein @ Zeichen enthalten';
}
if (preg_match ( "/^[0-9\\+\\-)(\\s]*$/", $phone )) {
	$errors ['phone'] = 'Das Feld Telefon darf nur folgende Zeichen enthalten: +-()1234567890';
}
if ($rentals->checkIfMortgageIDExist ( $hypo )) {
	$errors ['hypo'] = 'HTML sollte nicht bearbeitet werden!';
}
if ($rentals->checkIfRiskIDExist ( $risk )) {
	$errors ['risk'] = 'HTML sollte nicht bearbeitet werden!';
}
require 'app/Views/newrental.view.php';
	