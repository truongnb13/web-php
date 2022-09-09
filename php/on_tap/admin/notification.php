<?php
if (isset($_GET['error'])) {
?>
    <span style="color:red; font-family: 'Edu NSW ACT Foundation', cursive;">
        <?php echo $_GET['error'] ?>
    </span>
<?php
} elseif (isset($_GET['success'])) {
?>
    <span style="color:green; font-family: 'Edu NSW ACT Foundation', cursive;">
        <?php echo $_GET['success'] ?>
    </span>
<?php
}
?>