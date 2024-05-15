<div class="section-header">
    <h1>Tambah Data Anggota</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="index.php?p=anggotabaru/index">Anggota</a></div>
        <div class="breadcrumb-item">Tambah</div>
    </div>
</div>
<div class="section-body">
    <div class="card card-primary">
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
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
                        <label for="frist_name">Email</label>
                        <input id="frist_name" type="text" class="form-control" name="email" autofocus="">
                    </div>
                    <div class="form-group col-12">
                        <label for="frist_name">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
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
                        <?php
        // Koneksi ke database
        $koneksi = mysqli_connect('localhost', 'meiyumyi_gojuass', 'meiyumyi_gojuass', 'meiyumyi_gojuass');
        if (!$koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Query untuk mengambil data
        $query = "SELECT Nama_Tingkatan FROM jenis_tingkatan";
        $result = mysqli_query($koneksi, $query);
        ?>

        <!-- Membuat elemen select -->
        <select name="jenis_tingkatan" class="form-control">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . htmlspecialchars($row['Nama_Tingkatan']) . '">' . htmlspecialchars($row['Nama_Tingkatan']) . '</option>';
        }
        ?>
        </select>

        <?php
        // Menutup koneksi
        mysqli_close($koneksi);
        ?>
                    </div>
                  
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                        SUBMIT DATA ANGGOTA
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

require('../koneksi.php');
if (isset($_POST['submit'])) {
    $password = sha1("123");
    $tambah2 = $koneksi->query("INSERT INTO tb_user(email,password,nama_lengkap,level,status) VALUES('$_POST[email]','$password','$_POST[nama_anggota]','anggota','active')");
    $a = $koneksi->query("SELECT * FROM tb_user order by Id_user desc")->fetch_assoc();
    $Id_user = $a['Id_user'];
    $tambah = $koneksi->query("INSERT INTO anggota(Id_Anggota,Nama_Anggota,TL,JK,Jenis_Tingkatansabuk,Tempat_Lahir,No_hp, Alamat, Id_user) VALUES('$_POST[id_anggota]','$_POST[nama_anggota]','$_POST[tanggal_lahir]','$_POST[jenis_kelamin]','$_POST[jenis_tingkatan]','$_POST[tempat_lahir]','$_POST[no_hp]','$_POST[alamat]', '$Id_user')");
    
    if ($tambah) {
        echo "<script>alert('data berhasil di tambah');
        window.location='index.php?p=anggotabaru/index'
        </script>";
    } else {
        echo "<script>alert('database error!!');
    window.location='index.php?p=anggotabaru/index'
    </script>";
    }
}
?>