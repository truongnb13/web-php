<?php
if (empty($_POST['id'])){
    header('location:index.php?error=Thiếu mã');
    exit;
}
$id = addslashes($_POST['id']);
if (empty($_POST['photo'])) {
    header("location:form_update.php?id=$id&error=Thiếu ảnh");
    exit;
}

$name = addslashes($_POST['name']);
$address = addslashes($_POST['address']);
$phone = addslashes($_POST['phone']);
$photo = addslashes($_POST['photo']);

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
