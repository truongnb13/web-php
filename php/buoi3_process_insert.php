<?php

$tieu_de = $_POST['tieu_de'];
$noi_dung = $_POST['noi_dung'];
$anh = $_POST['anh'];

// include 'buoi3_connect.php';
// require 'buoi3_connect.php';
require_once 'buoi3_connect.php';   // 3 cái tương tự

$sql = "insert into tin_tuc(tieu_de, noi_dung, anh)
value('$tieu_de', '$noi_dung', '$anh')";

mysqli_query($ket_noi, $sql);

// in ra loi
$loi = mysqli_error($ket_noi);
echo $loi;

// dong mysql 
mysqli_close($ket_noi);