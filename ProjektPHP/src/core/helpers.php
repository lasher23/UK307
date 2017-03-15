<?php
/**
 * Nutze diese Funktion um einfach eine Ausgabe
 * mit htmlspecialchars() zu erstellen.
 *
 * @param  string $value
 *
 * @return string
 */
function e(string $value): string {
	return htmlspecialchars ( $value, ENT_QUOTES, 'UTF-8', false );
}

/**
 * Nutze diese Funktion um auf einen POST-Wert
 * zuzugreifen.
 *
 * @param string $value        	
 *
 * @return mixed
 */
function post(string $key, $default = '') {
	return $_POST [$key] ?? $default;
}
function validate($POST) {
	$rentals = new Rentals ();
	$errors = [ 
			'name' => '',
			'email' => '',
			'phone' => '',
			'hypo' => '',
			'risk' => '' 
	];
	
	$name = trim ( $POST ['name'] ) ?? '';
	$phone = trim ( $POST ['phone'] ) ?? '';
	$email = trim ( $POST ['email'] ) ?? '';
	$hypo = trim ( $POST ['mortgages'] ) ?? '';
	$riska = trim ( $POST ['risk'] ) ?? '';
	
	if ($name === '') {
		$errors ['name'] = 'Das Feld Name darf nicht leer sein!';
	}
	if ($email === '') {
		$errors ['email'] = 'Das Feld E-Mail darf nicht leer sein!';
	} else if (preg_match ( "/.{0,}(@).{0,}/", $email ) === 0) {
		$errors ['email'] = 'Das Feld E-Mail muss ein @ Zeichen enthalten!';
	}
	if (! preg_match ( "/^[0-9\+\-)(\s]*$/", $phone )) {
		$errors ['phone'] = 'Das Feld Telefon darf nur folgende Zeichen enthalten: +-()1234567890 und leerzeichen!';
	}
	if (! $rentals->checkIfMortgageIDExist ( ( int ) $hypo )) {
		$errors ['hypo'] = 'HTML sollte nicht bearbeitet werden!';
	}
	if (! $rentals->checkIfRiskIDExist ( ( int ) $riska )) {
		$errors ['risk'] = 'HTML sollte nicht bearbeitet werden!';
	}
	return $errors;
}