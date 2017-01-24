<?php

namespace EntityGenerator\Database;

/**
 * @Author - Channaveer Hakari
 * @Email - channaveer888@gmail.com
 * @Description - Interface for Database Operations
 */

interface DatabaseRepositoryInterface {
	/* Function to get all the databases from the schema */
	public function getDatabases();

	/* Get all the tables related to specific database */
	public function getTables($dtabase);
}
 
