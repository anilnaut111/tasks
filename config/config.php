<?php
	session_start();
	
	//error reporting
	//error_reporting(1);
	//error_reporting(((E_ALL | E_STRICT) ^ E_NOTICE));
	
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
			'username' => 'joomlapr_tasku',
			'password' => 'Task@Book1@3$',
			'dbname' => 'joomlapr_taskbook'
		);
	}	
	
	$SITE_URL = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https:'.'//'.$_SERVER['HTTP_HOST'] : 'http:'.'//'.$_SERVER['HTTP_HOST'];
	$RECORDS_PER_PAGE = 3;
	$PAGE_TO_SHOW = 5;	