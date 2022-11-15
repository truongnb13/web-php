<?php
    session_start();
    if (isset($_SESSION['level_admin'])){
        header('location:./root/');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="frame">
            <div class="frame-header">
                <h1>Đăng nhập</h1>
            </div>
            <div class="frame-form">
                <?php include "./notification.php" ?>
                <form method="post" action="process_signin.php">
                    <div class="input-group">
                        <label for="email">Email:</label>
                        <input type="email" class="input-full" id="email" name="email" placeholder="abc@xyz">
                        <span class="error_input"></span>
                        <br>
                        <label for="password">Password:</label>
                        <input type="password" class="input-full" id="password" name="password" placeholder="********">
                        <span class="error_input"></span>
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Ghi nhớ đăng nhập</label>
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
        // ktra_email
        let email = document.getElementById('email').value;
        if (email.length === 0) {
            document.getElementsByClassName('error_input')[0].innerHTML = "Địa chỉ mail không được để trống";
            check = true;
        } else {
            document.getElementsByClassName('error_input')[0].innerHTML = "";
        }

        //ktra_password
        let password = document.getElementById('password').value;
        if (password.length === 0) {
            document.getElementsByClassName('error_input')[1].innerHTML = "Mật khẩu không được để trống";
            check = true;
        } else {
            document.getElementsByClassName('error_input')[1].innerHTML = "";
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