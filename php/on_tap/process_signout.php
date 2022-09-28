<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);

// delete cookie
setcookie('remember', null, -1);

header('location:index.php');