<?php

require "../config.php";
session_start();

if(isset($_POST['register'])){
    $name = $_POST['name'] ;
    $mobile = $_POST['mobile'] ;
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;
    $address = $_POST['address'] ;

    $sql = "select * from customer where mobile='$mobile'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)){
        echo '<script>alert("Mobile already exists");</script>';
        header('location:register.html');
    }

    $sql = "INSERT INTO `customer`(`name`, `mobile`, `email`, `address`, `password`) VALUES ('$name','$mobile','$email','$address','$password')" ;

    $result = mysqli_query($conn,$sql);

    if($result){
        echo '<script>alert("Registered Succesfully");</script>';
        $sql ="select * from customer where mobile='$mobile' and  password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['customer'] = $row ;
        header('location:../index.php');
    }
    }else{
        echo '<script>alert("Error Occured");</script>';
        header('location:register.html');
    }

}
if(isset($_POST['login'])){
    $mobile = $_POST['mobile'] ;
    $password = $_POST['password'] ;

    $sql ="select * from customer where mobile='$mobile' and  password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['customer'] = $row ;
        header('location:../index.php');
    }else{
        echo '<script>alert("Incorrect Credentials");</script>';
        header('location:login.html');
    }

}
