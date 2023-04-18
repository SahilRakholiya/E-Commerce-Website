
 <?php
        $temp=false;
        $showdata="";
        session_start();
              if($_SERVER["REQUEST_METHOD"]=="POST")
                 {
     
                     $uname=$_POST['username'];
                     $pwd=$_POST['password'];
                     $cpwd=$_POST['cpassword'];
                     $email=$_POST['email'];
                  
                    
                       include 'database_connection.php';
                       if($pwd==$cpwd)
                       {
                           $sql="SELECT * FROM `login` WHERE `username` LIKE '$uname' ";
                           $res=mysqli_query($conn,$sql);
                           $t=mysqli_num_rows($res);
                        
                           if($t)
                           {
                             $showdata= "Please enter unique username";
                             $temp=true;

                           }
                           else
                           {
                            $temp=false;

                               // $sql="INSERT INTO `login` ( `username`, `password`, `email`)  VALUES ('$uname', '$pwd', '$email')";

                               $hash_pass=password_hash($pwd, PASSWORD_DEFAULT);

                               $sql="INSERT INTO `login` ( `username`, `password`)  VALUES ('$uname', '$hash_pass')";
                          
                               //sql="INSERT INTO login VALUES (4,$uname', '$pwd','gs@hq') ";
                               $res=mysqli_query($conn,$sql);

                               
                               if($res==1)
                               {   
                                   header("location:login.php");
                               }
                               else
                               {
                                $temp=true;
                                $showdata= "not signup";
                               }
                               
                           }

                           
                       }   
                       else
                       {
                        $temp=true;
                        $showdata= "password and confirm password are not same please re-enter";
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

  <?php 
  if($temp){
    echo '<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
    <strong>Danger!</strong> '.$showdata.'</div>';
  }
 

  ?>
<!-- partial:index.partial.html -->
<div id="login-form-wrap">
  <h2>Sign Up</h2>
  
  <form   id="login-form" method='post'>
      
    <p>
    <input type="text" id="username" name="username" placeholder="Username" required><i class="validation"><span></span><span></span></i>
    </p>
    

    <p>
    <input type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input type="email" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input type="submit" id="signup" value="Signup" onsubmit="login.php">
    </p>
  </form>
 <span>
     <p><br></P>
</span>
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
