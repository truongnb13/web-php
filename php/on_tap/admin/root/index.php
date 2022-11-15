<?php require '../ck_admin_signin.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="./process_signout.php">
        Đăng xuất
    </a>
    <h1>Giao diện Admin với level là <?php echo $_SESSION['level_admin']?>
    </h1>
    <?php if (isset($_SESSION['level_admin'])) {?>
        <h1>Tồn tại level</h1>
        <?php } else {?>
            <h1>Không tồn tại tại level</h1>
        <?php }?>
</body>

</html>