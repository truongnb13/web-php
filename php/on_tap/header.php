<div class="header">
    <ul class="navbar_links">
        <li class="navbar_links-home"><a href="./index.php">
            Home
        </a></li>
        <?php if(empty($_SESSION['id']) || empty($_SESSION['name'])) { ?>
            <li class="navbar_links-signup"><a href="./form_signup.php">
                Đăng ký
            </a></li>
            <li class="navbar_links-signin"><a href="./form_signin.php">
                Đăng nhập
            </a></li>
        <?php } else {?>
            <li class="navbar_links-signout"><a href="./process_signout.php">
                Đăng xuất
            </a></li>
            <li class="navbar_links-signout"><a href="./cart_view.php">
                Giỏ hàng
            </a></li>
        <?php }?>
    </ul>
</div>