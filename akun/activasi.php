<?php
include '../koneksi.php';
$Id_user = $_GET['Id_user'];
$status = urldecode($_GET['status']);

if ($status == 'non active') {
    $status = 'active';
} else {
    $status = 'non active';
}
// Asumsikan $koneksi adalah objek mysqli yang valid dan sudah terkoneksi ke database.

// Escape variabel untuk mencegah SQL injection.
$status_escaped = $koneksi->real_escape_string($status);
$Id_user_escaped = $koneksi->real_escape_string($Id_user);

// Perbaikan pada query dengan menambahkan kutip tunggal yang hilang.
$aktifasi = $koneksi->query("UPDATE tb_user SET status='$status_escaped' WHERE Id_user='$Id_user_escaped'");

//$aktifasi = $koneksi->query("UPDATE tb_user SET status='$status' WHERE Id_user='$Id_user ");

if ($aktifasi) {

    echo "<script>alert('Akun berhasil di aktivasi');
window.location='../index.php?p=akun/index'
</script>";
}