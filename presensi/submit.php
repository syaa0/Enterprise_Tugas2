<div class="section-header">
    <h1>Presensi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=presensi/index">Presensi</a></div>
        <div class="breadcrumb-item">Submit</div>
    </div>
</div>
<?php
date_default_timezone_set('Asia/Jakarta');

// Pengecekan apakah 'Tanggal_Kegiatan' ada dan bukan nilai kosong
if(isset($_GET['Tanggal_Kegiatan']) && !empty($_GET['Tanggal_Kegiatan'])) {
    $tanggalKegiatan = $_GET['Tanggal_Kegiatan'];

    // Debug: Cetak nilai tanggal kegiatan
    // echo "Tanggal Kegiatan: $tanggalKegiatan<br>";

    // Ubah tanggal kegiatan menjadi timestamp
    $timestampKegiatan = strtotime($tanggalKegiatan);

    // Debug: Cetak nilai timestamp kegiatan
    // echo "Timestamp Kegiatan: $timestampKegiatan<br>";

    $timestampSekarang = strtotime(date("Y-m-d"));

    // Bandingkan timestamp kegiatan dengan timestamp saat ini
    if ($timestampKegiatan < $timestampSekarang) {
        // Jika tanggal kegiatan sudah lewat
        echo "<script>alert('Maaf, presensi untuk kegiatan ini sudah tidak dapat diakses karena telah lewat.'); window.location.href='index.php?p=presensi/index';</script>";
    } else if ($timestampKegiatan > $timestampSekarang) {
        // Jika tanggal kegiatan belum terjadi
        echo "<script>alert('Maaf, presensi untuk kegiatan ini belum dapat diakses.'); window.location.href='index.php?p=presensi/index';</script>";
    } else {
        // Tampilkan formulir presensi jika tanggal kegiatan adalah hari ini
        // Tempatkan kode formulir presensi Anda di sini
    }
} else {
    // Jika 'Tanggal_Kegiatan' tidak diset atau kosong, tampilkan pesan error atau alihkan ke halaman default
    echo "<script>alert('Tanggal kegiatan tidak ditemukan.'); window.location.href='index.php?p=presensi/index';</script>";
}
?>

<div class="section-body">
    <div class="card card-primary">
        <div class="card-body">
            <h1 id="jamServer" style="text-align: center;font-size:100px"><?php echo date("H:i:s"); ?></h1>
            <hr>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="index.php?controller=user&method=absensi_store" method="POST">
                            <input type="hidden" name="Kode_Kegiatan" value="<?= $_GET['Kode_Kegiatan'] ?>">
                            <input type="hidden" name="Tanggal_Presensi" value="<?= $_GET['Tanggal_Kegiatan'] ?>">
                            <div class="form-group">
                                <select name="Status" id="" class="form-control" required>
                                    <option value="">--Pilih Status--</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Cuti">Cuti</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-lg btn-danger btn-block"><i class="fa fa-clock-o"></i> SUBMIT PRESENSI</button>

                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {

    $a = $koneksi->query("SELECT * FROM anggota WHERE Id_user='$_SESSION[Id_user]' ")->fetch_assoc();
    $Id_Anggota = $a['Id_Anggota'];
    $cek = $koneksi->query("SELECT * FROM presensi WHERE Id_Anggota='$Id_Anggota' AND Kode_Kegiatan='$_POST[Kode_Kegiatan]' ");

    if ($cek->num_rows > 0) {
        echo "<script>alert('Presensi Anda Sudah Ada');
        window.location='index.php?p=presensi/index'
        </script>";
    } else {
        $absensi = $koneksi->query("INSERT INTO presensi(Id_Anggota,Kode_Kegiatan,Tanggal_Presensi,Status) VALUES('$Id_Anggota','$_POST[Kode_Kegiatan]','$_POST[Tanggal_Presensi]','$_POST[Status]')");

        if ($absensi) {
            echo "<script>alert('Presensi Berhasil di submit');
            window.location='index.php?p=presensi/index'
            </script>";
        } else {
            echo "<script>alert('database error!!');
        window.location='index.php?p=presensi/index'
        </script>";
        }
    }
}


?>