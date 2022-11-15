<?php
session_start();
if (empty($_SESSION['id']) && empty($_SESSION['name'])) {
    header('location:index.php');
}
// unset($_SESSION['cart']);
if (isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
} else {
    $cart = null;
}

$sum = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style_form.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/grid.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="grid wide container">
        <?php include 'header.php'?>
        <div class="content">
            <div class="grid cart">
                <div class="row cart-header">
                    <div class="col l-6 m-4">
                        <div class="cart-header_item">
                            Sản phẩm
                        </div>
                    </div>
                    <div class="col l-1-5 m-2">
                        <div class="cart-header_item">
                            Đơn giá
                        </div>
                    </div>
                    <div class="col l-1-5 m-2">
                        <div class="cart-header_item">
                            Số lượng
                        </div>
                    </div>
                    <div class="col l-1-5 m-2">
                        <div class="cart-header_item">
                            Số tiền
                        </div>
                    </div>
                    <div class="col l-1-5 m-2">
                        <div class="cart-header_item">
                            thao tác
                        </div>
                    </div>
                </div>
                <?php if ($cart) {?>
                <?php foreach ($cart as $id => $each) : ?>
                <div class="row cart-content">
                    <div class="col l-6 m-4">
                        <div class="row">
                            <div class="col l-1 m-1">
                                <div class="cart-item">
                                    <input type="checkbox" class="cart-item_checkbox" id="cart_checkbox"
                                        name="checkbox_id" value="<?php echo $id ?>">
                                </div>
                            </div>
                            <div class="col l-7 m-7">
                                <div class="cart-item">
                                    <div class="cart-item_photo"
                                        style="background-image: url('admin/products/photos/<?php echo $each['photo'] ?>');">
                                    </div>
                                    <div class="cart-item_name">
                                        <?php echo $each['name'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-4 m-4">
                                <div class="cart-item">Phân loại</div>
                            </div>
                        </div>
                    </div>
                    <div class="col l-1-5 m-2">
                        <div class="cart-item">
                            <?php echo $each['price'] ?>
                        </div>
                    </div>
                    <div class="col l-1-5 m-2">
                        <div class="cart-item">
                            <a href="cart-update_quantity.php?id=<?php echo $id ?>&type=decre">
                                <i class="fas fa-minus-square"></i>
                            </a>
                            <input type="text" class="cart-item_quantity" value="<?php echo $each['quantity'] ?>">
                            <a href="cart-update_quantity.php?id=<?php echo $id ?>&type=incre">
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col l-1-5 m-2">
                        <div class="cart-item">
                            <?php 
                                $result = $each['price'] *  $each['quantity'];
                                $sum += $result;
                                echo $result;
                            ?>
                        </div>
                    </div>
                    <div class="col l-1-5 m-2">
                        <div class="cart-item">
                            <a href="cart-delete.php?id=<?php echo $id ?>"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <?php } ?>
                <div class="row cart-total">
                    <div class="col l-12">
                        <div class="item">
                            Tổng tiền: $<?php echo $sum ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $id = $_SESSION['id'];
            require 'admin/connect.php';
            $sql = "select * from customers where id = '$id'";
            $result = mysqli_query($connect, $sql);
            $each = mysqli_fetch_array($result);
        ?>
        <div class="container">
            <div class="frame">
                <div class="frame-header">
                    <div class="frame-back">
                        <a href="./index.php"><i class="fas fa-chevron-left"></i></i></a>
                    </div>
                    <h1>Đặt hàng</h1>
                </div>
                <div class="frame-form">
                    <?php include "./admin/notification.php" ?>
                    <form method="post" action="process_order.php">
                        <div class="input-group">
                            <label for="name_receiver">Tên người nhận:</label>
                            <input type="text" class="input-full" id="name_receiver" name="name_receiver" placeholder="Nhập tên" value="<?php echo $each['name'] ?>">
                            <span class="error_input"></span>
                            <br>
                            <label for="phone_receiver">Số điện thoại:</label>
                            <input type="text" class="input-full" id="phone_receiver" name="phone_receiver" placeholder="0123456789" value="<?php echo $each['phone_number'] ?>">
                            <span class="error_input"></span>
                            <br>
                            <label for="address_receiver">Địa chỉ:</label>
                            <input type="text" class="input-full" id="address_receiver" name="address_receiver" placeholder="XX-YY-ZZ" value="<?php echo $each['address'] ?>">
                            <span class="error_input"></span>
                        </div>
                        <div style="text-align: center;">
                            <button type="button" id="input_button" onclick="kiem_tra()">Đặt hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'footer.php'?>
    </div>
    <script type="text/javascript">
        function kiem_tra() {
            let check = false;
            // ktra_ten
            let name_receiver = document.getElementById('name_receiver').value;
            if (name_receiver.length === 0) {
                document.getElementsByClassName('error_input')[0].innerHTML = "Tên không được để trống";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[0].innerHTML = "";
            }
            //ktra_sdt
            let phone_receiver = document.getElementById('phone_receiver').value;
            if (phone_receiver.length === 0) {
                document.getElementsByClassName('error_input')[1].innerHTML = "Số điện thoại không được để trống";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[1].innerHTML = "";
            }
            //ktra_diachi
            let address_receiver = document.getElementById('address_receiver').value;
            if (address_receiver.length === 0) {
                document.getElementsByClassName('error_input')[2].innerHTML = "Địa chỉ không được để trống";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[2].innerHTML = "";
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