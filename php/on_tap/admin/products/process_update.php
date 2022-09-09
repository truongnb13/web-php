<?php
if (empty($_POST['id'])) {
    header('location:index.php?error=Thiếu mã');
    exit;
}
$id = $_POST['id'];
// if (empty($_POST['photo_old'])) {
//     header("location:form_update.php?id=$id&error=Thiếu ảnh");
//     exit;
// }

$name = $_POST['name'];
$photo_new = $_FILES['photo_new'];
// neu co anh moi 
if ($photo_new['size'] > 0) {
    $folder = "photos/";
    $file_extension = explode('.', $photo_new['name'])[1]; // lay dinh dang anh VD: .jpg .png
    $file_name = date("Ymd") . '_' . time() . '.' . $file_extension; // tao ten anh moi
    $path_file = $folder . $file_name;  // kèm đường dẫn ảnh
    move_uploaded_file($photo_new["tmp_name"], $path_file); // truyen anh vao trong thu muc
} else { // neu k doi anh moi
    $file_name = $_POST['photo_old'];
}

$price = $_POST['price'];
$description = $_POST['description'];
$manufacturer_id = $_POST['manufacturer_id'];
require '../connect.php';

$query = "update products
set
name = '$name',  
photo = '$file_name', 
price = '$price', 
description = '$description',
manufacturer_id = '$manufacturer_id'
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
