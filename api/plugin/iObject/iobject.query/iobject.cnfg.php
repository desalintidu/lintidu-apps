<?php

/*
		*****************************************************************
		* 	Framework    : iobject.cnfg
		*   Deskrispi    : PHP programing framework 		
		*	Author   	 : iad ifriandi (iadifriandi@gmail.com)		
		*	Build date   : 03/04/2013
		*   Revision     : 10/08/2018
		*   Description  : Migrate to mysqli						
		*****************************************************************
	*/

class con
{

	private $hostname;
	private $username;
	private $password;
	private $dbase;
	private $conn;
	private $select_db;
	private $err;

	function __construct()
	{
		$this->hostname = "localhost"; //default
		$this->username = "root"; //default
		$this->password = ""; //
		$this->dbase = "db_kependudukan"; //
	}

	protected function open_connection()
	{
		try {
			$this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbase);
			return $this->conn;
		} catch (exception $err) {
			return $this->$err;
		}
	}

	protected function close_connection()
	{
		try {
			mysqli_close($this->conn);
		} catch (exception $err) {
			return $err;
		}
	}
}
