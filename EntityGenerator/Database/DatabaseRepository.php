<?php
namespace EntityGenerator\Database;

class DatabaseRepository implements DatabaseRepositoryInterface{
	protected $connection;
	public function __construct($connection){
		$this->connection = $connection;
	}

	/* Function to get all the databases from the schema */
	public function getDatabases(){
		try{
			$databaseResult = $this->connection->query("SHOW DATABASES");
			$databaseResult->setFetchMode(\PDO::FETCH_OBJ);
			return $databaseResult->fetchAll();
		}catch(\PDOException $e){
			echo $e->getMessage();
		}
	}

	/* Get all the tables related to specific database */
	public function getTables($database){
		try{
			$tablesResult = $this->connection->query("SELECT TABLE_NAME as tableName FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$database'");
			$tablesResult->setFetchMode(\PDO::FETCH_ASSOC);
			return $tablesResult->fetchAll();
		}catch(\PDOException $e){
			echo $e->getMessage();
		}
	}

	/* Return all the coloumn names of table */
	public function getColoumnNamesOfTable($tableName){
		try{
			$coloumnResult = $this->connection->query("DESC $tableName");
			$coloumnResult->setFetchMode(\PDO::FETCH_ASSOC);
			return $coloumnResult->fetchAll();
		}catch(\PDOException $e){
			echo $e->getMessage();
		}
	}

	/* Gets the primary key for the respective table */
	public function getPrimaryKey($tableName){

	}
}