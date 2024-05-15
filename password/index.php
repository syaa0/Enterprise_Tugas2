<div class="section-header">
    <h1>Ganti Password</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item">Ganti Password</div>
    </div>
</div>

<div class="section-body">

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-7">

                <div class="card">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="card-header">
                            Anggota
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="text" class="form-control" name="password_lama">
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="text" class="form-control" name="password_baru">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="ubah" class="btn btn-primary btn-lg btn-block">
                                    SUBMIT GANTI PASSWORD
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['ubah'])) {
            $Id_user = $_SESSION['Id_user'];
            $password_lama = sha1($_POST['password_lama']);
            $user = $koneksi->query("SELECT * FROM tb_user WHERE Id_user='$Id_user' AND password='$password_lama'");
            if ($user->num_rows > 0) 
            {
                $password_baru = sha1($_POST['password_baru']);
                $ubah = $koneksi->query("UPDATE tb_user SET password='$password_baru' WHERE Id_user='$Id_user' ");

            }
            else
            {
                echo "<script>alert('Password lama anda salah');
                    window.location='index.php?p=password/index'
                    </script>";
            }

            
            if ($ubah) {
                echo "<script>alert('password berhasil diganti');
                    window.location='index.php?p=password/index'
                    </script>";
            } else {
                echo "<script>alert('database error');
                window.location='index.php?p=password/index'
                </script>";
            }
        }
        ?>
</div>