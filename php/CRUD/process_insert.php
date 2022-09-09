<?php

if (empty($_GET['name'])){
    header('location:form_insert.php');
    exit;
}

$name = $_POST['name'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$hobby = $_POST['hobby'];

require 'connect.php';

$sql = "insert into thanh_vien(name, gender, address, email, password, hobby)
value('$name', '$gender', '$address', '$email', '$password', '$hobby')";

mysqli_query($connect, $sql);

//print error
$error = mysqli_error($connect);
echo $error;

//close mysql
mysqli_close($connect);

// điều hướng về lại home
if (empty($error)) {
    header('location:index.php');
} else {
    header('location:form_insert.php');
}