<?php
include '../koneksi.php';
$Kode_Kegiatan = $_GET['id'];

$hapus = $koneksi->query("DELETE FROM kegiatan WHERE Kode_Kegiatan='$Kode_Kegiatan' ");
if ($hapus) {

    echo "<script>alert('Akun berhasil di Hapus');
window.location='../index.php?p=kegiatan/index'
</script>";
}
