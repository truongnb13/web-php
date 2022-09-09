<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thành viên</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="container">
        <div class="frame">
            <div class="frame-header">
                <h1>Thêm thành viên</h1>
            </div>
            <div class="frame-form">
                <form method="post" action="process_insert.php">
                    <div class="input-group">
                        <label for="ho_ten">Họ tên:</label>
                        <input type="text" class="input-full" id="ho_ten" name="name" placeholder="Nhập họ tên">
                        <span class="error_input"></span>
                        <br>
                        <label for="gioi_tinh">Giới tính:</label>
                        <input type="radio" name="gender" value="Nam"> Nam
                        <input type="radio" name="gender" value="Nữ"> Nữ
                        <span class="error_input"></span>
                        <br>
                        <label for="dia_chi">Địa chỉ:</label>
                        <input type="text" class="input-full" id="dia_chi" name="address" placeholder="XX-YY-ZZ">
                        <span class="error_input"></span>
                        <br>
                        <label for="email">Email:</label>
                        <input type="email" class="input-full" id="email" name="email" placeholder="abc@abc.com">
                        <span class="error_input"></span>
                        <br>
                        <label for="mat_khau">Mật khẩu:</label>
                        <input type="password" class="input-full" id="mat_khau" name="password" placeholder="Password">
                        <span class="error_input"></span>
                        <br>
                        <label for="so_thich">Sở thích:</label>
                        <input type="text" class="input-full" id="so_thich" name="hobby" placeholder="VD: Chơi game, Nghe nhạc, ...">
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
            let regex_name = /^[A-Z][a-z]*(?: [A-Z][a-z]*)*$/;
            let ho_ten = document.getElementById('ho_ten').value;
            if (ho_ten.length === 0) {
                document.getElementsByClassName('error_input')[0].innerHTML = "Tên không được để trống";
                check = true;
            } else if (!regex_name.test(ho_ten)) {
                document.getElementsByClassName('error_input')[0].innerHTML = "Tên sai";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[0].innerHTML = "";
            }

            // ktra_gioi_tinh
            let mang_gioi_tinh = document.getElementsByName('gender');
            let ck_gioi_tinh = false;
            for (let i = 0; i < mang_gioi_tinh.length; i++) {
                if (mang_gioi_tinh[i].checked) {
                    ck_gioi_tinh = true;
                }
            }
            if (!ck_gioi_tinh) {
                document.getElementsByClassName('error_input')[1].innerHTML = "Chưa chọn giới tính";
            } else {
                document.getElementsByClassName('error_input')[1].innerHTML = "";
            }

            // ktra_dia_chi
            let dia_chi = document.getElementById('dia_chi').value;
            if (dia_chi.length === 0) {
                document.getElementsByClassName('error_input')[2].innerHTML = "Địa chỉ không được để trống";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[2].innerHTML = "";
            }

            //ktra_email

            let email_address = document.getElementById('email').value;
            let regex_email = /^\w*@\w*.\w+$/;
            if (email_address.length === 0) {
                document.getElementsByClassName('error_input')[3].innerHTML = "Mail không được để trống";
                check = true;
            } else if (!regex_email.test(email_address)) {
                document.getElementsByClassName('error_input')[3].innerHTML = "Mail không hợp lệ";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[3].innerHTML = "";
            }

            //ktra_mat_khau
            let mat_khau = document.getElementById('mat_khau').value;
            if (mat_khau.length === 0) {
                document.getElementsByClassName('error_input')[4].innerHTML = "Mật khẩu không được để trống";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[4].innerHTML = "";
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