<?php if ($_SESSION['level'] == 'anggota') : ?>
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="index.php">Dashboard</a> </div>
        </div>
    </div>
<?php endif; ?>
<div class="section-body">
    <?php if ($_SESSION['level'] == 'anggota') : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Welcome, <?php echo $_SESSION['nama_lengkap'] ?></h2>
                        <p class="lead">Selamat Datang di E-Member Karate GOJU ASS</p>
                        <div class="mt-4">
                            <a href="index.php?p=biodata/index" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Biodata</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php else : ?>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <?php
                    $admin = $koneksi->query("SELECT * FROM tb_user WHERE level='admin' ");
                    ?>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            <?= $admin->num_rows ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-user"></i>
                    </div>
                    <?php
                    $admin = $koneksi->query("SELECT * FROM tb_user WHERE level='anggota' ");
                    ?>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Anggota</h4>
                        </div>
                        <div class="card-body">
                            <?= $admin->num_rows ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Welcome, <?php echo $_SESSION['nama_lengkap'] ?></h2>
                        <p class="lead">Selamat Datang di E-Member Karate GOJU ASS</p>
                    </div>

                </div>
            </div>
        </div>


    <?php endif; ?>
</div>