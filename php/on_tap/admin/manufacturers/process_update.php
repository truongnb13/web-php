<?php
if (empty($_POST['id'])){
    header('location:index.php?error=Thiếu mã');
    exit;
}
$id = $_POST['id'];
if (empty($_POST['photo'])) {
    header("location:form_update.php?id=$id&error=Thiếu ảnh");
    exit;
}

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];

require '../connect.php';

$query = "update manufacturers
set
name = '$name',  
address = '$address', 
phone = '$phone', 
photo = '$photo'
where
id = '$id' ";

mysqli_query($connect, $query);

//print error
$error = mysqli_error($connect);
echo $error;

//close mysql
mysqli_close($connect);

// điều hướng về lại home

if (empty($error)) {
    header('location:index.php?success=Sửa thành công');
} else {
    header("location:form_update.php?id='$id'&error=Lỗi truy vấn");
}
