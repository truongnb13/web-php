<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhà sản xuất</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
</head>

<body>
    <div class="container">
        <div class="frame">
            <div class="frame-header">
                <div class="frame-back">
                    <a href="../manufacturers/"><i class="fas fa-chevron-left"></i></i></a>
                </div>
                <h1>Thêm nhà sản xuất</h1>
            </div>
            <div class="frame-form">
                <?php include "../notification.php" ?>
                <form method="post" action="process_insert.php">
                    <div class="input-group">
                        <label for="ten">Tên:</label>
                        <input type="text" class="input-full" id="ten" name="name" placeholder="Nhập tên">
                        <span class="error_input"></span>
                        <br>
                        <label for="dia_chi">Địa chỉ:</label>
                        <input type="text" class="input-full" id="dia_chi" name="address" placeholder="XX-YY-ZZ">
                        <span class="error_input"></span>
                        <br>
                        <label for="sdt">Số điện thoại:</label>
                        <input type="text" class="input-full" id="phone" name="phone" placeholder="0123456789">
                        <span class="error_input"></span>
                        <br>
                        <label for="anh">Ảnh:</label>
                        <input type="text" class="input-full" id="anh" name="photo" placeholder=" ">
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
            let ten = document.getElementById('ten').value;
            if (ten.length === 0) {
                document.getElementsByClassName('error_input')[0].innerHTML = "Tên không được để trống";
                check = true;
            } else if (!regex_name.test(ten)) {
                document.getElementsByClassName('error_input')[0].innerHTML = "Tên sai";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[0].innerHTML = "";
            }

            // ktra_dia_chi
            let dia_chi = document.getElementById('dia_chi').value;
            if (dia_chi.length === 0) {
                document.getElementsByClassName('error_input')[1].innerHTML = "Địa chỉ không được để trống";
                check = true;
            } else {
                document.getElementsByClassName('error_input')[1].innerHTML = "";
            }

            //ktra_sdt

            let phone = document.getElementById('phone').value;
            let regex_phone = /^(0|84)(2(0[3-9]|1[0-6|8|9]|2[0-2|5-9]|3[2-9]|4[0-9]|5[1|2|4-9]|6[0-3|9]|7[0-7]|8[0-9]|9[0-4|6|7|9])|3[2-9]|5[5|6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])([0-9]{7})$/;
            if (phone.length === 0) {
                document.getElementsByClassName('error_input')[2].innerHTML = "Số điện thoại không được để trống";
                check = true;
            } else if (!regex_phone.test(phone)) {
                document.getElementsByClassName('error_input')[2].innerHTML = "Số điện thoại không hợp lệ";
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