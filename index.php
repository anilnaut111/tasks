<?php
// include all controllers here
require_once('./config/config.php');

// call the controllers using 
function getArgumentStart($uri){
	foreach ($uri as $key => $value){
		if($value == 'index.php'){
			if($key == count($uri) - 1 ) return -1;
			return $key+1;
		}
	}
	
	//if base path doesn't contain index.php
	return -1;
}

function main(){
	$uri = parse_url($_SERVER['REQUEST_URI']);
	//print_r($uri);
	//new php version have issue with split so using explode instead	
	$parameters = explode('/', $uri['path']);
	// get query using $uri['query'] // TODO
	$start = getArgumentStart($parameters);

	if($start != -1){
		$controller_name = ucfirst($parameters[$start]);
		
		//include controller
		require_once('./controller/'.$controller_name.'.php');

		$function_name = !empty($parameters[$start+1]) ? $parameters[$start+1] : $controller_name; 
		$start+=2;

		$args = array();
		for(;$start < count($parameters); $start++){
			array_push($args, $parameters[$start]);
		}
		call_user_func_array(array(new $controller_name, $function_name), $args);
	}
	else {
		$controller_name = 'User';
		//include controller
		require_once('./controller/'.$controller_name.'.php');

		$function_name = 'user'; 
		$args = array();
		array_push($args, '404');
		call_user_func_array(array(new $controller_name, $function_name), $args);	
	}		
}
main();
?>