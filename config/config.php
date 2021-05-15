<?php
	session_start();
	
	//error_reporting(1);
	//error_reporting(((E_ALL | E_STRICT) ^ E_NOTICE));
	
	//for me , without this setting its not showing error // so will comment if not needed ,dont remove
	//ini_set('error_reporting', E_ALL);
	//ini_set('display_errors', 'Off');
	
	$HOST = $_SERVER['HTTP_HOST'];

	if($HOST == 'local.mytest') {
		$db_params = array(
			'servername' => 'localhost',
			'username' => 'rootuser',
			'password' => 'AnilNaut11@#',
			'dbname' => 'taskbook'
		);
	}
	else {
		$db_params = array(
			'servername' => 'localhost',
			'username' => 'rootuser',
			'password' => 'AnilNaut11@#',
			'dbname' => 'taskbook'
		);
	}	
	
	$SITE_URL = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https:'.'//'.$_SERVER['HTTP_HOST'] : 'http:'.'//'.$_SERVER['HTTP_HOST'];