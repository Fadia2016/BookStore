

<?php include("path.php") ?>
<?php

include(ROOT_PATH . '/app/controllers/books.php'); 
if (isset($_GET['id'])) {
	$post = selectOne('books', ['id' => $_GET['id']]);
}

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$topic = selectOne('users', ['id' => $post['user_id']]);
	$email = $topic['email'];
	$name = $topic['username'];
	//$description = $topic['description'];

}

$posts = selectAll('books', ['published' => 1]);
$depts = selectAll('depts');

?>
<!DOCTYPE html>
<html lang="en">

<!-- Web header -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">


	<!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
    crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css2?family=Candal|Lora" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="assets/css/style.css">


	<title><?php echo $post['title']; ?></title>
</head>

<body>
	<!-- Web header -->
	<?php include(ROOT_PATH . "/app/include/header.php"); ?>
	<!-- End of Web header -->

	<!--Web page-->
	<div class = "page-wrapper">

		<!-- content -->
		<div class="content clearfix">

			<!-- main content -->
			<div class="main-content-single">
				<div class="c">
					<h1 class="post-title"><?php echo $post['title']; ?></h1>

					<div class="post-content">

						<img src="<?php echo BASE_URL . '/img/' . $post['image'];  ?>" alt="" class="single-img">

						<p><h3>ISBN:</h3>   <?php echo $post['isbn']; ?></p>

						<p><h3>The Price is:</h3>   $<?php echo $post['price']; ?></p>

						<p><h3>Additional information:</h3> <?php echo $post['body']; ?></p>

						<p><h3>Contact Mr/Ms: </h3><?php echo $name  ?></p>

						<p><h3>Email:</h3> <?php echo $email  ?></p>
					</div>
				</div>

			</div>	
			<!-- End of main content -->

			<!-- Sidebare on right side-->
			<div class="sidebar single">
				<div class="section popular">
					<h2 class="section-title">Other Available Books</h2>
					<?php foreach(array_slice($posts, 0, 4) as $p): ?>

						<div class="post clearfix">
							<img src="<?php echo BASE_URL . '/img/' . $p['image']; ?>" alt="">
							<a href="index.php"><?php echo $p['title']; ?></a>
						</div>

					<?php endforeach; ?>
					

				
				
					


				</div>


				<div class="section topics">
					<h2 class="section-title">Search by Major</h2>
					<ul>
						<?php foreach ($depts as $dept): ?>
							<li><a href="<?php echo BASE_URL . '/index.php?dept_id=' . $dept['id'] . '&name=' . $dept['name'] ?>"><?php echo $dept['name']; ?></a></li>

						<?php endforeach; ?>
						
					</ul>
				</div>

			</div>
			<!-- end of sidebar -->
		</div>
		<!-- End content-->


	</div>

	<!--End Web page-->


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

	<!--<script src="js/script.js" ></script>-->


		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="assets/js/js.js" ></script> 
		<script>
			$('.slide').hiSlide();
		</script>

</body>

</html>
