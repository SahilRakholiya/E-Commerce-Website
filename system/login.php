

<?php
 $temp=false;
 $admin=false;
 $showdata="";
        session_start();
        

         if($_SERVER["REQUEST_METHOD"]=="POST")
         {
            include 'database_connection.php';
            $uname=$_POST['username'];
            $pwd=$_POST['password'];
            
            
            $sql="SELECT * FROM login WHERE username='$uname'";
            $res = mysqli_query($conn,$sql);        
            $t=mysqli_num_rows($res);
            if($t)
                {
                while($row=mysqli_fetch_assoc($res)){
                   if (password_verify($pwd, $row['password'])){ 
                        $temp=false;
                        $admin=true;
                             $_SESSION['uname'] = $uname;
                        } 
                        
                        else{
                          $temp=true;
                          $admin=true;
                          $showdata= " Password is incorrcet"; 
                        }
                    }


                    
                }
                else
                {
                  if($uname=="admin@123")
                  {
                    if($pwd=="admin")
                    {
                      $_SESSION['uname'] = $uname;
                      $admin=false;
                      $temp=true;
                    }
                    else{
                      $admin=true;
                      $temp=true;
                      $showdata="Please enter the correct Password ";
                    }
                  }
                  else{
                    $temp=true;
                    $admin=true;
                    $showdata="Please enter the correct username ";  
                  }
                }
        }
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<link rel="stylesheet" href="style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<?php 
  if($temp){
    echo '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
    <strong>Danger!</strong> '.$showdata.'</div>';
  }
 

  ?>
<div id="login-form-wrap">

  <h2>Login</h2>
  <form id="login-form" method="post">
    <p>
    <input type="text" id="username" name="username" placeholder="Username" required><i class="validation"><span></span><span></span></i>
    </p>
    
    <p>
    <input type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
    </p>
  <input type="text" name="captcha">
  <?php 

	// if (isset($_POST['submit'])) {
	// 	if ($_SESSION['captcha'] == $_POST['captcha']) {
	// 		echo "sucess";
	// 	}
	// 	else{
	// 		echo "captcha verification failed! try again"."<br>";
	// 		echo "Text is : ".$_SESSION['captcha'];
	// 	}
	// }
?>

<div class="captcha">
                <div><img src="captcha.php" alt="PHP Captcha" class="d-flex justify-content-start"></div> <br>
            </div>

            <?php
if (isset($_POST["submit"])) {
    if (isset($_POST["captcha"])) {
        if ($_POST["captcha"] == "") {
            echo '<p class="error" >Please EntercCaptcha.</p>';
            $flag = false;
        } elseif ($_SESSION['captcha'] != $_POST["captcha"]) {
            echo '<p class="error" >Incorrect captcha.</p>';
            $flag = false;
        } else {
          if($temp==false)
          {
            echo '<p class="error">Correct captcha.</p>';
            $flag = true;
            
                            header("location:customer.php");

          }
          else{
            if($admin==false)
            {
              echo '<p class="error">Correct captcha.</p>';
            $flag = true;
            
                            header("location:admin.php");  
            }

          }
        }
    }
}
            ?>
    <p>
    <input type="submit" id="login" value="Login" name="submit" >
    </p>
  </form>
  <div id="create-account-wrap">
    <p>Not a member? <a href="signup.php">Create Account</a><p>
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->

  
</body>
</html>
