<?php

$no = $_GET['no'];

require 'connect.php';

$query = "delete from thanh_vien where no = $no ";

mysqli_query($connect, $query);

//print error
$error = mysqli_error($connect);
echo $error;

//close mysql
mysqli_close($connect);

header('location:index.php');