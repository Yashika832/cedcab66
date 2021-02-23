<?php session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 0) {
die("You can not access !");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand brand" href="index.php"><strong>Ced <em>Cab</em></strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

      </ul>
    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
      <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="aboutUs.php">About Us</a>
        </li>
          <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="contactUs.php">Contact Us</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="signUp.php">SignUp</a>
        </li>
          <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="loginform.php">LogIn</a>
        </li>
    </ul>
    </div>
  </div>
</nav>