<?php require '../ck_admin_signin.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hoá đơn</title>

    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php
    require '../connect.php';

    // page_number
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    // search
    $search = '';
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }
    $sql_number_each = "select count(*) from orders
    where
    phone_receiver like '%$search%'";

    $array_number_each = mysqli_query($connect, $sql_number_each);
    $result_number_each = mysqli_fetch_array($array_number_each);
    $number_each = $result_number_each['count(*)'];

    $number_each_1_page = 5;
    $page_number = ceil($number_each / $number_each_1_page);

    $skip = $number_each_1_page * ($page - 1);
    $sql = "select 
        orders.*, 
        customers.name,        
        customers.phone_number,        
        customers.address        
        from orders 
        join customers 
        on customers.id = orders.customer_id
        where 
        phone_receiver like '%$search%'
        limit $number_each_1_page offset $skip";

    $result = mysqli_query($connect, $sql);
    ?>
    <div class="container">
        <div class="list">
            <div class="list-header">
                <div class="list_back">
                    <a href="../"><i class="fas fa-chevron-left"></i></i></a>
                </div>
                <a href="./">
                    <h1>Danh sách hóa đơn</h1>
                </a>
                <div class="add_new">
                    <!-- <a href="form_insert.php">Thêm sản phẩm <i class="fas fa-user-plus"></i> </a> -->
                </div>
                <div class="search">
                    <form>
                        <input type="search" class="input-full" name="search" placeholder='Tìm kiếm'>
                    </form>
                </div>

            </div>
            <div class="list-table">
                <?php include "../notification.php" ?>
                <table class="main-table">
                    <tr>
                        <th>Mã</th>
                        <th>Thời gian đặt</th>
                        <th>Thông tin người nhận</th>
                        <th>Thông tin người đặt</th>
                        <th>Trạng thái</th>
                        <th>Tổng tiền</th>
                        <th>Chi tiết</th>
                        <th>Sửa</th>
                    </tr>
                    <?php foreach ($result as $each) : ?>
                        <tr>
                            <td><?php echo $each['id'] ?></td>
                            <td>
                                <?php echo $each['created_at'] ?>
                            </td>
                            <td>
                                <?php echo $each['name_receiver'] ?><br>
                                <?php echo $each['phone_receiver'] ?><br>
                                <?php echo $each['address_receiver'] ?>
                            </td>
                            <td>
                                <?php echo $each['name'] ?><br>
                                <?php echo $each['phone_number'] ?><br>
                                <?php echo $each['address'] ?>
                            </td>
                            <td>
                                <?php 
                                    switch ($each['status']) {
                                        case '0':
                                            echo "Mới đặt";
                                            break;
                                        case '1':
                                            echo "Đã duyệt";
                                            break;
                                        case '-1':
                                            echo "Hủy";
                                            break;
                                    }
                                ?>
                            </td>
                            <td>
                                <?php echo $each['total_price'] ?>
                            </td>
                            <td>
                                <a href="detail.php?id=<?php echo $each['id']?>" style="color: rgb(55, 146, 216);">
                                    <i class="fas fa-search-plus fa-2x"></i>
                                </a>
                            </td>
                            <td>
                                <?php if ($each['status'] != 1) { ?>
                                <a href="update.php?id=<?php echo $each['id']?>&status=1" style="color: rgb(55, 216, 106);">
                                    Duyệt
                                </a><br>
                                <?php } elseif ($each['status'] !== -1) {?>
                                <a href="update.php?id=<?php echo $each['id']?>&status=-1" style="color: rgb(216, 82, 55);">
                                    Hủy
                                </a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
                <div class="page-number">
                    <?php for ($i = 1; $i <= $page_number; $i++) { ?>
                        <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>">
                            <?php echo $i ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php mysqli_close($connect); ?>
</body>

</html>