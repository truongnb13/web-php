<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/grid.css">
</head>
<body>
    <div class="grid wide main">
        <?php include "header.php" ?>
        <?php include "product_content.php" ?>
        <?php include "footer.php" ?>
    </div>
</body>
</html>