<?php

namespace EntityGenerator\Database;

/**
 * @Author - Channaveer Hakari
 * @Email - channaveer888@gmail.com
 * @Description - Interface for connecting to Database
 */
interface DatabaseConnectionInterface{
	/**
	 * Gets the connection to database
	 * @return connection to database
	 */	
	 
	public static function getConnection($database = 'mysql');
}