<?php
$ma = $_POST['ma'];
$tieu_de = $_POST['tieu_de'];
$noi_dung = $_POST['noi_dung'];
$anh = $_POST['anh'];

// include 'buoi3_connect.php';
// require 'buoi3_connect.php';
require_once 'buoi3_connect.php';   // 3 cái tương tự

$truy_van = "update tin_tuc
set
tieu_de = '$tieu_de',
noi_dung = '$noi_dung',
anh = '$anh'
where
ma = '$ma' ";

mysqli_query($ket_noi, $truy_van);

// in ra loi
$loi = mysqli_error($ket_noi);
echo $loi;

// dong mysql 
mysqli_close($ket_noi);