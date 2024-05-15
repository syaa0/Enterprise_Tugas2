<?php
include '../koneksi.php';
$Jenis_Tingkatansabuk = $_GET['id'];

$hapus = $koneksi->query("DELETE FROM jenis_tingkatan WHERE Jenis_Tingkatansabuk='$Jenis_Tingkatansabuk' ");
if ($hapus) {

    echo "<script>alert('Akun berhasil di Hapus');
window.location='../index.php?p=tingkatan/index'
</script>";
}
