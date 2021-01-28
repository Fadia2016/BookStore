
<?php

session_start();
require('connect.php');


function dd($value)
{
	echo "<pre>", print_r($value, true), "</pre>";
	die();
}

function executeQuery($sql, $data)
{
	global $conn;
	$stmt= $conn->prepare($sql);
	$values = array_values($data);
	$types = str_repeat('s', count($values));
	$stmt->bind_param($types, ...$values);
	$stmt->execute();
	return $stmt;
}


function selectALL($table, $conditions = [])
{
	global $conn;
	$sql="select * from $table";
	if(empty($conditions))
	{
		$stmt= $conn->prepare($sql);
		$stmt->execute();
		$records= $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		return $records;
	}
	else{

		$i = 0;

		foreach ($conditions as $key => $value){
			if($i===0){
				$sql = $sql . " WHERE $key=?";
			}
			else{
				$sql = $sql . " AND $key=?";
			}
			$i++;
			
		}
	
		$stmt= executeQuery($sql, $conditions);
		$records= $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		return $records;
	
	}
	
}


function selectOne($table, $conditions )
{
	global $conn;
	$sql="select * from $table";
	

		$i = 0;

		foreach ($conditions as $key => $value){
			if($i===0){
				$sql = $sql . " WHERE $key=?";
			}
			else{
				$sql = $sql . " AND $key=?";
			}
			$i++;
			
		}

	
		$sql = $sql . " LIMIT 1";
		$stmt= executeQuery($sql, $conditions);
		$records= $stmt->get_result()->fetch_assoc();
		return $records;
	
	
}

function create($table, $data){
	global $conn;
	$sql = "INSERT INTO $table SET "; 

	$i = 0;

	foreach ($data as $key => $value){
		if($i === 0){
			$sql = $sql . " $key=?";
		}
		else{
			$sql = $sql . ", $key=?";
		}
		$i++;
			
	}

	$stmt = executeQuery($sql, $data);
	$id = $stmt->insert_id;
	return $id;

}


function update($table, $id ,$data){
	global $conn;
	$sql = "UPDATE $table SET "; 

	$i = 0;

	foreach ($data as $key => $value){
		if($i === 0){
			$sql = $sql . " $key=?";
		}
		else{
			$sql = $sql . ", $key=?";
		}
		$i++;
			
	}

	$sql = $sql . " WHERE id=?";
	$data['id'] = $id;
	$stmt = executeQuery($sql, $data);
	return $stmt->affected_rows;

}


function delete($table, $id){
	global $conn;
	$sql = "DELETE FROM $table WHERE id=?"; 

	$stmt = executeQuery($sql, ['id' => $id]);
	return $stmt->affected_rows;

}

function getPublishedPosts()
{
	global $conn;
	$sql= "SELECT p.*, u.username, u.email FROM books AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?";

	$stmt= executeQuery($sql, ['published' => 1 ]);
	$records= $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	return $records;
}


function getBooksInfo()
{
	global $conn;
	$sql= "SELECT p.*, u.username, u.email FROM books AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? OR p.published=0";

	$stmt= executeQuery($sql, ['published' => 1 ]);
	$records= $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	return $records;
}


function getPosts($dept_id)
{
	global $conn;
	$sql= "SELECT p.*, u.username, u.email FROM books AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND dept_id=?";

	$stmt= executeQuery($sql, ['published' => 1, 'dept_id' => $dept_id]);
	$records= $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	return $records;
}




function searchPosts($term)
{
	$match =  '%' . $term . '%';
	global $conn;
	$sql= "SELECT
	 p.*, u.username
	 FROM books AS p 
	 JOIN users AS u 
	 ON p.user_id=u.id 
	 WHERE p.published=?
	 AND p.title LIKE ? OR p.isbn LIKE ?";

	$stmt= executeQuery($sql, ['published' => 1, 'title'=> $match, 'isbn' => $match]);
	$records= $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	return $records;
}


