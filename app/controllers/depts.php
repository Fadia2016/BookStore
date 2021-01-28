
<?php

include(ROOT_PATH . "/app/database/db.php");

$table = 'depts';

$errors = array();
$id = '';
$name = '';
$description = '';

$depts = selectAll($table);



if (isset($_POST['add-dept']))
{
	$errors = validateTopic($_POST);

	if(count($errors)===0){
		unset($_POST['add-dept']);
		$topic_id = create($table, $_POST);
		$_SESSION['message']= 'Department Created Successfully';
		$_SESSION['type']= 'success';
		header('location: ' . BASE_URL . '/admin/depts/index.php');
		exit();
	}
	else
	{
		$name = $_POST['name'];
		$description = $_POST['Description'];
		
	}
}

if(isset($_GET['id'])){


	$id = $_GET['id'];
	$topic = selectOne($table, ['id' => $id]);
	$id = $topic['id'];
	$name = $topic['name'];
	$description = $topic['description'];

}


if (isset($_GET['del_id'])){
	$id = $_GET['del_id'];
	$count = delete($table, $id);
	$_SESSION['message']= 'Department deleted Successfully';
	$_SESSION['type']= 'success';
	header('location: ' . BASE_URL . '/admin/depts/index.php');

	exit();
}


if (isset($_POST['update-dept'])){
	$errors = validateTopic($_POST);
	if(count($errors)===0)
	{
		$id= $_POST['id']; 
		unset($_POST['update-dept'], $_POST['id']);
		$topic_id= update($table, $id, $_POST);
		$_SESSION['message']= 'Department updated Successfully';
		$_SESSION['type']= 'success';
		header('location: ' . BASE_URL . '/admin/depts/index.php');

		exit();
	}
	else{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$description= $_POST['Description'];
	}

}

