<?php
class Rentals {
	protected $dbh;
	function __construct() {
		$this->dbh = connectToDatabase ();
	}
	function getAllUnpaid() {
		$statement = $this->dbh->prepare ( 'select *,r.id as rentalsID from `rentals` as r, mortgages as m, person as p, risk as ri where r.fk_Mortgages = m.id and p.id = r.fk_person and r.fk_risk = ri.id and r.paidState = 0 order by r.createDT' );
		$statement->execute ();
		return $statement->fetchAll ();
	}
	function getAllMortgages() {
		$statement = $this->dbh->prepare ( 'select * from mortgages' );
		$statement->execute ();
		return $statement->fetchAll ();
	}
	function getAllRisks() {
		$statement = $this->dbh->prepare ( 'select * from risk' );
		$statement->execute ();
		return $statement->fetchAll ();
	}
	function checkIfMortgageIDExist(int $id): bool {
		$statement = $this->dbh->prepare ( 'select count(id) as c from mortgages where id=:id' );
		$statement->bindParam ( ':id', $id );
		$statement->execute ();
		$count = $statement->fetch ();
		return $count ['c'] > 0;
	}
	function checkIfRiskIDExist(int $id): bool {
		$statement = $this->dbh->prepare ( 'select count(id) as c from risk where id=:id' );
		$statement->bindParam ( ':id', $id );
		$statement->execute ();
		$count = $statement->fetch ();
		return $count ['c'] > 0;
	}
	function checkIfRentalIDExist(int $id): bool {
		$statement = $this->dbh->prepare ( 'select count(id) as c from rentals where id=:id' );
		$statement->bindParam ( ':id', $id );
		$statement->execute ();
		$count = $statement->fetch ();
		return $count ['c'] > 0;
	}
	function getAllFromID(int $id) {
		$statement = $this->dbh->prepare ( 'select *, ri.id as riskID, m.id as mID from `rentals` as r, mortgages as m, person as p, risk as ri where r.fk_Mortgages = m.id and p.id = r.fk_person and r.fk_risk = ri.id and r.id = :id' );
		$statement->bindParam ( ':id', $id );
		$statement->execute ();
		return $statement->fetch ();
	}
	function updateWhereID(int $id, $values) {
		$risk = $values ['risk'];
		var_dump ( $id );
		$name = $values ['name'];
		$email = $values ['email'];
		$phone = $values ['phone'];
		$mortgagesID = $values ['mortgages'];
		$paidState = $values ['state'];
		$statement = $this->dbh->prepare ( 'update rentals set paidState =  :paidState, fk_risk = :riskID, fk_Mortgages = :mortgagesID  where id = :id' );
		$statement->bindParam ( ':paidState', $paidState );
		$statement->bindParam ( ':riskID', $risk );
		$statement->bindParam ( ':mortgagesID', $mortgagesID );
		$statement->bindParam ( ':id', $id );
		$statement->execute ();
		
		$statement = $this->dbh->prepare ( 'update person set name = :name, email = :email, phone = :phone where id = (select fk_person from rentals where id=:id LIMIT 1)' );
		$statement->bindParam ( ':name', $name );
		$statement->bindParam ( ':email', $email );
		$statement->bindParam ( ':phone', $phone );
		$statement->bindParam ( ':id', $id );
		$statement->execute ();
	}
	function insertNewRental($values) {
		$statement = $this->dbh->prepare ( 'insert into person(name, email, phone) VALUES(:name, :email, :phone)' );
		$statement->bindParam ( ':name', $values ['name'] );
		$statement->bindParam ( ':email', $values ['email'] );
		$statement->bindParam ( ':phone', $values ['phone'] );
		$statement->execute ();
		$persID = $this->dbh->lastInsertId ();
		
		$zero = 0;
		$actualDate = date ( 'Y-m-d' );
		$statement = $this->dbh->prepare ( 'insert into rentals(createDT, fk_Mortgages, fk_person, fk_risk, paidState) values(:date, :mortgagesID, :persID, :riskID, :paidState)' );
		$statement->bindParam ( ':date', $actualDate );
		$statement->bindParam ( ':mortgagesID', $values ['mortgages'] );
		$statement->bindParam ( ':persID', $persID );
		$statement->bindParam ( ':riskID', $values ['risk'] );
		$statement->bindParam ( ':paidState', $zero );
		$statement->execute ();
	}
}