<div class="section-header">
    <h1>Tambah Data Kegiatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=kegiatan/index">Kegiatan</a></div>
        <div class="breadcrumb-item">Tambah</div>
    </div>
</div>
<div class="section-body">
    <div class="card card-primary">
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="frist_name">Kode Kegiatan</label>
                        <input id="frist_name" type="text" class="form-control" name="kode_kegiatan" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label for="frist_name">Nama Kegiatan</label>
                        <input id="frist_name" type="text" class="form-control" name="nama_kegiatan" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label>Tanggal Kegiatan</label>
                        <input id="frist_name" type="date" class="form-control" name="tanggal_kegiatan" autofocus="">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                        SUBMIT KEGIATAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {

    $tambah = $koneksi->query("INSERT INTO kegiatan(Kode_Kegiatan,Nama_Kegiatan,Tanggal_Kegiatan) VALUES('$_POST[kode_kegiatan]','$_POST[nama_kegiatan]','$_POST[tanggal_kegiatan]')");

    if ($tambah) {
        echo "<script>alert('data berhasil di tambah');
        window.location='index.php?p=kegiatan/index'
        </script>";
    } else {
        echo "<script>alert('database error!!');
    window.location='index.php?p=kegiatan/index'
    </script>";
    }
}
?>