
<?php 

function validatePost($post){


	$errors = array();

	if(empty($post['title'])){
		array_push($errors, 'Title is required');
	}

	if(empty($post['price'])){
		array_push($errors, 'Price is required');
	}

	if(empty($post['isbn'])){
		array_push($errors, 'ISBN is required');
	}

	if(empty($post['body'])){
		array_push($errors, 'Body is required');
	}

	if(empty($post['dept_id'])){
		array_push($errors, 'password is required');
	}


	$existingPost= selectone('books', ['title' => $post['title']]);
	if ($existingPost){
		if (isset($post['update-book']) && $existingPost['id'] != $post['id'])
		{
			array_push($errors, 'Title Exist in the Database');
		}
		if (isset($post['add-book'])) 
		{
			array_push($errors, 'Title Exist in the Database');
		}
		
	}

	return $errors;
}
