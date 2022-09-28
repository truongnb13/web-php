<?php
require 'admin/connect.php';
$id = $_GET['id'];
$sql = "select * from products
where id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);

// Get manufacturers
$manufacturer_id = $each['manufacturer_id'];
$sql_manufacturers = "select * from manufacturers 
where id = '$manufacturer_id'";
$result_manufacturer = mysqli_query($connect, $sql_manufacturers);
$each_manufacturer = mysqli_fetch_array($result_manufacturer);
?>

<div class="content">
    <div class="grid product">
        <div class="row">
            <div class="col l-5 m-5 c-12 product__photo">
                <div class="item">
                    <div class="item-photo" style="background-image: url('admin/products/photos/<?php echo $each['photo'] ?>');"></div>
                    <div class="row">
                        <div class="col l-3 m-3 c-4">
                            <div class="item-mini">
                                <div class="item-mini-photo" style="background-image: url('admin/products/photos/<?php echo $each['photo'] ?>');"></div>
                            </div>
                        </div>
                        <div class="col l-3 m-3 c-4">
                            <div class="item-mini">
                                <div class="item-mini-photo" style="background-image: url('admin/products/photos/<?php echo $each['photo'] ?>');"></div>
                            </div>
                        </div>
                        <div class="col l-3 m-3 c-4">
                            <div class="item-mini">
                                <div class="item-mini-photo" style="background-image: url('admin/products/photos/<?php echo $each['photo'] ?>');"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l-7 m-7 c-12 products__info">
                <div class="item">
                    <div class="product__info-name">
                        <h3><?php echo $each['name'] ?></h3>
                    </div>
                    <div class="product__info-price"><?php echo $each['price']  ?>$</div>
                    <div class="product__info-manufacturer"><?php echo $each_manufacturer['name'] ?></div>
                    <div class="product__info-description">
                        <span>
                            <?php echo $each['description'] ?>
                        </span>
                    </div>
                    <div class="row order__card">
                        <div class="col l-6 m-6 c-12">
                            <div class="item">
                                <?php if (empty($_SESSION['id']) && empty($_SESSION['name'])) { ?>
                                    <a class="btn-group" href="form_signin.php?id_product=<?php echo $id ?>">
                                        Thêm vào rỏ hàng
                                    </a>
                                <?php } else { ?>
                                    <a class="btn-group" href="cart_add.php?id=<?php echo $id ?>">
                                        Thêm vào rỏ hàng
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col l-6 m-6 c-12">
                            <div class="item">
                                <?php if (empty($_SESSION['id']) && empty($_SESSION['name'])) { ?>
                                    <a class="btn-group" href="form_signin.php?id_product=<?php echo $id ?>">
                                        Mua ngay
                                    </a>
                                <?php } else { ?>
                                    <a class="btn-group" href="#">
                                        Mua ngay
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>