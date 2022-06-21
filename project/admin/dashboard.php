<?php

require "../config.php";

require "controllers/Authenticate.php";

class Customer{
    function getCustomer(){
        require "../config.php";
        $sql = "select * from customer";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)){
            return $result;
        }else{
            return 0;
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <?php include "utils/header.php" ?>


</head>

<body  class="w-100 m-0 p-3 d-flex justify-content-center  flex-column">
    <div class="position-relative">
        <div class="position-absolute top-0 end-0">
            <button class="btn btn-secondary" onclick="location.href='logout.php';">Logout</button>
        </div>
    </div>
    <h1 class="text-center blockquote m-3" style="font-size: 30px;">Customer Details</h1>
    <div class="container border m-auto p-3 table-responsive">
        <table class="table table-hover">
            <thead>
                <td>SL No</td>
                <td>Name</td>
                <td>Mobile</td>
                <td>Email</td>
                <td>Address</td>
            </thead>
            <?php
                $cust = new Customer();
                $result = $cust->getCustomer();
                if($result == '0'){
            ?>
                <p>No Customers Found</p>
            <?php
                }else{
            ?>
            <tbody>
                <?php
                $i = 0 ;
                while($row=mysqli_fetch_assoc($result)){
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                </tr>
                <?php
                }
            }
            ?>
            </tbody>

        </table>
    </div>
    
</body>

</html>