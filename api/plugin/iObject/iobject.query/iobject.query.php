<?php
	/*
		*****************************************************************
		* 	Framework    : iobject.cnfg
		*   Deskrispi    : PHP programing framework 		
		*	Author   	 : iad ifriandi (iadifriandi@gmail.com		
		*	Build date   : 03/04/2013
		*   Revision     : 10/08/2018
		*   Description  : Migrate to mysqli						
		*****************************************************************
	*/
		require_once("iobject.cnfg.php");
		class iquery extends con{
		
			 private $err;
			 private $query;
			 private $stmt;
			 private $connOra;
			 //custom query
			 public function cs_query($sql){
					try{
						$query = mysqli_query($this->open_connection(), $sql);
						$this->close_connection();
						return $query;
					}catch (exception $err){
						return $this->err;
					}
				}
				
			 //query select data (nama tabel, nama fiels, data)
			 public function select($tbl,$field,$filter){
				try{
					$query=mysqli_query($this->open_connection(), "SELECT ".$field." FROM ".$tbl." ".$filter);
					$this->close_connection();
					return $query;
				}catch (exception $err){
					return $this->err;
				}
			 }
			 
			 //query inset data (nama tabel, nama fields, data)			
			 public function save($tbl,$fields,$value){
					try{
						$query=mysqli_query($this->open_connection(), "INSERT INTO ".$tbl." (".$fields.") VALUES (".$value.")");
						$this->close_connection();
						return $query;	
					}catch (exception $e){
						return $this->err;
					}
				}
				
				//query delete data (nama tabel, data)
				public function delete($tbl,$value){
					try{
						$query=mysqli_query($this->open_connection(), "DELETE FROM ".$tbl." WHERE ".$value);
						$this->close_connection();
						return $query;
					}catch (exception $err){
						return $this->err;
					}
				}

				public function deleteAll($tbl){
					try{
						$query=mysqli_query($this->open_connection(), "DELETE FROM ".$tbl);
						$this->close_connection();
						return $query;
					}catch (exception $err){
						return $this->err;
					}
				}
				
				//query update (nama tabel, data, where/kondisi)
				public function update($tbl,$val,$filter){
					try{
						$query=mysqli_query($this->open_connection(), "UPDATE ".$tbl." SET ".$val." WHERE ".$filter);
						$this->close_connection();
						return $query;
					}catch (exception $err){
						return $this->err;
					}
				}

				public function updateAll($tbl,$val){
					try{
						$query=mysqli_query($this->open_connection(), "UPDATE ".$tbl." SET ".$val);
						$this->close_connection();
						return $query;
					}catch (exception $err){
						return $this->err;
					}
				}
				
				public function validUser($tbl,$f_user,$f_pass,$f_status,$user,$pass,$status){ 
					try{	
						$query=mysqli_query($this->open_connection(),"SELECT * FROM ".$tbl." WHERE ".$f_user."='".$user."' and ".$f_pass."='".$pass."' and ".$f_status."='".$status."'");
						$this->close_connection();
						return $query;
					}catch (exception $err){
						return $this->err;
					}
				}
				
				public function validUsers($tbl,$f_user,$f_pass,$uname,$pass){ 
					try{	
						$tc=mysqli_query($this->open_connection(), sprintf("SELECT * from ".$tbl." WHERE ".$f_user."='".$uname."' and ".$f_pass."='".$pass."'",mysqli_real_escape_string($this->open_connection(), $uname),mysqli_real_escape_string($this->open_connection(), $pass)));
						$this->close_connection();
						return $tc;
					}catch (exception $e){
						return $e;
					}
				}

				public function validUserAkses($tbl,$f_user,$f_pass,$f_akses,$uname,$pass,$akses){ 
					try{	
						$tc=mysqli_query($this->open_connection(), sprintf("SELECT * from ".$tbl." WHERE ".$f_user."='".$uname."' AND ".$f_pass."='".$pass."' AND ".$f_akses."='".$akses."'",mysqli_real_escape_string($this->open_connection(), $uname),mysqli_real_escape_string($this->open_connection(), $pass)));
						$this->close_connection();
						return $tc;
					}catch (exception $e){
						return $e;
					}
				}
		}
?>