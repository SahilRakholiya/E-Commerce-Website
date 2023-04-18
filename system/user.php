<?php
require "database_connection.php";
require "admin.php";

if($_SESSION['uname']=="")
{
    header("location:login.php");  
}

//delete-user
if(isset($_GET['uidd']))
{
    $sno=$_GET['uidd'];
    $sql="DELETE FROM `login` WHERE `login`.`no` = $sno";

    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "deleted";
        // $delete=true;
    }
    else
    {
        echo "not delete";
    }
}
?>

<html>
<body>
<h1>User Data:</h1>
<div class="users">
<table border=2px;>
        <thead>
            <tr>
                <th>Index</th>
                <th>userId</th>
                <th>password</th>
            </tr>
        </thead>
        <tbody>
            <?php
               $sql="SELECT * FROM `login`";
               $result=mysqli_query($conn,$sql);
               $id=0;
               while($row=mysqli_fetch_assoc($result))
               {
                $id=$id+1;
                echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$row['username'].'</td>
                        <td>'.$row['password'].'</td>
                        <td><a href="user.php? uidd='.$row['no'].'">Detele</a></td>
                      </tr>';
               }
            ?>
        </tbody>
    </table>
</body>
</html>