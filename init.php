<?php

require_once 'autoload.php';
use EntityGenerator\Database\DatabaseConnection;

$databaseConnection = new DatabaseConnection();

$connection = $databaseConnection
				->setDatabase('mysql')
				->setHost('localhost')
				->setUser('root')
				->setPassword('')
				->getConnection();