<?php
/**
 * https://www.facebook.com/Parad0x25
 * 
 * @version 1.0.0
 * @author Dev Glenox <025glenox025@gmail.com>
 * @copyright (c) 2017, Dev Glenox Free BCP Panel
 * @license https://www.facebook.com/Parad0x25
 * @build 4/21/2017
 */

class dB {
	
	public $error;
	public $ok;
	public $dead;
	
	// anung ginagawa mo d2? wla kanang babaguhin d2... kya mas
	// magandang wag mo na galawin to...
	function __construct($SQLHOST, $SQLPORT, $SQLDB, $SQLUSER, $SQLPWD, $SQLDRIVER) {
		try {
			
			if($SQLDRIVER == 3) {
				$this->db = new PDO("odbc:Driver={SQL Server};Server=".$SQLHOST.";Database=".$SQLDB."; Uid=".$SQLUSER.";Pwd=".$SQLPWD.";");
			} else {
				if($SQLDRIVER == 2) {
					$pdo_connect = "mysql:host=".$SQLHOST.";dbname=".$SQLDB."";
				} else {
					$pdo_connect = "dblib:host=".$SQLHOST.":".$SQLPORT.";dbname=".$SQLDB.";";
				}
				$this->db = new PDO($pdo_connect, $SQLUSER, $SQLPWD);
			}


			
		} catch (PDOException $e) {
			$this->dead = true;
			$this->error = "PDOException: ".$e->getMessage();
		}
		
	}
	
	public function query($sql, $array='') {
		if(!is_array($array)) $array = array($array);
		$query = $this->db->prepare($sql);
		//$query = odbc_exec($this->db, $sql);
		if (!$query) {
			echo $query;
			$this->error = $this->trow_error();
			$query->closeCursor();
			return false;
		} else {
			if($query->execute($array)) {
				$query->closeCursor();
				return true;
			} else {
				$this->error = $this->trow_error($query);
				return false;
			}
		}
	}


	
	public function query_fetch($sql, $array='') {
		if(!is_array($array)) $array = array($array);
		$query = $this->db->prepare($sql);
		if (!$query) {
			$this->error = $this->trow_error();
			$query->closeCursor();
			return false;
		} else {
			if($query->execute($array)) {
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				$query->closeCursor();
				return (check_value($result)) ? $result : NULL;
			} else {
				$this->error = $this->trow_error($query);
				return false;
			}
		}
	}
	
	public function query_fetch_single($sql, $array='') {
		$result = $this->query_fetch($sql, $array);
		
		return (isset($result[0])) ? $result[0] : NULL;
	}

	
	
	private function trow_error($state='') {
		if(!check_value($state)) {
			$error = $this->db->errorInfo();
		} else {
			$error = $state->errorInfo();
		}
		return '[SQL '.$error[0].'] ['.$this->db->getAttribute(PDO::ATTR_DRIVER_NAME).' '.$error[1].'] > '.$error[2];
	}

}