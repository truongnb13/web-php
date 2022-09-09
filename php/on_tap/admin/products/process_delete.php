<?php

$id = $_GET['id'];

require '../connect.php';

$query = "delete from products where id = $id ";

mysqli_query($connect, $query);

//print error
$error = mysqli_error($connect);
echo $error;

//close mysql
mysqli_close($connect);

header('location:index.php?success=Xóa thành công');