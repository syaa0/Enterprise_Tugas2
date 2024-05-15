<div class="section-header">
    <h1>Biodata Anggota</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item">Biodata Anggota</div>
    </div>
</div>

<div class="section-body">
    <?php
    $cek_bio = $koneksi->query("SELECT * FROM anggota JOIN jenis_tingkatan ON anggota.Jenis_Tingkatansabuk=jenis_tingkatan.Jenis_Tingkatansabuk WHERE Id_user='$_SESSION[Id_user]' ");
    if ($cek_bio->num_rows == 0) :
    ?>
        <div class="alert alert-primary alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Pemberitahuan</div>
                Biodata Anda Masih Kosong, Silahkan Lengkapi terlebih dahulu
                <hr>
                <a href="index.php?p=biodata/form" class="btn btn-dark"><i class="fa fa-edit"></i> Isi Biodata Anggota</a>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($cek_bio->num_rows > 0) : ?>
        <?php
        $bio = $cek_bio->fetch_assoc();
        ?>
        <div class="alert alert-light alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Pemberitahuan</div>
            </div>
        </div>
        <h2 class="section-title">Hi, <?= $_SESSION['nama_lengkap'] ?></h2>
        <p class="section-lead">
            Biodata Anggota yang telah diinputkan
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-description">
                        <div class="profile-widget-name"><?= $_SESSION['nama_lengkap'] ?> <div class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> Anggota
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">

                <div class="card">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="hidden" name="Anggota" value="<?= $bio['Id_Anggota'] ?>">
                        <div class="card-header">
                           Biodata Anggota
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="frist_name">Nama Lengkap</label>
                                    <input id="frist_name" type="text" class="form-control" name="Nama" autofocus="" value="<?= $bio['Nama_Anggota'] ?>" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="last_name">Tanggal Lahir</label>
                                    <input id="last_name" type="date" class="form-control" name="TL" value="<?= $bio['TL'] ?>"readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Tempat Lahir</label>
                                <input id="email" type="text" class="form-control" name="Tempat_Lahir" value="<?= $bio['Tempat_Lahir'] ?>"readonly>

                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Jenis Kelamin</label>
                                    <select name="JK" id="JK" class="form-control" required>
                                        <option value="">pilih jenis kelamin</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <script>
                                        document.getElementById('JK').value = '<?= $bio['JK'] ?>'>
                                    </script>
                                </div>
                                <div class="form-group col-6">
                                    <label class="d-block">Nomor HP</label>
                                    <input type="text" class="form-control" name="No_hp" value="<?= $bio['No_hp'] ?>"readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="Alamat" value="<?= $bio['Alamat'] ?>"readonly>
<!--  
                            </div>
                            <div class="card-header">
                                <ul>
                                    <li>
                                        <h4>Download Template Surat Izin Ortu <a target="_blank" href="assets/berkas/formulir.jpg"><span class="badge badge-primary">klik disini</span> </a></h4>
                                    </li>
                                </ul>


                            </div>
                            <div class="form-group">
                                <label>Upload Surat Izin Ortu</label>
                                <br>
                                <a target="_blank" href="assets/file/<?= $bio['Surat_izin_ortu'] ?>" class="btn btn-primary btn-icon icon-left"> <i class="fas fa-file"></i> cek surat izin ortu</a>
                                <input type="hidden" name="file_lama" value="<?= $bio['Surat_izin_ortu'] ?>">
                                <br><br>
                                <input type="file" class="form-control" name="Surat_izin_ortu">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="ubah" class="btn btn-primary btn-lg btn-block">
                                    SUBMIT BIODATA ANGGOTA
                                </button>
                            </div>
                        </div>  -->

                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['ubah'])) {
            $file_lama = $_POST['file_lama'];
            if (!empty($_FILES['Surat_izin_ortu']['name'])) {
                //foto tersedia
                //hapus foto lama
                if ($file_lama != 'default.jpg') {
                    unlink('assets/file/' . $file_lama);
                }
                //simpan foto baru
                $file_izin = time() . $_FILES['Surat_izin_ortu']['name'];
                $tmp_gambar = $_FILES['Surat_izin_ortu']['tmp_name'];
                move_uploaded_file($tmp_gambar, 'assets/file/' . $file_izin);
            } else {
                //foto tidak ada
                $file_izin = $file_lama;
            }

            $ubah = $koneksi->query("UPDATE anggota SET Nama_Anggota='$_POST[Nama]',TL='$_POST[TL]',Tempat_Lahir='$_POST[Tempat_Lahir]',JK='$_POST[JK]',No_hp='$_POST[No_hp]',Alamat='$_POST[Alamat]',Surat_izin_ortu='$file_izin' WHERE Id_Anggota='$_POST[Anggota]' ");

            if ($ubah) {
                echo "<script>alert('data berhasil di ubah');
                    window.location='index.php?p=biodata/index'
                    </script>";
            } else {
                echo "<script>alert('database error');
                window.location='index.php?p=biodata/index'
                </script>";
            }
        }
        ?>
    <?php endif; ?>
</div>