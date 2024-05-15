<div class="section-header">
    <h1>Data Presensi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
        <div class="breadcrumb-item">Presensi</div>
    </div>
</div>
<?php
$cek_anggota = $koneksi->query("SELECT * FROM Anggota WHERE Id_user='$_SESSION[Id_user]' ");
?>
<div class="section-body">
    <?php if ($cek_anggota->num_rows == 0) : ?>
        <div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <div class="alert-body">
                <div class="alert-title">Pemberitahuan</div>
                Harap Mengisi Biodata Terlebih Dahulu
            </div>
        </div>
    <?php else : ?>
        <?php $data = $cek_anggota->fetch_assoc(); ?>
        <?php if ($data['bio_status'] == 'register') : ?>
            <div class="alert alert-warning alert-has-icon">
                <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Pemberitahuan</div>
                    Biodata Anda Sudah Tersimpan, Harap Menunggu Verifikasi Berkas dari Admin
                </div>
            </div>
        <?php else : ?>
            <div class="card">
                <div class="card-header">
                    <h4>Kegiatan yang tersedia</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                </div>
                <div class="collapse show" id="mycard-collapse">
                    <?php
                    $kegiatan = $koneksi->query("SELECT * FROM kegiatan");
                    ?>
                    <div class="card-body">
                        <ul>
                         <?php foreach ($kegiatan as $baris => $row) : ?>
                            <li>
                                <a href="index.php?p=presensi/submit&Kode_Kegiatan=<?= $row['Kode_Kegiatan'] ?>&Tanggal_Kegiatan=<?= $row['Tanggal_Kegiatan'] ?> "><?= date('d M Y', strtotime($row['Tanggal_Kegiatan'])) . ' / ' . $row['Nama_Kegiatan'] ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-footer">
                        Note : Klik kegiatan untuk mengisi presensi
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Tabel Presensi</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $presensi = $koneksi->query("SELECT * FROM presensi JOIN anggota ON presensi.Id_Anggota=anggota.Id_Anggota WHERE anggota.Id_user='$_SESSION[Id_user]' ORDER BY Tanggal_Presensi DESC");
                                        ?>
                                        <?php foreach ($presensi as $u => $uu) : ?>
                                            <tr>
                                                <td>
                                                    <?= $u + 1 ?>
                                                </td>
                                                <td><?= $uu['Nama_Anggota'] ?></td>
                                                <td><?= date('d M Y', strtotime($uu['Tanggal_Presensi'])) ?></td>
                                                <td><span class="badge badge-primary"><?= $uu['Status'] ?></span> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>


</div>