<?php
$info_ujian = $koneksi->query("SELECT * FROM  jadwal_ujian WHERE Kode_Jadwalujian='$_GET[Kode_Jadwalujian]'")->fetch_assoc();
?>
<div class="section-header">
    <h1>Kelola Data Ujian Naik Tingkatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=ujian/adm_index">Jadwal Ujian</a></div>
        <div class="breadcrumb-item">Detail</div>
    </div>
</div>
<div class="section-body">
    <div class="alert alert-light alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
            <div class="alert-title">Informasi Jadwal Ujian</div>
            <ul>
                <b>

                    <li>Nama : <?= $info_ujian['Nama_Jadwalujian'] ?></li>
                    <li>Tanggal :<?= date('d F Y', strtotime($info_ujian['Tanggal_Ujian']))  ?></li>
                    <li>Ketua : <?= $info_ujian['Ketua'] ?></li>
                    <li>Panitia : <?= $info_ujian['Panitia'] ?></li>
                    <li>Penguji : <?= $info_ujian['Penguji'] ?></li>
                    <li>Tempat Pelaksanaan : <?= $info_ujian['Tempat_Pelaksanaan'] ?></li>
                </b>

            </ul>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="frist_name">Anggota</label>
                        <select name="id_anggota" class="form-control">
                        <?php
                            $anggota = $koneksi->query("SELECT * FROM anggota ORDER BY Nama_Anggota ");
                            foreach ($anggota as $u => $uu)
                            {
                                echo "<option value='$uu[Id_Anggota]'>$uu[Nama_Anggota]</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Upload Sertifikat</label>
                                <input type="file" name="file" id="" class="form-control">
                            </div>
                    </div>                    
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                        SUBMIT HASIL
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    if (!empty($_FILES['file']['name'])) {
        //foto tersedia
        //simpan foto baru
        $file = time() . $_FILES['file']['name'];
        $tmp_gambar = $_FILES['file']['tmp_name'];
        move_uploaded_file($tmp_gambar, 'ujian/sertifikat/t/' . $file);
    } else {
        //foto tidak ada
        $file = 'default.jpg';
    }

    $Kode_Jadwalujian = $_GET['Kode_Jadwalujian'];
    $id_anggota = $_POST['id_anggota'];
    $info_anggota = $koneksi->query("SELECT * FROM  anggota WHERE Id_Anggota='$id_anggota'")->fetch_assoc();
    $Nama_Anggota = $info_anggota['Nama_Anggota'];
    $tambah = $koneksi->query("INSERT INTO hasil_ujian(Id_Anggota, Nama_Anggota, Kode_Jadwalujian, Hasil_ujian) VALUES('$_POST[id_anggota]','$Nama_Anggota', '$Kode_Jadwalujian', '$file')");
    
    if ($tambah) {
        echo "<script>alert('data berhasil di tambah');
        window.location='index.php?p=ujian/adm_kelola&Kode_Jadwalujian=$Kode_Jadwalujian'
        </script>";
    } else {
        echo "<script>alert('database error!!');
    window.location='index.php?p=ujian/tambah_hasil&Kode_Jadwalujian=$Kode_Jadwalujian'
    </script>";
    }
}
?>