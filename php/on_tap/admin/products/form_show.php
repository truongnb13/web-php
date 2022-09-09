<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php
    if (empty($_GET['id'])) {
        header('location:index.php?error=Không có ID');
        exit;
    }
    $id = $_GET['id'];
    require '../connect.php';

    // Get product from ID
    $sql = "select * from products 
        where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_num_rows($result);

    if ($number_rows === 1) {
        $each = mysqli_fetch_array($result);

        // Get manufacturers
        $manufacturer_id = $each['manufacturer_id'];
        $sql_manufacturers = "select * from manufacturers 
            where id = '$manufacturer_id'";
        $result_manufacturer = mysqli_query($connect, $sql_manufacturers);
        $each_manufacturer = mysqli_fetch_array($result_manufacturer);
    ?>
        <div class="container">
            <div class="frame">
                <div class="frame-header">
                    <div class="frame-back">
                        <a href="../products/"><i class="fas fa-chevron-left"></i></i></a>
                    </div>
                    <h1>Thông tin sản phẩm</h1>
                </div>
                <div class="frame-form">
                    <?php include("../notification.php") ?>
                    <form method="post" action="process_update.php" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <label for="name">Tên:</label>
                            <input type="text" class="input-full" id="name" name="name" value="<?php echo $each['name'] ?>" readonly>
                            <br>
                            <label for="photo">Ảnh ban đầu:</label>
                            <img height="150" src="photos/<?php echo $each['photo'] ?>" alt="">
                            <input type="hidden" id="photo" name="photo_old" value="<?php echo $each['photo'] ?>">
                            <br>
                            <label for="price">Giá:</label>
                            <input type="text" class="input-full" id="price" name="price" value="<?php echo $each['price'] ?>" readonly>
                            <br>
                            <label for="description">Mổ tả:</label>
                            <textarea class="description-full" name="description" id="description" rows="10" readonly><?php echo $each['description'] ?></textarea>

                            <br>
                            <label for="manufacturers">Nhà sản xuất: </label>
                            <input type="text" class="input-full" id="manufacturers" name="manufacturers" value="<?php echo $each_manufacturer['name'] ?>" readonly>
                        </div>
                        <div class="btn-group">
                            <a href="form_update.php?id=<?php echo $each['id'] ?>">
                                <button type="button" class="update-button">Sửa thông tin</button>
                            </a>
                            <a href="process_delete.php?id=<?php echo $each['id'] ?>">
                                <button type="button" class="delete-button">Xóa sản phẩm</button>
                            </a>
                        </div>
                    </form>
                    <?php
                    mysqli_close($connect);
                    ?>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <h1>Không tìm thấy thông tin sản phẩm theo mã trên!</h1>
    <?php } ?>

</body>

</html>