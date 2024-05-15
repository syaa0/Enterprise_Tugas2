<div class="section-header">
    <h1>Tambah Data Tingkatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=tingkatan/index">Tingkatan</a></div>
        <div class="breadcrumb-item">Tambah</div>
    </div>
</div>
<div class="section-body">
    <div class="card card-primary">
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="frist_name">Jenis Tingkatan</label>
                        <input id="frist_name" type="text" class="form-control" name="jenis_tingkatan" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label for="frist_name">Nama Tingkatan</label>
                        <input id="frist_name" type="text" class="form-control" name="nama_tingkatan" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label>Keterangan</label>
                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                        SUBMIT TINGKATAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {

    $tambah = $koneksi->query("INSERT INTO jenis_tingkatan(Nama_Tingkatan,Keterangan,Jenis_Tingkatansabuk) VALUES('$_POST[nama_tingkatan]','$_POST[keterangan]','$_POST[jenis_tingkatan]')");

    if ($tambah) {
        echo "<script>alert('data berhasil di tambah');
        window.location='index.php?p=tingkatan/index'
        </script>";
    } else {
        echo "<script>alert('database error!!');
    window.location='index.php?p=tingkatan/index'
    </script>";
    }
}
?>