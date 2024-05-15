<div class="section-header">
    <h1>Tambah Data User</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=akun/index">Akun</a></div>
        <div class="breadcrumb-item">Tambah</div>
    </div>
</div>
<div class="section-body">
    <div class="card card-primary">
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-12">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label>Level</label>
                        <select name="level" id="" class="form-control" required>
                            <option value="">pilih level</option>
                            <option value="admin">Admin</option>
                            <option value="Anggota">Anggota</option>
                        </select>
                    </div>
                    <!--<div class="form-group col-12">
                        <label>Upload Foto</label>
                        <input type="file" class="form-control" name="foto_user">
                    </div>--->
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                        TAMBAH USER
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $pass = sha1($_POST['password']);
    if (!empty($_FILES['foto_user']['name'])) {
        //foto tersedia

        //simpan foto baru
        $foto_user = time() . $_FILES['foto_user']['name'];
        $tmp_gambar = $_FILES['foto_user']['tmp_name'];
        move_uploaded_file($tmp_gambar, 'assets/foto_user/' . $foto_user);
    } else {
        //foto tidak ada
        $foto_user = 'default.png';
    }
    $tambah = $koneksi->query("INSERT INTO tb_user(email,password,nama_lengkap,level,foto_user,status) VALUES('$_POST[email]','$pass','$_POST[nama_lengkap]','$_POST[level]','$foto_user','non active')");

    if ($tambah) {
        echo "<script>alert('data berhasil di tambah');
        window.location='index.php?p=akun/index'
        </script>";
    } else {
        echo "<script>alert('database error!!');
    window.location='index.php?p=akun/index'
    </script>";
    }
}
?>