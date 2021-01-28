

<?php include("path.php") ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); ?>
<!DOCTYPE html>
<html lang="en">

<!-- Web header -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--<script src="https://kit.fontawesome.com/d058c90a68.js" crossorigin="anonymous"></script>-->

  <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
    crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css2?family=Candal|Lora" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  <title>Book Store</title>
</head>

<body>
  <!-- Web header -->
	<?php include(ROOT_PATH . "/app/include/header.php"); ?>
  <!-- End of Web header -->

  <!--Web page-->
  <div class="auth-content">
    <form action="login.php" method="post">
      <h2 class="form-title">Login</h2>


      <div>
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
      </div>
      <div>
        <button type="submit" name="login-btn" class="btn btn-big">Login</button>
      </div>
      <p>Or <a href="<?php echo BASE_URL . '/register.php' ?>"> Create Account</a></p>
    </form>

  </div>
  <!--End Web page-->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  <script src="assets/js/script.js" ></script>

</body>

</html>
