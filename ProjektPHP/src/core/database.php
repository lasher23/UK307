<?php
/**
 * Stellt eine Verbindung zur Datenbank her und gibt die
 * Datenbankverbindung als PDO zurück.
 *
 * @return PDO
 */
function connectToDatabase() {
	try {
		return new PDO ( 'mysql:host=localhost;dbname=kurseictbz_30713', 'kurseictbz_30713', 'db_307_pw_13', [ 
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
		] );
	} catch ( PDOException $e ) {
		die ( 'Keine Verbindung zur Datenbank m�glich: ' . $e->getMessage () );
	}
}