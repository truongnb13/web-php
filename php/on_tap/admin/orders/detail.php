<?php 
require '../ck_admin_signin.php';
$sum = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../styles/grid.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php 
        $order_id = $_GET['id'];
        require '../connect.php';
        $sql = "select * from order_product
        join products on products.id = order_product.product_id
        where order_id = '$order_id'";
        $result = mysqli_query($connect, $sql);
    ?>
    <div class="grid wide container">
        <div class="content">
            <div class="frame-back">
                <a href="./index.php"><i class="fas fa-chevron-left"></i></i></a>
            </div>
            <div class="grid cart">
                <div class="row cart-header">
                    <div class="col l-6 m-6">
                        <div class="cart-header_item">
                            Sản phẩm
                        </div>
                    </div>
                    <div class="col l-2 m-2">
                        <div class="cart-header_item">
                            Đơn giá
                        </div>
                    </div>
                    <div class="col l-2 m-2">
                        <div class="cart-header_item">
                            Số lượng
                        </div>
                    </div>
                    <div class="col l-2 m-2">
                        <div class="cart-header_item">
                            Số tiền
                        </div>
                    </div>
                </div>
                <?php foreach ($result as $each) : ?>
                <div class="row cart-content">
                    <div class="col l-6 m-6">
                        <div class="row">
                            <div class="col l-1 m-1">
                                <div class="cart-item">
                                    <input type="checkbox" checked class="cart-item_checkbox" id="cart_checkbox"
                                        name="checkbox_id" value="<?php echo $each['id'] ?>">
                                </div>
                            </div>
                            <div class="col l-7 m-7">
                                <div class="cart-item">
                                    <div class="cart-item_photo"
                                        style="background-image: url('../products/photos/<?php echo $each['photo'] ?>');">
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
                    <div class="col l-2 m-2">
                        <div class="cart-item">
                            <?php echo $each['price'] ?>
                        </div>
                    </div>
                    <div class="col l-2 m-2">
                        <div class="cart-item">
                            <input type="text" class="cart-item_quantity" value="<?php echo $each['quantity'] ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="col l-2 m-2">
                        <div class="cart-item">
                            <?php 
                                $result = $each['price'] *  $each['quantity'];
                                $sum += $result;
                                echo $result;
                            ?>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
</body>

</html>