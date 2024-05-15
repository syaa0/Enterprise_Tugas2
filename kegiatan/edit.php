<?php
$a = $koneksi->query("SELECT * FROM kegiatan WHERE Kode_Kegiatan='$_GET[id]' ")->fetch_assoc();

?>
<div class="section-header">
    <h1>Edit Kegiatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=kegiatan/index">Kegiatan</a></div>
        <div class="breadcrumb-item">Edit</div>
    </div>
</div>
<div class="section-body">
    <div class="card card-primary">
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="Kode_Kegiatan" value="<?= $_GET['id'] ?>">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="frist_name">Kode Kegiatan</label>
                        <input id="frist_name" type="text" class="form-control" name="kode_kegiatan" autofocus="" value="<?= $a['Kode_Kegiatan'] ?>"readonly>
                    </div>
                    <div class="form-group col-12">
                        <label for="frist_name">Nama Kegiatan</label>
                        <input id="frist_name" type="text" class="form-control" name="nama_kegiatan" autofocus="" value="<?= $a['Nama_Kegiatan'] ?>">
                    </div>
                    <div class="form-group col-12">
                        <label>Tanggal Kegiatan</label>
                        <input type="date" name="tanggal_kegiatan" id="" class="form-control" value="<?= $a['Tanggal_Kegiatan'] ?>">

                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="edit" class="btn btn-primary btn-lg btn-block">
                        EDIT KEGIATAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['edit'])) {

    $edit = $koneksi->query("UPDATE kegiatan SET Nama_Kegiatan='$_POST[nama_kegiatan]',Tanggal_Kegiatan='$_POST[tanggal_kegiatan]' WHERE Kode_Kegiatan='$_POST[kode_kegiatan]' ");

    if ($edit) {
        echo "<script>alert('data berhasil di ubah');
        window.location='index.php?p=kegiatan/index'
        </script>";
    } else {
        echo "<script>alert('database error!!');
    window.location='index.php?p=kegiatan/index'
    </script>";
    }
}
?>