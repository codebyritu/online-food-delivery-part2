<?php

require "../config.php";

if(isset($_POST['adminLogin'])){
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    if($mobile=="8274820402"&&$password="admin"){
        session_start();
        $_SESSION['admin'] = true ;
        header('location:dashboard.php');
    }else{
        echo '<script>aler("Incorrect Credentials");</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <?php include "utils/header.php" ?>


</head>

<body style="height:100vh;" class="w-100 m-0 p-0 d-flex justify-content-center align-items-center">
    <div class=" container d-flex justify-content-center align-items-center flex-column">
    <h1 class="text-center blockquote m-3" style="font-size: 30px;">Admin Login</h1>
        <form action="" method="post" class="w-75">
            <div class="m-3 form-floating mb-3">
                <input type="tel" class="form-control" required name="mobile" id="floatingMobile" placeholder="Mobile Number">
                <label for="floatingMobile">Mobile Number</label>
            </div>
            <div class="m-3 form-floating">
                <input type="password" class="form-control" required name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="m-3 d-flex justify-content-center align-items-center">
                <button type="submit" name="adminLogin" class="btn btn-primary m-auto" style="width: 200px;">Login</button>
            </div>
        </form>
    </div>
</body>

</html>