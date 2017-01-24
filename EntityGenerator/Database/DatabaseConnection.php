<?php

namespace EntityGenerator\Database;

class DatabaseConnection implements DatabaseConnectionInterface{
	public function __construct(){
		echo 'construtor in DC';
	}

	public static function getConnection($database = 'mysqli'){
		echo $database;
	}
}