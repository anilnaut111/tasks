<?php 
class Connection{
	function __construct(){
		global $db_params;
		$this->db_params = $db_params;
	}

	function getConnection(){
		$conn = new mysqli($this->db_params['servername'],$this->db_params['username'],$this->db_params['password'],$this->db_params['dbname']);
		if($conn->connect_error){
			die("Connection Faild: ". $conn->connect_error);
		}
		return $conn;
	}
}