<?php 
require '../ck_admin_signin.php';

$name = addslashes($_POST['name']);
$photo = $_FILES['photo'];
$price = addslashes($_POST['price']);
$description = addslashes($_POST['description']);
$manufacturer_id = addslashes($_POST['manufacturer_id']);

$folder = "photos/";
// lay dinh dang anh VD: .jpg .png
$file_extension = explode('.', $photo['name'])[1];
$file_name = date("Ymd") . '_' . time() . '.' . $file_extension; // tao ten anh moi
$path_file = $folder . $file_name;  // kèm đường dẫn ảnh
move_uploaded_file($photo["tmp_name"], $path_file);

require '../connect.php';

$sql = "insert into products(name, photo, price, description, manufacturer_id)
value('$name', '$file_name', '$price', '$description', '$manufacturer_id')";

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