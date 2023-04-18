<?php
session_start();
session_unset();

session_destroy();
header("location:login.php");


// echo "You are logged out!";
exit();
?>