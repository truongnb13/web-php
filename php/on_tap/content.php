<?php
require 'admin/connect.php';
$sql = "select * from products";
$result = mysqli_query($connect, $sql);
?>

<div class="content">
    <div class="grid products">
        <div class="row">
            <?php foreach ($result as $each) : ?>
                <div class="col l-3 m-4 c-6">
                    <a href="./product.php?id=<?php echo $each['id']?>">
                    <div class="item">
                        <div class="item-photo" style="background-image: url('admin/products/photos/<?php echo $each['photo']?>');"></div>
                        <div class="item-text">
                            <div class="item-text-name">
                                <?php echo $each['name']?>
                            </div>
                            <div class="item-text-price">
                                <?php echo $each['price']?>$
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>