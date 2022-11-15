<?php require '../ck_admin_signin.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sản phẩm</title>
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
    // Get manufacturers
    $sql_manufacturers = "select * from manufacturers";
    $manufacturers = mysqli_query($connect, $sql_manufacturers);

    // Get product from ID
    $sql = "select * from products 
        where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_num_rows($result);


    if ($number_rows === 1) {
        $each = mysqli_fetch_array($result);
    ?>
        <div class="container">
            <div class="frame">
                <div class="frame-header">
                    <div class="frame-back">
                        <a href="../products/"><i class="fas fa-chevron-left"></i></i></a>
                    </div>
                    <h1>Sửa thông tin sản phẩm</h1>
                </div>
                <div class="frame-form">
                    <?php include("../notification.php") ?>
                    <form method="post" action="process_update.php" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <label for="name">Tên:</label>
                            <input type="text" class="input-full" id="name" name="name" placeholder="Nhập tên" value="<?php echo $each['name'] ?>">
                            <span class="error_input"></span>
                            <br>
                            <label for="photo">Ảnh ban đầu:</label>
                            <img height="150" src="photos/<?php echo $each['photo'] ?>" alt="">
                            <input type="hidden" id="photo" name="photo_old" value="<?php echo $each['photo'] ?>">
                            <br>
                            <label for="photo">Chọn ảnh nếu muốn thay thế ảnh trên:</label>
                            <input type="file" class="input-full" id="photo" name="photo_new" placeholder="Chọn ảnh">
                            <span class="error_input"></span>
                            <br>
                            <label for="price">Giá:</label>
                            <input type="text" class="input-full" id="price" name="price" placeholder="100$" value="<?php echo $each['price'] ?>">
                            <span class="error_input"></span>
                            <br>
                            <label for="description">Mổ tả:</label>
                            <textarea class="description-full" name="description" id="description" placeholder="Nhập mô tả" rows="10"><?php echo $each['description'] ?></textarea>
                            <span class="error_input"></span>
                            <br>
                            <label for="manufacturers">Nhà sản xuất: </label>
                            <select name="manufacturer_id" id="manufacturers" class="select-full">
                                <?php foreach ($manufacturers as $manufacturer) : ?>
                                    <option value="<?php echo $manufacturer['id'] ?>" <?php if ($each['manufacturer_id'] == $manufacturer['id']) { ?> selected <?php } ?>>
                                        <?php echo $manufacturer['name'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <br>
                            <span class="error_input"></span>

                        </div>
                        <div class="btn-group">
                            <button type="button" id="input_button" onclick="kiem_tra()">Ấn đi bé</button>
                        </div>
                    </form>
                    <?php
                    mysqli_close($connect);
                    ?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function kiem_tra() {
                let check = false;
                // ktra_ten
                let name = document.getElementById('name').value;
                if (name.length === 0) {
                    document.getElementsByClassName('error_input')[0].innerHTML = "Tên không được để trống";
                    check = true;
                } else {
                    document.getElementsByClassName('error_input')[0].innerHTML = "";
                }

                // ktra_price
                let price = document.getElementById('price').value;
                if (price.length === 0) {
                    document.getElementsByClassName('error_input')[2].innerHTML = "Giá tiền không được để trống";
                    check = true;
                } else {
                    document.getElementsByClassName('error_input')[2].innerHTML = "";
                }

                //ktra_mô tả
                let description = document.getElementById('description').value;
                if (description.length === 0) {
                    document.getElementsByClassName('error_input')[3].innerHTML = "Mô tả không được để trống";
                    check = true;
                } else {
                    document.getElementsByClassName('error_input')[3].innerHTML = "";
                }

                //ktra_manufacture_id
                let manufacturer = document.getElementById('manufacturers').value;
                if (manufacturer.length === 0) {
                    document.getElementsByClassName('error_input')[4].innerHTML = "Hãy lựa chọn nhà sản xuất";
                    check = true;
                } else {
                    document.getElementsByClassName('error_input')[4].innerHTML = "";
                }
                if (check) {
                    return false;
                } else { // change type button to submit
                    let btn = document.getElementById('input_button');
                    btn.setAttribute('type', 'submit');
                }
            }
        </script>
    <?php } else { ?>
        <h1>Không tìm thấy thông tin sản phẩm theo mã trên!</h1>
    <?php } ?>

</body>

</html>