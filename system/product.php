<?php
require "database_connection.php";
require "admin.php";
if($_SESSION['uname']=="")
{
    header("location:login.php");  
}


//delete-product
?>
<?php
if(isset($_GET['proidd']))
{   
    $sno=$_GET['proidd'];
    $sql="DELETE FROM `products` WHERE `products`.`proid` = $sno";
    
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

<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['proid']))
    {
        $c_id = $_POST['catid'];
        $p_id = $_POST['proid'];
        $p_name = $_POST['proname'];
        $p_price = $_POST['proprice'];


        $p=$_FILES['prophoto'];

        $filename=$p['name'];
        $fileerror=$p['error'];
        $filetmp=$p['tmp_name'];
        $filetext=explode('.',$filename);
        $filecheck= strtolower(end($filetext));
        $filestored =array('png','jpg','jpeg');
        if(in_array($filecheck,$filestored))
        {
            $destinationfile='upload/'.$filename;
            move_uploaded_file($filetmp,$destinationfile);
    
            $sql="INSERT INTO `products`(`catid`, `proid`, `proname`, `prophoto`, `proprice`) VALUES ($c_id,$p_id,'$p_name','$destinationfile',$p_price)";
 
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                echo "The product was inserted successfully!!";
              //   $insert=true;
            }
            else
            {
              echo "The product was not inserted successfully!!";
            }
        } 
    }
}



?>

<html>
<body>
<div class="pro">
<h1>Products Data:</h1>
            <form action="" method="post" enctype="multipart/form-data">
                Cat Id:<input type="text" name="catid"><br>
                Product Id:<input type="text" name="proid"><br>
                Product Name:<input type="text" name="proname"><br>
                Product Price:<input type="text" name="proprice"><br>
                Product Image:<input type="file" name="prophoto"><br>
                <input type="submit" name="submit" value="submit">
            </form>
            <table border=2px;>
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>catNo</th>
                        <th>proId</th>
                        <th>proName</th>
                        <th>proPhoto</th>
                        <th>proPrice</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       $sql="SELECT * FROM `products`";
                       $result=mysqli_query($conn,$sql);
                       $id=0;
                       while($row=mysqli_fetch_assoc($result))
                       {
                        $id=$id+1;
                        $pho=$row['prophoto'];
                        echo '<tr>
                                <td>'.$id.'</td>
                                <td>'.$row['catid'].'</td>
                                <td>'.$row['proid'].'</td>
                                <td>'.$row['proname'].'</td>                         
                                <td><img src='.$pho.' width=100px height=100px></td>
                                <td>'.$row['proprice'].'</td>
                                <td><a href="product.php? proidd='.$row['proid'].'">Detele</a></td>
                              </tr>';
                       }
                    ?>
                </tbody>
            </table>
</body>
</html>