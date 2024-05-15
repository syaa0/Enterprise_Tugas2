<?php
include '../koneksi.php';
$Id_Anggota = $_GET['id'];

$hapus = $koneksi->query("DELETE FROM anggota WHERE Id_Anggota='$Id_Anggota' ");
if ($hapus) {

    echo "<script>alert('Akun berhasil di Hapus');
window.location='../index.php?p=anggotabaru/index'
</script>";
}
