



<?php 
include("path.php");
//include(ROOT_PATH . "/app/database/db.php");

include(ROOT_PATH . "/app/controllers/depts.php");

$books = array();
$postsTitle = 'Books';

if(isset($_GET['dept_id'])){
	$books = getPosts($_GET['dept_id']);
	$postsTitle = "All Books Under the Department of  '" . $_GET['name'] . "'";
}
else if (isset($_POST['search-term'])){
	$postsTitle = "You search for '" . $_POST['search-term'] . "'"; 
	$books = searchPosts($_POST['search-term']);
}else {
	$books= getPublishedPosts(); 
}



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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css2?family=Candal|Lora" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="assets/css/style.css">


	<title>Book Store</title>
</head>

<body>
	<!-- Web header -->

	<?php include(ROOT_PATH . "/app/include/header.php"); ?>


	<!--Web page-->
	<div class = "page-wrapper">


		<!-- slidershow -->
		<h1 class="slider-title">Books in High Demand</h1>
		<div class="slide hi-slide">
		  <div class="hi-prev "></div>
			<div class="hi-next "></div>
			<ul>
				<?php foreach ($books as $book): ?>
				<li>
				
          			<img src="<?php echo BASE_URL . '/img/' . $book['image'];  ?>" alt="" class="slider-image">
          			<div class="post-info">
            			<h4><a href="single.php?id=<?php echo $book['id']; ?>"> <?php echo $book['title']; ?> </a></h4>
            			<h4><a> ISBN: <?php echo $book['isbn'];  ?> </a></h4>

            			<i class="far fa-user"><?php echo $book['username'];  ?></i>
            			&nbsp;
            			&nbsp;
            			<i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($book['created_at']));?></i>
            			&nbsp;
            			&nbsp;
            			<i>Price: </i><i class="fa fa-usd" aria-hidden="true"><?php echo $book['price'];  ?></i>
          			</div>
          		
        		</li>
        		<?php endforeach; ?>
        	</ul>
        </div>
		<!-- slidershow -->
		<!-- slidershow -->

		<!-- content -->
		<div class="content clearfix">

			<!-- main content -->
			<div class="main-content">
				<h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

				<?php foreach ($books as $book):  ?>
					<div class="post clearfix">
						<img src="<?php echo BASE_URL . '/img/' . $book['image'];  ?>" alt="" class="post-image">
						<div class="post-preview">
							<h2><a href="single.php?id=<?php echo $book['id']; ?>"><?php echo $book['title']; ?></a></h2>

							<i>ISBN: <?php echo $book['isbn'];  ?></i>
							&nbsp;
							&nbsp;
							<i class="far fa-user"><?php echo $book['username'];  ?></i>
							&nbsp;
							&nbsp;
							<i class="far fa-calendar"><?php echo date('F j, Y', strtotime($book['created_at']));?></i>
							&nbsp;
							&nbsp;
							<i>Price: <i class="fa fa-usd" aria-hidden="true"><?php echo $book['price'];  ?></i>
							&nbsp;
							&nbsp;
							<a href="single.php?id=<?php echo $book['id']; ?>" class="btn read-more">More info</a>
						</div>
					</div>
				<?php endforeach; ?>


				

			</div>
			<!-- End of main content -->

			<!-- Sidebare on right side-->
			<div class="sidebar">

				<div class="section search">
					<h2 class="section-title"> Search</h2>
					<form action="index.php" method="post">
						<input type="text" name="search-term" class="text-input" placeholder="Search Here...">
					</form>
				</div>


				<div class="section topics">
					<h2 class="section-title">Search by Major</h2>
					<ul>


						<?php foreach ($depts as $key => $dept): ?>
							<li><a href="<?php echo BASE_URL . '/index.php?dept_id=' . $dept['id'] . '&name=' . $dept['name'] ?>"><?php echo $dept['name']; ?></a></li>
						<?php endforeach; ?>

					</ul>

				</div>
			</div>
		<!-- End content-->
		</div>

	</div>
	<!--End Web page-->

	<!-- footer -->
	<?php include(ROOT_PATH . "/app/include/footer.php"); ?>
	<!-- End of footer -->


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

		<script src="assets/js/js.js" ></script>

		<script>
			$('.slide').hiSlide();
		</script>

</body>

</html>
