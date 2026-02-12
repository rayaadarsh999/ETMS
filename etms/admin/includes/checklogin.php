<?php
session_start();
error_reporting(0);

if (strlen($_SESSION['etmsaid']) == 0) {
    header('location:login.php');
    exit();
}
?>
