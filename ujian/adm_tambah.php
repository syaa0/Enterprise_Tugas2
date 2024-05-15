<div class="section-header">
    <h1>Tambah Data Jadwal Ujian</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=ujian/adm_index">Jadwal Ujian</a></div>
        <div class="breadcrumb-item">Tambah</div>
    </div>
</div>
<div class="section-body">
    <div class="card card-primary">
        <div class="card-body">
            <form method="POST" action="">
                <div class="row">
                <div class="form-group col-12">
                        <label for="frist_name">Nama Jadwal</label>
                        <input id="frist_name" type="text" class="form-control" name="Nama_Jadwalujian" autofocus="" value="<?= $a['Nama_Jadwalujian'] ?>">
                    </div>
                    <div class="form-group col-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="Tanggal_Ujian" autofocus="" value="<?= $a['Tanggal_Ujian'] ?>">
                    </div>
                    <div class="form-group col-4">
                        <label>Ketua</label>
                        <input type="text" class="form-control" name="Ketua" autofocus="" value="<?= $a['Ketua'] ?>">
                    </div>
                    <div class="form-group col-4">
                        <label>Panitia</label>
                        <input type="text" class="form-control" name="Panitia" autofocus="" value="<?= $a['Panitia'] ?>">
                    </div>
                    <div class="form-group col-4">
                        <label>Penguji</label>
                        <input type="text" class="form-control" name="Penguji" autofocus="" value="<?= $a['Penguji'] ?>">
                    </div>
                    <div class="form-group col-4">
                        <label>Tempat Pelaksanaan</label>
                        <input type="text" class="form-control" name="Tempat_Pelaksanaan" autofocus="" value="<?= $a['Tempat_Pelaksanaan'] ?>">
                    </div>
                    <div class="form-group col-12">
                        <label>Isi Pengumuman</label>
                        <textarea name="Isi_Pengumuman" id="" cols="30" rows="10" class="form-control summernote-simple"><?= $a['Isi_Pengumuman'] ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                        SUBMIT JADWAL UJIAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $tambah = $koneksi->query("INSERT INTO jadwal_ujian(Nama_Jadwalujian,Tanggal_Ujian,Ketua,Panitia,Penguji,Tempat_Pelaksanaan,Isi_Pengumuman) VALUES('$_POST[Nama_Jadwalujian]','$_POST[Tanggal_Ujian]','$_POST[Ketua]','$_POST[Panitia]','$_POST[Penguji]','$_POST[Tempat_Pelaksanaan]','$_POST[Isi_Pengumuman]')");
    if ($tambah) {
        echo "<script>alert('Jadwal Ujian Berhasil di tambah');
        window.location='index.php?p=ujian/adm_index'
        </script>";
    } else {
        echo "<script>alert('database error!!');
    window.location='index.php?p=ujian/adm_index'
    </script>";
    }
}
?>