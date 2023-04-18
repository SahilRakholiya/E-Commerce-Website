<?php
require "database_connection.php";
require "admin.php";
if($_SESSION['uname']=="")
{
    header("location:login.php");  
}

//delete-category
if(isset($_GET['idd']))
{
    $sno=$_GET['idd'];
    $sql="DELETE FROM `categories` WHERE `categories`.`catid` = $sno";

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


// if(isset($_GET['idu']))
// {
//     $sno=$_GET['idu'];
//     echo "<script>alert(<form action='admin.php' method='post'>name:<input type='text' name='cname'></form>);</script>";

//     // $catname=$_POST['cname'];

//     // $sql="UPDATE `categories` SET `catname` = '$_POST[cname]' WHERE `categories`.`catid` = $sno";

//     // $result=mysqli_query($conn,$sql);
//     // if($result)
//     // {
//     //     echo "updated";
//     //     // $update=true;
//     // }
//     // else
//     // {
//     //     echo "not update";
//     // }
// }


if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['catid']))
    {
        $c_id = $_POST['catid'];
        $c_name = $_POST['catname'];
           
        $sql="INSERT INTO `categories` (`catid`, `catname`) VALUES ($c_id,'$c_name')";
    
        $result=mysqli_query($conn,$sql);
        
        if($result)
        {
            echo "The category was inserted successfully!!";
          //   $insert=true;
        }
        else
        {
          echo "The category was not inserted successfully!!";
        }
    }
    


    
}
?>

<html>
<body>
<div class="add">
<h1>Ctegories Data:</h1>
            <form action="" method="post">
                Cat Id:<input type="text" name="catid"><br>
                Cat Name:<input type="text" name="catname"><br>
                <input type="submit" name="submit" value="submit">
            </form>
    
            <table border=2px;>
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>catNo</th>
                        <th>catName</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       $sql="SELECT * FROM `categories`";
                       $result=mysqli_query($conn,$sql);
                       $id=0;
                       while($row=mysqli_fetch_assoc($result))
                       {
                        $id=$id+1;
                        echo '<tr>
                                <td>'.$id.'</td>
                                <td>'.$row['catid'].'</td>
                                <td>'.$row['catname'].'</td>
                                <td><a href="categories.php? idd='.$row['catid'].'">Detele</a></td>
                              
                              </tr>';

                                // <td><a href="admin.php? idu='.$row['catid'].'">Update</a></td>
                       }
                    ?>
                </tbody>
            </table>
</body>
</html>