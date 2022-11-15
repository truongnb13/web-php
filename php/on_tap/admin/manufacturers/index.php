<?php require '../ck_super_admin.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhà sản xuất</title>

    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    $sql_number_each = "select count(*) from manufacturers
    where
    name like '%$search%'";

    $array_number_each = mysqli_query($connect, $sql_number_each);
    $result_number_each = mysqli_fetch_array($array_number_each);
    $number_each = $result_number_each['count(*)'];

    $number_each_1_page = 5;
    $page_number = ceil($number_each / $number_each_1_page);

    $skip = $number_each_1_page * ($page - 1);
    $sql = "select * from manufacturers
        where
        name like '%$search%'
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
                    <h1>Home Manufacturers</h1>
                </a>
                <div class="add_new">
                    <a href="form_insert.php">Thêm nhà sản xuất <i class="fas fa-user-plus"></i> </a>
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
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Ảnh</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    <?php foreach ($result as $each): ?>
                    <tr>
                        <td><?php echo $each['id'] ?></td>
                        <td><?php echo $each['name'] ?></td>
                        <td><?php echo $each['address'] ?></td>
                        <td><?php echo $each['phone'] ?></td>
                        <td>
                            <img height="100" src="<?php echo $each['photo'] ?>" alt="">
                        </td>
                        <td>
                            <a href="form_update.php?id=<?php echo $each['id'] ?>" class="update-each">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="process_delete.php?id=<?php echo $each['id'] ?>" class="delete-each">
                                <i class="fas fa-trash"></i>
                            </a>
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