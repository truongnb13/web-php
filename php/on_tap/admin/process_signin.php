<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

require 'connect.php';

$sql = "select * from admin 
where 
email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);

// Nếu tồn tại luu vào session
if(mysqli_num_rows($result)){
    $each = mysqli_fetch_array($result);
    $_SESSION['id_admin'] = $each['id'];
    $_SESSION['name_admin'] = $each['name'];
    $_SESSION['level_admin'] = $each['level'];

    header("location:./root");
    exit;
}
header("location:index.php?error=Tài khoản hoặc mật khẩu không hợp lệ");