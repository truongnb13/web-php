<?php

if (empty($_POST['photo'])){
    header("location:form_insert.php?error='Thiếu ảnh'");
    exit;
}

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];

require '../connect.php';

$sql = "insert into manufacturers(name, address, phone, photo)
value('$name', '$address', '$phone', '$photo')";

mysqli_query($connect, $sql);

//print error
$error = mysqli_error($connect);
echo $error;

//close mysql
mysqli_close($connect);

// điều hướng về lại home
if (empty($error)) {
    header('location:index.php?success=Thêm thành công');
} else {
    header('location:form_insert.php?error=Lỗi truy vấn');
}