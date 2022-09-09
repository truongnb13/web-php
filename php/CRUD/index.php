<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách thành viên</title>

    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php
    require 'connect.php';

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
    $sql_number_member = "select count(*) from thanh_vien
    where
    gender like '%$search%'";

    $array_number_member = mysqli_query($connect, $sql_number_member);
    $result_number_member = mysqli_fetch_array($array_number_member);
    $number_member = $result_number_member['count(*)'];

    $number_member_1_page = 5;
    $page_number = ceil($number_member / $number_member_1_page);

    $skip = $number_member_1_page * ($page - 1);
    $sql = "select * from thanh_vien
        where
        gender like '%$search%'
        limit $number_member_1_page offset $skip";

    $result = mysqli_query($connect, $sql);
    ?>
    <div class="container">
        <div class="list">
            <div class="list-header">
                <a href="./">
                    <h1>Home</h1>
                </a>
                <div class="add_new">
                    <a href="form_insert.php">Thêm thành viên <i class="fas fa-user-plus"></i> </a>
                </div>
                <div class="search">
                    <form>
                        <input type="search" class="input-full" name="search" placeholder='Tìm kiếm'>
                    </form>
                </div>

            </div>
            <div class="list-table">
                <table class="main-table">
                    <tr>
                        <th>Mã</th>
                        <th>Họ tên</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Sở thích</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    <?php foreach ($result as $member) { ?>
                        <tr>
                            <td><?php echo $member['no'] ?></td>
                            <td><?php echo $member['name'] ?></td>
                            <td><?php echo $member['gender'] ?></td>
                            <td><?php echo $member['address'] ?></td>
                            <td><?php echo $member['email'] ?></td>
                            <td><?php echo $member['password'] ?></td>
                            <td><?php echo $member['hobby'] ?></td>
                            <td>
                                <a href="form_update.php?no=<?php echo $member['no'] ?>" class="update-member">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="process_delete.php?no=<?php echo $member['no'] ?>" class="delete-member">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
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