<?php
session_start();
$id = $_GET['id'];
$type = $_GET['type'];

if($type === 'decre'){
    if ($_SESSION['cart'][$id]['quantity'] === 1){
        unset($_SESSION['cart'][$id]);
    }else {
        $_SESSION['cart'][$id]['quantity']--;
    }
} elseif($type === 'incre') {
    $_SESSION['cart'][$id]['quantity']++;
}
header('location:cart_view.php');

