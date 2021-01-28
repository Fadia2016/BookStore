

<?php include("path.php") ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); ?>

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

  <title>Book Store</title>
</head>

<body>
  <!-- Web header -->
	<?php include(ROOT_PATH . "/app/include/header.php"); ?>
  <!-- End of Web header -->

  <!--Web page-->
  <div class="auth-content">
    <form action="register.php" method="post">
      <h2 class="form-title" >Register </h2>


      <div>
        <label>First Name</label>
        <input type="text" name="firstname" value="<?php echo $firstname; ?>" class="text-input">
      </div>

      <div>
        <label>Last Name</label>
        <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="text-input">
      </div>

      <div>
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
      </div>

      <div>
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>" class="text-input">
      </div>

      <div>
        <label>Email</label>
        <input type="Email" name="email" value="<?php echo $email; ?>" class="text-input">
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
      </div>
      <div>
        <label>Password Confirmation</label>
        <input type="password" name="passwordaga" value="<?php echo $passwordaga; ?>" class="text-input">
      </div>
      <div>
        <button type="submit" name="register-btn" class="btn btn-big">Register</button>
      </div>
      <p>Or <a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></p>
    </form>

  </div>
  <!--End Web page-->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  <script src="assets/js/script.js" ></script>

</body>

</html>
