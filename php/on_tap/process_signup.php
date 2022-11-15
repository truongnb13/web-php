<?php
session_start();
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])){
    header("location:form_signup.php?error=Điền đầy đủ thông tin");
    exit;
}
$name = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);
$phone_number = addslashes($_POST['phone_number']);
$address = addslashes($_POST['address']);

require 'admin/connect.php';

//kiểm tra xem mail ton tai hay chưa
$sql = "select count(*) from customers 
where email = '$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if($number_rows == 1){
    header('location:form_signup.php?error=email đã tồn tại');
    exit;
} 
// Them nguoi dung vao db
$sql = "insert into customers(name, email, password, phone_number, address)
value ('$name', '$email', '$password', '$phone_number', '$address')";
mysqli_query($connect, $sql);

$title = 'Đăng ký thành công.';
$content = "Bạn đã đăng ký thành công, vui lòng vô đây để theo dõi tôi =))).<br>
<a href='fb.com/truongnb1302'>Nhấp vô đây </a> ";
require 'mail.php';
send_mail($email, $name, $title, $content);

$sql = "select id from customers 
where email = '$email'";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result)['id'];
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;


mysqli_close($connect);

header('location:index.php');