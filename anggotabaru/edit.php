<?php
$a = $koneksi->query("SELECT * FROM anggota WHERE Id_Anggota='$_GET[id]' ")->fetch_assoc();

?>
<div class="section-header">
    <h1>Edit Data Anggota</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=anggotabaru/index">Data Anggota</a></div>
        <div class="breadcrumb-item">Edit</div>
    </div>
</div>
<div class="section-body">
    <div class="card card-primary">
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="Id_Anggota" value="<?= $_GET['id'] ?>">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="frist_name">Id Anggota</label>
                        <input id="frist_name" type="text" class="form-control" name="id_anggota" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label for="frist_name">Nama Anggota</label>
                        <input id="frist_name" type="text" class="form-control" name="nama_anggota" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label for="frist_name">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <label for="frist_name">Tempat Lahir</label>
                        <input id="frist_name" type="text" class="form-control" name="tempat_lahir" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label for="frist_name">Tanggal Lahir</label>
                        <input id="frist_name" type="date" class="form-control" name="tanggal_lahir" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label for="frist_name">Alamat</label>
                        <input id="frist_name" type="text" class="form-control" name="alamat" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label for="frist_name">No HP</label>
                        <input id="frist_name" type="text" class="form-control" name="no_hp" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label for="frist_name">Jenis Tingkatan Sabuk</label>
                        <select name="jenis_tingkatan" class="form-control">
                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="edit" class="btn btn-primary btn-lg btn-block">
                        EDIT TINGKATAN ANGGOTA
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['edit'])) {

    $edit = $koneksi->query("UPDATE anggota SET Nama_Anggota='$_POST[nama_anggota]',JK='$_POST[jenis_kelamin]',Tempat_Lahir='$_POST[tempat_lahir]',TL='$_POST[tanggal_lahir]',Alamat='$_POST[alamat]',No_hp='$_POST[no_hp]',Jenis_Tingkatansabuk='$_POST[jenis_tingkatan]' WHERE Id_Anggota='$_POST[id_anggota]' ");

    if ($edit) {
        echo "<script>alert('data berhasil di ubah');
        window.location='index.php?p=anggotabaru/index'
        </script>";
    } else {
        echo "<script>alert('database error!!');
    window.location='index.php?p=anggotabaru/index'
    </script>";
    }
}
?>