<?php
require "database_connection.php";
require "admin.php";
if($_SESSION['uname']=="")
{
    header("location:login.php");  
}


//delete-order
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
<body>
    
<div class="order">
        <h1>Order Data:</h1>
        </div>
        
<table border=2px;>
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>orderId</th>
                        <th>proId</th>
                        <th>useraName</th>
                        <th>proName</th>
                        <th>proPrice</th>
                        <th>proPhoto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       $sql="SELECT * FROM `orders`";
                       $result=mysqli_query($conn,$sql);
                       $id=0;
                       while($row=mysqli_fetch_assoc($result))
                       {
                        $pho=$row['prophoto'];
                        $id=$id+1;
                        echo '<tr>
                                <td>'.$id.'</td>
                                <td>'.$row['orid'].'</td>
                                <td>'.$row['proid'].'</td>
                                <td>'.$row['username'].'</td>
                                <td>'.$row['proname'].'</td>
                                <td>'.$row['proprice'].'</td>
                                <td><img src='.$pho.' width=100px height=100px></td>
                                <td><a href="orders.php? oidd='.$row['orid'].'">Detele</a></td>
                              </tr>';
                       }
                    ?>
                </tbody>
            </table>
</body>
</html>
