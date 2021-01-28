
<?php


function validateUser($user){


	$errors = array();


	if(empty($user['firstname'])){
		array_push($errors, 'First Name is required');
	}
	if(empty($user['lastname'])){
		array_push($errors, 'Last Name is required');
	}

	if(empty($user['username'])){
		array_push($errors, 'Username is required');
	}

	if(empty($user['phone'])){
		array_push($errors, 'Phone is required');
	}

	if(empty($user['email'])){
		array_push($errors, 'email is required');
	}

	if(empty($user['password'])){
		array_push($errors, 'password is required');
	}

	if(($user['passwordaga'] !== $user['password'])){
		array_push($errors, 'password does not match');
	}

	/*$existingUser= selectone('users', ['email' => $user['email']]);
	if ($existingUser){
		array_push($errors, 'Email Exist in the Database');
	}*/

	$existingUser= selectOne('users', ['email' => $user['email']]);
	if ($existingUser){
		if (isset($user['update-user']) && $existingUser['id'] != $user['id'])
		{
			array_push($errors, 'Email Exist in the Database');
		}
		if (isset($user['create-admin'])) 
		{
			array_push($errors, 'Email Exist in the Database');
		}
		
	}

	return $errors;
}

function validateLogin($user){


	$errors = array();

	if(empty($user['username'])){
		array_push($errors, 'Username is required');
	}

	if(empty($user['password'])){
		array_push($errors, 'password is required');
	}

	return $errors;
}
