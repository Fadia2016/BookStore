<?php include("../path.php"); ?>
<?php include("p.php"); ?>
<!DOCTYPE html>
<html lang="en">

<!-- Web header -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">


	<link rel="stylesheet" type="text/css" href="../assets/css/admin.css">


	<title>Edit Book</title>
</head>

<body>
	<!-- Web header -->
	<?php include(ROOT_PATH . "/app/include/header.php"); ?>
	<!-- End of Web header -->

	<div class="admin-wrapper">


		<div class="admin-content2">
			<div class="button">
				<a href="createbook.php" class="btn btn-big"> Edit Book</a>
				<a href="indexbook.php" class="btn btn-big">Manage Books</a>
			</div>

			<div class="content">
				<h2 class="page-title">Edit Books</h2>


				<form action="editbook.php" method="post" enctype="multipart/form-data">

					<input type="hidden" name="id" value="<?php echo $id ?>" >

					<div>
						<label>Title</label>
						<input type="text" name="title" value="<?php echo $title ?>" class="text-input">
					</div>
					
					<label>ISBN</label>
					<input type="text" name="isbn" class="text-input">

					<label>Price (In Dollors)</label>
					<input type="text" name="price" class="text-input">
					
					<div>
						<label>Departement</label>
						<select name="dept_id" class="text-input">
							<option value=""></option>
							<?php foreach ($depts as $key => $dept): ?>
							{
								<?php if (!empty($dept_id) && $dept_id == $dept['id']): ?>
									<option selected value="<?php echo $dept['id'] ?>"><?php echo $dept['name'] ?></option>

								<?php else: ?>
									<option value="<?php echo $dept['id'] ?>"><?php echo $dept['name'] ?></option>

								<?php endif; ?>

								
							}
							
							<?php endforeach; ?>
										

						</select>
					</div>

					<div>
						<label>Image</label>
						<input type="file" name="image" class="text-input">
					</div>

					<label>Comments</label>
					<textarea name="body" id="body"><?php echo $body ?></textarea>
					
					<br>
					<br>
					<div>
						<?php if(empty($published) && $published == 0): ?>
						<label>
							<input type="checkbox" name="published">
							publish
						</label>
						<?php else: ?>
						<label>
							<input type="checkbox" name="published" checked>
							publish
						</label> 
					<?php endif; ?>
					</div>

					<div>
						<button type="submit" name="update-book" class="btn btn-big">Update Book</button>
					</div>
				</form>


			</div>


		</div>

	</div>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

	<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>

	<script src="../assets/js/js.js"></script>


</body>

</html>