<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style_form.css">
    <link rel="stylesheet" href="./styles/grid.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="frame">
            <div class="frame-header">
                <div class="frame-back">
                    <a href="./index.php"><i class="fas fa-chevron-left"></i></i></a>
                </div>
                <h1>Đăng ký</h1>
            </div>
            <div class="frame-form">
                <?php include "./admin/notification.php" ?>
                <form method="post" action="process_signup.php">
                    <div class="input-group">
                        <label for="ten">Tên:</label>
                        <input type="text" class="input-full" id="ten" name="name" placeholder="Nhập tên">
                        <span class="error_input"></span>
                        <br>
                        <label for="email">Email:</label>
                        <input type="email" class="input-full" id="email" name="email" placeholder="abc@xyz">
                        <span class="error_input"></span>
                        <br>
                        <label for="password">Password:</label>
                        <input type="password" class="input-full" id="password" name="password" placeholder="********">
                        <span class="error_input"></span>
                        <br>
                        <label for="phone_number">Số điện thoại:</label>
                        <input type="text" class="input-full" id="phone_number" name="phone_number" placeholder="0123456789">
                        <span class="error_input"></span>
                        <br>
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="input-full" id="address" name="address" placeholder="XX-YY-ZZ">
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
            let ten = document.getElementById('ten').value;
            if (ten.length === 0) {
                document.getElementsByClassName('error_input')[0].innerHTML = "Tên không được để trống";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[0].innerHTML = "";
            }

            // ktra_email
            let email = document.getElementById('email').value;
            if (email.length === 0) {
                document.getElementsByClassName('error_input')[1].innerHTML = "Địa chỉ mail không được để trống";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[1].innerHTML = "";
            }

            //ktra_password
            let password = document.getElementById('password').value;
            if (password.length === 0) {
                document.getElementsByClassName('error_input')[2].innerHTML = "Mật khẩu không được để trống";
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