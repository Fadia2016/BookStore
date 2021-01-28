
<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/books.php") ?>
<!DOCTYPE html>
<html lang="en">

<!-- Web header -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">


	<link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">


	<title>Book Store</title>
</head>

<body>
	<!-- Web header -->
	<?php include(ROOT_PATH . "/app/include/header.php"); ?>
	<!-- End of Web header -->

	<div class="admin-wrapper">

		<div class="admin-content2">
			<div class="button">
				<a href="createadmin.php" class="btn btn-big"> Add Book<a>
				<a href="indexadmin.php" class="btn btn-big">Manage Books</a>
			</div>

			<div class="content">
				<h2 class="page-title">Manage Books</h2>
				<table>
					<thead>
						<th>Number</th>
						<th>Title</th>
						<th>User</th>
						<th colspan="3"> Action</th>
					</thead>
					<tbody>
						<?php foreach ($books as $key => $book): ?>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $book['title'] ?></td>
								<td><?php echo $book['username'] ?></td>
								<td><a href="editadmin.php?id=<?php  echo $book['id']; ?>" class="fix">Edit</a></td>
								<td><a href="editadmin.php?delete_id=<?php  echo $book['id']; ?>" class="delete">Delete</a></td>
								<?php if ($book['published']): ?>
									<td><a href="editadmin.php?published=0&p_id=<?php echo $book['id'] ?>" class="unpublish">unpublish</a></td>
								<?php else: ?>
									<td><a href="editadmin.php?published=1&p_id=<?php echo $book['id'] ?>" class="publish">publish</a></td>
								<?php endif; ?>
							</tr>

						<?php endforeach; ?>
					</tbody>
				</table>

			</div>


		</div>


	</div>


</body>
</html>
