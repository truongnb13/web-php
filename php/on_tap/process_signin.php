<?php

if (isset($_POST['id_product'] )){
    $id_product = $_POST['id_product'];
}
$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);

if(isset($_POST['remember'])){
    $remember = true;
} else {
    $remember = false;
}
require 'admin/connect.php';

//kiểm tra xem mail, password ton tai hay khong
$sql = "select * from customers 
where email = '$email' and password = '$password' ";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);

// Nếu tồn tại thì lưu vào session để signin
if($number_rows == 1){
    session_start();
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $each['name'];
    if($remember){
        $token = uniqid('user_',true);
        $sql = "update customers
        set token = '$token' 
        where 
        id = '$id' ";
        mysqli_query($connect, $sql);
        setcookie('remember', $token, time() + 60*60*24*30);
    }
    if (isset($id_product)){
        header("location:product.php?id=$id_product");
        exit;
    }
    header('location:index.php');
    exit;
}

header('location:form_signin.php?error=emai hoặc mật khẩu không đúng');
    

