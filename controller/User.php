<?php 
require_once(__DIR__.'/../model/UserModel.php');
require_once(__DIR__.'/../core/Controller.php');

class User extends Controller {

	function __construct(){
		$this->model = new UserModel();
	}
	
	function user(){
		if(isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == 'admin'){ 		
			header('Location: ' . $SITE_URL .'/index.php/user/adminTasks');
			exit;		
		}
		$_SESSION['user']['type'] = 'guest';
		$data = array();
		$result = $this->model->get('tasks', '');
		$data['result'] = $result;
		$this->load_view('userhome', $data);
	}
	
	function addTask(){
		if (isset($_POST['submit_login'])) {
			$username = $_POST["username"];
			$email = $_POST["email"];
			$description = $_POST["description"];
			$tableData = array('username'=>$username, 'email'=>$email, 'description'=>$description);
			
			$this->model->addTask($tableData);
			
			header('Location: ' . $SITE_URL .'/index.php/user');
			exit;
		}
		else {
			if(isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == 'admin'){ 		
				header('Location: ' . $SITE_URL .'/index.php/user/adminTasks');
				exit;
			}
		}		
		$this->load_view('addtask');
	}
	
	//http://localhost/CJ-MVC/index.php/User/editTask/1
	function editTask($args){
		global $SITE_URL;
		$view_data = array();

		if (isset($_POST['submit_login'])) {
			$task_id = $_POST["task_id"];
			$username = $_POST["username"];
			$email = $_POST["email"];
			
			$description = $_POST["description"];
			$status = isset($_POST["status"]) ? 'completed' : 'pending';
			
			$tableData = array('description'=>$description, 'status'=>$status);
			$condition = array('task_id'=>$task_id);	
			print_r($tableData);
			print($condition);
			$this->model->editTask($tableData, $condition);
			header('Location: ' . $SITE_URL .'/index.php/user');
			exit;
		}
		else {
			if(isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == 'guest'){ 		
				header('Location: ' . $SITE_URL .'/index.php/user');
				exit;
			}
			
			//var_dump($args);
			$condition = array('task_id'=>$args);	
			$result = $this->model->get('tasks', $condition);
			$view_data['result'] = $result[0];
		}		
		$this->load_view('edittask', $view_data);
			
		//$result = $this->model->get_all();
		//print_r($result);
		//echo json_encode($result);
	}

	//http://localhost/CJ-MVC/index.php/User/login
	function login(){
		global $SITE_URL;
		$view_data = array();
		if (isset($_POST['submit_login'])) {
			$password = $_POST["password"];
			$username = $_POST["username"];
			
			$condition = array('username'=>$username);			
			$result = $this->model->get('users',$condition);		
			if(count($result) > 0) {
				$user_info = $result[0];
				print_r($result);
				if($user_info['password'] == md5($password)) {
					$_SESSION['user']['type'] = 'admin';
					header('Location: ' . $SITE_URL .'/index.php/user/adminTasks');
					exit;
				}
			}
			else {
				$view_data['loginerror'] = "Please enter the valid details.";				
				$view_data['username'] = $username;				
				$this->load_view('login', $view_data);
			}
		}
		else {
			if(isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == 'admin'){ 		
				header('Location: ' . $SITE_URL .'/index.php/user/adminTasks');
				exit;
			}
			$this->load_view('login');
		}
	}

	function logout(){
		$_SESSION['user']['type'] = 'guest';
		header('Location: ' . $SITE_URL .'/index.php/user');
		exit;
	}
	
	function adminTasks(){
		$data = array();
		$result = $this->model->get('tasks', '');
		$data['result'] = $result;
		$this->load_view('admintasks', $data);		
	}	

	//if url not found on this application
	function notfound(){
		echo "This url is not on this server";
	}
}
