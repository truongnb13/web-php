<?php

if (empty($_GET['name'])) {
    header('location:form_update.php');
    exit;
}

$no = $_POST['no'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$hobby = $_POST['hobby'];

require 'connect.php';

$query = "update thanh_vien
set
name = '$name', 
gender = '$gender', 
address = '$address', 
email = '$email', 
password = '$password', 
hobby = '$hobby'
where
no = '$no' ";

mysqli_query($connect, $query);

//print error
$error = mysqli_error($connect);
echo $error;

//close mysql
mysqli_close($connect);

// điều hướng về lại home

if (empty($error)) {
    header('location:index.php');
} else {
    header('location:form_update.php');
}
