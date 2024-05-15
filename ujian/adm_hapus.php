<?php
include '../koneksi.php';
$Kode_Jadwalujian = $_GET['id'];

$hapus = $koneksi->query("DELETE FROM jadwal_ujian WHERE Kode_Jadwalujian='$Kode_Jadwalujian' ");
if ($hapus) {

    echo "<script>alert('Data berhasil di Hapus');
window.location='../index.php?p=ujian/adm_index'
</script>";
}
