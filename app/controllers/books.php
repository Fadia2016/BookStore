

<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helper/validatePost.php");


$table = 'books';
$depts = selectAll('depts');
$books = selectAll($table);
$books= getBooksInfo();


$errors = array();
$id = "";
$title ="";
$isbn = "";
$price = "";
$body = "";
$dept_id ="";
$published = "";


///


if(isset($_GET['id'])){
	$book=selectOne($table, ['id' => $_GET['id']]);
	$id = $book['id'];
	$title = $book['title'];
	$isbn = $book['isbn'];
	$price = $book['price'];
	$body = $book['body'];
	$dept_id =$book['dept_id'];
	$published = $book['published'];
	
}



if(isset($_GET['delete_id'])){
	$count = delete($table, $_GET['delete_id']);
	$_SESSION['message']= "Book deleted successfully";
	$_SESSION['type']= "success";
		header("location: " . BASE_URL . "/admin/books/indexadmin.php");
		exit();
}


if(isset($_GET['published'])&& isset($_GET['p_id'])){
	$published = $_GET['published'];
	$p_id = $_GET['p_id'];
	$count =update($table, $p_id, ['published'=> $published]);
	$_SESSION['message']= "Book published state changed";
	$_SESSION['type']= "success";
	header("location: " . BASE_URL . "/admin/books/indexadmin.php");
		exit();
}





if(isset($_POST['add-book'])){

	//dd($_FILES['image']['name']);
	$errors = validatePost($_POST);

	if(!empty($_FILES['image']['name'])){
		$image_name =time() . '_' . $_FILES['image']['name'];
		$destination = ROOT_PATH . "/img/" . $image_name;

		$result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

		if($result){
			$_POST['image'] = $image_name;

		}else{
			array_push($errors, "Failed to upload image");
		}


	}
	else{
		array_push($errors, "Image is Required");
	}


	if (count($errors)===0) {
		unset($_POST['add-book']);
		$_POST['user_id'] = $_SESSION['id'];
		$_POST['published'] = isset($_POST['published']) ? 1 : 0;

		$post_id = create($table, $_POST);
		$_SESSION['message']= "post geated successfully";
		$_SESSION['type']= "success";
		header("location: " . BASE_URL . "/admin/books/indexadmin.php");
		exit();
	}else{
		$title = $_POST['title'];
		$body = $_POST['body'];
		$isbn = $_POST['isbn'];
		$price = $_POST['price'];
		$dept_id = $_POST['dept_id'];
		$published = isset($_POST['published']) ? 1 : 0;
	}


}

if (isset($_POST['update-book'])){
	$errors = validatePost($_POST);

	if(!empty($_FILES['image']['name'])){
		$image_name =time() . '_' . $_FILES['image']['name'];
		$destination = ROOT_PATH . "/img/" . $image_name;

		$result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

		if($result){
			$_POST['image'] = $image_name;

		}else{
			array_push($errors, "Failed to upload image");
		}


	}
	else{
		array_push($errors, "Image is Required");
	}

	if (count($errors)===0) {
		$id = $_POST['id'];
		unset($_POST['update-book'], $_POST['id']);
		$_POST['user_id'] =  $_SESSION['id'];
		$_POST['published'] = isset($_POST['published']) ? 1 : 0;

		$post_id = update($table, $id, $_POST);
		$_SESSION['message']= "Book updated successfully";
		$_SESSION['type']= "success";
		header("location: " . BASE_URL . "/admin/books/indexadmin.php");
	}else{
		$title = $_POST['title'];
		$isbn = $_POST['isbn'];
		$price = $_POST['price'];
		$body = $_POST['body'];
		$dept_id = $_POST['dept_id'];
		$published = isset($_POST['published']) ? 1 : 0;
	}




}


