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
		$statement = $this->dbh->prepare ( 'select count(id) from mortgages where id=:id' );
		$statement->bindParam ( ':id', $id );
		$statement->execute ();
		$count = $statement->fetchAll ();
		return $count > 0;
	}
	function checkIfRiskIDExist(int $id): bool {
		$statement = $this->dbh->prepare ( 'select count(id) from risk where id=:id' );
		$statement->bindParam ( ':id', $id );
		$statement->execute ();
		$count = $statement->fetchAll ();
		return $count > 0;
	}
}