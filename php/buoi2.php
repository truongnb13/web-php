<?php 
    $full_name = empty(!$_POST['ho_ten']) ? $_POST['ho_ten'] : "Chưa nhập họ tên";
    $gender = empty(!$_POST['gioi_tinh']) ? $_POST['gioi_tinh'] : "Chưa chọn giới tính";
    $address = empty(!$_POST['dia_chi']) ? $_POST['dia_chi'] : "Chưa nhập địa chỉ";
    $mail = empty(!$_POST['email']) ? $_POST['email'] : "Chưa nhập email";
    $password = empty(!$_POST['mat_khau']) ? $_POST['mat_khau'] : "Mật khẩu để trống";
    $hobby =empty(!$_POST['so_thich']) ? $_POST['so_thich'] : "Sở thích để trống";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body {
            font-weight: bold;
            box-sizing: border-box;
        }
        .frame {
            background-color: antiquewhite;
            max-width: 500px;
            margin: auto;
            box-shadow: 1px 4px 50px 1px rgb(217, 172, 23);
            border-radius: 10px;
        }
        .frame .frame-header {
            font-family: 'Edu NSW ACT Foundation', cursive;
            text-align: center;
            background-image: linear-gradient(to right,  rgb(232, 92, 64), rgb(233, 222, 18));
            padding: 5px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .frame .frame-form {
            padding: 50px 50px 20px 50px;       
        }
        .frame .frame-form .input-group{
            font-family: 'Edu NSW ACT Foundation', cursive;
        }
        .frame .frame-form .input-group .input-full{
            width: 100%;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .frame .frame-form input{
            padding: 10px 10px;
            margin: 10px 0;
            border: 1px solid #aaa;
            border-radius: 5px;
            font-family: 'Edu NSW ACT Foundation', cursive;
        }
        .frame .frame-form .btn-group {
            text-align: center;
            padding: 5px;
            margin: auto;
            border-bottom: 2px solid #aaa;
        }
        #input_button {
            background-image: linear-gradient(to right, rgb(232, 92, 64), rgb(233, 222, 18));
            padding: 5px 20px;
            border: none;
            border-radius: 10px;
            text-align: center;
            font-family: 'Edu NSW ACT Foundation', cursive;
        }
        #input_button:hover {
            box-shadow: 1px 4px 5px 1px rgb(174, 123, 47);
        }
        a {
            text-decoration: none;
            color: black;
        }
        .error_input {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="frame">
            <div class="frame-header">
                <h1>Form đã nhập</h1>
            </div>
            <div class="frame-form">
                <form method="get" action="buoi2.php">
                    <div class="input-group">
                        <label for="ho_ten">Họ tên:</label>
                        <input type="text" class="input-full" name="ho_ten" value='<?php echo $full_name ?>' readonly>
                        <span class="error_input"></span>
                        <br>
                        <label for="gioi_tinh">Giới tính:</label>
                        <input type="text" class="input-full" name="gioi_tinh" value='<?php echo $gender ?>' readonly> 
                        <span class="error_input"></span>
                        <br>
                        <label for="dia_chi">Địa chỉ:</label>
                        <input type="text" class="input-full" name="address" value='<?php echo $address ?>' readonly>
                        <span class="error_input"></span>
                        <br>
                        <label for="email">Email:</label>
                        <input type="email" class="input-full" name="mail" value='<?php echo $mail ?>' readonly>
                        <span class="error_input"></span>
                        <br>
                        <label for="mat_khau">Mật khẩu:</label>
                        <input type="password" class="input-full" name="password"  value='<?php echo $password ?>' readonly>
                        <span class="error_input"></span>
                        <br>
                        <label for="so_thich">Sở thích:</label>
                        <input type="text" class="input-full" name="hobby"  value='<?php echo $hobby ?>' readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>