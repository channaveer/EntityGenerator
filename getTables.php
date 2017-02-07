<?php
require_once 'init.php';
use EntityGenerator\Database\DatabaseRepository;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$databaseName = filter_input(INPUT_POST, 'databaseName');
	if($databaseName != ''){
		$databaseRepository = new DatabaseRepository($connection);
		try{
			$connection->exec("USE {$databaseName}");
			$databaseConnection->setDatabaseName($databaseName);
			$tables = $databaseRepository->getTables($databaseName);
			echo json_encode(array('tables' => $tables), true);
		}catch(\PDOException $e){
			echo $e->getMessage();
		}catch(\Exception $e){
			echo $e->getMessage();
		}
	}
}