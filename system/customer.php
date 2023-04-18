<?php
  require "database_connection.php";
  require "_nav.php";

    if($_SESSION['uname']=="")
    {
        header("location:login.php");  
    }
  
?>
<html>

<head>
    <title>Home</title>
    <style>
        

        /* .main{
                display:flex;
            } */
    </style>
</head>

<body>
    <div class="cat">
        <div class="scroll">
            <h2>Catagories:</h2>
            <ul>
                <?php  
                       $sql="SELECT * FROM `categories`";
                       $result=mysqli_query($conn,$sql);
                       $id=0;
                       while($row=mysqli_fetch_assoc($result))
                       {
                        $id=$id+1;
                        echo '<li><a href="customer.php? cid='.$row['catid'].'">'.$row['catname'].'</a></li>';
                       }
                    ?>

            </ul>
        </div>

        <div class="main">
            <table border="2px">
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>CatId</th>
                        <th>ProId</th>
                        <th>ProName</th>
                        <th>ProPhoto</th>
                        <th>ProPrice</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        if($_SERVER['REQUEST_METHOD']=='GET')
        {
          
          // echo $c_id;
          if(isset($_GET['cid']))
          {
            $c_id=$_GET['cid']; 
            $s="SELECT * FROM `products` WHERE catid=$c_id";
          }
          else
          {
                $s="SELECT * FROM `products` WHERE catid=101";
          }

        //   $s="SELECT * FROM `products` WHERE catid=$c_id";
          $res=mysqli_query($conn,$s);
          $id=0;
          
          while($row=mysqli_fetch_assoc($res))
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
                             <td><a href="customer.php? pid='.$row['proid'].'">Order</a></td>
                           </tr>';
            }

            //order-code
            if(isset($_GET['pid']))
            {
                $qp="SELECT * FROM `products` WHERE proid=$_GET[pid]";
                $resp=mysqli_query($conn,$qp);

                $rp=mysqli_fetch_assoc($resp);
                
                $u=$_SESSION['uname'];
                $pid=$rp['proid'];
                $pname=$rp['proname'];
                $pphoto=$rp['prophoto'];
                $pprice=$rp['proprice'];

                // $so="INSERT INTO `orders` (`username`, `proid`, `proname`, `proprice`, `prophoto`) VALUES ($u,$pid,$pname,$pprice,$pphoto)";
                
                $so="INSERT INTO `orders` (`username`, `proid`, `proname`, `proprice`, `prophoto`) VALUES ('$u',$pid,'$pname',$pprice,'$pphoto')";
                
                // $so="INSERT INTO `orders` (`username`, `proid`, `proname`, `proprice`, `prophoto`) VALUES ('savan',5001,'fossile1',8000,'upload/105_5001.jpg')";
            
                $reso=mysqli_query($conn,$so);


                if($reso)
                {
                    echo "Ordered";
                }
                else
                {
                    echo "Not Order";
                }


            }
        }
        ?>
                </tbody>
            </table>
        </div>

    </div>




</body>

</html>