<?php 
require_once(__DIR__.'/../core/Model.php');

class UserModel extends Model{

	function __contruct(){
		parent::__contruct();
	}

	function get_all(){
		return $this->read('users',array('*'),null);
	}

	function get($table, $where, $start=0, $end=0){
		return $this->read($table, array('*'), $where, $start, $end);
	}
	
	function addTask($tableData){
		return $this->create('tasks', $tableData);
	}	
	function editTask($whatToSet,$whereArgs){
		return $this->update("tasks",$whatToSet,$whereArgs);
	}		
}
 ?>