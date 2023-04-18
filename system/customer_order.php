<?php
require "database_connection.php";
require "_nav.php";
if($_SESSION['uname']=="")
{
    header("location:login.php");  
}

if(isset($_GET['oidd']))
{
    $sno=$_GET['oidd'];
    $sql="DELETE FROM `orders` WHERE `orders`.`orid` = $sno";

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
    <head>
        <title></title>
    </head>
    <body>
        <h1>Your Order:</h1>
        <div class="odata">
            <table border=2px;>
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>orderId</th>
                            <th>proId</th>
                            <th>proName</th>
                            <th>proPhoto</th>
                            <th>proPrice</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        
                           $un=$_SESSION['uname'];
                           $sql="SELECT * FROM `orders` WHERE username='$un' ";
                           $result=mysqli_query($conn,$sql);
                           $id=0;
                           $total=0;
                           while($row=mysqli_fetch_assoc($result))
                           {
                            $pho=$row['prophoto'];
                            $total=$total+$row['proprice'];
                            $id=$id+1;
                            echo '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$row['orid'].'</td>
                                    <td>'.$row['proid'].'</td>
                                    <td>'.$row['proname'].'</td>
                                    <td><img src='.$pho.' width=100px height=100px></td>
                                    <td>'.$row['proprice'].'</td>
                                    <td><a href="cart.php? oidd='.$row['orid'].'">Detele</a></td>
                                  </tr>';
                           }
                           echo '<tr>
                                    <td colspan=5><b>Total</b></td>
                                    <td><b>'.$total.'</b></td>
                                </tr>';
                        ?>
                    </tbody>
            </table>
        </div>
        
    </body>
</html>