<?php 
require_once(__DIR__.'/../core/Model.php');

class UserModel extends Model{

	function __contruct(){
		parent::__contruct();
	}

	function get_all($table){
		return $this->read($table,array('*'),null);
	}

	function get($table, $where, $start=0, $limit=0,$orderBy="task_id", $sort='ASC'){
		$order = !empty($orderBy) ? ' ORDER BY ' . $orderBy . ' ' . $sort : '';
		return $this->read($table, array('*'), $where, $start, $limit, $order);
	}
	
	function addTask($tableData){
		return $this->create('tasks', $tableData);
	}	
	function editTask($whatToSet,$whereArgs){
		return $this->update("tasks",$whatToSet,$whereArgs);
	}		
}
 ?>