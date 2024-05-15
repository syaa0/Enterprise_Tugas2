<?php
include '../koneksi.php';
$No_ujian = $_GET['id'];
$Kode_Jadwalujian = $_GET['Kode_Jadwalujian'];

$hapus = $koneksi->query("DELETE FROM hasil_ujian WHERE No_ujian='$No_ujian' ");
if ($hapus) {

    echo "<script>alert('Akun berhasil di Hapus');
window.location='../index.php?p=ujian/adm_kelola&Kode_Jadwalujian=$Kode_Jadwalujian'
</script>";
}
