
<?php


include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helper/validateUser.php");

$table = 'users';

$admin_users = selectAll($table); //, //['admin' => 1]);

$errors = array();
$id = '';
$firstname='';
$lastname='';
$phone = '';
$username = '';
$admin='';
$email = '';
$password = '';
$passwordaga = '';


function loginUser($user){
	$_SESSION['id']= $user['id'];
	$_SESSION['username']= $user['username'];
	$_SESSION['admin']= $user['admin'];
	$_SESSION['message']= 'you are now logged in';
	$_SESSION['type']= 'succsess';


	if ($_SESSION['admin']){
		header('location: ' . BASE_URL . '/index.php');
	}else {
		header('location: ' . BASE_URL . '/index.php');
	}

		
	exit();
}


if (isset($_POST['register-btn']) || isset($_POST['create-admin'])){

	$errors = validateUser($_POST);

	if (count($errors)=== 0)
	{
		unset($_POST['register-btn'], $_POST['passwordaga'],$_POST['create-admin'] );
		//$_POST['password'] = 

		//password_hash($_POST['password'], PASSWORD_DEFAULT);

		if(isset($_POST['admin'])){
			$_POST['admin']=1;
			$user_id= create($table, $_POST);
			$_SESSION['message'] = "Admin created";
			$_SESSION['type'] = "succsess";
			header('location: ' . BASE_URL . '/admin/indexadmin.php');
			exit();
		} else{
			$_POST['admin'] = 0;
			$user_id= create($table, $_POST);
			$user = selectOne($table, ['id' => $user_id]);
			loginUser($user);

		}

	} else{

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$phone = $_POST['phone'];
		$admin =isset($_POST['admin']) ? 1 : 0;
		$email = $_POST['email'];
		$password = $_POST['password'];
		$passwordaga = $_POST['passwordaga'];

	}

	
}


if (isset($_POST['update-user'])) {
		$errors = validateUser($_POST);

	if (count($errors) === 0)
	{
		$id = $_POST['id'];
		unset($_POST['passwordaga'],$_POST['update-user'], $_POST['id']);
		$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

		
			$_POST['admin']= isset($_POST['admin']) ? 1 : 0;
			$count= update($table, $id, $_POST);
			$_SESSION['message'] = "Admin created";
			$_SESSION['type'] = "succsess";
			header('location: ' . BASE_URL . '/admin/users/index.php');
			exit();


	} else{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$admin =isset($_POST['admin']) ? 1 : 0;
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$passwordaga = $_POST['passwordaga'];

	}
}

if(isset($_GET['id'])){
	$user = selectOne($table, ['id' => $_GET['id']]);
	$id = $user['id'];
	$firstname = $user['firstname'];
	$lastname = $user['lastname'];
	$username = $user['username'];
	$admin =isset($user['admin']) ? 1 : 0;
	$email = $user['email'];
	$phone = $user['phone'];
}



if(isset($_POST['login-btn'])){
	$errors = validateLogin($_POST);

	if(count($errors) === 0)
	{
		
		$usera = selectOne($table, ['username' => $_POST['username']]);
		//if($_POST['password'] == $usera['password'] )
		
		//if($usera && password_verify($_POST['password'], $usera['password']))
		if($usera['username']== $_POST['username'] && $_POST['password'] == $usera['password'] )
		{
			
			loginUser($usera);
		}
		else{
			
			array_push($errors, 'wrong input');
		}
	}

	$username = $_POST['username'];
	$password = $_POST['password'];
}



if(isset($_GET['delete_id'])){
	$count = delete($table, $_GET['delete_id']);
	$_SESSION['message'] = 'admin user deleted';
	$_SESSION['type'] = 'success';
	header('location: ' . BASE_URL . '/admin/users/index.php');
	exit();
}
