<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $ma = $_GET['ma'];

        // include 'buoi3_connect.php';
        // require 'buoi3_connect.php';
        require_once 'buoi3_connect.php';   // 3 cái tương tự

        $sql = "select * from tin_tuc where ma = $ma";
        $ket_qua = mysqli_query($ket_noi, $sql);

        $bai_tin_tuc = mysqli_fetch_array($ket_qua);
    ?>
    <h1>
        <?php echo $bai_tin_tuc['tieu_de'] ?>
    </h1>
    <p>
        <?php echo nl2br($bai_tin_tuc['noi_dung']) ?>
    </p>
    <img src="<?php echo $bai_tin_tuc['anh'] ?>" height='500'>
    
    <?php mysqli_close($ket_noi); ?>
</body>
</html>