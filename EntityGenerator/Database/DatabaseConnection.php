<?php

namespace EntityGenerator\Database;

class DatabaseConnection implements DatabaseConnectionInterface{
	private $connection;
	private $database;
	private $databaseName;
	private $user;
	private $password;
	private $port;
	private $charset;
	private $host;

	public  function setDatabase($database){
		$this->database = $database;
		return $this;
	}
	public  function getDatabase(){
		return $this->database;
	}

	public  function setHost($host){
		$this->host = $host;
		return $this;
	}

	public  function getHost(){
		return $this->host;
	}

	public  function setDatabaseName($databaseName){
		$this->databaseName = $databaseName;
		return $this;
	}

	public  function getDatabaseName(){
		return $this->databaseName;
	}

	public  function setUser($user){
		$this->user = $user;
		return $this;
	}

	public  function getUser(){
		return $this->user;
	}

	public  function setPassword($password){
		$this->password = $password;
		return $this;
	}

	public  function getPassword(){
		return $this->password;
	}

	public  function setCharset($charset){
		if(empty($charset)){
			return $this->charset = 'UTF-8';
		}
		return $this->charset = $charset;
		
	}

	public  function getCharset(){
		return $this->charset;
	}
	
	/**
     * Gets the value of port.
     *
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Sets the value of port.
     *
     * @param mixed $port the port
     *
     * @return self
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }


	public  function getConnection(){
		switch($this->database){
			case 'mysql' : 
				if($this->port == NULL){
					$this->setPort(3306);
				}
				try{
					$this->connection = new \PDO($this->database.":host=".$this->host.';port='.$this->port, $this->user, $this->password);
					$this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
					return $this->connection;
				}catch(\PDOException $e){
					echo $e->getMessage();
				}
				break;

			case 'postgress':
				echo 'Postgress';
				break;

			default:
				echo 'Please Configure Your Database Properly.';
		}
	}
}