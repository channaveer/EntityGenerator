<?php

namespace EntityGenerator\Database;

/**
 * @Author - Channaveer Hakari
 * @Email - channaveer888@gmail.com
 * @Description - Interface for connecting to Database
 */
interface DatabaseConnectionInterface{
		
	public  function setDatabase($database);
	public  function getDatabase();

	public  function setHost($host);
	public  function getHost();

	public  function setDatabaseName($databaseName);
	public  function getDatabaseName();

	public  function setUser($user);
	public  function getUser();

	public  function setPassword($password);
	public  function getPassword();
	
	public  function setCharset($charset);
	public  function getCharset();

	public  function setPort($port);
	public  function getPort();

	public  function getConnection();
}