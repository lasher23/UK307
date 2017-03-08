<?php
if($_SERVER['REQUEST_METHOD']!=='POST'){
	header('Location: form');
	die();
}
$errors= [];

$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ??'');
$shuttleBus = trim($_POST['shuttleBus'] ?? '');
$amountOfPersons = trim($_POST['program'] ?? '');
$note = trim($_POST['note']?? '');
$hotel = trim($_POST['hotel'] ?? '');

if($name===''){
	$errors[] = "<li>Bitte geben Sie einen Namen ein.</li>";
}
if($email===''){
	$errors[] = "<li>Bitte geben Sie eine Email ein.</li>";
}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo "<li>Die Email-Adresse \"$email\" ist ungültig.</li>";
}
if($phone===''){
	$errors[] = "<li>Bitte geben Sie eine Telefonnummer ein.</li>";
}elseif (!preg_match("/(\+[0-9]{2} [0-9]{2} [0-9]{3} [0-9]{2} [0-9]{2})+/", $phone)) {
	$errors[] = "<li>Die Telefonnummer \"$phone\" ist ungültig.";
}
if($amountOfPersons===''){
	$errors[] = "<li>Bitte geben Sie die Anzahl teilnehmender Personen ein.</li>";
}elseif (!preg_match("/[0-9]{1,}/", $amountOfPersons)) {
	$errors[] = "<li>Bitte geben Sie für die Anzahl Personen nur Zahlen ein.</li>";
}
if($hotel===''){
	$errors[] = "<li>Bitte wählen Sie ein Hotel für die Übernachtung aus.>";
}

require 'app/Views/form.view.php';