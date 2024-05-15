<?php

define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

error_reporting(0);
session_start();
if (!isset($_SESSION['Id_user'])) {
    echo "<script>alert('harap login terlebih dahulu');window.location='login.php'</script>";
}
?>
<?php include('koneksi.php') ?>
<?php include('component/header.php') ?>
<?php include('component/sidebar.php') ?>
<?php include('content.php') ?>
<?php include('component/footer.php') ?>