<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.php">E-Member</a>
            <h6>Level : <?= $_SESSION['level'] ?></h6>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <?php if ($_SESSION['level'] == 'admin') : ?>
                <li class="<?= isset($_GET['p'])  ? '' : 'active' ?>">
                    <a class="nav-link" href="index.php"><i class="fas fa-fire">

                        </i> <span>Dashboard</span></a>
                </li>
                <li class="<?= $_GET['p'] == 'tingkatan/index' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?p=tingkatan/index"><i class="fas fa-columns">

                        </i> <span>Jenis Tingkatan</span></a>
                </li>
                <li class="<?= $_GET['p'] == 'kegiatan/index' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?p=kegiatan/index"><i class="fas fa-columns">

                        </i> <span>Kegiatan</span></a>
                </li>
                <li class="<?= $_GET['p'] == 'anggotabaru/index' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?p=anggotabaru/index"><i class="fas fa-th">

                        </i> <span>Anggota</span></a>
                </li>
            
                <li class="<?= $_GET['p'] == 'akun/index' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?p=akun/index"><i class="far fa-user">

                        </i> <span>Kelola Akun</span></a>
                </li>
                <li class="<?= $_GET['p'] == 'ujian/adm_index' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?p=ujian/adm_index"><i class="far fa-file-alt">

                        </i> <span>Data Jadwal Ujian</span></a>
                </li>
            <?php endif; ?>

            <?php if ($_SESSION['level'] == 'anggota') : ?>
                <li class="<?= isset($_GET['p'])  ? '' : 'active' ?>">
                    <a class="nav-link" href="index.php"><i class="fas fa-fire">

                        </i> <span>Dashboard</span></a>
                </li>
                <li class="<?= $_GET['p'] == 'password/index' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?p=password/index"><i class="far fa-user">
                        </i> <span>Ganti Password</span></a>
                </li>

                <li class="<?= $_GET['p'] == 'biodata/index' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?p=biodata/index"><i class="far fa-user">

                        </i> <span>Biodata</span></a>
                </li>
                <li class="<?= $_GET['p'] == 'presensi/index' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?p=presensi/index"><i class="fas fa-clock">

                        </i> <span>Presensi</span></a>
                </li>
                
                <li class="<?= $_GET['p'] == 'ujian/index' ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?p=ujian/index"><i class="far fa-file-alt">

                        </i> <span>jadwal ujian</span></a>
                </li>
            <?php endif; ?>
            
        </ul>


    </aside>
</div>


<!-- Main Content -->
<div class="main-content">
    <section class="section">