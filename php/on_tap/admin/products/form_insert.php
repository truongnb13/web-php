<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    require '../connect.php';
    $sql = "select * from manufacturers";
    $result = mysqli_query($connect, $sql);
    ?>
    <div class="container">
        <div class="frame">
            <div class="frame-header">
                <div class="frame-back">
                    <a href="../products/"><i class="fas fa-chevron-left"></i></i></a>
                </div>
                <h1>Thêm sản phẩm</h1>
            </div>
            <div class="frame-form">
                <?php include "../notification.php" ?>
                <form method="post" action="process_insert.php" enctype="multipart/form-data">
                    <div class="input-group">
                        <label for="name">Tên:</label>
                        <input type="text" class="input-full" id="name" name="name" placeholder="Nhập tên">
                        <span class="error_input"></span>
                        <br>
                        <label for="photo">Ảnh:</label>
                        <input type="file" class="input-full" id="photo" name="photo" placeholder="Chọn ảnh ">
                        <span class="error_input"></span>
                        <br>
                        <label for="price">Giá:</label>
                        <input type="text" class="input-full" id="price" name="price" placeholder="100$">
                        <span class="error_input"></span>
                        <br>
                        <label for="description">Mổ tả:</label>
                        <textarea class="description-full" name="description" id="description" placeholder="Nhập mô tả" rows="10"></textarea>
                        <span class="error_input"></span>
                        <br>
                        <label for="manufacturers">Nhà sản xuất: </label>
                        <select name="manufacturer_id" id="manufacturers" class="select-full">
                            <option value="" selected>Choose a manufacturer</option>
                            <?php foreach ($result as $each) : ?>
                                <option value="<?php echo $each['id'] ?>" >
                                    <?php echo $each['name'] ?>
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
            // ktra_photo
            let photo = document.getElementById('photo').value;
            if (photo.length === 0) {
                document.getElementsByClassName('error_input')[1].innerHTML = "Ảnh không được để trống";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[1].innerHTML = "";
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
            if (manufacturer.length === 0){
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
</body>

</html>