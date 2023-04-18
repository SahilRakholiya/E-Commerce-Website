<?php
  session_start();
  if($_SESSION['uname']=="")
  {
      header("location:login.php");  
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <a class="navbar-brand" href="#">
    <img src="LOGO_2.jpg" alt="logo" style="width:40px;">
  </a>
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="customer.php">HOME</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">ABOUT</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">CONTACT</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customer_order.php">ORDER</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="logout.php">LOGOUT</a>
    </li>
  </ul>
</nav>

</body>
</html>

 
