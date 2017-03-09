<?php

require_once 'autoload.php';
use EntityGenerator\Database\DatabaseConnection;

$databaseConnection = new DatabaseConnection();

$connection = $databaseConnection
				->setDatabase('mysql')
				->setHost('127.0.0.1')
				->setUser('root')
				->setPassword('')
	            ->setPort(3306)
				->getConnection();
