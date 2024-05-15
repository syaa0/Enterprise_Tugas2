<?php
$a = $koneksi->query("SELECT * FROM jenis_tingkatan WHERE Jenis_Tingkatansabuk='$_GET[id]' ")->fetch_assoc();

?>
<div class="section-header">
    <h1>Edit Data Tingkatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=tingkatan/index">Tingkatan</a></div>
        <div class="breadcrumb-item">Edit</div>
    </div>
</div>
<div class="section-body">
    <div class="card card-primary">
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="id_tingkatan" value="<?= $_GET['id'] ?>">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="frist_name">Jenis Tingkatan</label>
                        <input id="frist_name" type="text" class="form-control" name="jenis_tingkatan" autofocus="" value="<?= $a['Jenis_Tingkatansabuk'] ?>"readonly>
                    </div>
                    <div class="form-group col-12">
                        <label for="frist_name">Nama Tingkatan</label>
                        <input id="frist_name" type="text" class="form-control" name="nama_tingkatan" autofocus="" value="<?= $a['Nama_Tingkatan'] ?>">
                    </div>
                    <div class="form-group col-12">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" id="" class="form-control" value="<?= $a['Keterangan'] ?>">

                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="edit" class="btn btn-primary btn-lg btn-block">
                        EDIT TINGKATAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['edit'])) {

    $edit = $koneksi->query("UPDATE jenis_tingkatan SET Nama_Tingkatan='$_POST[nama_tingkatan]',Keterangan='$_POST[keterangan]' WHERE Jenis_Tingkatansabuk='$_POST[jenis_tingkatan]' ");

    if ($edit) {
        echo "<script>alert('data berhasil di ubah');
        window.location='index.php?p=tingkatan/index'
        </script>";
    } else {
        echo "<script>alert('database error!!');
    window.location='index.php?p=tingkatan/index'
    </script>";
    }
}
?>