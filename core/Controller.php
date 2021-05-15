<?php 
class Controller{
	
	function __construct(){
		//will add later
	}

	function load_view($view, $data=array()){
		$load_view = $view;
		$view_data = $data;
		require_once(__DIR__.'/../layout/layout.php');		
	}
}
