<?php 

$servername="localhost";
$username="root";
$password="root";
$database="sahil_system";

$conn = mysqli_connect($servername,$username,$password,$database);

if($conn)
{
 
}   
else
{
    die("ERROR".mysqli_connect_error());
   
}

?>