<?php
session_start();
unset($_SESSION['id_admin']);
unset($_SESSION['name_admin']);
unset($_SESSION['level_admin']);

// delete cookie
// setcookie('remember', null, -1);

header('location:../');