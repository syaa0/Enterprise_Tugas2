<?php
include '../koneksi.php';
$Id_user = $_GET['Id_user'];

$hapus = $koneksi->query("DELETE FROM tb_user WHERE Id_user='$Id_user' ");
if ($hapus) {

    echo "<script>alert('Akun berhasil di Hapus');
window.location='../index.php?p=akun/index'
</script>";
}
