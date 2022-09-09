<?php

$ma = $_GET['ma'];

require 'buoi3_connect.php';

$truy_van = "delete from tin_tuc where ma = $ma ";

mysqli_query($ket_noi, $truy_van); // $ket_noi trong buoi3_connect.php

$loi = mysqli_error($ket_noi);
echo $loi;

mysqli_close($ket_noi);