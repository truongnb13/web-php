<?php
session_start();

//if(!isset($_SESSION['level']) || $_SESSION['level'] !== 1) Tuong đương
if(empty($_SESSION['level_admin'])){
    header("location:../");
}